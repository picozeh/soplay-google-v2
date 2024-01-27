<?php
// index.php
include './google-auth.php';
include './client/variables.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="facebook-domain-verification" content="ctmqa972qiufxo2mdq8quxbqpq6h4q" />
    <title><?php echo $EmpresaNome; ?></title>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '<?php echo $EmpresaGtmCode ?>');
    </script>
    <!-- End Google Tag Manager -->




    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
    <link rel="stylesheet" href="css/google-api.css">


    <link rel="stylesheet" href="./assets/css/cadastro.css">

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
    <link rel="icon" href="/client/assets/logo/favicon.ico">
    <!-- end favicon -->

</head>



<body style="background-color: white;">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $EmpresaGtmCode ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <section id="section-Main">
        <section class="header-secMain">
            <a href="/index.php">
                <img class="header-logo" src="./client/assets/logo/logo-oficial.png" style="width: <?php echo $logoWidth; ?>">
            </a>



            <div class="buttons">
                <a href="<?php echo $EmpresaUrlAplicacao ?>">
                    <button class="header-btnEntrar" id="login">ENTRAR</button>
                </a>
            </div>
        </section>


        <div class="content">
            <span class="steps">PASSO <strong>2</strong> DE <strong>3</strong></span>
            <h1 class="headerText">TERMINE DE CONFIGURAR SUA CONTA</h1>
            <p class="descriptionText">O <?php echo $EmpresaNome; ?> é personalizado para você. Crie um usuário para assistir em
                qualquer
                dispositivo a qualquer momento.</p>
            <div class="aviso-pequeno">
                <img src="./assets/images/safe-icon.png" />
                <span>Seus dados estão protegidos.</span>
            </div>

            <a type="button" class="login-with-google-btn" style="max-width: 50%;margin:3rem 0;" href="<?php echo $client->createAuthUrl(); ?>">
                Continuar com o Google
            </a>
            <form name="form_cadastro" method="post" id="form-cadastro" action="cadastroServer.php" class="formClass">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" placeholder="Digite seu e-mail aqui" value="" required></input>

                <label for="nome">Nome</label>
                <input id="nome" name="nome" type="text" placeholder="Digite seu nome completo" value="" required></input>

                <label for="cellphone">Telefone</label>
                <input id="cellphone" name="cellphone" type="text" placeholder="DDD 00000-0000" value="" required></input>


                <input type="text" id="utm_source_input" name="utm_source_input" class="hidden-input">
                <input type="text" id="utm_medium_input" name="utm_medium_input" class="hidden-input">
                <input type="text" id="utm_campaign_input" name="utm_campaign_input" class="hidden-input">
                <input type="text" id="fbclid_input" name="fbclid_input" class="hidden-input">





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




                <label for="senha">Senha</label>
                <input id="senha" name="senha" type="password" placeholder="Senha" value="" required></input>


                <label for="rsenha">Confirmar Senha</label>
                <input id="rsenha" name="rsenha" type="password" placeholder="Confirmar senha" value="" required></input>
                <button id="bt-cadastro" class="header-btnEntrar" type="submit">Continuar</button>


            </form>
            <div class="termos-uso"><br>
                <p>Ao clicar em continuar, você concorda<br>com os <a href="termos-servicos.html" id="termos-de-uso">termos de uso e privacidade.</a></p>
            </div>
        </div>

        <section id="ft-secMain">
            <img class="ft-logo" src="./client/assets/logo/logo-oficial.png" style="height: 5rem; border-radius: 5px;">
            <p class="ft-copy subtitulo">
                <?php echo $EmpresaNome; ?> - Todos os direitos reservados 2024<br>
                <!-- <span style="font-size: 13px; color: gray;">CNPJ: 12.320.817/0001-26</span> -->
            </p>
        </section>
    </section>


    <!-- Inserindo scripts do cliente no footer -->
    <?php echo $footerScripts; ?>
    <!-- FIM Inserindo scripts do cliente no footer -->
</body>
<script>
    // Função para obter o valor de um parâmetro da URL
    function getURLParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }



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

    // Obter a data atual
    var currentDate = new Date();

    // Definir a data de expiração em 7 dias
    var expirationDate = new Date(currentDate.getTime() + (7 * 24 * 60 * 60 * 1000));

    // Converter a data de expiração para o formato de cookie
    var expirationDateString = expirationDate.toUTCString();

    // Coletar os valores das UTM da URL
    var fbClidURL = getURLParameter('fbclid');
    var utmSourceURL = getURLParameter('utm_source');
    var utmMediumURL = getURLParameter('utm_medium');
    var utmCampaignURL = getURLParameter('utm_campaign');


    // Verificar se temos novas utms => salvar nos cookies
    if (fbClidURL) {
        // Salvar os valores das UTM nos cookies do navegador com data de expiração de 7 dias
        document.cookie = 'fbclid=' + fbClidURL + ';path=/;expires=' + expirationDateString;
    }

    if (utmSourceURL) {
        // Salvar os valores das UTM nos cookies do navegador com data de expiração de 7 dias
        document.cookie = 'utm_source=' + utmSourceURL + ';path=/;expires=' + expirationDateString;
    }

    if (utmMediumURL) {
        // Salvar os valores das UTM nos cookies do navegador com data de expiração de 7 dias
        document.cookie = 'utm_medium=' + utmMediumURL + ';path=/;expires=' + expirationDateString;
    }

    if (utmCampaignURL) {
        // Salvar os valores das UTM nos cookies do navegador com data de expiração de 7 dias
        document.cookie = 'utm_campaign=' + utmCampaignURL + ';path=/;expires=' + expirationDateString;
    }




    // Obter os valores das UTM dos cookies
    var fbClidCookie = getCookie('fbclid');
    var utmSourceCookie = getCookie('utm_source');
    var utmMediumCookie = getCookie('utm_medium');
    var utmCampaignCookie = getCookie('utm_campaign');


    //Obter os inputs do form
    var fbclid_input = document.getElementById('fbclid_input');
    var utm_source_input = document.getElementById('utm_source_input');
    var utm_medium_input = document.getElementById('utm_medium_input');
    var utm_campaign_input = document.getElementById('utm_campaign_input');



    // Inserir os valores das UTM nos campos de input do formulário
    fbclid_input.value = fbClidCookie;
    utm_source_input.value = utmSourceCookie;
    utm_medium_input.value = utmMediumCookie;
    utm_campaign_input.value = utmCampaignCookie;
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