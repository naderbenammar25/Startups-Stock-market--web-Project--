<?php
// Inclure le fichier de connexion à la base de données
include_once 'connexion.php';
require_once '../model/projet.php';


    $cle = "Education";

    $stmt = $dbh->prepare("SELECT * FROM projet WHERE categorie	 LIKE CONCAT('%', :cle, '%')");

    // Liaison du paramètre
    $stmt->bindParam(':cle', $cle);
    
    // Exécution de la requête SQL
    $stmt->execute();
    
    // Récupération des résultats sous forme de tableau associatif
    $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($projets) {
        // Démarrer la session
        session_start();

        // Tableau pour stocker les objets Projet
        $projetR = [];

        // Créer des objets Projet à partir des résultats
        foreach ($projets as $projet) {
            $projetObj = new Projet($projet['id_projet'], $projet['titre'], $projet['categorie'], $projet['descriptionProjet'], $projet['nbrActionsAVendre'], $projet['nbrActionsVendues'], $projet['prixAction'], $projet['idStartuper']);
            $projetR[] = $projetObj;
        }

        // Stocker $projetR dans une session
        $_SESSION['projetR'] = $projetR;
        
        // Redirection vers la page indexC.php
        header("Location: ../view/indexC.php#RTrecherche");
        exit;
    } else {
        // Aucun projet trouvé, gérer l'alerte
        session_start();
        unset($_SESSION['projetR']);
        $_SESSION['alerteMessage'] = 1;
        header("Location: ../view/indexC.php");
        exit;
    }

?>
