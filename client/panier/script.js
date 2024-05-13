
function login() {
    location.href = "../../connexion/login/login.php";
}

document.addEventListener('DOMContentLoaded', function () {
    var profileLink = document.getElementById('login');
    if (profileLink) {
        profileLink.addEventListener('click', function () {
            // Rediriger vers profile.php
            window.location.href = '../profile/profile.php?email=<?php echo urlencode($email); ?>';
        });
    }
});

function uploadAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('avatar').setAttribute('src', e.target.result);
            document.getElementById('avatar_form').submit(); // Envoie automatique du formulaire
        };
        reader.readAsDataURL(input.files[0]);
        document.getElementById('myForm').submit();

    }
}

function traiter(index) {
    document.getElementById('myForm' + index).submit();
}
function traiter2(index,id) {
    var quantite = prompt("Entrez la quantité à ajouter au panier:", "1");

    // Vérifier si l'utilisateur a cliqué sur Annuler ou n'a pas saisi de valeur
    if (quantite === null || quantite === "") {
        return; // Sortir de la fonction si l'utilisateur a annulé ou n'a pas saisi de valeur
    }

    // Convertir la quantité en nombre entier
    quantite = parseInt(quantite);

    // Vérifier si la quantité est valide
    if (isNaN(quantite) || quantite <= 0) {
        alert("Veuillez entrer une quantité valide.");
        return; // Sortir de la fonction si la quantité n'est pas valide
    }

    // Créer un élément d'entrée hidden pour stocker la quantité
    var inputQuantite = document.createElement('input');
    inputQuantite.type = 'hidden';
    inputQuantite.name = 'quantite'; // Nom du champ dans le formulaire
    inputQuantite.value = quantite; // Valeur de la quantité saisie

    // Créer un élément d'entrée hidden pour stocker l'identifiant de l'article
    var inputIdArticle = document.createElement('input');
    inputIdArticle.type = 'hidden';
    inputIdArticle.name = 'id'; // Nom du champ dans le formulaire
    inputIdArticle.value = index; // Utiliser l'identifiant de l'article passé en argument

    var inputIdArticle2 = document.createElement('input');
    inputIdArticle2.type = 'hidden';
    inputIdArticle2.name = 'idArt'; // Nom du champ dans le formulaire
    inputIdArticle2.value = id; // Utiliser l'identifiant de l'article passé en argument

    // Créer le formulaire et l'envoyer
    var form = document.createElement('form');
    form.id = 'myForm2' + index;
    form.method = 'post';
    form.action = 'modifierPanier.php';
    form.appendChild(inputQuantite);
    form.appendChild(inputIdArticle);
    form.appendChild(inputIdArticle2);

    document.body.appendChild(form);
    form.submit();
}

