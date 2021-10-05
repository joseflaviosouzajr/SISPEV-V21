<?php 


include "../../class/conexao.php";
include "../../model/DocEnf.php";  
include "../../controler/cDocEnf.php"; 


 //$prioridade2=$_GET['prioridade'];


$atdlistalab = new  ControlerDocEnf();
//$cadastrar->retirarSenha($prioridade2);
//$cadastrar->ultimaSenha();
 //echo $prioridade2;

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title > LISTA DE COLETA  E LAUDOS LABORATORIO </title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
  <script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container" > 

    <div class="col-lg-12">

      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th class='text-center'>ATENDIMENTO</th>
            <th class='text-center'>NOME</th>
            <th class='text-center'>DATA NASCIMENTO</th>
            <!--  <th class='text-center'>DATA</th> -->
            <th class='text-center' >COLETAR</th>
            <th class='text-center' >LAUDAR</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $atdlistalab->listarAtdColeta();
          ?>
        </tbody>
      </table>



    </div>



  </div>




  <!-- Modal -->
  <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Título do modal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-primary">Salvar mudanças</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script type="text/javascript">

   $('.fa-microscope').click(function(e){
         
          $('#modalExemplo').modal('show');
         
    

    }   );

</script>
</body>
</html>



