<?php
// index.php
include 'client/variables.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Meta contents -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='cache-control' content='no-cache, no-store, must-revalidate'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <title><?php echo $EmpresaNome; ?></title>
    <!-- Fim Meta contents -->




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

    <!-- Bibliotecas terceiras -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" />
    <link rel="preload" rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" media="print" onload="this.media='all'" />
    <script type="text/javascript" src="./js/sweetalert2.all.min.js"></script>

    <noscript>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap">
    </noscript>
    <!-- Bibliotecas terceiras -->

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- JQuery -->

    <!-- Arquivos locais -->
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="stylesheet" href="./css/sweetalert2.min.css">
    <script type="text/javascript" src="./js/functions.js"></script>

    <!-- favicon -->
    <link rel="icon" href="/client/assets/logo/favicon.ico">
    <!-- end favicon -->

    <?php

    if ($isPlayer == "shaka") {
    ?>
        <!-- Shaka Player compiled library: -->
        <script src="dist/shaka-player.ui.js"></script>
        <link rel="stylesheet" href="dist/controls.css">
        <script defer src="https://www.gstatic.com/cv/js/sender/v1/cast_sender.js"></script>
        <!-- Your application source: -->
        <script src="dist/shaka-app.js"></script>
    <?php
    }


    ?>


</head>


<body cz-shortcut-listen="true">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $EmpresaGtmCode ?>" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <section id="section-Main">
        <section id="top-section">
            <section class="header-secMain">
                <img class="header-logo" src="./client/assets/logo/logo-oficial.png" style="border-radius: 5px; width: <?php echo $logoWidth; ?>">

                <div class="horizontalMenu">

                    <a href="/#filmes">conteúdo</a>

                    <a href="/#faq-Section">perguntas frequentes</a>
                </div>


                <div class="buttons">
                    <a href="./cadastro.php">
                        <button class="header-cadastrar btn-cadastrar" id="cadastrar">QUERO CADASTRAR</button>
                    </a>
                    <a href="<?php echo $EmpresaUrlAplicacao; ?>">
                        <button class="header-btnEntrar" id="login">ENTRAR</button>
                    </a>
                </div>
            </section>

            <div class="flex-row" style="padding: 0 2rem;">
                <section id="streaming-live">

                    <?php if ($isPlayer == "youtube") {
                    ?>
                        <div class="container-live">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Shno8NlzrEk?si=8WZU4xdFjoTI7xvx" title="SOPlay" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        </div>

                    <?php
                    } elseif ($isPlayer == "shaka") {
                    ?>
                        <div data-shaka-player-container data-shaka-player-cast-receiver-id="07AEE832">
                            <video autoplay data-shaka-player id="video" width="100%" height="100%" poster="assets/images/recordnews.jpg"></video>
                        </div>
                    <?php
                    } ?>
                </section>

                <section id="assinar-Section">
                    <h1 class="main-title" style="max-width: 680px;">
                        ASSISTA CANAIS AO VIVO, FILMES, SÉRIES E MUITO MAIS<br>
                        <br>CADASTRE-SE <span style="color: #FEBE29;">GRATUITAMENTE</span>
                    </h1>



                    <form name="form_home" action="./cadastro.php" id="emailForm" method="get" style="margin-bottom: 0!important;">
                        <input type="email" name="email" id="emailIput" placeholder="E-mail" required>
                        <input type="submit" value="CADASTRE-SE" id="buttonTeste" style="cursor: pointer;">
                    </form>

                    <h1 class="main-subTitulo" style="font-size: 3rem; margin-top: 20px; text-align: center;">
                        <span style="background-color: #FEBE29; padding-left: 10px;">CONTEÚDO LEGALIZADO </span>E DE
                        QUALIDADE <br>QUANDO E ONDE QUISER
                    </h1>

                    <p class="assinar-subTitulo" style="margin-bottom: 5rem; margin-top: 1rem; font-size: 1.5rem; ">
                        SEU CADASTRO É IMPORTANTE PARA ENVIARMOS <br>AS NOVIDADES DO <?php echo $EmpresaNome; ?></p>

                    <p class="testeSubtitulo" style="margin-bottom:15px">
                        SAIBA MAIS
                    </p>

                    <a href="/#dispositivos">
                        <img src="./assets/images/downArrow.png" alt="Seta para baixo" style="cursor: pointer;">
                    </a>

                </section>

            </div>

        </section>



        <section id="dispositivos">
            <div>
                <h1 class="main-title" style="max-width: 70rem; padding-top: 5rem;">
                    AÇÃO, DRAMA, COMÉDIA,
                    TERROR, ROMANCE?
                    AQUI TÊM MUITO MAIS!.</h1>
            </div>

            <div class="pinguinsDevices">
                <div class="col4">
                    <a href="./cadastro.php" style="width: 100%;">
                        <img src="./assets/images/Cta_v0.png" alt="Comece Agora" class="ctaPinguins">
                    </a>

                </div>
                <div class="col8">
                    <img src="./assets/images/Dispositivos-BKG.jpg" alt="Acesso em Todos os Dispositivos" class="imgPinguinDevice">
                </div>
                <div class="col12">
                    <img src="../assets/images/Dispositivos.png" alt="Plataformas Compativeis" class="imgPlataformas flex-center">
                </div>
            </div>

            <div class="flex-col-center show-mobile" style="margin-top: 5rem; display: none;">
                <a href="./cadastro.php">
                    <button class="header-cadastrar btn-cadastrar">QUERO CADASTRAR</button>
                </a>

            </div>

        </section>

        <section id="filmes">
            <div>
                <h1 class="main-title" style="max-width: 88rem;">
                    CONTEÚDO ATUALIZADO SEMANALMENTE,
                    RECEBA AS ATUALIZAÇÕES EM SEU E-MAIL!</h1>
            </div>

            <div class="filmesContainerScroll">
                <div class="filmesContainer">
                    <img src="./assets/images/soplay_series_03x1280.jpg" alt="Imagens das Series Disponíveis" class="seriesImg">
                </div>
            </div>

            <div class="flex-col-center">
                <a href="./cadastro.php">
                    <button class="header-cadastrar btn-cadastrar">QUERO CADASTRAR</button>
                </a>

            </div>


        </section>

        <section id="filmesKids">
            <div>
                <h1 class="main-title" style="text-transform: uppercase;">
                    CONTEÚDO INFANTIL <br>PRA DIVERSÃO FICAR COMPLETA</h1>
            </div>

            <img src="./assets/images/KidsSection-opt.jpg" alt="Imagens das Series Infantis" class="seriesKids">

            <div class="flex-col-center">
                <a href="./cadastro.php">
                    <button class="header-cadastrar btn-cadastrar">QUERO CADASTRAR</button>
                </a>

            </div>
        </section>


        <section id="faq-Section">
            <h1 class="main-title">
                PERGUNTAS FREQUENTES</h1>
            <div class="faq-secSelect">
                <div class="faq-selec faqSelectStyles">
                    <p class="faqOpc-title">
                        O que é o <?php echo $EmpresaNome; ?>?
                    </p>
                    <p class="faq-opc">
                        O <?php echo $EmpresaNome; ?> é um aplicativo legalizado de streaming que oferece acesso a filmes, séries,
                        desenhos,
                        shows, documentários e outros conteúdos para assistir quando e quantas vezes quiser. Além disso,
                        também possui canais selecionados de TV online disponíveis 24 horas por dia, sete dias por
                        semana. O <?php echo $EmpresaNome; ?> é constantemente atualizado com novos conteúdos para garantir que você
                        sempre
                        encontre novidades. E o melhor de tudo: é totalmente gratuito!

                    </p>
                </div>
                <div class="faq-selec faqSelectStyles">
                    O <?php echo $EmpresaNome; ?> é mesmo gratuito?
                    <p class="faq-opc">
                        Sim, o <?php echo $EmpresaNome; ?> é gratuito. Ele utiliza o modelo de negócios AVOD, que significa "Advertising
                        Video on Demand" (Vídeo sob Demanda com Anúncios). Isso significa que os usuários têm acesso
                        gratuito ao conteúdo de vídeo, mas são expostos a anúncios durante a reprodução. Quanto maior o
                        número de usuários, mais conteúdo gratuito é disponibilizado. Os canais de TV ao vivo 24h
                        disponíveis estão no modelo FAST CHANNEL que são canais sustentados exclusivamente com
                        publicidade, sem cobrar assinatura ou mensalidade dos usuários.


                    </p>
                </div>
                <div class="faq-selec faqSelectStyles">
                    Onde posso encontrar o <?php echo $EmpresaNome; ?> e quantos acessos tenho ao aplicativo?
                    <p class="faq-opc">
                        Você pode encontrar o <?php echo $EmpresaNome; ?> nas lojas de aplicativos dos dispositivos móveis iOS e Android.
                        Basta buscar pelo nome (<?php echo $EmpresaNome; ?>). No navegador do seu computador, você pode acessar pelo
                        endereço www.soplay.com.br. Nas Smart TVs Android ou Android TV, também é possível utilizar o
                        aplicativo. Nas Smart TVs Samsung e LG, o <?php echo $EmpresaNome; ?> está nas lojas e aplcativos dos modelos
                        fabricados após 2019. Caso sua TV seja mais antiga, utiliza um bom e legalizado Box TV. Na Só
                        Play é possível cadastrar até cinco perfis no <?php echo $EmpresaNome; ?> e usar até três perfis simultaneamente.


                    </p>
                </div>
                <div class="faq-selec faqSelectStyles">
                    Política de Privacidade e Segurança
                    <p class="faq-opc">
                        Valorizamos sua privacidade e segurança. Para garantir sua tranquilidade, publicamos normas que
                        todos os usuários devem seguir, além de estabelecer compromissos para garantir a privacidade dos
                        usuários. Acesse a página com os termos em nosso website.


                    </p>
                </div>
            </div>

            <div class="flex-col-center">
                <p style="font-size: 2.2rem; margin: 2rem;">O que está esperando?<br> CADASTRE-SE AGORA</p>
                <a href="./cadastro.php">
                    <button class="header-cadastrar btn-cadastrar">QUERO CADASTRAR</button>
                </a>
            </div>
        </section>

        <section id="mapa-Section">
            <h3 class="mapa-titulo">Mapa do site</h3>
            <ul class="mapa-ul">

                <li class="mapa-li">
                    <a href="./cadastro.php">Cadastre-se</a>
                </li>
                <li class="mapa-li">
                    <a href="/#dispositivos">Dispositivos</a>
                </li>
                <li class="mapa-li">
                    <a href="/#faq-Section">Duvidas Frequentes</a>
                </li>
                <li class="mapa-li">
                    <a href="/#faq-Section">Quem Somos</a>
                </li>
                <li class="mapa-li">
                    <a href="https://wa.me/+55<?php echo $EmpresaTelefone; ?>?text=Olá,+quero+mais+informações+sobre+a+Atual+Play." target="_blank">Fale
                        Conosco</a>
                </li>
                <li class="mapa-li">
                    <a href="./politica.php">Política de
                        Privacidade</a>
                </li>
                <li class="mapa-li">
                    <a href="./termos-servicos.php">Termos de Uso</a>
                </li>
            </ul>
        </section>


        <section id="ajuda-Section">
            <h3 class="ajuda-titulo">
                Ainda precisa de ajuda?</h3>
            <a href="https://wa.me/+55<?php echo $EmpresaTelefone; ?>?text=Olá,+quero+mais+informações+sobre+a+<?php echo $EmpresaNome; ?>." target="_blank">
                <button class="ajuda-btn">Fale com a gente</button>
            </a>

        </section>

        <section id="ft-secMain">
            <img class="ft-logo" src="./client/assets/logo/logo-oficial.png" style="height: 5rem; border-radius: 5px;">
            <p class="ft-copy subtitulo">
                <?php echo $EmpresaNome; ?> - Todos os direitos reservados 2024<br>
                <!-- <span style="font-size: 13px; color: gray;">Grupo Naxos Telecom | CNPJ: 12.320.817/0001-26</span> -->
            </p>
        </section>
    </section>

    <div class="cookie-notice">
        <p>Este site usa cookies para melhorar sua experiência de navegação. Ao continuar a usar este site, você
            concorda com o uso de cookies. Consulte nossa <a href="./politica.php">política de privacidade</a> para
            obter mais
            informações.</p>
        <button class="accept-btn">Aceitar</button>
    </div>

    <!-- Inserindo scripts do cliente no footer -->
    <?php echo $footerScripts; ?>
    <!-- FIM Inserindo scripts do cliente no footer -->
</body>
<footer>
    <!-- Salvar as utms nos cookies do navegador com expiração de 7 dias -->
    <script>
        // Função para obter o valor de um parâmetro da URL
        function getURLParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Coletar os valores das UTM da URL
        // var utmSource = getURLParameter('utm_source');
        var fbClid = getURLParameter('fbclid');
        var utmSource = getURLParameter('utm_source');
        var utmMedium = getURLParameter('utm_medium');
        var utmCampaign = getURLParameter('utm_campaign');

        // Obter a data atual
        var currentDate = new Date();

        // Definir a data de expiração em 7 dias
        var expirationDate = new Date(currentDate.getTime() + (7 * 24 * 60 * 60 * 1000));

        // Converter a data de expiração para o formato de cookie
        var expirationDateString = expirationDate.toUTCString();

        // Salvar os valores das UTM nos cookies do navegador com data de expiração de 7 dias
        document.cookie = 'fbclid=' + fbClid + ';path=/;expires=' + expirationDateString;
        document.cookie = 'utm_source=' + utmSource + ';path=/;expires=' + expirationDateString;
        document.cookie = 'utm_medium=' + utmMedium + ';path=/;expires=' + expirationDateString;
        document.cookie = 'utm_campaign=' + utmCampaign + ';path=/;expires=' + expirationDateString;
    </script>
    <script>
        var $root = $('html, body');

        $('a[href^="#"]').click(function() {
            $root.animate({
                scrollTop: $($.attr(this, 'href')).offset().top
            }, 500);

            return false;
        });
    </script>
    <script>
        $('.faq-selec').click(function() {
            $(this).toggleClass('faqClicked')
        });

        $('.accept-btn').click(function() {
            $('.cookie-notice').toggleClass('clicked')
        });


        $("#emailForm").submit(function(event) {
            if (!emailValido($("#emailIput").val())) {
                sweetAlert("Ops, erro encontrado!", "Digite um email válido.", "error", "button-sweet-error");
                return false;
            }


            $('#emailForm').unbind('submit').submit();



        });
    </script>
</footer>

</html>