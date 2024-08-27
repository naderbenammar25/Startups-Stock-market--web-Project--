<?php

include_once 'connexion.php';
require_once '../model/projet.php';
require_once '../model/startuper.php';
// Vérifier si l'ID du projet est présent dans l'URL

if(isset($_GET['id'])) {
    // Récupérer l'ID du projet depuis l'URL
    $idProjet = $_GET['id'];
} else { 
    header("Location: ../view/index.php");
    exit;
}

$stmt = $dbh->prepare("SELECT * FROM projet WHERE id_projet = :idProjet");
$stmt->bindParam(':idProjet', $idProjet);
$stmt->execute();
$projet = $stmt->fetch(PDO::FETCH_ASSOC);
if ($projet) {
        
    $projet = new projet($projet['id_projet'], $projet['titre'],$projet['$categorie'], $projet['descriptionProjet'], $projet['nbrActionsAVendre'], $projet['nbrActionsVendues'], $projet['prixAction'], $projet['idStartuper']);
    session_start();
$_SESSION['projet'] = $projet;

header("Location: ../view/index.php?id={$idProjet}#edition");


}





?>