<?php
// Inclure le fichier de connexion à la base de données
include_once 'connexion.php';

$existe = false;
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nomC = $_POST['nomC'];
    $prenomC = $_POST['prenomC'];
    $cinC = $_POST['cinC'];
    $mailC = $_POST['mailC'];
    $pseudoC = $_POST['pseudoC'];
    $mdpC = $_POST['mdpC'];


    $existe = utilisateurExisteC($mailC);
    if ($existe == false) {


    // Préparation de la requête SQL d'insertion
    $stmt = $dbh->prepare("INSERT INTO capitalrisque (nom, prenom, cin, mail, pseudo, mdp) 
                           VALUES (:nomC, :prenomC, :cinC, :mailC,:pseudoC, :mdpC)");

    // Liaison des paramètres
    $stmt->bindParam(':nomC', $nomC);
    $stmt->bindParam(':prenomC', $prenomC);
    $stmt->bindParam(':cinC', $cinC);
    $stmt->bindParam(':mailC', $mailC);
    $stmt->bindParam(':pseudoC', $pseudoC);
    $stmt->bindParam(':mdpC', $mdpC);

    // Exécution de la requête SQL
    if ($stmt->execute()) {
        // Afficher un message de succès
        echo "Inscription réussie !";
        header("Location: ../view/login.html");
    } else {
        // Afficher un message en cas d'erreur
        echo "Erreur lors de l'inscription.";
    }
    
exit;

}else {echo"l'utilisateur existe déja";}
}

function utilisateurExisteC($email) {
    // Connexion à la base de données
    $dbh = new PDO("mysql:host=localhost;dbname=pweb", "root", "");

    // Requête SQL pour rechercher l'utilisateur par email
    $sql = "SELECT COUNT(*) FROM capitalrisque WHERE mail = :email";

    // Préparation de la requête
    $stmt = $dbh->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':email', $email);

    // Exécution de la requête
    $stmt->execute();

    // Récupération du résultat
    $nombreUtilisateurs = $stmt->fetchColumn();

    // Retourner vrai si l'utilisateur existe, faux sinon
    return ($nombreUtilisateurs > 0);
}

?>
