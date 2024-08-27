function s_inscrire() {
    let nom = document.getElementById("nom").value;
    let prenom = document.getElementById("prenom").value;
    let cin = document.getElementById("cin").value;
    let mail = document.getElementById("mail").value;
    let nomE = document.getElementById("eName").value; 
    let adresse = document.getElementById("eAdresse").value;
    let n_reg = document.getElementById("n_registre").value;
    let pseudo = document.getElementById("pseudo").value;
    let mdp = document.getElementById("mdp").value;
    let mdp2 = document.getElementById("mdpVer").value;

    let regexNom = /^[a-zA-Z]{2,}$/; 
    let regexCin = /^\d{8}$/;
    let regexMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let regexNregistre = /^[A-Z]\d{10}$/; 
    let regexmdp = /^(?=.*[a-zA-Z0-9])(?=.*[$#])[a-zA-Z0-9$#]{8,}$/; 

   
    let erreurs = [];

    if (!regexNom.test(nom)) {
        erreurs.push("Nom invalide");
    }

    if(!regexCin.test(cin))
    {
        erreurs.push("n° CIN invalide");
    }

    if (!regexMail.test(mail)) {
        erreurs.push("Adresse e-mail invalide");
    }

    if (!regexNregistre.test(n_reg)) {
        erreurs.push("Numéro de registre invalide");
    }

    
    if (!regexmdp.test(mdp)) {
        erreurs.push("Mot de passe invalide");
    } else if (mdp !== mdp2) {
        erreurs.push("Les mots de passe ne correspondent pas");
    }

    
    if (erreurs.length > 0) {
        alert("Erreurs :\n" + erreurs.join("\n"));
    } else {
        window.location.href = "index.html";
    }
}





function s_inscrireC()
{
    let nomC = document.getElementById("nomC").value;
    let prenomC = document.getElementById("prenomC").value;
    let cinC = document.getElementById("cinC").value;
    let mailC = document.getElementById("mailC").value;
    let pseudoC = document.getElementById("pseudoC").value;
    let mdpC = document.getElementById("mdpC").value;
    let mdp2C = document.getElementById("mdpVerC").value;



// Expressions régulières pour la validation
let regexNomC = /^[a-zA-Z]{2,}$/; // Lettres uniquement, au moins 2 caractères
let regexCinC = /^\d{8}$/; // 8 chiffres
let regexMailC = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Format d'adresse e-mail
let regexmdpC = /^(?=.*[a-zA-Z0-9])(?=.*[$#])[a-zA-Z0-9$#]{8,}$/; // Au moins 8 caractères, lettres/chiffres, terminant par $ ou #

// Contrôle de saisie
let erreurs = [];

if (!regexNomC.test(nomC)) {
    erreurs.push("Nom invalide");
}

if (!regexMailC.test(mailC)) {
    erreurs.push("Adresse e-mail invalide");
}

if(!regexCinC.test(cinC))
    {
        erreurs.push("n° CIN invalide");
    }


if (!regexmdpC.test(mdpC)) {
    erreurs.push("Mot de passe invalide");
} else if (mdpC !== mdp2C) {
    erreurs.push("Les mots de passe ne correspondent pas");
}

// Affichage des erreurs
if (erreurs.length > 0) {
    alert("Erreurs :\n" + erreurs.join("\n"));
}
else {
    window.location.href = "index.html";
}

}



function deplacerCarreLeft() {
    var carré = document.getElementById("carre");
    
    carré.style.transform = carre.style.borderRadius = "0 15px 15px 0";
    var nouvellePositionLeft = 500;

    carré.style.transform = "translate(" + nouvellePositionLeft + "px";
}

function deplacerCarreRight() {
    var carré = document.getElementById("carre");
   
    
    var nouvellePositionRight =0;
    
    carré.style.transform = "translate(" + nouvellePositionRight + "px";

    carré.style.transform = carre.style.borderRadius = "15px 0 0 15px";
}


document.getElementById("showPassword").addEventListener("change", function() {
    var mdpstar = document.getElementById("mdp");
    var mdpstar2 = document.getElementById("mdpVer");
    if (this.checked) {
        mdpstar.type = "text";
        mdpstar2.type = "text";
    } else {
        mdpstar.type = "password";
        mdpstar2.type = "password";
    }
});

document.getElementById("showPasswordC").addEventListener("change", function() {
    var mdpcap = document.getElementById("mdpC");
    var mdpcap2 = document.getElementById("mdpVerC");
    if (this.checked) {
        mdpcap.type = "text";
        mdpcap2.type = "text";
    } else {
        mdpcap.type = "password";
        mdpcap2.type = "password";
    }
});


const burger = document.querySelector('.burger');
const navLinks = document.querySelector('.nav-links');

burger.addEventListener('click', () => {
    navLinks.classList.toggle('nav-active');
    burger.classList.toggle('toggle');
});

