<?php
// Inclure le fichier de connexion à la base de données
include_once 'connexion.php';

$existe = false;

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer les valeurs du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $cin = $_POST['cin'];
        $mail = $_POST['mail'];
        $nomEps = $_POST['eName'];
        $adresseEps = $_POST['eAdresse'];
        $regEps = $_POST['n_registre'];
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        $tmp_name = $_FILES["photo"]["tmp_name"];

        // Rétablir la connexion à la base de données si nécessaire
        $dbh = new PDO("mysql:host=localhost;dbname=pweb", "root", "");

        // Vérifier si le fichier photo a été correctement téléchargé
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
            $img_data = file_get_contents($tmp_name); // Lire le contenu binaire de l'image
        } else {
            // Gérer le cas où aucun fichier photo n'a été téléchargé
            echo "Erreur : Aucune photo sélectionnée.";
            exit;
        }

        $existe = utilisateurExiste($mail, $dbh);
        if (!$existe) {
            // Préparation de la requête SQL d'insertion
            $stmt = $dbh->prepare("INSERT INTO startuper (nom, prenom, cin, mail, nomEps, adresseEps, regCom, photo, pseudo, mdp) 
                                   VALUES (:nom, :prenom, :cin, :mail, :nomEps, :adresseEps, :regEps, :photo, :pseudo, :mdp)");

            // Liaison des paramètres
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':prenom', $prenom);
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':mail', $mail);
            $stmt->bindParam(':nomEps', $nomEps);
            $stmt->bindParam(':adresseEps', $adresseEps);
            $stmt->bindParam(':regEps', $regEps);
            $stmt->bindParam(':photo', $img_data, PDO::PARAM_LOB); // Utilisation de PDO::PARAM_LOB pour un LONGBLOB
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':mdp', $mdp);

            // Exécution de la requête SQL
            if ($stmt->execute()) {
                // Afficher un message de succès
                echo "Inscription réussie !";
                header("Location: ../view/login.html");
                exit;
            } else {
                // Afficher un message en cas d'erreur
                echo "Erreur lors de l'inscription.";
            }
        } else {
            echo "L'utilisateur existe déjà.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

function utilisateurExiste($email, $dbh) {
    // Requête SQL pour rechercher l'utilisateur par email
    $sql = "SELECT COUNT(*) FROM startuper WHERE mail = :email";

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
