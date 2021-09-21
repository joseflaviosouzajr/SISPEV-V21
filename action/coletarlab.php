<?php 
include "../class/conexao.php";
include "../model/Lab.php";
 include "../controler/cLab.php";

$coletarpedido  = new ControlerLab();

$atd=$_GET['cdAtendimento'];

$coletarpedido->setAtdPedidoLab($atd);

$coletarpedido->setColetadoPedidoLab('S');

$coletarpedido->inserirPedidoLab();
//$ttt=$coletarpedido->getAtdPedidoLab();



//var_dump($ttt);



 ?>