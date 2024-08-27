<?php
// Inclure les fichiers et démarrer la session

include_once '../model/capitalRisque.php';
include_once '../controller/loginController.php';
include_once '../controller/capitalRisqueController.php';
include_once '../model/projet.php';

session_start();
if (isset($_SESSION['capitalRisque'])) {
    $capitalRisque = $_SESSION['capitalRisque'];
}

if(isset($_SESSION['alerteMessage'])){
        
  $alerteMessage = $_SESSION['alerteMessage'];
  if ($alerteMessage == 1) {
      echo "<script>alert('Aucun projet trouvé.');</script>";
      unset($_SESSION['alerteMessage']);
    } 
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexC</title>
    <link rel="stylesheet" href="../view/css/indexC.css">
    <script src="js/indexC.js" defer></script>
</head>






<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

<body>
  <header>
    <div class="company-logo">UPPER</div>
    <nav class="navbar">
      <ul class="nav-items">
        <li class="nav-item"><a href="#" onclick="scrollToSection('listeDesProjets')" class="nav-link">LISTER TOUS LES PROJETS</a></li>
        <li class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" aria-expanded="false">RECHERCHE AVANCEE</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="../controller/rechercheAGR.php">Agriculture</a></li>
            <li><a class="dropdown-item" href="../controller/rechercheIND.php">Industry</a></li>
            <li><a class="dropdown-item" href="../controller/rechercheSER.php">Services</a></li>
            <li><a class="dropdown-item" href="../controller/rechercheEDU.php">Education</a></li>
            <li><a class="dropdown-item" href="../controller/rechercheTEC.php">Technologies</a></li>
            <li><a class="dropdown-item" href="../controller/rechercheOTH.php">Other</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="#" onclick="scrollToSection('editerProjet')" class="nav-link">EDITER UN PROJET</a></li>
        <li class="nav-item"><a href="#" onclick="scrollToSection('achat')" class="nav-link">ACHETER DES ACTIONS</a></li>
        <li class="nav-item"><a href="#" onclick="scrollToSection('mesProjets')" class="nav-link">LISTER MES ACTIONS</a></li>
        <li class="nav-item"><a href="#" onclick="scrollToSection('modifierProfile')" class="nav-link">EDITER LE PROFIL</a></li>
      </ul>
    </nav>



    

    <div class="menu-toggle">
      <i class="bx bx-menu"></i>
      <i class="bx bx-x"></i>
    </div>
  </header>
  <main>
    <!-- HOME SECTION -->
    <section class="container section-1">
      <div class="slogan">
      <h1 class="company-title">HELLO! <?php echo strtoupper($capitalRisque->getNomC()) . "<br>"; ?> WELCOME BACK TO UPPER</h1>
        <h2 class="company-slogan">
        Support small businesses while advancing yours.
        </h2>
      </div>

      
  
      <div class="searchBox">
<form action="../controller/rechercherProjet.php" method="post">
<input class="searchInput"type="text" name="recherche" placeholder="Search">
<button type="submit" class="searchButton" >
    <i class="material-icons">
        search
    </i>
</button>
</div>
</form>



      <div class="home-computer-container">
        <img class="home-computer" src="images/upperC22.png" alt="a computer in dark with shadow" class="home-img">
      </div>
    </section>

    <!-- OFFER SECTION -->
    <section ion class="container section-2">
      <!-- offer 1 -->
      <div class="offer offer-1">
        <img src="images/up3.jpg" alt="company" class="offer-img offer-1-img" >
        <div class="offer-description offer-desc-1">
        <section id="modifierProfile">  
        <h2 class="offer-title">Editer votre profil</h2>
          <div id="modifierCapital" >
  <form action="../controller/modifierCapital.php" method="post">
            
        <label for="nomC">nom</label>
        <input name="nomC" id="nomC" type="text"value="<?php echo isset($capitalRisque) ? $capitalRisque->getNomC() : ''; ?>"><br><br> 
        <label for="prenomC">prenom</label>
        <input name="prenomC" id="prenomC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getPrenomC() : ''; ?>"><br><br>
        <label for="mailC">E-mail</label>
        <input name="mailC" id="mailC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getMailC() : ''; ?>"><br><br>
        <label for="pseudoC">Pseudo</label>
        <input name="pseudoC" id="pseudoC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getPseudoC() : ''; ?>"><br><br>
        <button type="submit" onclick="s_inscrireC()">Confirmer</button>
  </form>
</div>

        </div>
      </div>
      </section>
      <!-- offer 2 -->
      <div class="offer offer-2">
        
        <img src="images/up4.jpg" alt="a opened computer" class="offer-img offer-2-img">
        <div class="offer-description offer-desc-2">
        <section id="listeDesProjets">
          <h2 class="offer-title">Liste des projets disponibles</h2>
          <?php

$stmt = $dbh->prepare("SELECT * FROM projet WHERE nbrActionsAVendre > nbrActionsVendues");
$stmt->execute();
$projets = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo'<div id="listeDesProjets" class="listeDesProjets" >';
echo '<table class="listeProjet">';
echo '<tr><th>Titre</th><th>Description</th><th>Nombre d actions Total</th><th>Nombre d actions Vendues</th><th>Prix par action</th></tr>';
foreach ($projets as $projet) {
echo '<tr>';
echo '<td>' . $projet['titre'] . '</td>';
echo '<td>' . $projet['descriptionProjet'] .'</td>';
echo '<td>' . $projet['nbrActionsAVendre'] . '</td>';
echo '<td>' . $projet['nbrActionsVendues'] . '</td>';
echo '<td>' . $projet['prixAction'] . '</td>';
echo '</tr>';
}
echo '</table>';
echo'</div>';
?>         
        </div>
      </div>

      </section>

 <!-- offer 3 -->
 <div class="offer offer-1">
        <img src="images/up5.jpg" alt="a computer in dark with with white shadow" class="offer-img offer-1-img">
        <div class="offer-description offer-desc-1">
        <section id="editerProjet">
        <h2 class="offer-title">Editer un Projet</h2>
          <div id="modifierCapital" >
  <form action="../controller/modifierCapital.php" method="post">
            
        <label for="nomC">nom</label>
        <input name="nomC" id="nomC" type="text"value="<?php echo isset($capitalRisque) ? $capitalRisque->getNomC() : ''; ?>"><br><br> 
        <label for="prenomC">prenom</label>
        <input name="prenomC" id="prenomC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getPrenomC() : ''; ?>"><br><br>
        <label for="mailC">E-mail</label>
        <input name="mailC" id="mailC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getMailC() : ''; ?>"><br><br>
        <label for="pseudoC">Pseudo</label>
        <input name="pseudoC" id="pseudoC" type="text" value="<?php echo isset($capitalRisque) ? $capitalRisque->getPseudoC() : ''; ?>"><br><br>
        <button type="submit" onclick="s_inscrireC()">Confirmer</button>
  </form>
</div>
        </div>
      </div>
      </section>  

      
     <!-- offer 4 -->
     <div class="offer offer-2">

        <img src="images/up6.jpg" alt="a opened computer" class="offer-img offer-2-img">
        <div class="offer-description offer-desc-2">
        <section id="rechercherProjet"> 
          <h2 class="offer-title">Search Result</h2>
          <div id="rechercherProjet" >

</div>

<section id="RTrecherche"></section>

<?php
// Vérifier si la session projetR est définie et non vide
if (isset($_SESSION['projetR']) && !empty($_SESSION['projetR'])) {
    echo '<div id="tableauRecherche">';
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Titre</th>';
    echo '<th>Description</th>';
    echo '<th>Nombre d\'actions Total</th>';
    echo '<th>Nombre d\'actions Restantes</th>';
    echo '<th>Prix par action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Parcourir chaque objet Projet dans la session projetR
    foreach ($_SESSION['projetR'] as $projet) {
        echo '<tr>';
        echo '<td>' . $projet->getTitre() . '</td>';
        echo '<td>' . $projet->getDescription() . '</td>';
        echo '<td>' . $projet->getNbrActionsAVendre() . '</td>';
        echo '<td>' . ($projet->getNbrActionsAVendre() - $projet->getNbrActionsVendues()) . '</td>';
        echo '<td>' . $projet->getPrixAction() . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else if (isset($_SESSION['alerteMessage'])){
    // Gérer le cas où aucun résultat n'est trouvé dans la session projetR
    echo 'Aucun résultat trouvé.';
}
?>









</div>
        </div>
      </div>

      </section>

    <!-- offer 5 -->
 <div class="offer offer-1">
        <img src="images/up7.jpg" alt="a computer in dark with with white shadow" class="offer-img offer-1-img">
        <div class="offer-description offer-desc-1">
          

        <?php

    $stmt = $dbh->prepare("SELECT * FROM projet WHERE nbrActionsAVendre > nbrActionsVendues");

// Liaison du paramètre


// Exécution de la requête SQL
$stmt->execute();

// Récupération des résultats sous forme de tableau associatif
$projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo'<div id="AchatsDispo" class="AchatsDispo"  >';
echo'<section id="achat" >';
echo'<h2>Achats disponibles</h2>';
echo '<table class="listeProjet">';
echo '<tr><th>Titre</th><th>Description</th><th>Nombre d actions Total</th><th>Nombre d actions Vendues</th><th>Prix par action</th><th>Nobmre d actions à acheter</th><th></th></tr>';
foreach ($projets as $projet) {
  echo '<tr>';
  echo '<td>' . $projet['titre'] . '</td>';
  echo '<td>' . $projet['descriptionProjet'] .'</td>';
  echo '<td>' . $projet['nbrActionsAVendre'] . '</td>';
  echo '<td>' . $projet['nbrActionsVendues'] . '</td>';
  echo '<td>' . $projet['prixAction'] . '</td>';
  echo '<td><input name="ActAchat_' . $projet['id_projet'] . '" id="ActAchat_' . $projet['id_projet'] . '" type="number"></td>';
  echo '<td><button class="ActAchat" data-id="' . $projet['id_projet'] . '">Acheter</button></td>';
  echo '</tr>';
}
echo '</table>';
echo '</div>';
?>

        </div>
      </div>
      </section>
    
 


    <!-- offer 6 -->
    <div class="offer offer-2">
        <img src="images/up8.jpg" alt="a opened computer" class="offer-img offer-2-img">
        <div class="offer-description offer-desc-2">
          

        <?php


// Vérifier si le capital risque est connecté
if (isset($_SESSION['capitalRisque'])) {
    // Récupérer l'ID du capital risque
    $idCapitalRisque = $_SESSION['capitalRisque']->getIdC();

    // Interroger la base de données pour récupérer les projets auxquels participe le capital risque
    $stmt = $dbh->prepare("SELECT p.*, cp.nbrActionsAchetees 
    FROM projet p 
    INNER JOIN capitalrisqueprojet cp ON p.id_projet = cp.idProjet 
    WHERE cp.idCapitalRisque = :idCapitalRisque");    $stmt->bindParam(':idCapitalRisque', $idCapitalRisque);
    $stmt->execute();
    $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<section id="mesProjets">';
  echo '<div  id="tabAchat" >';
    // Afficher les projets
    foreach ($projets as $projet) {
        echo '<h3>' . $projet['titre'] . '</h3>';
        echo '<p>' . $projet['descriptionProjet'] . '</p>';
        echo '<p>Nombre d\'actions possédées : ' . $projet['nbrActionsAchetees'] . '</p>';
        echo '<p>Valeure d\'achat : ' . ($projet['nbrActionsAchetees']* $projet['prixAction']) . '</p>';
        echo '<hr>';
    }
    echo '</div >';
} else {
    echo "Vous n'êtes pas connecté en tant que capital risque.";
}

echo'</section>';
?>

        </div>
      </div>


    </section>
  </main>
  <footer>
    
    </div>
    <div class="container end-footer">
      <div class="copyright">        <p>© 2024 UPPER. Tous droits réservés.</p>
</b></div>
    </div>
  </footer>
</body> 
</html>