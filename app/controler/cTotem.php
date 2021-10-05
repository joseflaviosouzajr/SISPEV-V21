<?php 

/**
 * 
 */
class ControlerTotem extends Totem{


public function retirarSenha($prioridade)

	{
       $con = Conexao::getInstance();
       $inserir = "insert into totem (prioridade, data ) values (:prioridade , Now())";
       $stmt=$con->prepare($inserir);
       $stmt->bindParam(':prioridade',$prioridade);
       $result=$stmt->execute();

       if ($result) {
       	echo "suscesso";
       } else {
       	echo "erro";
       }
       


      
	}


public function ultimaSenha(){


          $con = Conexao::getInstance();
       $listarultimo = "select * from totem where totem in ( select max(totem) from totem )";
       $stmt=$con->prepare($listarultimo);
             $result=$stmt->execute();

           if ($result) {
       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       echo '<h1>Senha: </h1><h2>'.$reg->totem.'</h2>';
       if ($reg->prioridade == 'P') {
       	echo '<h4> PRIORIDADE </h4>';
       } else {
       	echo '<h4> NORMAL </h4>';
       }
        echo '<h1>data/hora: </h1><h2>'.$reg->data.'</h2>';
       
       } else {
       	echo "erro";
       }


                }

    public function listarSenhasEnf(){
     

       $con = Conexao::getInstance();
       $listarsenhas = "select totem , case when prioridade = 'P' then 'PRIORIDADE' ELSE 'NORMAL'  end prioridade  ,   

       case when prioridade = 'P' then '1' ELSE '2'  end prioridadelista  ,
        data 
       from totem ,   where chamado = 'N'  and ativo = 'S' 

       and totem not in (select distinct totem from prontuario)
       order by prioridadelista  ";
       $stmt=$con->prepare($listarsenhas);
             $result=$stmt->execute();

           if ($result) {
                     
           while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {
           
           
           echo "<tr>"; 
           echo "<td class='text-center'> Nr: ".$reg->totem." - ".$reg->prioridade."</td>";
           echo "<td class='text-center'> ".$reg->data."</td>";
           echo "<td class='text-center'><i data-nrprioridade='".$reg->totem."' data-priority='".$reg->totem." - ".$reg->prioridade."' data-prioridade='".$reg->prioridade."' class='fas fa-volume-up'></i></td>";
           echo "<td class='text-center' > <a href='action/excluirsenha.php?senha=".$reg->totem."'> <i class='fas fa-trash'></i> </a> </td>";
            echo "</tr>";




           }

       } else {
       	echo "erro";
       }


    }

 public function excluirSenha(){

       $con = Conexao::getInstance();
       $deletar = "delete from totem where totem  = :totem";
       $stmt=$con->prepare( $deletar);
       $stmt->bindParam(':totem',$this->totem);
       $result=$stmt->execute();

       if ($result) {
        echo "suscesso";
       } else {
        echo "erro";
       }

 }


 public function senhaChamada(){

  
       $con = Conexao::getInstance();
       $alterarchamado = "update  totem set chamado = 'S'  where totem  = :totem";
       $stmt=$con->prepare( $alterarchamado);
       $stmt->bindParam(':totem',$this->totem);
       $result=$stmt->execute();

       if ($result) {
        echo "suscesso";
       } else {
        echo "erro";
       }

 }


 


}
	
	



 ?>