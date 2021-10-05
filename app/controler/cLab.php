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


 public function resultadoPedidoLab(){

       $con = Conexao::getInstance();
       $reslaudo = 'update lab_pedido_laudo set resultado = :resultado where cd_pedido = :cd_pedido' ;
       $stmt=$con->prepare($reslaudo);
       $stmt->bindParam(':resultado', "positivo");
       $stmt->bindParam(':cd_pedido', 90);

       var_dump($stmt);
       $result=$stmt->execute();


       if ($result) {
           echo 'pedido laudado';
       
       } else {
         echo "erro na coleta";


}



   
       
}



}


 ?>