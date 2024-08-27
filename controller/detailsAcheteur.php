<?php
// Inclure le fichier de connexion à la base de données
include_once 'connexion.php';

if(isset($_GET['id'])) {
    $idProjet = $_GET['id'];

    // Requête SQL pour récupérer les détails du capital risque ayant acheté des actions du projet spécifié
    $sql = "SELECT cr.nom, cr.prenom, cr.mail, cr.cin, cr.pseudo, cr.mdp, crp.nbrActionsAchetees
            FROM capitalrisqueprojet crp
            INNER JOIN capitalrisque cr ON crp.idCapitalRisque = cr.id
            WHERE crp.idProjet = :idProjet";

    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':idProjet', $idProjet);
    
    if ($stmt->execute()) {
        $acheteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($acheteurs)) {
            foreach ($acheteurs as $acheteur) {
                echo 'Nom : ' . $acheteur['nom'] . '<br>';
                echo 'Prénom : ' . $acheteur['prenom'] . '<br>';
                echo 'Email : ' . $acheteur['mail'] . '<br>';
                echo 'Nombre d\'actions achetées : ' . $acheteur['nbrActionsAchetees'] . '<br>';
                echo '<hr>';
            }
        } else {
            echo 'Aucun acheteur trouvé pour ce projet.';
        }
    } else {
        echo 'Erreur lors de l\'exécution de la requête.';
    }
} else {
    echo 'Identifiant du projet non spécifié.';
}
?>
