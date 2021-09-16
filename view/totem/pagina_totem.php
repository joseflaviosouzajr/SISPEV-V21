



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title >  Totem	</title>

	<link rel="stylesheet"  href="../../assets/css/bootstrap.css">    
	<script type="text/javascript"  src="../../assets/js/bootstrap.js"></script>

</head>
<body>

	<div  class="container" > 

		<div class="col-lg-5" style = "margin-top: 20px;">

			
			<a  href='../../action/retirarsenha.php?prioridade=N'  class="btn btn-primary btn-lg botaoTotem">Senha Normal</a>

		</div>  
		<div class="col-lg-5" style = "margin-top: 20px;"> 

			<a  href='../../action/retirarsenha.php?prioridade=P'  class="btn btn-secondary btn-lg botaoTotem">Senha Prioridade</a>
		</div> 

	</div>

     


<!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script type="text/javascript">
	
     $('.botaoTotem').click(function(e) { 

     	console.log(e.data('prioridade'));

             // $.ajax(

             //       url:'action/retirarsenha.php',

             //       method: 'post',

             //       data:  { 
                     
             //         prioridade:e.attr('data-prioridade')
                    
             //       }
             // 	) 

     }

     )


</script> -->
</body>
</html>