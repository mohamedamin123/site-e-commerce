let showPasswordIcon = document.getElementById("showPassword");
let hidePasswordIcon = document.getElementById("hidePassword");
let passwordInput = document.getElementById("typePass"); 




showPasswordIcon.addEventListener("click", function() {
    showPasswordIcon.style.display = "none";
    hidePasswordIcon.style.display = "block";
    passwordInput.type = "password";
});

hidePasswordIcon.addEventListener("click", function() {
    hidePasswordIcon.style.display = "none";
    showPasswordIcon.style.display = "block";
    passwordInput.type = "text";
});

function signup() {
    location.href="../login/login.php";
}

function valider() {
    nb=true;
    let nom = document.getElementById("typeNom").value.trim();
    let prenom = document.getElementById("typePrenom").value.trim();
    let email = document.getElementById("typeEmail").value.trim();
    let tel = document.getElementById("typeTel").value.trim();
    let date = document.getElementById("typeDate").value.trim();
    let pass = document.getElementById("typePass").value.trim();


    let nomE = document.getElementById("nomError");
    let prenomE = document.getElementById("prenomError");
    let telE = document.getElementById("telError");
    let dateE = document.getElementById("dateError");
    let emailE = document.getElementById("emailError");
    let passE = document.getElementById("passError");

    nom = nom.charAt(0).toUpperCase() + nom.slice(1);
    prenom = prenom.charAt(0).toUpperCase() + prenom.slice(1);

    // Réinitialiser les messages d'erreur
    nomE.textContent = "";
    prenomE.textContent = "";
    telE.textContent = "";
    dateE.textContent = "";
    emailE.textContent = "";
    passE.textContent = "";


    if (nom == '') {
        nomE.textContent = "Saisissez votre nom";
        nb=false;
    }
    if (prenom == '') {
        prenomE.textContent = "Saisissez votre prénom";
        nb=false;
    }
    if (date == '') {
        dateE.textContent = "Saisissez votre date de naissance";
        nb=false;
    }
    if (email == '') {
        emailE.textContent = "Saisissez votre email";
        nb=false;
    }    else if (!/@/.test(email)) {
        emailE.textContent = "Votre email incorrect";
        nb=false;
    }
    if (tel == '') {
        telE.textContent = "Saisissez votre numéro de téléphone";
        nb=false;
    } else if (tel.length != 8) {
        telE.textContent = "Votre numéro de téléphone est incorrect";
        nb=false;
    }

    if(pass=='') {
        passE.textContent = "Saisir votre mot de passe";
        nb=false;
    }
    else if(pass.length < 8) {
        passE.textContent = "Le mot de passe doit contenir au moins 8 caractères.";
        nb=false;
    } else if (!/[A-Z]/.test(pass)) {
        passE.textContent = "Le mot de passe doit contenir au moins une lettre majuscule.";
        nb=false;
    } else if (!/\d/.test(pass)) {
        passE.textContent = "Le mot de passe doit contenir au moins un chiffre.";
        nb=false;
    }

    if(nb) {
        document.getElementById('myForm').submit();
    }
}
