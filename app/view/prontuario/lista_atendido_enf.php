<?php 


 include "../../class/conexao.php";
 include "../../model/DocEnf.php";  
 include "../../controler/cDocEnf.php"; 
 

 //$prioridade2=$_GET['prioridade'];


 $lista_atendido_enf = new ControlerDocEnf();
//$cadastrar->retirarSenha($prioridade2);
//$cadastrar->ultimaSenha();
 //echo $prioridade2;

 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title > LISTA DE CLASSIFICADOS DA ENFERMAGEM </title>


	<link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container-fluid" > 
    <div class="row">

<div class="col-lg-12">
  
  <table class="table">
  <thead class="bg-success" style="color:white; font-size:12px;">
    <tr>
      <th class='text-center'>ATENDIMENTO</th>
      <th class='text-center'>NOME</th>
      <th class='text-center'>DATA DE NASCIMENTO</th>
      <th class='text-center' >CLASSIFICACAO</th>
      <th class='text-center' >PROTOCOLO</th>
      <th class='text-center' >USUARIO</th>
      <th class='text-center' >NR CONSELHO</th>
      <th class='text-center' >DT REGISTRO</th>
       <th class='text-center' >EDITAR</th>
        <th class='text-center' >ENVIAR</th>
       <th class='text-center' >EXCLUIR</th>
    </tr>
  </thead>
  <tbody>
  <?php 
         $lista_atendido_enf->listarAtendidoEnf();
   ?>
  </tbody>
</table>

  

</div>

  </div>

	</div>

      
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 <script src="https://kit.fontawesome.com/295172c442.js" crossorigin="anonymous"></script>

 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


 <script type="text/javascript">
   
   $('.fa-volume-up').click(function(e){

   console.log($(this).data('prioridade'));  
   var nr_senha = $(this).data('nrprioridade');
   var prioridade = $(this).data('prioridade');
   var priority = $(this).data('priority');

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title:  "Chamando Senha de Nr:",
  text: priority,
  //icon: 'success',
  showCancelButton: true,
  confirmButtonText: 'SENHA CONFIRMADA',
  cancelButtonText: 'CANCELAR CHAMADO',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    // swalWithBootstrapButtons.fire(
    //   'Deleted!',
    //   'Your file has been deleted.',
    //   'success'
    // )
   $.ajax({ 
             
       type:'post',
       url:'action/chamar_paciente.php',
       data:{
        nr_senha:nr_senha
       }  ,
       success:function(data){
        window.location.replace('index.php?page=prontenf&nr_senha='+nr_senha);
       }


   })


  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
   
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})

});

 </script>
<!--  <script >	

   $(document).ready(function() {

      $('#modalExemplo').modal('show');

   } );

</script> -->

</body>
</html>



 