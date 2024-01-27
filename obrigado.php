<?php
// index.php
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



    <section id="section-Main" style="min-height: 100vh;">
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
            <h1 class="headerText">CONFIRME SEU CADASTRO</h1>

            <img src="./assets/images/thanks.png" alt="Obrigado" style="width: 100%;">

            <p class="descriptionText">
                Dentro de instantes você receberá um e-mail para <strong>confirmar seu cadastro</strong> e garantir seu acesso vitalício ao SÓ PLAY.</p>

            <p class="descriptionText" style="margin-top:3rem;">Enquanto isso você já pode utilizar nossa Plataforma em qualquer dispositivo
                utilizando seu <strong>e-mail</strong> e <strong>senha</strong> cadastrados clicando no botão abaixo.</p>


            <a href="<?php echo $EmpresaUrlAplicacao; ?>">
                <button id="bt-cadastro" class="header-btnEntrar">Acessar <?php echo $EmpresaNome ?></button>
            </a>


            <div class="aviso-pequeno">
                <img src="./assets/images/safe-icon.png" />
                <span>Seus dados estão protegidos.</span>
            </div>
        </div>

        <section id="ft-secMain" style="margin-top: auto">
            <img class="ft-logo" src="./client/assets/logo/logo-oficial.png" style="height: 5rem; border-radius: 5px;">
            <p class="ft-copy subtitulo">
                <?php echo $EmpresaNome ?> - Todos os direitos reservados 2024<br>
                <!-- <span style="font-size: 13px; color: gray;">CNPJ: 12.320.817/0001-26</span> -->
            </p>
        </section>
    </section>
    <!-- Inserindo scripts do cliente no footer -->
    <?php echo $footerScripts; ?>
    <!-- FIM Inserindo scripts do cliente no footer -->
</body>

</html>