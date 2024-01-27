<?php
require 'config.php';
if (!isset($_SESSION['login_id'])) {
    header('Location: cadastro.php');
    exit;
}
$id = $_SESSION['login_id'];
$get_user = mysqli_query($db_connection, "SELECT * FROM `users` WHERE `login_id`='$id'");
if (mysqli_num_rows($get_user) > 0) {
    $user = mysqli_fetch_assoc($get_user);
} else {
    header('Location: logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="facebook-domain-verification" content="ctmqa972qiufxo2mdq8quxbqpq6h4q" />
    <title>SóPlay</title>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" />

    <link rel="preload" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" media="print" onload="this.media='all'" />

    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    </noscript>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/mask.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <!-- RECAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js?render=6LewhoYbAAAAAFMqB7f63Sk7nnSNC84hxR29k8vZ&hl=pt-br'></script>


    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./soplay_files/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./soplay_files/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./soplay_files/favicon-16x16.png">
    <link rel="manifest" href="./soplay_files/site.webmanifest">
    <!-- end favicon -->

</head>



<body style="background-color: white;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WB9FHDG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section id="section-Main">
        <section class="header-secMain">
            <a href="/index.html">
                <img class="header-logo" src="./soplay_files/logo.png">
            </a>



            <div class="buttons">
                <a href="https://app.soplay.com.br/user/login">
                    <button class="header-btnEntrar" id="login">ENTRAR</button>
                </a>
            </div>
        </section>


        <div class="content">
            <span class="steps">PASSO <strong>2</strong> DE <strong>3</strong></span>
            <h1 class="headerText">TERMINE DE CONFIGURAR SUA CONTA</h1>
            <p class="descriptionText">O SóPlay é personalizado para você. Crie um usuário para assistir em
                qualquer
                dispositivo a qualquer momento.</p>
            <div class="aviso-pequeno">
                <img src="./assets/images/safe-icon.png" />
                <span>Seus dados estão protegidos.</span>
            </div>



            <form name="form_cadastro" method="post" id="form-cadastro" action="cadastro.php" class="formClass">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="Digite seu e-mail aqui" value="<?php echo $user['email']; ?>" readonly></input>

                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" value="<?php echo $user['name']; ?>" readonly></input>

                <label for="cellphone">Telefone</label>
                <input id="cellphone" name="cellphone" type="text" placeholder="DDD 00000-0000" value="" required></input>


                <input type="text" id="utm_source_input" name="utm_source_input" class="hidden-input">
                <input type="text" id="utm_medium_input" name="utm_medium_input" class="hidden-input">
                <input type="text" id="utm_campaign_input" name="utm_campaign_input" class="hidden-input">



                <a href="logout.php">Logout</a>


                <!---
                <label for="cpf">CPF</label>
                <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" value="" required></input>

                <div class="form-group">
                    <div class="form-column">
                        <label for="cep">CEP (opcional)</label>
                        <input id="cep" name="cep" type="text" placeholder="00000-000" value=""></input>

                    </div>

                    <div class="form-column">
                        <label for="cidade">Cidade*</label>
                        <input id="cidade" name="cidade" type="text" placeholder="São Paulo" value="" required></input>

                    </div>
                    <div class="form-column">
                        <label for="estado-uf">Estado*</label>
                        <input id="estado-uf" name="estado-uf" type="text" placeholder="SP" value="" required></input>

                    </div>

                

                </div>-->



                <button id="bt-cadastro" class="header-btnEntrar" type="submit">Continuar</button>


            </form>
            <div class="termos-uso"><br>
                <p>Ao clicar em continuar, você concorda<br>com os <a href="termos-servicos.html" id="termos-de-uso">termos de uso e privacidade.</a></p>
            </div>
        </div>

        <section id="ft-secMain">
            <img class="ft-logo" src="./soplay_files/logo.png" style="height: 5rem;">
            <p class="ft-copy subtitulo">
                SóPlay - Todos os direitos reservados 2022<br>
                <span style="font-size: 13px; color: gray;">CNPJ: 12.320.817/0001-26</span>
            </p>
        </section>
    </section>

    <!-- Monitoramento do RD Station -->
    <script type="text/javascript" async src="https://d335luupugsy2.cloudfront.net/js/loader-scripts/a3d8b690-cabe-44e2-bf87-a611c0bf1e83-loader.js"></script>
    <!-- Fim Monitoramento RD Station -->

</body>
<script>
    // Função para obter o valor de um cookie
    function getCookie(name) {
        var cookieName = name + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var cookieArray = decodedCookie.split(';');
        for (var i = 0; i < cookieArray.length; i++) {
            var cookie = cookieArray[i].trim();
            if (cookie.indexOf(cookieName) === 0) {
                return cookie.substring(cookieName.length, cookie.length);
            }
        }
        return '';
    }

    // Obter os valores das UTM dos cookies
    var utmSource = getCookie('utm_source');
    var utmMedium = getCookie('utm_medium');
    var utmCampaign = getCookie('utm_campaign');

    // Inserir os valores das UTM nos campos de input do formulário
    document.getElementById('utm_source_input').value = utmSource;
    document.getElementById('utm_medium_input').value = utmMedium;
    document.getElementById('utm_campaign_input').value = utmCampaign;
</script>


<script type="text/javascript">
    const urlParams = new URLSearchParams(window.location.search);
    var msg = urlParams.get('msg');
    if (msg != null) {
        sweetAlert("Ops, erro encontrado!", msg, "error", "button-sweet-error");
    }

    var emailParam = urlParams.get('email');
    if (emailParam != null) {
        $('#email').attr('value', emailParam);
    }

    jQuery(document).ready(function() {
        jQuery("#cellphone").inputmask("(99) 99999-9999", {
            "clearIncomplete": true
        });
        jQuery("#cpf").inputmask("999.999.999-99", {
            "keepStatic": true
        });
        jQuery("#cep").inputmask("99999-999", {
            "keepStatic": true
        });

        jQuery("#form-cadastro").submit(function(event) {
            event.preventDefault();


            if (jQuery("#name").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite seu nome.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#email").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite seu email.", "error", "button-sweet-error");
                return false;
            }
            if (!emailValido(jQuery("#email").val())) {
                sweetAlert("Ops, erro encontrado!", "Digite um email válido.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#cellphone").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite seu telefone celular.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#cpf").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite seu CPF.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#cidade").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite a sua Cidade.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#estado-uf").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite o seu Estado.", "error", "button-sweet-error");
                return false;
            }

            if (jQuery("#senha").val() == "") {
                sweetAlert("Ops, erro encontrado!", "Digite sua senha.", "error", "button-sweet-error");
                return false;
            }
            if (jQuery("#senha").val() != jQuery("#rsenha").val()) {
                sweetAlert("Ops, erro encontrado!", "As senhas não conferem.", "error", "button-sweet-error");
                return false;
            }



            // Enviando dados do cadastro para o DataLayer e acionando o evento de conversão
            var formEmail = document.getElementById('email').value;
            var formName = document.getElementById('nome').value;
            var formPhoneRaw = document.getElementById('cellphone').value;

            // Remover caracteres indesejados: parênteses, espaços e traços
            var numeroLimpo = formPhoneRaw.replace(/[()\s-]/g, "");

            // Adicionar o código do Brasil (55)
            var formPhone = "55" + numeroLimpo;

            dataLayer.push({
                'event': 'form_success',
                userDataParams: {
                    'nome': formName,
                    'telContato': formPhone,
                    'emailContato': formEmail
                }
            });


            jQuery("#bt-cadastro").html('Aguarde...');
            jQuery("#bt-cadastro").attr("disabled", "disabled");
            // jQuery('#form-cadastro').submit();


            grecaptcha.ready(function() {
                grecaptcha.execute('6LewhoYbAAAAAFMqB7f63Sk7nnSNC84hxR29k8vZ', {
                    action: 'cadastro'
                }).then(function(token) {
                    jQuery('#form-cadastro').prepend('<input type="hidden" name="token" value="' + token + '">');
                    jQuery('#form-cadastro').prepend('<input type="hidden" name="action" value="cadastro">');
                    jQuery('#form-cadastro').unbind('submit').submit();
                    jQuery("#bt-cadastro").html('Aguarde...');
                    jQuery("#bt-cadastro").attr("disabled", "disabled");
                });
            });
        });
    });
</script>

<script type="text/javascript" src="js/cep.js"></script>

</html>