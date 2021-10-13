<?php 
include "../../class/conexao.php";
include "../../model/DocEnf.php";
include "../../controler/cDocEnf.php";  

$documento=new ControlerDocEnf();

$atd= (isset($_POST['atd']))?$_POST['atd']:null ;

 if($atd){
  $dadoatd = $documento->dadoatdmed($atd);
}

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>



	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>



</head>
<body>



	<div  class= "container align-self-center"  style="margin-top: 40px" >
           <div>
           <?php 
           if($atd){

             echo "<h6>Nome: ".$dadoatd->nome."</h6> ";
             echo "<h6>Atendimento: ".$dadoatd->atendimento."</h6> ";
             echo "<h6>Data de Nascimento: ".$dadoatd->dt_nascimento."</h6> ";

           }
         
		 ?>
</div>
         
		<h4>FICHA DE EVOLUCAO MEDICA DA URGENCIA </h4>








		<form id="prontmed" method="post" style="margin-top: 20px;"> 
         <input type="hidden" name="atendimento" <?php echo "value='".$atd."' "; ?> >
			<div class="form-group">
				<label >QUEIXA PRINCIPAL</label>
				<textarea  class="form-control"  name="QP_MED" placeholder="Digite a Historia Clinica do paciente"  autocomplete="off"  required="">
					
				</textarea>  
			</div>

			<div class="form-group">
				<label >CONDUTA</label>
				<textarea  class="form-control"  name="CONDUTA" placeholder="Digite a Historia Clinica do paciente"  autocomplete="off"  required="">
					
				</textarea>  
			</div>






			<div class="form-group">

				<label >MOTIVO DA ALTA</label>
				<select class="form-control"  required=""   name="CLARISCO"  placeholder="Escolha a Calssificacao do paciente"  >
					<option value=''>Selecione  o Motivo da Alta</option>
					<option   value="1">Melhorada</option>
					<option value="2">Internacao Hospitalar</option>
					<option value="3">Obito</option>
					<option value="4">Evasao</option>
				</select>
            
			</div>

   


	


			<div style="text-align: right;">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		


		</form>
		

	</div>



	

	<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script type="text/javascript">

  $('#prontmed').submit(function(e){
  $.ajax({
  	type:'POST',
  	url:'action/cadprontmed.php',
  	data:$(this).serialize(),
  	success:function(data){
  		console.log(data);
  	}
  })

  })

	</script>

</body>
</html>