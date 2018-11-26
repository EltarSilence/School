<?php

  /*
    CSV:
    NOME,GENERE,PREZZO,GIACENZA,IMMAGINE
  */

  class Prodotto {

    private $nome;
    private $genere;
    private $prezzo;
    private $giacenza;
    private $immagine;

    function __construct() {
      $this->nome = null;
      $this->genere = null;
      $this->prezzo = null;
      $this->giacenza = null;
      $this->immagine = null;
    }

    public function init($n, $g, $p, $q, $img) {
      $this->nome = $n;
      $this->genere = $g;
      $this->prezzo = $p;
      $this->giacenza = $q;
      $this->immagine = $img;
    }

    public function setCSV($prodotto, $sep){
      $prodotto = explode($sep, $prodotto);
      $this->setNome($prodotto[0]);
      $this->setGenere($prodotto[1]);
      $this->setPrezzo($prodotto[2]);
      $this->setGiacenza($prodotto[3]);
      $this->setImmagine($prodotto[4]);
    }

    public function returnCSV($sep) {
      return $this->nome.$sep.$this->genere.$sep.$this->prezzo.$sep.$this->giacenza.$sep.$this->immagine.$sep;
    }

    public function getNome(){
		    return $this->nome;
	  }

  	public function setNome($nome){
  		$this->nome = $nome;
  	}

  	public function getGenere(){
  		return $this->genere;
  	}

  	public function setGenere($genere){
  		$this->genere = $genere;
  	}

  	public function getPrezzo(){
  		return $this->prezzo;
  	}

  	public function setPrezzo($prezzo){
  		$this->prezzo = $prezzo;
  	}

  	public function getGiacenza(){
  		return $this->giacenza;
  	}

  	public function setGiacenza($giacenza){
  		$this->giacenza = $giacenza;
  	}

  	public function getImmagine(){
  		return $this->immagine;
  	}

  	public function setImmagine($immagine){
  		$this->immagine = $immagine;
  	}

  }

?>
