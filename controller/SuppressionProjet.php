<?php
session_start();

include_once 'connexion.php';
require_once '../model/projet.php';
require_once '../model/startuper.php';

if (isset($_GET['id'])) {
    $idProjet = $_GET['id'];

    $stmtActions = $dbh->prepare("SELECT COUNT(*) FROM capitalrisqueprojet WHERE idProjet = :idProjet");
    $stmtActions->bindParam(':idProjet', $idProjet);
    $stmtActions->execute();
    $countActions = $stmtActions->fetchColumn();
    if ($countActions > 0) {
        // Il y a des actions associées à ce projet, afficher un message d'erreur
        $_SESSION['delete_error'] = "You cannot delet a project with sold actions.";
        header("Location: ../view/index.php#supprimer");    
    }
    if ($countActions == 0) {
        // Il y a des actions associées à ce projet, afficher un message d'erreur
        $_SESSION['delete_error'] = "Project deleted.";   
    }
    // S'il n'y a pas d'actions associées, procéder à la suppression du projet
    $stmtDeleteProjet = $dbh->prepare("DELETE FROM projet WHERE id_projet = :idProjet");
    $stmtDeleteProjet->bindParam(':idProjet', $idProjet);
    if ($stmtDeleteProjet->execute()) {
        // Suppression réussie, rediriger avec un message de succès    
        header("Location: ../view/index.php#supprimer");
        exit;
    } else {
        // Suppression échouée
        $_SESSION['delete_error'] = "You cannot delet a project with sold actions.";
        header("Location: ../view/index.php#supprimer");
        exit();
    }
} 
?>
