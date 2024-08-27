function toggleForm() {
  var lister = document.getElementById("listeDesProjets");
  if (lister.style.display === "none") {
      lister.style.display = "block";
      setTimeout(function() {
          lister.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      lister.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          lister.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }
}


function toggleForm2() {
  var recherche = document.getElementById("rechercherProjet");
  var tabRes = document.getElementById("tableauRecherche");

  if (tabRes.style.display === "none") {
      tabRes.style.display = "block";
      setTimeout(function() {
          tabRes.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      tabRes.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          tabRes.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }

  if (recherche.style.display === "none") {
      recherche.style.display = "block";
      setTimeout(function() {
          recherche.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      recherche.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          recherche.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }
}



function toggleForm4() {
  var tabAchat = document.getElementById("AchatsDispo");

  if (tabAchat.style.display === "none") {
      tabAchat.style.display = "block";
      setTimeout(function() {
          tabAchat.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      tabAchat.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          tabAchat.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }
}

function toggleForm5() {
  var tabAchat = document.getElementById("tabAchat");

  if (tabAchat.style.display === "none") {
      tabAchat.style.display = "block";
      setTimeout(function() {
          tabAchat.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      tabAchat.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          tabAchat.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }
}

function toggleForm6() {
  var modifierCapital = document.getElementById("modifierCapital");

  if (modifierCapital.style.display === "none") {
      modifierCapital.style.display = "block";
      setTimeout(function() {
          modifierCapital.style.opacity = "1"; // Transition vers l'opacité complète
      }, 0.1); // Délai pour déclencher la transition
  } else {
      modifierCapital.style.opacity = "0"; // Commencer la transition de fondu
      setTimeout(function() {
          modifierCapital.style.display = "none"; // Masquer l'élément après la transition
      }, 500); // Attendre la fin de la transition pour masquer l'élément
  }
}









  document.addEventListener('DOMContentLoaded', function() {
    var btnsAcheter = document.querySelectorAll('.ActAchat');

    btnsAcheter.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var idProjet = btn.getAttribute('data-id');
            
            var nbAct = document.getElementById('ActAchat_' + idProjet).value;

            // Rediriger l'utilisateur vers le tableau d'achat avec l'identifiant du projet et la valeur d'achat
            window.location.href = '../controller/acheterProjet.php?id=' + idProjet + '&nbAct=' + nbAct;
        });
    });
});







'use strict'

const menuToggle = document.querySelector('.menu-toggle');
const bxMenu = document.querySelector('.bx-menu');
const bxX = document.querySelector('.bx-x');

const navBar = document.querySelector('.navbar');

// --- open menu ---

bxMenu.addEventListener('click', (e)=> {
    if(e.target.classList.contains('bx-menu')){
        navBar.classList.add('show-navbar');
        bxMenu.classList.add('hide-bx');
        bxX.classList.add('show-bx');
    }
})

// --- close menu ---

bxX.addEventListener('click', (e)=> {
    if(e.target.classList.contains('bx-x')){
        navBar.classList.remove('show-navbar');
        bxMenu.classList.remove('hide-bx');
        bxX.classList.remove('show-bx');
    }
})





function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}


