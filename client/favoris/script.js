
function login() {
    location.href = "../../connexion/login/login.php";
}
document.addEventListener('DOMContentLoaded', function() {
    var profileLink = document.getElementById('login');
    if (profileLink) {
        profileLink.addEventListener('click', function() {
            // Rediriger vers profile.php
            window.location.href = '../profile/profile.php?email=<?php echo urlencode($email); ?>';
        });
    }
});

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

const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

// Fonction pour mettre à jour les résultats de la recherche
function updateSearchResults() {
    const searchValue = searchInput.value.trim();
    // Si la recherche est vide, afficher tous les articles
    if (searchValue === '') {
        fetchAllArticles();
        return; // Sortie de la fonction
    }

    // Effectuer une requête AJAX pour récupérer les résultats de la recherche
    fetch('search.php', {
            method: 'POST',
            body: new FormData(searchForm) // Soumettre le formulaire de recherche
        })
        .then(response => response.text())
        .then(data => {
            // Mettre à jour la section des résultats de la recherche avec les données récupérées
            searchResults.innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des résultats de recherche :', error);
        });
}

// Fonction pour récupérer tous les articles
function fetchAllArticles() {
    // Effectuer une requête AJAX pour récupérer tous les articles
    fetch('all_favoris.php')
        .then(response => response.text())
        .then(data => {
            // Mettre à jour la section des résultats de la recherche avec tous les articles
            searchResults.innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors de la récupération de tous les articles :', error);
        });
}

// Écouteur d'événements sur la saisie dans le champ de recherche
searchInput.addEventListener('input', function() {
    updateSearchResults();
});


window.onload = function() {
    // Appel initial pour charger tous les articles au chargement de la page
    fetchAllArticles();
};

document.addEventListener('DOMContentLoaded', function() {
    var profileLink = document.getElementById('login');
    if (profileLink) {
        profileLink.addEventListener('click', function() {
            // Rediriger vers profile.php
            window.location.href = '../profile/profile.php?email=<?php echo urlencode($email); ?>';
        });
    }
});

function showSelectedAvatar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
            // Mettre à jour l'image avec la photo choisie
            document.getElementById('avatar').src = e.target.result;
        }
        
        reader.readAsDataURL(input.files[0]); // Lire l'image en tant que Data URL
    }
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



function ajouterAuPanier(idArticle) {
    // Afficher une boîte de dialogue pour saisir la quantité
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
    inputIdArticle.value = idArticle; // Utiliser l'identifiant de l'article passé en argument

    // Ajouter les éléments input au formulaire
    var form = document.getElementById('ajouterPanierForm');
    form.appendChild(inputQuantite);
    form.appendChild(inputIdArticle);

    // Soumettre le formulaire
    form.submit();
}