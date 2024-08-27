<?php
include_once 'connexion.php';
include_once '../model/capitalRisque.php';
// Vérifier si des données ont été soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['passC'];

    // Requête SQL pour vérifier le pseudo et le mot de passe dans la base de données
    $sql = "SELECT * FROM capitalrisque WHERE pseudo = :pseudo AND mdp = :mdp";

    // Préparation de la requête
    $stmt = $dbh->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':mdp', $mdp);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur) {
// Création d'une instance de la classe CapitalRisque en utilisant le constructeur avec les données récupérées
$capitalRisque = new capitalRisque($utilisateur['id'], $utilisateur['nom'], $utilisateur['prenom'], $utilisateur['cin'], $utilisateur['mail'], $utilisateur['pseudo'], $utilisateur['mdp']);
session_start();
// Stocker $startuper dans une session
$_SESSION['capitalRisque'] = $capitalRisque;
        header("Location: ../view/indexC.php");
        exit; //pour éviter l'affichage du reste de la page
    } else {
        echo "Pseudo ou mot de passe incorrect.";
    }
}
?>




