<?php 

  /**
   * 
   */
  class DocEnf 
  {
  	 


  	 public $id_carteira;
  	 public $id_paciente;
  	 public $totem;
  	 public $classificacao;
  	 public $atendimento;
  	 public $enf;
  	 public $temp;
  	 public $pas;
  	 public $pad;
  	 public $saturacao;
  	 public $historiaclinica;
  	 public $has;
  	 public $diabetes;
  	 public $protocolo;

   
public function getId_carteira()
{
    return $this->id_carteira;
}
 
public function setId_carteira($id_carteira)
{
    $this->id_carteira = $id_carteira;
    return $this;
}


public function getId_paciente()
{
    return $this->id_paciente;
}
 
public function setId_paciente($id_paciente)
{
    $this->id_paciente = $id_paciente;
    return $this;
}
   public function getTotem()
   {
       return $this->totem;
   }
    
   public function setTotem($totem)
   {
       $this->totem = $totem;
       return $this;
   }




   public function getClassificacao()
   {
       return $this->classificacao;
   }
    
   public function setClassificacao($classificacao)
   {
       $this->classificacao = $classificacao;
       return $this;
   }
	

	public function getAtendimento()
	{
	    return $this->atendimento;
	}
	 
	public function setAtendimento($atendimento)
	{
	    $this->atendimento = $atendimento;
	    return $this;
	}

	public function getEnf()
	{
	    return $this->enf;
	}
	 
	public function setEnf($enf)
	{
	    $this->enf = $enf;
	    return $this;
	}

  public function getTemp()
  {
      return $this->temp;
  }
   
  public function setTemp($temp)
  {
      $this->temp = $temp;
      return $this;
  }


public function getPas()
{
    return $this->pas;
}
 
public function setPas($pas)
{
    $this->pas = $pas;
    return $this;
}


public function getPad()
{
    return $this->pad;
}
 
public function setPad($pad)
{
    $this->pad = $pad;
    return $this;
}


public function getSaturacao()
{
    return $this->saturacao;
}
 
public function setSaturacao($saturacao)
{
    $this->saturacao = $saturacao;
    return $this;
}


public function getHistoriaclinica()
{
    return $this->historiaclinica;
}
 
public function setHistoriaclinica($historiaclinica)
{
    $this->historiaclinica = $historiaclinica;
    return $this;
}


public function getHas()
{
    return $this->has;
}
 
public function setHas($has)
{
    $this->has = $has;
    return $this;
}

public function getDiabetes()
{
    return $this->diabetes;
}
 
public function setDiabetes($diabetes)
{
    $this->diabetes = $diabetes;
    return $this;
}

public function getProtocolo()
{
    return $this->protocolo;
}
 
public function setProtocolo($protocolo)
{
    $this->protocolo = $protocolo;
    return $this;
}






  }

   








 ?>