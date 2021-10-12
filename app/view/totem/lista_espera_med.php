<?php 


include "../../class/conexao.php";
include "../../model/DocEnf.php";  
include "../../controler/cDocEnf.php"; 




$listaesperamed = new ControlerDocEnf();

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title > LISTA DE ESPERA PARA ATENDIMENTO MEDICO </title>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
  <script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container-fluid" > 
   <div id='conteudo'>  
    <div class="col-lg-12">
      
      <table class="table">
        <thead class="thead-dark">
          <tr>
             <th class='text-center'>ATENDIMENTO </th>
            <th class='text-center'>PACIENTE </th>
            <th class='text-center'>DATA DE NASCIMENTO</th>
             <th class='text-center' >CLASSIFICACAO</th>
             <th class='text-center' >PROTOCOLO</th>
            <th class='text-center'>CHAMAR</th>
           

           
          </tr>
        </thead>
        <tbody>
          <?php 
          $listaesperamed->listaratdmed();
          ?>
        </tbody>
      </table>

      

    </div>

 </div>

  </div>

  
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
 <script src="https://kit.fontawesome.com/295172c442.js" crossorigin="anonymous"></script>

  <script type="text/javascript">
   
   $('.fa-volume-up').click(function(e){

   
     var atd = $(this).data('atd');
     var paciente = $(this).data('paciente');

     const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

     swalWithBootstrapButtons.fire({
      title:  "CHAMANDO PACIENTE:",
      text: paciente+', ATENDIMENTO Nr:' + atd,
  //icon: 'success',
  showCancelButton: true,
  confirmButtonText: 'CONFIRMAR CHAMADO',
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
     url:'../../view/prontuario/prontuario_medico.php',
     data:{
      atd:atd
    }  ,
    success:function(data){
      $('#conteudo').html(data);
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



