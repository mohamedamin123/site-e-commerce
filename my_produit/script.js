function login() {
    location.href = "../login/login.php";
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
    fetch('recherche.php', {
            method: 'POST',
            body: new URLSearchParams({ search: searchValue }) // Envoyer le terme de recherche dans le corps de la requête
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
    fetch('all_articles.php')
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

// Appel initial pour charger tous les articles au chargement de la page
window.onload = fetchAllArticles;
document.addEventListener('DOMContentLoaded', function() {
    var profileLink = document.getElementById('login');
    if (profileLink) {
        profileLink.addEventListener('click', function() {
            // Rediriger vers profile.php
            window.location.href = '../profile/profile.php?email=<?php echo urlencode($email); ?>';
        });
    }
});