<?php
include_once '../model/startuper.php';
include_once 'connexion.php';
include_once '../model/projet.php';


session_start();

// Vérifier si $_SESSION['projet'] est défini et n'est pas null
if (isset($_SESSION['projet']) && $_SESSION['projet'] !== null) {
    // Récupérer $projet depuis la session
    $projet = $_SESSION['projet'];
    $idProjet = $projet->getIdProjet();
} else {
    echo'aucun projet selectionné';
}


// Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titre'];
        $descriptionProjet = $_POST['descriptionProjet'];
        $actAV = $_POST['actAV'];
        $actV= $_POST['actV'];
        $prixAct = $_POST['prixAct'];
        $categorie = $_POST['categorie'];
        

        // Préparation de la requête SQL de mise à jour
        $stmt = $dbh->prepare("UPDATE projet 
                               SET 
                                titre = :titre,
                                categorie = :categorie,
                                descriptionProjet = :descriptionProjet, 
                                nbrActionsAVendre = :actAV, 
                                nbrActionsVendues = :actV, 
                                prixAction = :prixAct 
                               WHERE id_projet = :idProjet ");

        // Liaison des paramètres
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':descriptionProjet', $descriptionProjet);
        $stmt->bindParam(':categorie', $categorie);
        $stmt->bindParam(':actAV', $actAV);
        $stmt->bindParam(':actV', $actV);
        $stmt->bindParam(':prixAct', $prixAct);
        $stmt->bindParam(':idProjet', $idProjet);

        if ($stmt->execute()) {
            header("Location: ../view/index.php#edition");
        } else {
            // Afficher un message en cas d'erreur
            echo "Erreur lors de la mise à jour du projet.";
        }
        
        exit;
    }

    ?>