<?php 

/**
 * 
 */
class ControlerDocEnf extends DocEnf
{
    
   public function localizarCarteira(){

       $con = Conexao::getInstance();
       $localizarcarteira = "select  id_paciente_fk from carteira where nr_carteira  = :id_carteira";
       $stmt=$con->prepare( $localizarcarteira);
       $stmt->bindParam(':id_carteira',$this->id_carteira);
       $result=$stmt->execute();

       if ($result) {
           

           $reg=$stmt->fetch(PDO::FETCH_OBJ);
            $this->setId_paciente($reg->id_paciente_fk);

       


         
       $localizadocarteira = "select *  from paciente where id_paciente  = :id_paciente";
       $stmt1=$con->prepare($localizadocarteira) ;
       $stmt1->bindParam(':id_paciente',intval($this->id_paciente));
       $result1=$stmt1->execute();

       if ($result1) {


           $reg1=$stmt1->fetch(PDO::FETCH_OBJ);
           return $reg1;

       } else {
           echo "erro consulta paciente";
       }
       
        


       } else {
         echo "erro consulta caerteira";
       }


}

}


 ?>