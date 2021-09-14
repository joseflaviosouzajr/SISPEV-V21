<?php  


  
  class Totem
  {
  	
  	
  


   public $totem;
   public $prioridade;
    public $data;
    public $chamado;
    public $ativo;


		public function setTotem($totem)

	{

		$this->totem = $totem;

		return $this;


	}


	public function getTotem()
	{
		return $this->$totem;
	}



		public function setPrioridade($prioridade)

	{

		$this->totem = $prioridade;

		return $this;


	}


	public function getPrioridade()
	{
		return $this->$prioridade;



	}





		public function setData($data)

	{

		$this->totem = $data;

		return $this;


	}


	public function getData()
	{
		return $this->$data;



	}



public function getAtivo()
{
    return $this->ativo;
}
 
public function setAtivo($ativo)
{
    $this->ativo = $ativo;
    return $this;
}


public function getChamado()
{
    return $this->chamado;
}
 
public function setChamado($chamado)
{
    $this->chamado = $chamado;
    return $this;
}

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
       $listarsenhas = "select totem , case when prioridade = 'P' then 'PRIORIDADE' ELSE 'NORMAL'  end prioridade  , data from totem where chamado = 'N'  and ativo = 'S'";
       $stmt=$con->prepare($listarsenhas);
             $result=$stmt->execute();

           if ($result) {
                     
           while ($reg=$stmt->fetch(PDO::FETCH_OBJ) ) {
           
           
           echo "<tr>"; 
           echo "<td class='text-center'> Nr: ".$reg->totem." - ".$reg->prioridade."</td>";
           echo "<td class='text-center'> ".$reg->data."</td>";
           echo "<td class='text-center'><i data-prioridade='".$reg->totem." - ".$reg->prioridade."' class='fas fa-volume-up'></i></td>";
           echo "<td class='text-center' > <a href='../../action/excluirsenha.php?senha=".$reg->totem."'> <i class='fas fa-trash'></i> </a> </td>";
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


}



?>





