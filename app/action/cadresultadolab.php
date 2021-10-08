<?php 
include "../class/conexao.php";
include "../model/Lab.php";
include "../controler/cLab.php"; 
include  "../class/Seguranca.php";

$lab=new ControlerLab();

$resultadolab= $_POST['resultado'];
$atd=$_POST['atd'];

$lab->setResulatdoPedidoLab($resultadolab);

$lab->setAtdPedidoLab($atd);

$lab->resultadoPedidoLab();
?>

 <script type="text/javascript">
     
  window.location.replace('../view/lab/lista_coleta_lab.php');


 </script>