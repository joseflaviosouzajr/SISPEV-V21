<?php 
include "../class/conexao.php";
include "../model/Lab.php";
 include "../controler/cLab.php";

$coletarpedido  = new ControlerLab();

$atd=$_GET['cdAtendimento'];

$coletarpedido->setAtdPedidoLab($atd);
 //$coletarpedido->getAtdPedidoLab();
 $coletarpedido->setColetadoPedidoLab('S');

 $coletarpedido->updateResPedidoLab();




 ?>
 
 <script type="text/javascript">
     
  window.location.replace('../view/lab/lista_coleta_lab.php');


 </script>