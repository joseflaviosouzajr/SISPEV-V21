<?php 

session_start();
include 'class/Seguranca.php';
$seguranca= new Seguranca();
$seguranca->validaSessao();
$conselho=$_SESSION['conselho'];
$pagina=(isset($_GET['page']))?$_GET['page']:null;
$prioridade=(isset($_GET['nr_senha']))?$_GET['nr_senha']:null;


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 <div class="container-fluid"> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Alterna navegação">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Lista Para Classificacao<span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a id='prontuario-enf' class="nav-link" href="#">Prontuario Enf</a>
      </li>
          <li class="nav-item">
        <a id='pacientes-classificados' class="nav-link" href="#">Pacientes Classificados</a>
      </li>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user" ></i>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="action/logout.php">sair</a>
         </div>
      </li>
    </ul>
  </div>
</nav>

  <div id="conteudo"> </div>
 
 </div>
 
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function(){
	$.ajax({
		type:'GET',
    <?php if($pagina=='prontenf'){  ?>
		 url:'view/prontuario/prontuario.php',
  <?php  } else {?>   
    url:'view/totem/lista_espera_enf.php',
  <?php } ?>
		success:function(data){
			$('#conteudo').html(data);
		}
	});
});

$('#prontuario-enf').click(function(){
  $.ajax({
    type:'GET',
    url:'view/prontuario/prontuario.php',
    success:function(data){
      $('#conteudo').html(data);
    }
  });
});
 
$('#pacientes-classificados').click(function(){
  $.ajax({
    type:'GET',
    url:'view/prontuario/lista_atendido_enf.php',
    success:function(data){
      $('#conteudo').html(data);
    }
  });
});
 


 </script>
 </body>
 </html>