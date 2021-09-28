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


  public function cadastrarClassficacaoEnf(){

       $con = Conexao::getInstance();
       $inserirprontenf = "insert into prontuario  (`cd_paciente`, `nr_carteira`, `temperatura`, `pas`, `pad`, `sat`, `has`, `diabetes`, `hits_clinica`, `classificacao`, `protocolo` ,   `DT_REGISTRO` ) values (:cd_paciente , :nr_carteira , :TEMP , :PAS ,  :PAD ,  :SAT, :HAS ,  :DIAB, :HC , :CLARISCO, :protocolo , NOW()) " ;

       $stmt=$con->prepare( $inserirprontenf );
       $stmt->bindParam(':cd_paciente',$this->id_paciente);
       $stmt->bindParam(':nr_carteira',$this->id_carteira);
       $stmt->bindParam(':TEMP',$this->temp);
       $stmt->bindParam(':PAS',$this->pas);
       $stmt->bindParam(':PAD',$this->pad);
       $stmt->bindParam(':SAT',$this->saturacao);
       $stmt->bindParam(':HAS',$this->has);
       $stmt->bindParam(':DIAB',$this->diabetes);
       $stmt->bindParam(':HC',$this->historiaclinica);
       $stmt->bindParam(':CLARISCO',$this->classificacao);
       $stmt->bindParam(':protocolo',$this->protocolo);
       $result=$stmt->execute();


       if ($result) {
           echo 'sucesso';
       } else {
            echo 'erro';
       }
       

  } 




public function listarAtdColeta(){
     

       $con = Conexao::getInstance();
       $listaratdcoleta = "SELECT PO.atendimento , PA.nome , PA.dt_nascimento  FROM PRONTUARIO PO , PACIENTE PA WHERE PROTOCOLO = 'COVID-19' AND PO.cd_paciente = PA.id_paciente";
       $stmt=$con->prepare($listaratdcoleta);
             $result=$stmt->execute();

           if ($result) {
                     
           while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {
           
           
           echo "<tr>"; 
           echo "<td class='text-center'> ATD: ".$reg->atendimento." </td>";
           echo "<td class='text-center'> ".$reg->nome."</td>";
            echo "<td class='text-center'>".$reg->dt_nascimento." </td>";
           echo "<td class='text-center'>  <a href='../../action/coletarlab.php?cdAtendimento=".$reg->atendimento."' > <i class='fas fa-vial'></i></a></td>";
           echo "<td class='text-center' > <a href='' > <i class='fas fa-microscope'></i> </a> </td>";
            echo "</tr>";




           }

       } else {
        echo "erro";
       }


    }

       
public function listarAtendidoEnf(){

      $con = Conexao::getInstance();
       $lista_atd_enf = "SELECT po.atendimento , pa.nome paciente , pa.dt_nascimento , po.classificacao , po.protocolo , u.nome usuario , u.nr_conselho , PO.DT_REGISTRO  FROM usuario u , prontuario po , paciente pa where po.cd_paciente = pa.id_paciente and po.cd_usuario = u.cd_usuario";
       $stmt=$con->prepare($lista_atd_enf);
             $result=$stmt->execute();

           if ($result) {
                     
           while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {
           
           
           echo "<tr>"; 
           echo "<td class='text-center'> ".$reg->atendimento." </td>";
           echo "<td class='text-center'> ".$reg->paciente."</td>";
            echo "<td class='text-center'>".$reg->dt_nascimento." </td>";
             echo "<td class='text-center'>".$reg->classificacao." </td>";
             echo "<td class='text-center'>".$reg->protocolo." </td>";
             echo "<td class='text-center'>".$reg->usuario." </td>";
              echo "<td class='text-center'>".$reg->nr_conselho." </td>";
                        echo "<td class='text-center'>".$reg->DT_REGISTRO." </td>";
                        echo "<td class='text-center'><i  class='fas fa-pen'></i></td>";
                       echo "<td class='text-center' > <a href='../../action/excluirsenha.php?senha='> <i class='fas fa-trash'></i> </a> </td>";
                       echo "</tr>";




           }

       } else {
        echo "erro";
       }




      }


}


 ?>