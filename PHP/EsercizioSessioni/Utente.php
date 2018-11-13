<?php

  class Utente {

    private $nome;
    private $cognome;
    private $email;
    private $username;
    private $filename;

    function __construct($filename) {
      $this->filename = $filename;
      $this->nome = null;
      $this->cognome = null;
      $this->email = null;
      $this->username = null;
    }

    public function getByCSV($utente, $sep){
      $utente = explode($sep, $utente);
      $this->setNome($utente[0]);
      $this->setCognome($utente[1]);
      $this->setEmail($utente[2]);
      $this->setUsername($utente[3]);
    }

    public function login($u, $p) {
      $file = fopen($this->filename, 'r');
      $userlist = fread($file, filesize($this->filename)-1);
      fclose($file);

      $lines = explode("\n", $userlist);
      var_dump($lines);
      foreach ($lines as $line) {
        $campi = explode(",", $line);
        if ($u == $campi[3] && $p = $campi[4]){
          return true;
        }
      }
      return false;
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
