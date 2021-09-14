<?php 

/**
 * 
 */
class Pessoa
{


	public $nome ;
	public $cpf ;
	public $data_nacimento  ;



	public function setNome($nome){


		$this->nome = $nome;

		return $this;


	}


	public function getNome()
	{
		return $this->nome;
	}



	public function setCpf($cpf){

	   $this->cpf = $cpf;

		return $this;


	}


	public function getCpf()
	{
		return $this->cpf;
	}


		public function setDataNascimento($data_nascimento){

	   $this->data_nascimento = $data_nascimento;

		return $this;


	}


	public function getDataNascimento()
	{
		return $this->data_nascimento;
	}




}





?>