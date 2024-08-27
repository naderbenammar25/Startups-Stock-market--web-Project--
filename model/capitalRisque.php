<?php

class capitalRisque {
    private $idC;
    private $nomC;
    private $prenomC;
    private $cinC;
    private $mailC;
    private $pseudoC;
    private $mdpC;

    public function __construct($idC,$nomC, $prenomC, $cinC, $mailC, $pseudoC, $mdpC) {
        $this->idC = $idC;
        $this->nomC = $nomC;
        $this->prenomC = $prenomC;
        $this->cinC = $cinC;
        $this->mailC = $mailC;
        $this->pseudoC = $pseudoC;
        $this->mdpC = $mdpC;
    }

    // Getters
    public function getIdC() {
    return $this->idC;
    }
    public function getNomC() {
        return $this->nomC;
    }

    public function getPrenomC() {
        return $this->prenomC;
    }

    public function getCinC() {
        return $this->cinC;
    }

    public function getMailC() {
        return $this->mailC;
    }

    public function getPseudoC() {
        return $this->pseudoC;
    }

    public function getMdpC() {
        return $this->mdpC;
    }

    // Setters
    public function setIdC($idC) {
    $this->idC = $idC;
    }
    public function setNomC($nomC) {
        $this->nomC = $nomC;
    }

    public function setPrenomC($prenomC) {
        $this->prenomC = $prenomC;
    }

    public function setCinC($cinC) {
        $this->cinC = $cinC;
    }

    public function setMailC($mailC) {
        $this->mailC = $mailC;
    }

    public function setPseudoC($pseudoC) {
        $this->pseudoC = $pseudoC;
    }

    public function setMdpC($mdpC) {
        $this->mdpC = $mdpC;
    }
}

?>