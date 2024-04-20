
function valider() {

    nb=true;

    let nom = document.getElementById("nom").value.trim();
    let prenom = document.getElementById("prenom").value.trim();
    let email = document.getElementById("email").value.trim();
    let tel = document.getElementById("tel").value.trim();
    let date = document.getElementById("date").value.trim();

    let nomE = document.getElementById("nomError");
    let prenomE = document.getElementById("prenomError");
    let telE = document.getElementById("telError");
    let dateE = document.getElementById("dateError");

    nom = nom.charAt(0).toUpperCase() + nom.slice(1);
    prenom = prenom.charAt(0).toUpperCase() + prenom.slice(1);

    // Réinitialiser les messages d'erreur
    nomE.textContent = "";
    prenomE.textContent = "";
    telE.textContent = "";
    dateE.textContent = "";

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
    if (tel == '') {
        telE.textContent = "Saisissez votre numéro de téléphone";
        nb=false;
    } else if (tel.length != 8) {
        telE.textContent = "Votre numéro de téléphone est incorrect";
        nb=false;
    }
    if(nb) {
        document.getElementById('myForm').submit();

    }
}

function change() {

}

function uploadAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('avatar').setAttribute('src', e.target.result);
            document.getElementById('avatar_form').submit(); // Envoie automatique du formulaire
        };
        reader.readAsDataURL(input.files[0]);
        document.getElementById('myForm').submit();

    }
}
function retour() {
    location.href="../home/index.php";
}

