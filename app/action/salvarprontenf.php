<?php 

include '../class/conexao.php';
include "../model/DocEnf.php"; 
include "../controler/cDocEnf.php";  


$salvardocenf = new ControlerDocEnf();
$atd= $_GET['atd'];
$salvardocenf->setAtendimento($atd);

$salvardocenf->salvardocenf();



 ?>

 <script type="text/javascript">
 	
  window.location.replace('../index.php?page=lista_atendido_enf');
   

 </script>