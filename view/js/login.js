document.getElementById("showPassword").addEventListener("change", function() {
    var mdpstar = document.getElementById("pass");
    if (this.checked) {
        mdpstar.type = "text";
    } else {
        mdpstar.type = "password";
    }
});

document.getElementById("showPasswordC").addEventListener("change", function() {
    var mdpcap = document.getElementById("passC");
    if (this.checked) {
        mdpcap.type = "text";
    } else {
        mdpcap.type = "password";
    }
});




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