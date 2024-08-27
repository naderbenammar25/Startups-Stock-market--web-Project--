<?php
include_once 'connexion.php';
require_once '../model/startuper.php';
// Vérifier si des données ont été soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['pass'];

    // Requête SQL pour vérifier le pseudo et le mot de passe dans la base de données
    $sql = "SELECT * FROM startuper WHERE pseudo = :pseudo AND mdp = :mdp";

    // Préparation de la requête
    $stmt = $dbh->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':mdp', $mdp);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est correct
    if ($utilisateur) {
        
        $startuper = new startuper($utilisateur['id'],$utilisateur['nom'], $utilisateur['prenom'], $utilisateur['cin'], $utilisateur['mail'], $utilisateur['nomEps'], $utilisateur['adresseEps'], $utilisateur['regEps'], $utilisateur['pseudo'],$utilisateur['mdp']);
        
        $photo_data = $utilisateur['photo']; 
        $startuper->setPhoto($photo_data);
        
        session_start();
        
    $_SESSION['startuper'] = $startuper;
    
        header("Location: ../view/index.php");
        exit; // Arrêter l'exécution du script pour éviter l'affichage du reste de la page
    } else {
        // Si les identifiants sont incorrects, afficher un message d'erreur
        echo "Pseudo ou mot de passe incorrect.";
    }
}
?>




