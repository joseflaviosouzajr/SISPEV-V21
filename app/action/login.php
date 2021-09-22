<?php 
include "../class/conexao.php";
include "../class/Seguranca.php";

$username 	= strtoupper($_POST['username']);
$senha 		= base64_encode($_POST['senha']);
//$pagina 	= isset($_GET['p']) ? $_GET['p'] : null;

$seguranca = new Seguranca;

$seguranca->autenticaLogin($username, $senha);



 ?>