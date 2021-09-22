<?php 

/**
 * 
 */
class ControlerLab extends lab
{
    
   public function inserirPedidoLab(){

       $con = Conexao::getInstance();
       $inserirpedlab = 'insert into lab_pedido_laudo (atd_pedido, coletado,  dh_coleta)  values (:atd_pedido , :coletado , NOW())';
       $stmt=$con->prepare($inserirpedlab);
       $stmt->bindParam(':atd_pedido', intval($this->atd_pedido));
       $stmt->bindParam(':coletado', $this->coletado);

      // var_dump($stmt);
       $result=$stmt->execute();


       if ($result) {
           echo 'pedido coletado';
       
       } else {
         echo "erro na coleta";


}



   
       
}


}


 ?>