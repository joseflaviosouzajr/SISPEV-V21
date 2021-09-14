<?php 
 include "../../class/conexao.php";
 include "../../class/DocumentoClassificacaoEnf.php";  
 $documento=new DocumentoClassificacaoEnf();
 $carteira=$_GET['nr_carteira'];
 $dadospaciente=null;
 if (isset($carteira)) {

 	$documento->setId_carteira($carteira);
 
    $dadospaciente = $documento->localizarCarteira();
    var_dump($dadospaciente);

 } else {
 	var_dump('sem carteira');
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

              <h4>FICHA DE CLASSIFICACAO DA ENFERMAGEM </h4>
  


				
				 
				<form action="_inserirproduto.php" method="post" style="margin-top: 20px;"> 

              <div class="form-group">
				     <label > DADOS DO PACIENTE  </label> 
				     	 </div>

			<div class="form-group">
				<label >CARTEIRA</label>
				<input <?php if($dadospaciente){?> value= "TESTE" <?php } ?> type="text" class="form-control"  name="nr_carteira" id="nr_carteira" placeholder="insira o numeror da carteira"> 
                <span class="input-group-text" id="pesquisar"> <i class="fas fa-search"></i> </span>

		   </div>

		   	<div class="form-group">
				<label >NOME</label>
				<input type="number" class="form-control"  name="nrproduto" placeholder="insira o numeror do produto">
		  </div>

			    <div class="form-group">
				<label >ATENDIMENTO</label>
				<input type="text" class="form-control"  name="nmproduto" placeholder="insira o nome do produto"  autocomplete="off"  required="">
				 </div>

                  	<div class="form-group">
				     <label > DADOS CLINICOS  </label> </label></label>
				     	 </div>

			   <div class="form-group">
				<label >TEMPERATURA</label>
				<input type="number" class="form-control" name="qtdproduto"  placeholder="Quantidade do produto">
		</div>

			      <div class="form-group">		         	
               <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">  PAS</label>
                 </div>

		             <div class="form-group">		         	
               <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">PAD</label>
                 </div>

		         <div class="form-group">		         	
               <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">  SAT</label>
                 </div>

                     <div class="form-group">		         	
               <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">HAS</label>
                 </div>
                     <div class="form-group">		         	
               <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">DIABETES</label>
                 </div>

		         <div class="form-group">
				<label >HISTORIA CLINICA</label>
				<textarea  class="form-control"  name="nmproduto" placeholder="insira o nome do produto"  autocomplete="off"  required="">     </textarea>  
				 </div>

		      

		    <div class="form-group">

			<label >CLASSIFICACAO</label>
			<select class="form-control"  name="catproduto"  placeholder="Categoria do produto"  >
				<option selected>Categoria</option>
				<option value="1">VERMELHO</option>
				<option value="2">VERDE</option>
				<option value="3">AMARELO</option>
				<option value="4">AZUL</option>
				</select>

		</div>



        <div style="text-align: right;">
		<button type="submit" id="tbuton" class="btn btn-success">Cadastrar</button>
		</div>
          <a  href="index.php">  <button type="button" class="btn btn-primary">voltar</button>    </a>

       
		</form>
		
		 
		</div>

        
			
	

 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script type="text/javascript">
 	
 	$('#pesquisar').click(function(e)
 	{
           var nr_carteira = $('#nr_carteira').val();
                      
              window.location.replace('../../pages/prontuario/prontuario.php?nr_carteira='+nr_carteira) ;   
                 
           	 
         
  }  );
 	


 </script>

</body>
</html>