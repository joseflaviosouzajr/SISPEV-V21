<?php 

include '../class/conexao.php';
include "../model/DocEnf.php"; 
include "../controler/cDocEnf.php";  
include "../model/Lab.php"; 
include "../controler/cLab.php";  

$lab=new ControlerLab();

$salvardocenf = new ControlerDocEnf();
$atd= $_GET['atd'];
$salvardocenf->setAtendimento($atd);

$salvardocenf->salvardocenf();


$lab->setAtdPedidoLab($atd);

$lab->setColetadoPedidoLab('N');

$lab->inserirPedidoLab();


 ?>

 <script type="text/javascript">
 	
  window.location.replace('../index.php?page=lista_atendido_enf');
   

 </script>