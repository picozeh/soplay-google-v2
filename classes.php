<?php
require_once 'client/variables.php';
require "vendor/autoload.php";

use Aws\Credentials\CredentialProvider;
use Aws\Credentials\Credentials;
use Aws\CloudWatchLogs\CloudWatchLogsClient;
use Aws\CloudWatchLogs\Exception\CloudWatchLogsException;

class mysql
{
  protected $instance;
  private $host_mysql = "nxplay-stage-1.cluster-cto5yytdivaj.us-east-1.rds.amazonaws.com";
  private $banco_mysql = "nxplay";
  private $usuario_mysql = "admin";
  private $senha_mysql = "Undernet89";

  protected function conn()
  {
    if (!isset($this->instance)) {
      $this->instance = new PDO('mysql:host=' . $this->host_mysql . ';dbname=' . $this->banco_mysql, $this->usuario_mysql, $this->senha_mysql, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      $this->instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
    }
    return $this->instance;
  }
}

class usuario extends mysql
{
  public function log_cf($message)
  {
    $AccessKey = "AKIAVGXOYLOGTLKWNSW4";
    $SecretAccessKey = "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";
    $LogGroupName      = "Landing_NXPLAY";
    $LogStreamName       = "Log_Aplicacao";
    $NextSequenceToken    = "";


    try {

      $credentials     = new Aws\Credentials\Credentials($AccessKey, $SecretAccessKey);

      $client        = new Aws\CloudWatchLogs\CloudWatchLogsClient([
        'version'       => 'latest',
        'region'        => "us-east-1",
        'credentials'     => $credentials
      ]);
    } catch (Aws\CloudWatchLogs\Exception\CloudWatchLogsException $e) {

      die($e->getMessage());
    }

    try {

      $result         = $client->DescribeLogStreams([
        'logGroupName'     => $LogGroupName,
        'logStreamName'   => $LogStreamName
      ]);

      if (count($result["logStreams"]) > 0) {

        $NextSequenceToken    = $result["logStreams"][0]["uploadSequenceToken"];
      }
    } catch (Aws\CloudWatchLogs\Exception\CloudWatchLogsException $e) {

      die($e->getMessage());
    }

    try {

      if ($NextSequenceToken == "") {

        $result         = $client->putLogEvents([
          'logGroupName'     => $LogGroupName,
          'logStreamName'   => $LogStreamName,
          'logEvents'     => [
            [
              'message'     => json_encode($message),
              'timestamp'   => round(microtime(true) * 1000),
            ]
          ]
        ]);
      } else {

        $result         = $client->putLogEvents([
          'logGroupName'     => $LogGroupName,
          'logStreamName'   => $LogStreamName,
          'logEvents'     => [
            [
              'message'     => json_encode($message),
              'timestamp'   => round(microtime(true) * 1000),
            ]
          ],
          'sequenceToken'   => $NextSequenceToken
        ]);
      }
    } catch (AwsException $e) {

      die($e->getMessage());
    }
  }



  public function cadastrar()
  {


    try {
      $consultaUsuario = $this->conn()->query("select email from users where email = '" . $_POST['email'] . "'  ")->fetch(PDO::FETCH_ASSOC);

      if (empty($consultaUsuario['email'])) {

        $insert = $this->conn()->prepare("INSERT INTO users (nome,email,telefone,senha,enviado_whatsapp,utm_source,utm_medium,utm_campaign) VALUES (:nome,:email, :telefone,:senha,:enviado_whatsapp,:utm_source,:utm_medium,:utm_campaign)");
        $insert->bindValue(':nome', $_POST['nome'], PDO::PARAM_STR);
        $insert->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $insert->bindValue(':telefone', $_POST['cellphone'], PDO::PARAM_STR);
        $insert->bindValue(':senha', $_POST['senha'], PDO::PARAM_STR);
        $insert->bindValue(':enviado_whatsapp', "3", PDO::PARAM_STR);
        $insert->bindValue(':utm_source', $_POST['utm_source_input'], PDO::PARAM_STR);
        $insert->bindValue(':utm_medium', $_POST['utm_medium_input'], PDO::PARAM_STR);
        $insert->bindValue(':utm_campaign', $_POST['utm_campaign_input'], PDO::PARAM_STR);
        $insert->execute();
        setcookie('Cadastro_Email', $_POST['email']);
        setcookie('Cadastro_Nome', $_POST['nome']);
        setcookie('Cadastro_Telefone', $_POST['cellphone']);
        $this->cadastroBancoApp($_POST['nome'], $_POST['email'], $_POST['senha']);
        $this->cadastroGSheets($_POST['nome'], $_POST['email'], $_POST['cellphone'], $_POST['fbclid_input'], $_POST['utm_source_input'], $_POST['utm_medium_input'], $_POST['utm_campaign_input']);
        $this->pushMautic($_POST['nome'], $_POST['email'], $_POST['cellphone']);
        Header("Location: obrigado.php");
      } else {
        Header("Location: cadastro.php?msg=Email ou CPF já cadastrado!&tipo_msg=2");
      }
    } catch (Exception $e) {
      Header("Location: cadastro.php?msg=Houve um erro tente novamente!&tipo_msg=2");
    }
  }

  public function cadastroBancoApp($name, $email, $senha)
  {
    $empresaPlan = DB_PLAN;
    $empresaApp = DB_APP;
    $empresaAPIURL = DB_URLAPI;
    $empresaBearer = DB_BEARER;

    $consultaUsuario = $this->conn()->query("select * from users where email = '" . $email . "' ")->fetch(PDO::FETCH_ASSOC);
    $curl = curl_init();
    $data = array("name" => $name, "surname" => "", "email" => $email, "password" => $senha, "plan" => $empresaPlan, "app" => $empresaApp);
    $postdata = json_encode($data);

    curl_setopt_array($curl, [
      CURLOPT_URL => $empresaAPIURL,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 10000,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => $postdata,
      CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $empresaBearer,
        "Content-Type: application/json"
      ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);
    $this->log_cf($response);

    curl_close($curl);
    $insert = $this->conn()->prepare("UPDATE users SET validado = 1, cadastrado_prod = 1, enviado_whatsapp = 0 WHERE email = :email");
    $insert->bindValue(':email', $email, PDO::PARAM_STR);
    $insert->execute();
  }

  public function cadastroGSheets($name, $email, $phone, $fbclid, $utm_source, $utm_medium, $utm_campaign)
  {
    $empresaGSheetsURLExec = DB_GSHEETS;


    $data = array("name" => $name, "email" => $email, "phone" => '+55 ' . $phone, "fbclid" => $fbclid, "utm_source" => $utm_source, "utm_medium" => $utm_medium, "utm_campaign" => $utm_campaign);

    // Converter dados para JSON
    $jsonData = json_encode($data);

    // URL do webhook
    $url = $empresaGSheetsURLExec;

    // Iniciar uma sessão cURL
    $ch = curl_init($url);

    // Configurar opções para a requisição cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'Content-Length: ' . strlen($jsonData)
    ]);

    // Executar a requisição
    $response = curl_exec($ch);

    // Fechar a sessão cURL
    curl_close($ch);
  }

  public function pushMautic($name, $email, $phone)
  {
    $empresaMauticURL = DB_MAUTICAPI;
    $mauticAuth = DB_MAUTICAUTH;


    $data = array("firstname" => $name, "email" => $email, "phone" => '+55 ' . $phone, "tags" => "api_lp_v2");

    // Converter dados para JSON
    $jsonData = json_encode($data);

    // URL do webhook
    $url = $empresaMauticURL;

    // Iniciar uma sessão cURL
    $ch = curl_init($url);

    // Configurar opções para a requisição cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'Content-Length: ' . strlen($jsonData),
      "Authorization:  " . $mauticAuth
    ]);

    // Executar a requisição
    $response = curl_exec($ch);

    // Fechar a sessão cURL
    curl_close($ch);
  }
}
