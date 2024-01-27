<?php
// index.php
include './client/variables.php';

?>

<!DOCTYPE html>
<html lang="en">

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


  <link rel="stylesheet" href="./assets/css/politica.css" />
</head>

<body style="flex-direction: column;">



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
    <section class="container">
      <h1>Política de Privacidade</h1>


      <h3>SEÇÃO 1 - O QUE FAZEMOS COM AS SUAS INFORMAÇÕES?</h3>
      <p>A marca <?php echo $EmpresaNome; ?> pertence ao grupo <?php echo $EmpresaRazaoSocial; ?>.</p>
      <p>Quando você se cadastra em nosso site para publicar algum comentário, se cadastrar em nossa newsletter ou
        baixar
        arquivos, coletamos as informações pessoais que você nos fornece, tais como seu nome, endereço e e-mail.</p>
      <p>Quando você navega pela nossa plataforma, recebemos também automaticamente o protocolo de internet do seu
        computador (endereço de IP) a fim de obter informações que nos ajudam a saber mais sobre seu navegador e sistema
        operacional.</p>
      <p>Marketing por e-mail (quando aplicável): Com sua permissão, podemos lhe enviar e-mails sobre nossa marca, novos
        produtos e outras atualizações.</p>
      <p>&nbsp;</p>
      <h3>SEÇÃO 2 - CONSENTIMENTO</h3>
      <p><strong>Como vocês obtêm meu consentimento?</strong></p>
      <p>Quando você nos fornece as suas informações pessoais para publicar um comentário em nosso blog, se cadastrar em
        nossa newsletter, baixar arquivos, completar uma transação, verificar seu cartão de crédito ou fazer um pedido,
        você está concordando com a nossa coleta e uso de informações pessoais apenas para esses fins específicos.</p>
      <p>Se pedirmos suas informações pessoais por uma razão secundária, vamos pedir seu consentimento, ou te dar a
        oportunidade de dizer não.</p>
      <p><strong>Como posso retirar o meu consentimento?</strong></p>
      <p>Caso depois de fornecer seus dados você mude de ideia, você pode retirar o seu consentimento quando quiser e
        assim evitar que entremos em contato para obter ou divulgar informações. Entre em contato conosco através do <a href="mailto:<?php echo $EmpresaEmailAtendimento; ?>" target="_blank" rel="noopener"><?php echo $EmpresaEmailAtendimento; ?></a> ou por
        correio: <?php echo $EmpresaEnderecoMatriz; ?></p>
      <h3>SEÇÃO 3 - DIVULGAÇÃO</h3>
      <p>Podemos divulgar suas informações pessoais se formos obrigados por lei a fazê-lo ou se você violar nossos
        Termos
        de serviço.</p>
      <p>&nbsp;</p>
      <h3>SEÇÃO 4 - SERVIÇOS DE TERCEIROS</h3>
      <p><strong>Links</strong></p>
      <p>Quando você clicar em links específicos em nossa plataforma, eles podem lhe direcionar para fora do nosso site.
        Não somos responsáveis pelas práticas de privacidade de outros sites e lhe incentivamos a ler as políticas de
        privacidade deles.</p>
      <p>&nbsp;</p>
      <h3>SEÇÃO 5 - SEGURANÇA</h3>
      <p>Para proteger suas informações pessoais, tomamos precauções e seguimos as melhores práticas da indústria para
        nos
        certificar que elas não sejam perdidas, usurpadas, acessadas, divulgadas, alteradas ou destruídas.</p>
      <p>&nbsp;</p>
      <h3>SEÇÃO 6 - IDADE DE CONSENTIMENTO</h3>
      <p>Ao usar esse site, você confirma que você é maior de idade em seu estado ou província de residência e que você
        nos deu seu consentimento para permitir que qualquer um dos seus dependentes menores de idade usem esse site.
      </p>
      <p>&nbsp;</p>
      <h3>SEÇÃO 7 - ALTERAÇÕES NA POLÍTICA DE PRIVACIDADE</h3>
      <p>Reservamos o direito de modificar essa política de privacidade a qualquer momento. Portanto, por favor, leia-a
        com frequência. As alterações e esclarecimentos surtem efeito imediatamente após serem publicadas no site. Caso
        façamos alterações na política de privacidade, iremos notificá-lo sobre a atualização. Assim, você saberá quais
        informações coletamos, como as usamos, e sob que circunstâncias, caso aplicável, as utilizaremos e/ou
        divulgaremos.</p>
      <p>Caso ocorra a fusão da nossa loja com outra empresa, suas informações podem ser transferidas para os novos
        proprietários para que possamos continuar vendendo produtos para você.</p>
      <p>&nbsp;</p>
      <h3>PERGUNTAS E INFORMAÇÕES DE CONTATO</h3>
      <p>Se você gostaria de acessar, corrigir, alterar ou excluir quaisquer informações pessoais que temos sobre você,
        registre uma queixa, ou simplesmente peça mais informações de contato a(o) nosso(a) Diretor(a) de privacidade
        através do <a href="mailto:<?php echo $EmpresaEmailAtendimento; ?>" target="_blank" rel="noopener"><?php echo $EmpresaEmailAtendimento; ?></a>
        ou pelo correio:
        <?php echo $EmpresaEnderecoMatriz; ?></p>
    </section>

    <section id="ft-secMain">
      <img class="ft-logo" src="./client/assets/logo/logo-oficial.png" style="height: 5rem; border-radius: 5px;">
      <p class="ft-copy subtitulo">
        <?php echo $EmpresaNome; ?> - Todos os direitos reservados 2024<br>
        <!-- <span style="font-size: 13px; color: gray;">Grupo Naxos Telecom - CNPJ: 12.320.817/0001-26</span> -->
      </p>
    </section>

  </section>

  <!-- Inserindo scripts do cliente no footer -->
  <?php echo $footerScripts; ?>
  <!-- FIM Inserindo scripts do cliente no footer -->
</body>

</html>