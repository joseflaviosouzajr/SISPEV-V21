<?php 

/**
 * 
 */
class Paciente extends Pessoa
{
	

	public $id_prontuario;
	






	public function setProntuario($id_prontuario)

	{

		$this->id_prontuario = $id_prontuario;

		return $this;


	}


	public function getProntuario()
	{
		return $this->id_prontuario;
	}



	



}



      


?>