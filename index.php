<?php 
header('Content-type: text/html; charset=utf-8');    
setlocale(LC_ALL, NULL); // limpa com defaults do sistema... não precisa.
// ERRADO, força Windows setlocale(LC_ALL, 'Portuguese_Brazil.1252');
setlocale(LC_ALL, 'pt_BR.utf-8'); // acho mais correto.
session_unset(); session_destroy(); 
?>
<!doctype html>
<html lang="pt">
<head>
	<title>SISPEP</title>
	<meta charset="utf-8">
	<link rel="icon" type="image/png" href="../cenma/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
  	<link rel="stylesheet" href="../RH/lib/css/animate.css">
	
	<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h1 class="heading-section">HOSPITAL DE URGÊNCIA</h1>
				</div>
			</div>
			<!-- <div class="row justify-content-center">
				<div class="col-md-12 col-lg-12 mb-5">
					<h1 class="text-danger">ESTAMOS TEMPORARIAMENTE EM MANUTENÇÃO!</h1>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5 mb-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">SISPEP</h3>
						<form action="#" id="form_login" method="POST" class="login-form">
							<div class="form-group">
								<input type="text" name="username" class="form-control rounded-left" autocomplete="off" placeholder="Usuario" >
							</div>
							<div class="form-group d-flex">
								<input type="password" name="senha" class="form-control rounded-left" placeholder="Senha" >
							</div>
							<div class="form-group d-md-flex">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">
									Entrar
								</button>
							</div>
						</form>
					</div>
					
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="help-block text-center" style="color: #000;">
					    <div>
					        <?php 
					        @$auth= $_GET['auth'];
					        if($auth == 'false'){
						        echo '
							        <div class="alert alert-danger">
							            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							            <strong>Opa!</strong> Você não foi autenticado.
							        </div>
						        ';
					        }
					        ?>
					    </div>

					    Entre com seu usuário e senha para acessar a aplicação
				    </div>
				    				</div>
			</div>
		</div>
	</section>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		$("#form_login").submit(function(){
			console.log('click submit');
			$.ajax({
				type: 'POST',
				url: 'app/action/login.php',
				data: $("#form_login").serialize(),
				success: function(data){
					$(".help-block > div").html(data);
				}
			});
			return false;
		});
	</script>
</body>
</html>

