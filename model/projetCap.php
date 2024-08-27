<?php

class ProjetCap 
{
    private $id;
    private $idProjet;
    private $idCapitalRisque;
    private $nbrActionsAchetees;

    public function __construct($id, $idProjet, $idCapitalRisque, $nbrActionsAchetees) {
        $this->id = $id;
        $this->idProjet = $idProjet;
        $this->idCapitalRisque = $idCapitalRisque;
        $this->nbrActionsAchetees = $nbrActionsAchetees;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getIdProjet() {
        return $this->idProjet;
    }

    public function getIdCapitalRisque() {
        return $this->idCapitalRisque;
    }

    public function getNbrActionsAchetees() {
        return $this->nbrActionsAchetees;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdProjet($idProjet) {
        $this->idProjet = $idProjet;
    }

    public function setIdCapitalRisque($idCapitalRisque) {
        $this->idCapitalRisque = $idCapitalRisque;
    }

    public function setNbrActionsAchetees($nbrActionsAchetees) {
        $this->nbrActionsAchetees = $nbrActionsAchetees;
    }
}
?>