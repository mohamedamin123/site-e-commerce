<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../../bd/connect.php');
    require_once('../requets.php');


    // Valeur de recherche saisie par l'utilisateur
    $search = $_POST['search'];
    $articles = selectRecherche($db, $search);

    $produit=connect($db);


    echo '<div class="list">';
    echo '<div class="admin-icon-container">';
    foreach ($articles as $index => $article) {
        echo '<div class="product" style="margin-right: 20px; position:relative;">';
        echo '<p style="opacity:0;" class="desc" id="description' . $index . '">' . $article["description"] . 'dt </p>';
    
        echo '<div class="image-product">';
        echo '<img class="img" id="image' . $index . '" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
    
        echo '<form id="favoris" action="../favoris/ajouter_favoris.php" method="POST">';
        echo '<button id="favoriteButton" onclick="toggleFavorite(' . $index . ')">';
        echo "<input type='hidden' name='idArt' value='" . $article["idArticle"] . "'>";
        echo "<input type='hidden' name='idCli' value='" . $produit["idClient"] . "'>";
        echo "<input type='hidden' name='page' value='1'>";
    
        $favoris_exist = selectFavoris($db, $produit["idClient"], $article["idArticle"]);
        if ($favoris_exist) {
            echo '<i id="heartIcon' . $index . '" class="fas fa-heart text-danger heartIcon" style="margin:5px"></i>'; // Ajout de l'index à l'ID de l'icône
        } else {
            echo '<i id="heartIcon' . $index . '" class="far fa-heart heartIcon" style="margin:5px"></i>'; // Ajout de l'index à l'ID de l'icône
        }
        echo '</button>';
        echo '</form>';
    
        echo '<div class="content">';
        
        echo '<h4 class="name" id="titre' . $index . '">' . $article["titre"] . '</h4>';
        echo '<h2 class="price" id="prix' . $index . '">' . $article["prix"] . 'dt </h2>';
        //
    
        echo '<form id="ajouterPanierForm" action="../panier/ajouter_panier.php" method="POST">';
        echo '<input type="button" id="panier' . $index . '" value="Ajouter au panier" class="btn btn-info" style="margin-bottom:20px" onclick="ajouterAuPanier(' . $article["idArticle"] . ');"/> <br>';
        echo "<input type='hidden' id='idArticle' name='id' value='" . $article["idArticle"] . "'>";
        echo '</form>';
    
        // Button to show details
        echo '<button class="btn btn-primary" onclick="showDetails(' . $index . ')">Voir détails</button>';
        echo '</div>'; // .content
        echo '</div>'; // .product
    }
    echo '</div>';
    echo '</div>';
    // Fermer la connexion à la base de données
    require_once('../../bd/close.php');
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo 'aucun user'; // ou une autre indication selon vos besoins
}
