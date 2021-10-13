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

	<div  class="container-fluid" > 

    <div class="col-lg-12">

      <table class="table">
          <thead class="bg-success" style="color:white; font-size:12px;">
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
          <h5 class="modal-title" id="exampleModalLabel">RESULTADO LABORATORIAL - SISPEP</h5>
        </div>
        <div class="modal-body">
          <form id='formResultado'>

            <div class="input-group mb-3">
              <input type="hidden" name="atd" id='atd'>
              <label class="input-group" for="inputGroupSelect01">RESULTADO:</label>
              <select required class="form-select" name='resultado' id="inputGroupSelect01">
                <option selected>SELECIONE O RESULTADO</option>
                <option value="1">Positivo</option>
                <option value="2">Negativo</option>

              </select>
            </div>

            <div>    
              <button type="submit" class="btn btn-success">Salvar Resultado</button> 
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <script type="text/javascript">

   $('.modal-resultado').click(function(e){

    $('#modalExemplo').modal('show');
    $('#atd').val($(this).data('atendimento'));
    

  }   );

   $('#formResultado').submit(function(e){

    console.log('aqui');

    $.ajax({
      type:'POST',
      url:'../../action/cadresultadolab.php',
      data:$(this).serialize(),
      success:function(data){
        window.location.href='lista_coleta_lab.php';
      }
    });

    return false;

  });

</script>
</body>
</html>



