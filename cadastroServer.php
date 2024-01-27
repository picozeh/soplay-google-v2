<?php 
include 'init.php';
$usuario = new usuario();
$msg = $usuario->cadastrar();
//Header("Location: confirmacao.html");