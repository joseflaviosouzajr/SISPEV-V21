<?php 


include "../class/conexao.php";
include "../model/Totem.php"; 
include "../controler/cTotem.php";  
 

 $prioridade2=$_GET['prioridade'];


$cadastrar = new ControlerTotem();
$cadastrar->retirarSenha($prioridade2);
//$cadastrar->ultimaSenha();
 //echo $prioridade2;

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title >  Totem	</title>

	<link rel="stylesheet"  href="../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container" > 

	<!-- Botão para acionar modal -->


<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center ">
        <h5 class="modal-title" id="exampleModalLabel">HOSPITAL JF LTDA</h5>
       <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span> 
        </button> -->
      </div>
      <div class="modal-body text-center">
       <?php 

           $cadastrar->ultimaSenha();
           
          
        ?>
      </div>
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar mudanças</button>
      </div> -->
    </div>
  </div>
</div>

	</div>

     
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


 <script >	

   $(document).ready(function() {

      $('#modalExemplo').modal('show');

   } );

</script>

</body>
</html>



 