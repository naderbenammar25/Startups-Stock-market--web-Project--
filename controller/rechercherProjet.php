<?php
include_once 'connexion.php';
require_once '../model/projet.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cle = $_POST['recherche'];

    $stmt = $dbh->prepare("SELECT * FROM projet WHERE descriptionProjet LIKE CONCAT('%', :cle, '%')");

    $stmt->bindParam(':cle', $cle);
    
    $stmt->execute();
    
    $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($projets) {
        session_start();
        $projetR = [];
        foreach ($projets as $projet) {
            $projetObj = new Projet($projet['id_projet'], $projet['titre'], $projet['categorie'], $projet['descriptionProjet'], $projet['nbrActionsAVendre'], $projet['nbrActionsVendues'], $projet['prixAction'], $projet['idStartuper']);
            $projetR[] = $projetObj;
        }

        // Stocker $projetR dans une session
        $_SESSION['projetR'] = $projetR;
        
        header("Location: ../view/indexC.php#RTrecherche");
        exit;
    } else {
        session_start();
        unset($_SESSION['projetR']);
        $_SESSION['alerteMessage'] = 1;
        header("Location: ../view/indexC.php");
        exit;
    }
}
?>
