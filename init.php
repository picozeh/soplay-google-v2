<?php

#Timezone
date_default_timezone_set('America/Sao_Paulo');

#exibir erros
error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

#iniciar session
session_start();

header('Content-Type: text/html; charset=utf-8');
header("Expires: on, 01 Jan 1970 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

#Configurações recaptcha
define('CONFIG_RECAPTCHA_SITEKEY','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('CONFIG_RECAPTCHA_SECRETKEY','xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');

include 'classes.php';