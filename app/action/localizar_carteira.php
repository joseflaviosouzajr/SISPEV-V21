<?php 

 
include "../class/conexao.php";
include "../model/DocEnf.php"; 
include "../controler/cDocEnf.php"; 


$doc=new ControlerDocEnf();

$doc->setId_carteira('54321');
 
$doc->localizarCarteira();


 ?>