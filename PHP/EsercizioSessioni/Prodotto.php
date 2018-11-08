<?php

  class Prodotto {

    private $nome;
    private $genere;
    private $prezzo;
    private $giacenza;
    private $immagine;

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
