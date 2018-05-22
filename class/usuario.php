<?php

class Usuario{

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function loadById($id){ // trazer apenas um usuario pelo ID
		$sql = new sql();

	$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

	if(isset($results[0])) {// ou if(count($results) > 0

	$row = $results[0];
	$this->setIdusuario($row['idusuario']);
	$this->setDeslogin($row['deslogin']);
	$this->setDessenha($row['dessenha']);
	$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}
	}
// Traz todos os usuarios da tabela cadastro
	public static function getList(){ 
		$sql = new sql();

		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
	}
// Traz todos os usuarios da tabela cadastro com o parametro passado.
	public static function search($login){
		$sql = new sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(":SEARCH"=>"%".$login."%"));
	}

	// Listando com Autenticação login e senha
	public function login($login, $password){
		$sql = new sql();
		$results =$sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN and dessenha = :PASSWORD", array(":LOGIN"=>$login, "PASSWORD"=>$password));
		if(count($results)>0){
			$row = $results[0];
			$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro']));
		}else{
			throw new Exception("Login e/ou senha inválidos");			
		}
	}

// adicona valores ao seteres.
	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
}
?>