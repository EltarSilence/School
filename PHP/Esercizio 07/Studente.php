<?php

  class Studente {

    private $nome;
    private $cognome;
    private $ddn;
    private $indirizzo_p;
    private $indirizzo_r;

    function __construct($nome, $cognome, $ddn, $indirizzo_p, $indirizzo_r) {
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->ddn = $ddn;
      $this->indirizzo_p = $indirizzo_p;
      $this->indirizzo_r = $indirizzo_r;
    }

    public function createCSVstring(){
      $S = ',';
      $csv = $this->nome.$S.$this->cognome.$S.$this->ddn.$S.$this->indirizzo_p.$S.$this->indirizzo_r;
      return $csv;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome() {
        return $this->cognome;
    }

    public function setCognome($cognome) {
        $this->cognome = $cognome;

        return $this;
    }

    public function getDdn() {
        return $this->ddn;
    }

    public function setDdn($ddn) {
        $this->ddn = $ddn;
        return $this;
    }

    public function getIndirizzoP() {
        return $this->indirizzo_p;
    }

    public function setIndirizzoP($indirizzo_p) {
        $this->indirizzo_p = $indirizzo_p;
        return $this;
    }

    public function getIndirizzoR(){
        return $this->indirizzo_r;
    }

    public function setIndirizzoR($indirizzo_r) {
        $this->indirizzo_r = $indirizzo_r;
        return $this;
    }

}


?>
