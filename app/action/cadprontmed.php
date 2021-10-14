<?php 
session_start();
include "../class/conexao.php";
include "../model/DocEnf.php";
include "../controler/cDocEnf.php"; 
include  "../class/Seguranca.php";

$documento=new ControlerDocEnf();
$atd=$_POST['atendimento'];
$condutaP=$_POST['conduta_med'];
$queixaP=$_POST['queixa_med'];
$motivo_altaP=$_POST['motivo_alta'];

$documento->setConduta($condutaP);
$documento->setQueixa($queixaP);
$documento->setMotivoAlta($motivo_altaP);
$documento->setAtendimento($atd);
$documento->cadprontmed();

?>
