// Définir une variable pour le formulaire de recherche
const searchForm = document.getElementById('searchForm');
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

// Fonction pour mettre à jour les résultats de la recherche
function updateSearchResults() {
    const searchValue = searchInput.value.trim();
    // Si la recherche est vide, afficher tous les articles
    if (searchValue === '') {
        fetchAllACLient();
        return; // Sortie de la fonction
    }

    // Effectuer une requête AJAX pour récupérer les résultats de la recherche
    fetch('search.php', {
            method: 'POST',
            body: new FormData(searchForm) // Utilisation du formulaire de recherche pour envoyer les données
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
function fetchAllACLient() {
    // Effectuer une requête AJAX pour récupérer tous les articles
    fetch('all_categories.php')
        .then(response => response.text())
        .then(data => {
            // Mettre à jour la section des résultats de la recherche avec tous les articles
            searchResults.innerHTML = data;
        })
        .catch(error => {
            console.error('Erreur lors de la récupération de tous les clients :', error);
        });
}

// Écouteur d'événements sur la saisie dans le champ de recherche
searchInput.addEventListener('input', function() {
    updateSearchResults();
});

// Appel initial pour charger tous les articles au chargement de la page
window.onload = function() {
    fetchAllACLient();
};

// Fonction pour modifier le statut de l'utilisateur
function modifierUser(user) {
    if (user.statut === 0) {
        // Code to handle if user status is 0
        // For example, change the status text and perform relevant actions
        document.getElementById('userStatusText').innerText = "Bloquer";
    } else if (user.statut === 1) {
        // Code to handle if user status is 1
        // For example, change the status text and perform relevant actions
        document.getElementById('userStatusText').innerText = "Activer";
    }
}

// Fonction pour retourner à la page d'accueil de l'administrateur
function retour() {
    location.href = "../../home/adminHome.php";
}
function ajouter() {
    location.href='../ajouter/ajouter.php';
}