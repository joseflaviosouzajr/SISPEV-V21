<?php
/**
* Seguranca
*/
class seguranca
{

	function autenticaLogin($username, $senha){
		//var_dump($username);

		if (empty($username) || empty($senha)) {
			echo '
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><i class="fa fa-ban"></i>&nbsp; Acesso negado!</strong> Usu&aacute;rio e/ou senha inv&aacute;lidos
			</div>
			';
		} else {
			$mysql = Conexao::getInstance();

			$sql = "SELECT * FROM usuario WHERE login = :username AND senha = :senha";
			$stmt = $mysql->prepare($sql);
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":senha", $senha);
			$result = $stmt->execute();
			if($result){
				$num = $stmt->rowCount();
				if($num > 0){
					$reg = $stmt->fetch(PDO::FETCH_OBJ);

					
						session_cache_limiter('private');
						session_cache_expire(120);
						// ini_set('session.gc_maxlifetime', 10800);

						@session_start();

						$_SESSION['cd_usuario'] 		= $reg->cd_usuario;
						$_SESSION['login'] 		= $reg->login;
						$_SESSION['senha'] 			= $reg->senha;
						$_SESSION['nome'] 	= $reg->nome;
						$_SESSION['conselho'] 		= $reg->conselho;
						$_SESSION['nr_conselho'] 			= $reg->nr_conselho;

						

						echo '<script>$(".container").addClass("animated bounceOutUp"); setTimeout(function(){$(".container").html(\'<div class="text-center"><i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div>\');},1000); setTimeout(function(){window.location.href = "app/";},500);</script>';
					
				}else{
					echo '
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong><i class="fa fa-ban"></i>&nbsp; Acesso negado!</strong> Usuário e/ou senha inválidos
					</div>
					<script>$(".login-wrap").addClass("animated shake"); setTimeout(function(){$(".login-wrap").removeClass("animated shake");},1000);</script>
					';
				}
			}else{
				echo '
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong><i class="fa fa-remove"></i>&nbsp; Problema ao efetuar login</strong>
				</div>
				';
			}

		}

	}

	function validaSessao(){
		// echo session_cache_expire();
		@session_start();

		if(isset($_SESSION['login'])){

		}else{
			session_unset();
			echo '<script>window.location.href="../?auth=false";</script>';
			exit();
		}
	}

	function destroiSessao(){
		@session_start();
		@session_unset();
		@session_destroy();

		echo '<script>window.location.href="../../";</script>';
	}
}
?>