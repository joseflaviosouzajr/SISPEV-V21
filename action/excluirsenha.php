<?php 

include '../class/conexao.php';
include '../class/Totem.php';


$totem = new Totem();
$senha = $_GET['senha'];
$totem->setTotem($senha);

$totem->excluirSenha();



 ?>

 <script type="text/javascript">
 	
  window.location.replace('../pages/totem/lista_espera_enf.php');
   

 </script>