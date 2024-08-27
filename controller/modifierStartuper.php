<?php
// Inclure le fichier de connexion à la base de données
include_once '../model/startuper.php';
include_once 'connexion.php';

session_start();

// Vérifier si $startuper est défini dans la session
if (isset($_SESSION['startuper'])) 
    $startuper = $_SESSION['startuper'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $nomEps = $_POST['eName'];
    $adresseEps = $_POST['eAdresse'];
    $regEps = $_POST['n_registre'];
    $pseudo = $_POST['pseudo'];
    $cin = $startuper->getCin();
    $tmp_name = $_FILES["photo"]["tmp_name"];
    $dbh = new PDO("mysql:host=localhost;dbname=pweb", "root", "");

    
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
        $img_data = file_get_contents($tmp_name); 
    } else {
        echo "Erreur : Aucune photo sélectionnée.";
        exit;
    }


    $stmt = $dbh->prepare("UPDATE startuper 
                       SET nom = :nom, 
                           prenom = :prenom, 
                           mail = :mail, 
                           nomEps = :nomEps, 
                           adresseEps = :adresseEps, 
                           regCom = :regEps, 
                           pseudo = :pseudo ,
                            photo = :photo
                       WHERE cin = :cin");

    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':nomEps', $nomEps);
    $stmt->bindParam(':adresseEps', $adresseEps);
    $stmt->bindParam(':regEps', $regEps);
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':photo', $img_data, PDO::PARAM_LOB); 
    $stmt->bindParam(':cin', $cin);

    if ($stmt->execute()) {
        echo "Modification réussie !";
        $_SESSION['startuper']->setNom($nom);
    $_SESSION['startuper']->setPrenom($prenom);
    $_SESSION['startuper']->setMail($mail);
    $_SESSION['startuper']->setNomEps($nomEps);
    $_SESSION['startuper']->setAdresseEps($adresseEps);
    $_SESSION['startuper']->setRegEps($regEps);
    $_SESSION['startuper']->setPseudo($pseudo);
    $_SESSION['startuper']->setPhoto($img_data);
        header("Location: ../view/index.php");
    } else {
        // Afficher un message en cas d'erreur
        echo "Erreur lors de modification.";
    }
    
exit;


} 








?>


