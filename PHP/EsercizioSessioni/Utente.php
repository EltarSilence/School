<?php

  class Utente {

    private $nome;
    private $cognome;
    private $email;
    private $username;

    function __construct($nome, $cognome, $email, $username) {
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->email = $email;
      $this->username = $email;
    }

    public function getByCSV($utente, $sep){
      $utente = explode($sep, $utente);
      $this->setNome($utente[0]);
      $this->setCognome($utente[1]);
      $this->setEmail($utente[2]);
      $this->setUsername($utente[3]);
    }

    public function isLogged($u, $p) {

    }

    public function getNome(){
		    return $this->nome;
    }

  	public function setNome($nome){
  		$this->nome = $nome;
  	}

  	public function getCognome(){
  		return $this->cognome;
  	}

  	public function setCognome($cognome){
  		$this->cognome = $cognome;
  	}

  	public function getEmail(){
  		return $this->email;
  	}

  	public function setEmail($email){
  		$this->email = $email;
  	}

  	public function getUsername(){
  		return $this->username;
  	}

  	public function setUsername($username){
  		$this->username = $username;
  	}



  }


?>
