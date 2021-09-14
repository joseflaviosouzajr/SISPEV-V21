<?php 

 
include "../class/conexao.php";
 include "../class/DocumentoClassificacaoEnf.php";  


$doc=new DocumentoClassificacaoEnf();

$doc->setId_carteira('54321');
 
$doc->localizarCarteira();


 ?>