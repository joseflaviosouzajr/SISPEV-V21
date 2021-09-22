<?php 


include '../class/Seguranca.php';

$username 	= strtoupper($_POST['username']);
$senha 		= base64_encode($_POST['senha']);

$seguranca = new seguranca;

$seguranca->destroiSessao();
?>




