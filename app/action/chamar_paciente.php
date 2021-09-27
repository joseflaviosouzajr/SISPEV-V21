
<?php  
include "../class/conexao.php";
 include "../model/Totem.php";  
 include "../controler/cTotem.php"; 

$totem = new ControlerTotem();

$nr_senha = $_POST['nr_senha'];

$totem->setTotem($nr_senha);

$totem->senhaChamada();















 ?>
