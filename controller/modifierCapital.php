<?php
// Inclure le fichier de connexion à la base de données
include_once '../model/capitalRisque.php';
include_once 'connexion.php';

session_start();

// Vérifier si $startuper est défini dans la session
if (isset($_SESSION['capitalRisque'])) 
        $capitalRisque = $_SESSION['capitalRisque'];

    



// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nomC = $_POST['nomC'];
    $prenomC = $_POST['prenomC'];
    $mailC = $_POST['mailC'];
    $pseudoC = $_POST['pseudoC'];
    $idC = $capitalRisque->getIdC();
    


    

    // Préparation de la requête SQL d'insertion
    $stmt = $dbh->prepare("UPDATE capitalrisque 
                       SET nom = :nomC, 
                           prenom = :prenomC, 
                           mail = :mailC, 
                           pseudo = :pseudoC 
                       WHERE id = :idC");

    // Liaison des paramètres
    $stmt->bindParam(':nomC', $nomC);
    $stmt->bindParam(':prenomC', $prenomC);
    $stmt->bindParam(':mailC', $mailC);
    $stmt->bindParam(':pseudoC', $pseudoC);
    $stmt->bindParam(':idC', $idC);

    // Exécution de la requête SQL
    if ($stmt->execute()) {
        // Afficher un message de succès
        echo "Modification réussie !";
        header("Location: ../view/indexC.php");
    } else {
        // Afficher un message en cas d'erreur
        echo "Erreur lors de modification.";
    }
    
exit;


} 








?>


