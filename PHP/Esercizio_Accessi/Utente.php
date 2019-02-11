<?php

class Utente {
  private $id;
  private $cognome;
  private $nome;
  private $nickname;
  private $password;
  private $email;
  private $indirizzo;
  private $datanascita;
  private $admin;

  public function __construct(){
    $this->id = null;
    $this->cognome = null;
    $this->nome = null;
    $this->nickname = null;
    $this->password = null;
    $this->email = null;
    $this->indirizzo = null;
    $this->datanascita = null;
    $this->admin = null;
  }


  public function login(){
    require 'config.php';
    $sql = "SELECT nickname, password FROM utenti";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
      if ($this->nickname == $row['nickname'] && $this->password == $row['password']) {
          return true;
        }
    }
    return false;
  }

  public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCognome(){
		return $this->cognome;
	}

	public function setCognome($cognome){
		$this->cognome = $cognome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNickname(){
		return $this->nickname;
	}

	public function setNickname($nickname){
		$this->nickname = $nickname;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getIndirizzo(){
		return $this->indirizzo;
	}

	public function setIndirizzo($indirizzo){
		$this->indirizzo = $indirizzo;
	}

	public function getDatanascita(){
		return $this->datanascita;
	}

	public function setDatanascita($datanascita){
		$this->datanascita = $datanascita;
	}

	public function getAdmin(){
		return $this->admin;
	}

	public function setAdmin($admin){
		$this->admin = $admin;
	}

}

?>
