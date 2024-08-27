<?php 
class Projet 
{
    private $idProjet;
    private $titre;
    private $categorie;
    private $description;
    private $nbrActionsAVendre;
    private $nbrActionsVendues;
    private $prixAction;
    private $idStartuper;

    public function __construct($idProjet,$titre,$categorie, $description, $nbrActionsAVendre,$nbrActionsVendues, $prixAction, $idStartuper) {
        $this->idProjet = $idProjet;
        $this->titre = $titre;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->nbrActionsAVendre = $nbrActionsAVendre;
        $this->nbrActionsVendues = $nbrActionsVendues;
        $this->prixAction = $prixAction;
        $this->idStartuper = $idStartuper;
    }

    // Getters
    public function getIdProjet()
    {
        return $this->idProjet;
    }
    public function getTitre() {
        return $this->titre;
    }

    public function getCategorie() {
        return $this->categorie;
    }
    public function getDescription() {
        return $this->description;
    }

    public function getNbrActionsAVendre() {
        return $this->nbrActionsAVendre;
    }

    public function getNbrActionsVendues()
    {
        return $this->nbrActionsVendues;
    }

    public function getPrixAction() {
        return $this->prixAction;
    }

    public function getIdStartuper() {
        return $this->idStartuper;
    }

    // Setters
    public function setIdProjet($idProjet) {
    $this->idProjet = $idProjet;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setCategorie($categorie) {
        $this->categorie = $categorie;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

    public function setNbrActionsAVendre($nbrActionsAVendre) {
        $this->nbrActionsAVendre = $nbrActionsAVendre;
    }

    public function setNbrActionsVendues($nbrActionsVendues) {
    $this->nbrActionsVendues = $nbrActionsVendues;
    }
    public function setPrixAction($prixAction) {
        $this->prixAction = $prixAction;
    }

    public function setIdStartuper($idStartuper) {
        $this->idStartuper = $idStartuper;
    }
}


?>