<?php

$host = "localhost";   
$dbname = "pweb";
$username = "root"; 
$password = ""; 
try {
    
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher l'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
