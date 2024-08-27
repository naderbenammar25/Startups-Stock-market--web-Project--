<?php

include_once 'connexion.php';
require_once '../model/projet.php';
require_once '../model/capitalRisque.php';
// Vérifier si l'ID du projet est présent dans l'URL
if(isset($_GET['id'])) {
    $idProjet = $_GET['id'];
} else 
{    
}

if(isset($_GET['nbAct'])) {
    $nbAct = $_GET['nbAct'];
}else 
{
}
session_start();
if (isset($_SESSION['capitalRisque'])) {
    $capitalRisque = $_SESSION['capitalRisque'];
    echo "Nom: " . $capitalRisque->getNomC() . "<br>";
    echo "id: " . $capitalRisque->getIdC() . "<br>";

    $idCap = $capitalRisque->getIdC(); 
} 
else
{
}

$stmtTest = $dbh->prepare("SELECT * FROM projet WHERE id_Projet = :idProjet");
$stmtTest->bindParam(':idProjet', $idProjet);
$stmtTest->execute();
$projet = $stmtTest->fetch(PDO::FETCH_ASSOC);
if ($projet) {
    $projet = new projet(
        $projet['id_projet'],
        $projet['titre'],
        $projet['categorie'],
        $projet['descriptionProjet'],
        $projet['nbrActionsAVendre'],
        $projet['nbrActionsVendues'],
        $projet['prixAction'],
        $projet['idStartuper']
    );
}

if(($projet->getNbrActionsAVendre() >= $nbAct)&&($nbAct > 0)) {
    
echo $idCap; // test
$stmt = $dbh->prepare("INSERT INTO capitalrisqueprojet

                        (idProjet, idCapitalRisque,nbrActionsAchetees) 
                    VALUES 
                        (:idProjet, :idCap, :nbAct)");


// Liaison du paramètre
$stmt->bindParam(':idProjet', $idProjet);
$stmt->bindParam(':idCap', $idCap);
$stmt->bindParam(':nbAct', $nbAct);

// Exécution 
$stmt->execute();

$stmt2 = $dbh->prepare("UPDATE projet
SET nbrActionsAVendre =  nbrActionsAVendre - :nbAct,
    nbrActionsVendues = nbrActionsVendues + :nbAct
WHERE id_Projet = :idProjet");

$stmt2->bindParam(':idProjet', $idProjet);
$stmt2->bindParam(':nbAct', $nbAct);
                        
$stmt2->execute();


// Récupération des résultats
$capitalRisqueProjet = $stmt->fetch(PDO::FETCH_ASSOC);
$modTabProjet = $stmt2->fetch(PDO::FETCH_ASSOC);





    header("Location: ../view/indexC.php");

} else {
    exit("verifier le nombre d'actions à acheter    ");
}

?>