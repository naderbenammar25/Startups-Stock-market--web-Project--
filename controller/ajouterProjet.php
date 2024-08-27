<?php
// Inclure le fichier de connexion à la base de données
include_once '../model/startuper.php';
include_once 'connexion.php';

session_start();

// Vérifier si $startuper est défini dans la session
if (isset($_SESSION['startuper'])) {
    $startuper = $_SESSION['startuper'];

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs du formulaire
        $titre = $_POST['titre'];
        $descriptionProjet = $_POST['descriptionProjet'];
        $actAV = $_POST['actAV'];
        $actV = $_POST['actV'];
        $prixAct = $_POST['prixAct'];
        $idStartuper = $startuper->getId();
        $categorie = $_POST['categorie']; // Récupérer la catégorie sélectionnée

        // Préparation de la requête SQL d'insertion
        $stmt = $dbh->prepare("INSERT INTO projet 
                               (titre, descriptionProjet, nbrActionsAVendre, nbrActionsVendues, prixAction, idStartuper, categorie) 
                               VALUES 
                               (:titre, :descriptionProjet, :actAV, :actV, :prixAct, :idStartuper, :categorie)");

        // Liaison des paramètres
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':descriptionProjet', $descriptionProjet);
        $stmt->bindParam(':actAV', $actAV);
        $stmt->bindParam(':actV', $actV);
        $stmt->bindParam(':prixAct', $prixAct);
        $stmt->bindParam(':idStartuper', $idStartuper);
        $stmt->bindParam(':categorie', $categorie); // Liaison de la catégorie

        if ($stmt->execute()) {
            echo "Projet ajouté avec succès !";
            header("Location: ../view/index.php");
            exit;
        } else {
            echo "Erreur lors de l'ajout du projet.";
        }
    }
}
?>
