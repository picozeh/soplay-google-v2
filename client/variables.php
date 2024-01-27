<?php
$EmpresaNome = "SÓ PLAY";
$EmpresaTelefone = "1151988220";
$EmpresaCnpj = "12.320.817/0001-26";
$EmpresaRazaoSocial = "Naxos Telecom Comercio e Servicos EIRELI";
$EmpresaDominioPrincipal = "https://soplay.com.br/";
$EmpresaContatoWhatsApp = "1151988220";
$EmpresaEmailAtendimento = "mkt@soplay.com.br";
$EmpresaEnderecoMatriz = "R. Ademar de Barros, 345, Loja 36 - Pôrto Feliz / SP";
$EmpresaUrlAplicacao = "https://app.soplay.com.br/";
$EmpresaCidade = "Pôrto Feliz";
$EmpresaGtmCode = "GTM-WB9FHDG";

//Identidade
$logoWidth = "10rem";

//Configuração do Player
$isPlayer = "shaka";
$youtubeURL = "";

//Scripts no Footer
$footerScripts = "<script>
(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
    w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
    m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://m.mktsoplay.com.br/mtc.js','mt');

mt('send', 'pageview');
</script>";

define('DB_PLAN', '2');
define('DB_APP', '1');
define('DB_URLAPI', 'https://api.soplay.com.br/api/v1/auth/create/');
define('DB_BEARER', 'c1d6fc79472ee6dc8a236a37d0f18fc0');
define('DB_MAUTICAPI', 'https://m.mktsoplay.com.br/api/contacts/new');
define('DB_MAUTICAUTH', 'Basic bWF1dGljYXBpOk1hdXRpY0AxOTU=');
define('DB_GSHEETS', 'https://script.google.com/macros/s/AKfycbzbKmCT_ns72qAgSWn0fTNudQgqLEOQpVzReWsszzuJWL9vNminVJt1ZYfYK_WkjNG5fA/exec');
