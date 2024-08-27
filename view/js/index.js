
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ behavior: 'smooth' });
            }
        }


        
function toggleForm() {
  var formulaire = document.getElementById("formModStart");
  var liste = document.getElementById("editerProjet");
  var tableau = document.getElementById("listeDesProjets");
  var formulaireAjout = document.getElementById("ajouterProjet");

  formulaireAjout.style.display = "none";
  tableau.style.display = "none";
  liste.style.display = "none";

  if (formulaire.style.display === "none") {
      formulaire.style.display = "block";
      setTimeout(function() {
          formulaire.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      formulaire.style.opacity = "0"; // Commencer la transition de fondu
      
  }
}



document.addEventListener('DOMContentLoaded', function() {
    var btnsEditer = document.querySelectorAll('.btnEditer');

    btnsEditer.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var idProjet = btn.getAttribute('data-id');

            window.location.href = '../controller/editionProjet.php?id=' + idProjet;
        });
    });
});



document.addEventListener('DOMContentLoaded', function() {
    // Récupération des boutons portants la classe "btnEditer"
    var btnsEditer = document.querySelectorAll('.btnSupprimer');

    // Ajouter un écouteur d'événements à chaque bouton
    btnsEditer.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Récupération du data id associé
            var idProjet = btn.getAttribute('data-id');

            // Rediriger l'utilisateur le tableau + l'identifiant du projet dans le lien
            window.location.href = '../controller/SuppressionProjet.php?id=' + idProjet;
        });
    });
});







function checkUrlForSection() {
    const currentHash = window.location.hash;

    // Vérifier si l'URL contient "#supprimer"
    if (currentHash === '#supprimer') {
        // Appeler scrollToSection() avec l'id de la section à faire défiler
        scrollToSection('supprimer');
    }
}

// Écouter l'événement hashchange pour détecter les changements d'ancre dans l'URL
window.addEventListener('hashchange', checkUrlForSection);

// Appeler checkUrlForSection() au chargement initial de la page
window.onload = checkUrlForSection;






document.addEventListener('DOMContentLoaded', () => {
    const navbarLinks = document.querySelectorAll('.navbar a');

    navbarLinks.forEach(anchor => {
        anchor.addEventListener('click', function(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                // Calculer la position relative de la section par rapport au haut de la page
                const offsetTop = targetSection.getBoundingClientRect().top;
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                // Faire défiler de manière fluide vers la section cible
                window.scrollTo({
                    top: offsetTop + scrollTop,
                    behavior: 'smooth' // Ajouter une transition fluide
                });
            }
        });
    });
});





document.addEventListener('DOMContentLoaded', function() {
    var btnsDetails = document.querySelectorAll('.voir-details-btn');

    // Ajouter un écouteur d'événements à chaque bouton
    btnsDetails.forEach(function(btn) {
        btn.addEventListener('click', function() {
            // Récupération du data id associé
            var idProjet = btn.getAttribute('data-id');

            var url = '../controller/detailsAcheteur.php?id=' + idProjet;
            window.open(url, '_blank');
        });
    });
});