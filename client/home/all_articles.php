<?php
// Inclure le fichier de connexion à la base de données
require_once('../../bd/connect.php');
require("../requets.php");
// Requête SQL pour récupérer tous les articles
session_start();


$offset = $_SESSION['offset'];
$limitLignesPage = $_SESSION['limitLignesPage'] ;
$articles=selectArticles($db,$offset,6);
$produit=connect($db);
// Afficher les articles
echo '<div class="list">';
echo '<div class="admin-icon-container">';
foreach ($articles as $index => $article) {

    echo '<div class="product" style="margin-right: 20px; position:relative;">';
    echo '<p style="opacity:0;" class="desc" id="description' . $index . '">' . $article["description"] . 'dt </p>';

    echo '<div class="image-product">';
    echo '<img class="img" id="image' . $index . '" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    echo '</div>';
    if(!empty($_SESSION["email"])) {
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
    }
    echo '<div class="content">';
    
    echo '<h4 class="name" id="titre' . $index . '">' . $article["titre"] . '</h4>';
    echo '<h2 class="price" id="prix' . $index . '">' . $article["prix"] . 'dt </h2>';
    //

    echo '<form id="ajouterPanierForm" action="../panier/ajouter_panier.php" method="POST">';
    if(!empty($_SESSION["email"])) {
        echo '<input type="button" id="panier' . $index . '" value="Ajouter au panier" class="btn btn-info" style="margin-bottom:20px" onclick="ajouterAuPanier(' . $article["idArticle"] . ');"/> <br>';
    }
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
?>