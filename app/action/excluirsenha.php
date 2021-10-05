<?php 

include '../class/conexao.php';
include "../model/Totem.php"; 
include "../controler/cTotem.php";  


$totem = new ControlerTotem();
$senha = $_GET['senha'];
$totem->setTotem($senha);

$totem->excluirSenha();



 ?>

 <script type="text/javascript">
 	
  window.location.replace('../index.php');
   

 </script>