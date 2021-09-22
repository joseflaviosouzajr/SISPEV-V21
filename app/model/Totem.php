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



}



?>





