<?php 

/**
 * 
 */
class ControlerDocEnf extends DocEnf
{



 public function localizarprontuario(){

     $con = Conexao::getInstance();
     $localizarprontuario= "SELECT  distinct  1 resp

FROM
   prontuario po
   
WHERE
        po.cd_paciente = :id_pacinte  and deletado = 'N'  or trancado_med  = 'N'";

     $stmt=$con->prepare($localizarprontuario);
     $stmt->bindParam(':id_pacinte',$this->id_paciente);
     $result=$stmt->execute();

     if ($result) {

       $reg=$stmt->fetch(PDO::FETCH_OBJ);
       return $reg->resp;
         
     } else {
         return 0;
     }
     



}

public function pegarDadosPaciente() {

         $con = Conexao::getInstance();
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

}



 public function localizarCarteira(){

     $con = Conexao::getInstance();
     $localizarcarteira = "SELECT
    id_paciente_fk
FROM
    carteira    ca
   
WHERE
        ca.nr_carteira = :id_carteira ";
     $stmt=$con->prepare( $localizarcarteira);
     $stmt->bindParam(':id_carteira',$this->id_carteira);
     $result=$stmt->execute();

     if ($result) {


         $reg=$stmt->fetch(PDO::FETCH_OBJ);

         if(isset($reg->id_paciente_fk)) {

            $this->setId_paciente($reg->id_paciente_fk);
            $possuiprontuario = $this->localizarprontuario();

            if ($possuiprontuario==0) {
               

               $this->pegarDadosPaciente();
                

            } else {


                echo '<script>

                if(window.confirm("ESSE PACIENTE PACIENTE POSSUI UM ATENDIMENTO ATIVO")){

                    window.location.replace("../../index.php?page=prontenf");

                } else {

                   window.location.replace("../../index.php?page=prontenf");

                }



                 </script>';


            }
            





         } 
         else {

             echo '<script>

                if(window.confirm("ESSA CARTEIRA NAO FOI LOCALIZADA")){

                    window.location.replace("../../index.php?page=prontenf");

                } else {

                   window.location.replace("../../index.php?page=prontenf");

                }



                 </script>';
         }
         


        

         
         




     } else {
       var_dump('erro');
   }


}


public function cadastrarClassficacaoEnf(){
 $cd_usuario = $_SESSION['cd_usuario'];
 $con = Conexao::getInstance();
 $inserirprontenf = "insert into prontuario  (`cd_paciente`, `nr_carteira`, `temperatura`, `pas`, `pad`, `sat`, `has`, `diabetes`, `hits_clinica`, `classificacao`, `protocolo` , `cd_usuario` ,  `DT_REGISTRO` ) values (:cd_paciente , :nr_carteira , :TEMP , :PAS ,  :PAD ,  :SAT, :HAS ,  :DIAB, :HC , :CLARISCO, :protocolo , :cd_usuario ,  NOW()) ";

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
 $stmt->bindParam(':cd_usuario',$cd_usuario);
 $result=$stmt->execute();


 if ($result) {
     echo 'sucesso';
 } else {
    echo 'erro';
}


} 




public function listarAtdColeta(){


 $con = Conexao::getInstance();
 $listaratdcoleta = "SELECT distinct PO.atendimento , PA.nome , PA.dt_nascimento , lp.coletado FROM PRONTUARIO PO LEFT JOIN lab_pedido_laudo lp on po.atendimento = lp.atd_pedido left JOIN PACIENTE PA ON PO.cd_paciente = PA.id_paciente WHERE PROTOCOLO = 'COVID-19' and lp.resultado is null and po.trancado_enf = 'S'";
 $stmt=$con->prepare($listaratdcoleta);
 $result=$stmt->execute();

 if ($result) {

     while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {


         echo "<tr>"; 
         echo "<td class='text-center'> ATD: ".$reg->atendimento." </td>";
         echo "<td class='text-center'> ".$reg->nome."</td>";
         echo "<td class='text-center'>".$reg->dt_nascimento." </td>";
         
         if($reg->coletado=='S') { 
         echo "<td class='text-center'>   <i class='fas fa-vial text-danger'></i></td>"; }
             else {  echo "<td class='text-center'>  <a href='../../action/coletarlab.php?cdAtendimento=".$reg->atendimento."' > <i class='fas fa-vial'></i></a></td>"; }

         echo "<td class='text-center' > <a href='#' > <i class='fas fa-microscope'></i> </a> </td>";
         echo "</tr>";




     }

 } else {
    echo "erro";
}


}


public function listarAtendidoEnf(){

  $con = Conexao::getInstance();
  $lista_atd_enf = "SELECT po.atendimento , pa.nome paciente , pa.dt_nascimento , po.classificacao , po.protocolo , u.nome usuario , u.nr_conselho , PO.DT_REGISTRO , po.trancado_enf  FROM usuario u , prontuario po , paciente pa where po.cd_paciente = pa.id_paciente and po.cd_usuario is null";
  $stmt=$con->prepare($lista_atd_enf);
  $result=$stmt->execute();

  if ($result) {

     while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {


         echo "<tr>"; 
         echo "<td class='text-center'> ".$reg->atendimento." </td>";
         echo "<td class='text-center'> ".$reg->paciente."</td>";
         echo "<td class='text-center'>".$reg->dt_nascimento." </td>";

         if($reg->classificacao=='AZUL'){ 

            echo "<td class='text-center'><i class='fas fa-circle text-primary'> </i> </td>"; 

         } elseif($reg->classificacao=='AMARELO') {

             echo "<td class='text-center'><i class='fas fa-circle text-warning'> </i> </td>"; 

         }  elseif($reg->classificacao=='VERDE') {

             echo "<td class='text-center'><i class='fas fa-circle text-success'> </i> </td>"; 

         } elseif($reg->classificacao=='VERMELHO') {

             echo "<td class='text-center'><i class='fas fa-circle text-danger'> </i> </td>"; 

         } 
         
          if($reg->protocolo=='COVID-19'){ 

              echo "<td class='text-center'><i class='fas fa-lungs-virus text-danger' ></i> </td>"; 

         } elseif  ($reg->protocolo=='SEPSE') { 

                 echo "<td class='text-center'><i class='fas fa-notes-medical text-warning'> </i> </td>"; 

         } else { echo "<td class='text-center'></td>"; 
                }
 

                  echo "<td class='text-center'>".$reg->usuario." </td>";
         echo "<td class='text-center'>".$reg->nr_conselho." </td>";
         echo "<td class='text-center'>".$reg->DT_REGISTRO." </td>";




         if ($reg->trancado_enf == 'N') 
         {

        echo "<td class='text-center'>  <a href='view/prontuario/prontuario.php?atd=".$reg->atendimento."'> <i  class='fas fa-pen'></i></a></td>";

        echo "<td class='text-center'>  <a href='action/salvarprontenf.php?atd=".$reg->atendimento."'> <i  class='fas fa-lock-open'></i></a></td>";

        echo "<td class='text-center' > <a href='action/excluirprontenf.php?atd=".$reg->atendimento."'> <i class='fas fa-trash'></i> </a> </td>";

        } else {

            echo "<td class='text-center'><i  class='fas fa-pen text-danger'></i></td>";

            echo "<td class='text-center'><i  class='fas fa-user-lock text-danger'></i></td>";

            echo "<td class='text-center' >  <i class='fas fa-trash text-danger'></i>  </td>";
        }


        echo "</tr>";




    }

} else {
    echo "erro";
}




}

public function excluirdocenf()

{

 $con = Conexao::getInstance();
 $deletardocenf = "delete from  prontuario where atendimento  = :atd  and  trancado_enf = 'N' ";
 $stmt=$con->prepare( $deletardocenf);
 $stmt->bindParam(':atd',$this->atendimento);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}



public function salvardocenf()

{

 $con = Conexao::getInstance();
 $salvardocenf = "update   prontuario set trancado_enf = 'S' where atendimento  = :atd  ";
 $stmt=$con->prepare( $salvardocenf);
 $stmt->bindParam(':atd',$this->atendimento);
 $result=$stmt->execute();

 if ($result) {
    echo "suscesso";
} else {
    echo "erro";
}


}

public function buscarprontenf() 

{

  $con = Conexao::getInstance();
  $lista_atd_enf = "SELECT po.* , pa.nome , pa.dt_nascimento from prontuario po , paciente pa where po.cd_paciente = pa.id_paciente and po.atendimento = :atd";
  $stmt=$con->prepare($lista_atd_enf);
   $stmt->bindParam(':atd',$this->atendimento);
  $result=$stmt->execute();

  if ($result) {
      $reg=$stmt->fetch(PDO::FETCH_OBJ);
      return $reg;
  } else {
      echo 'falhou';
  }
  


}


public function editclassificacaoenf(){

 $con = Conexao::getInstance();
 $editprontenf = "update prontuario set temperatura = :TEMP   , pas = :PAS , pad=:PAD , sat=:SAT , has= :HAS ,  diabetes= :DIAB
  , hits_clinica =:HC ,  classificacao = :CLARISCO , protocolo= :protocolo , DT_REGISTRO =  NOW() where atendimento = :atendimento "  ;

 $stmt=$con->prepare( $editprontenf );
 $stmt->bindParam(':TEMP',$this->temp);
 $stmt->bindParam(':PAS',$this->pas);
 $stmt->bindParam(':PAD',$this->pad);
 $stmt->bindParam(':SAT',$this->saturacao);
 $stmt->bindParam(':HAS',$this->has);
 $stmt->bindParam(':DIAB',$this->diabetes);
 $stmt->bindParam(':HC',$this->historiaclinica);
 $stmt->bindParam(':CLARISCO',$this->classificacao);
 $stmt->bindParam(':protocolo',$this->protocolo);
 $stmt->bindParam(':atendimento',$this->atendimento);
 $result=$stmt->execute();


 if ($result) {
     echo 'sucesso';
 } else {
    echo 'erro';
}


} 




}


?>