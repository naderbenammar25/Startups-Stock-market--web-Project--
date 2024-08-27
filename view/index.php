<?php
// Include necessary files and start session

include_once '../model/startuper.php';
include_once '../controller/loginController.php';
include_once '../controller/startuperController.php';
include_once '../model/projet.php';
include_once '../controller/connexion.php';

// Start session
session_start();

// Check if $startuper is defined in the session
if (isset($_SESSION['startuper'])) {
    // Retrieve $startuper from the session
    $startuper = $_SESSION['startuper'];
    $idStartuper = $startuper->getId();
} else {
    // Display an error message if $startuper is not defined
    echo "No user is currently logged in.";
}

if ($startuper->getPhoto() !== null) {
$photoData = base64_encode($startuper->getPhoto());
$imgSrc = 'data:image/jpeg;base64,' . $photoData;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../view/css/index.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/index.js" defer></script>
</head>





<body>
<section id="home"></section>

    <div id="title" class="slide header">
    <div class="navbar" id="navbar">
  <ul>
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>
  </ul>


</div>
<a class="logout" href="../view/login.html">Logout</a>

        <?php echo '<div class="nomPrenom">';
        echo $startuper->getNom() . " " ;
        echo $startuper->getPrenom();
        echo '</div>';?>
        <h1>Welcome Back to UPPER</h1>
        
        

            
        
        
        
        <?php
        echo '<div class="profile">';
        echo '<div class="photoContainer">';
        echo '<img src="' . $imgSrc . '" alt="Profile Photo" class="photoProfile">';
        echo '</div>';
        
        echo '</div>';
        ?>
        

      </div>
      
      
      <div id="slide1" class="slide">
      <ul id="menu_slide">
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>

  </ul>
        <div class="title">
          <h1>Edit Your Account</h1>
          <section  id="profile"> 
          <div id="formModStart" >
        <form action="../controller/modifierStartuper.php" method="post" enctype="multipart/form-data">
            <label for="nom">Name</label>
            <input name="nom" id="nom" type="text" value="<?php echo isset($startuper) ? $startuper->getNom() : ''; ?>"><br>
            <label for="prenom">First Name</label>
            <input name="prenom" id="prenom" type="text" value="<?php echo isset($startuper) ? $startuper->getPrenom() : ''; ?>"><br>
            <label for="mail">Email</label>
            <input name="mail" id="mail" type="text" value="<?php echo isset($startuper) ? $startuper->getMail() : ''; ?>"><br>
            <label for="eName">Company Name</label>      
            <input name="eName" id="eName" type="text" value="<?php echo isset($startuper) ? $startuper->getNomEps() : ''; ?>"><br>
            <label for="eAdresse">Company Address</label>       
            <input name="eAdresse" id="eAdresse" type="text" value="<?php echo isset($startuper) ? $startuper->getAdresseEps() : ''; ?>"><br>
            <label for="photo">Photo :</label>
            <input type="file" id="photo" name="photo"><br>
            <label for="pseudo">Username</label>
            <input name="pseudo" id="pseudo" type="text" value="<?php echo isset($startuper) ? $startuper->getPseudo() : ''; ?>">
            <button type="submit" onclick="s_inscrire()">Confirm</button>
        </form>
    </div>
    </section>       
   </div>
      </div>
      


      
      <div id="slide2" class="slide">
      <ul id="menu_slide">
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>


  </ul>
        <div class="ajouterProjet">
        <div class="title">
          <h1>Add a project</h1>
          <section id="projects">
          <div id="ajouterProjet" >
        <form action="../controller/ajouterProjet.php" method="post">
            
            <label for="titre">Project Title</label>
            <input name="titre" id="titre" type="text"><br>
            <label for="categorie">Category</label>
    <select name="categorie" id="categorie">
        <option value="Agriculture">Agriculture</option>
        <option value="Industry">Industry</option>
        <option value="Services">Services</option>
        <option value="Education">Education</option>
        <option value="Technologies">Technologies</option>
        <option value="Other">Other</option>
    </select><br>
            <label for="descriptionProjet">Description</label>
            <textarea name="descriptionProjet" id="descriptionProjet"></textarea><br>
            <label for="actAV">Number of Actions for Sale</label>
            <input name="actAV" id="actAV" type="number"><br>
            <label for="actV">Number of Actions Sold</label>
            <input name="actV" id="actV" type="number"><br>
            <label for="prixAct">Price per Action</label>
            <input name="prixAct" id="prixAct" type="number">
            <button type="submit">Add</button>
        </form>
    </div>
    <section id="projects">
        </div>
        </div>
        <img src="images/upper5.jpg">
        <img src="images/upper4.jpg"> 
      </div>
      </section>
      



      
      <div id="slide3" class="slide">
      <ul id="menu_slide">
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>

  </ul>
        <div class="title">
            
          <h1>Edit Project</h1>
          <section id="edit-projects">
          <div id="editerProjet">
            
        <h2>Please select a project to edit</h2>
        <table class="tableEdit">
            <tr><th>Titles</th></tr>
            <?php

            $stmt = $dbh->prepare("SELECT * FROM projet WHERE idStartuper = :idStartuper");

        // Bind parameter
        $stmt->bindParam(':idStartuper', $idStartuper);

        // Execute SQL query
        $stmt->execute();

        // Fetch results as an associative array
        $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($projets as $projet) {
            echo '<td>';
            echo $projet['titre'] . '<p></p><button class="btnEditer" data-id="' . $projet['id_projet'] . '">Edit</button>';
            echo '</td>';
        }
            ?>
        </table>
    </div>        
    </section>
    <div id="edition"> 
        <?php
        if (isset($_SESSION['projet'])) {
            $projet = $_SESSION['projet'];

            // retrieve startuper's id
            $idProjet = $projet->getIdProjet();
        }
        ?>
        <form action="../controller/modifierProjet.php" method="post">
            
            <label for="titre">Project Title</label>
            <input name="titre" id="titre" type="text" value="<?php echo isset($projet) ? htmlspecialchars($projet->getTitre()) : ''; ?>">
            <label for="categorie">Category</label>
            <select name="categorie" id="categorie">
            <option value="Agriculture">Agriculture</option>
            <option value="Industry">Industry</option>
            <option value="Services">Services</option>
            <option value="Education">Education</option>
            <option value="Technologies">Technologies</option>
            <option value="Other">Other</option>
            </select><br>
            <label for="descriptionProjet">Description</label>
            <textarea name="descriptionProjet" id="descriptionProjet"><?php echo isset($projet) ? $projet->getDescription() : ''; ?></textarea><br>
            <label for="actAV">Number of Actions for Sale</label>
            <input name="actAV" id="actAV" type="number" value="<?php echo isset($projet) ? $projet->getNbrActionsAVendre() : ''; ?>"><br>
            <label for="prixAct">Price per Action</label>
            <input name="prixAct" id="prixAct" type="number" value="<?php echo isset($projet) ? $projet->getPrixAction() : ''; ?>"> 
            <button type="submit">Confirm changes</button>
        </form>
    </div>
    
</div>
      </div>
      



      
      <div id="slide5" class="slide header">
      <ul id="menu_slide">
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>

  </ul>
        
      <?php
        $stmt = $dbh->prepare("SELECT * FROM projet WHERE idStartuper = :idStartuper");

        // Bind parameter
        $stmt->bindParam(':idStartuper', $idStartuper);

        // Execute SQL query
        $stmt->execute();

        // Fetch results as an associative array
        $projets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display projects in an HTML table
        echo '<section id="add-project">';
        echo '<div id="listeDesProjets" class="listeDesProjets">';
        echo '<h2>Your Projects</h2>';
        echo '<table class="listeProjet">';
        echo '<tr><th>Title</th><th>category</th><th>Description</th><th>Number of Actions for Sale</th><th>Number of Actions Sold</th><th>Remaining Actions</th><th>Price per Action</th></tr>';
        foreach ($projets as $projet) {
            echo '<tr>';
            echo '<td>' . $projet['titre'] . '</td>';
            echo '<td>' . $projet['categorie'] .'</td>';
            echo '<td>' . $projet['descriptionProjet'] .'</td>';
            echo '<td>' . $projet['nbrActionsAVendre'] . '</td>';
            echo '<td>' . $projet['nbrActionsVendues'] . '<button class="voir-details-btn" data-id="' . $projet['id_projet'] . '">Voir détails</button>' . '</td>';
            echo '<td>' . ($projet['nbrActionsAVendre'] - $projet['nbrActionsVendues']) . '</td>';
            echo '<td>' . $projet['prixAction'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    ?>
      
      </div>

      </section>



      <div id="slide1" class="slide">
        <section id="supprimer"></section>
      <ul id="menu_slide">
            <a href="#" onclick="scrollToSection('profile')">Edit Profile</a>
            <a href="#" onclick="scrollToSection('add-project')">List Projects</a>
            <a href="#" onclick="scrollToSection('edit-projects')">Edit Your Projects</a>
            <a href="#" onclick="scrollToSection('projects')">Add a Project</a>
            <a href="#" onclick="scrollToSection('supprimer')">Delete a Project</a>

  </ul>
        <div class="title">
          <h1>Select a project to delete</h1>
          <section  id="profile"> 
          
          <?php

$stmt = $dbh->prepare("SELECT * FROM projet WHERE idStartuper = :idStartuper");

$stmt->bindParam(':idStartuper', $idStartuper);

$stmt->execute();

$projets = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo '<table>';

foreach ($projets as $projet) {
    echo '<tr>'; 
    echo '<td>';
    echo $projet['titre']; 
    echo '</td>';
    echo '<td>';
    echo '<button class="btnSupprimer" data-id="' . $projet['id_projet'] . '">Delete</button>'; // Bouton "delete" avec attribut data-id contenant l'identifiant du projet
    echo '</td>';
    echo '</tr>'; 
}

// Fin du tableau
echo '</table>';
if (isset($_SESSION['delete_success'])) {
    echo '<div class="success-message">' . $_SESSION['delete_success'] . '</div>';}
if (isset($_SESSION['delete_error'])) {
    echo '<div class="error-message">' . $_SESSION['delete_error'] . '</div>';
    unset($_SESSION['delete_error']);}
?>

    </section>       
   </div>
      </div>




      <div id="slide4" class="slide header">
          <h1>
"Startups are like a canvas waiting for an artist's brushstroke. Each stroke represents a new idea, a bold vision, and a relentless pursuit of innovation in a world filled with possibility."</h1>

        <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <p>© 2024 UPPER. All rights reserved.</p>
                <ul class="footer-links">
                    <a href="#" onclick="scrollToSection('home')">Home</a>
                    
                </ul>
            </div>
        </div>
    </footer>

      </div>
 
</body>
</html>