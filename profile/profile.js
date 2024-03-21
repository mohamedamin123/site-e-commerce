
function valider() {
    let nom = document.getElementById("typeNom").value.trim().harAt(0).toUpperCase();
    let prenom = document.getElementById("typePrenom").value.trim().charAt(0).toUpperCase();
    let email = document.getElementById("typeEmail").value.trim();
    let tel = document.getElementById("typeTel").value.trim();
    let date = document.getElementById("typeDate").value.trim();

    let nomE = document.getElementById("nomError");
    let prenomE = document.getElementById("prenomError");
    let telE = document.getElementById("telError");
    let dateE = document.getElementById("dateError");

    // Réinitialiser les messages d'erreur
    nomE.textContent = "";
    prenomE.textContent = "";
    telE.textContent = "";
    dateE.textContent = "";

    if (nom == '') {
        nomE.textContent = "Saisissez votre nom";
    }
    if (prenom == '') {
        prenomE.textContent = "Saisissez votre prénom";
    }
    if (date == '') {
        dateE.textContent = "Saisissez votre date de naissance";
    }
    if (tel == '') {
        telE.textContent = "Saisissez votre numéro de téléphone";
    } else if (tel.length != 8) {
        telE.textContent = "Votre numéro de téléphone est incorrect";

    }
}
