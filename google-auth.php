<?php
require 'config.php';
if (isset($_SESSION['login_id'])) {
  header('Location: home.php');
  exit;
}

require 'google-api/vendor/autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('54952492379-hk5j3h8ckk4pm3alap2k1piq830nlag3.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost:8080/cadastro.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");
if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  if (!isset($token["error"])) {
    $client->setAccessToken($token['access_token']);
    // getting profile information
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    // Storing data into database
    $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
    $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
    $email = mysqli_real_escape_string($db_connection, $google_account_info->email);
    $profile_pic = mysqli_real_escape_string($db_connection, $google_account_info->picture);
    // checking user already exists or not
    $get_user = mysqli_query($db_connection, "SELECT `login_id` FROM `users` WHERE `login_id`='$id'");
    if (mysqli_num_rows($get_user) > 0) {
      $_SESSION['login_id'] = $id;

      //usuário já existe na base => enviar para o app já logado. Verificar com Viana
      header('Location: https://app.soplay.com.br/');
      exit;
    } else {
      // if user not exists we will insert the user
      $insert = mysqli_query($db_connection, "INSERT INTO `users`(`login_id`,`name`,`email`,`profile_image`) 
                                            VALUES('$id','$full_name','$email','$profile_pic')");
      if ($insert) {
        $_SESSION['login_id'] = $id;

        //usuario inserido na base, direcionar para o cadastro telefone
        header('Location: cadastro_glc.php');
        exit;
      } else {
        echo "Sign up failed!(Something went wrong).";
      }
    }
  } else {
    //se der erro no token, direcionar para o cadastro novamente
    header('Location: cadastro.php');
    exit;
  }
}
