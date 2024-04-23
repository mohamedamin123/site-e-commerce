<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');
require_once('traitement.php');

// Requête SQL pour récupérer tous les articles
$sql = 'SELECT * FROM `Article` where statut!=0';
// Préparer la requête
$query = $db->prepare($sql);
// Exécuter la requête
$query->execute();
// Récupérer les résultats
$articles = $query->fetchAll(PDO::FETCH_ASSOC);



// Afficher les articles
echo '<div class="list">';
echo '<div class="admin-icon-container">';
foreach ($articles as $index => $article) {
    echo '<div class="product" style="margin-right: 20px; position:relative;">';
    echo '<div class="image-product">';
    echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    echo '</div>';

    echo '<form id="favoris" action="../favoris/ajouter_favoris.php" method="POST">';
    echo '<button id="favoriteButton" onclick="toggleFavorite(' . $index . ')">';
    echo "<input type='hidden' name='idArt' value='" . $article["idArticle"] . "'>";
    echo "<input type='hidden' name='idCli' value='" . $produit["idClient"] . "'>";

    $sql_check_favoris = 'SELECT * FROM `Favoris` WHERE `idClient`=:idClient AND `idArticle`=:idArticle';
    $query_check_favoris = $db->prepare($sql_check_favoris);
    $query_check_favoris->bindValue(':idClient', $produit["idClient"], PDO::PARAM_INT);
    $query_check_favoris->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_INT);
    $query_check_favoris->execute();
    $favoris_exist = $query_check_favoris->fetch();
    if($favoris_exist) {
        echo '<i id="heartIcon' . $index . '" class="fas fa-heart text-danger heartIcon" style="margin:5px"></i>'; // Ajout de l'index à l'ID de l'icône

    } else {
        echo '<i id="heartIcon' . $index . '" class="far fa-heart heartIcon" style="margin:5px"></i>'; // Ajout de l'index à l'ID de l'icône

    }

    echo '</form>';




    echo '</button>';
    echo '<div class="content">';
    echo '<h4 class="name">' . $article["titre"] . '</h4>';
    echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';

    echo '<form id="ajouterPanierForm" action="../panier/ajouter_panier.php" method="POST">';
    echo '<input type="button" value="Ajouter au panier" class="btn btn-info" style="margin-bottom:20px" onclick="ajouterAuPanier(' . $article["idArticle"] . ');"/> <br>';
    echo "<input type='hidden' id='idArticle' name='id' value='" . $article["idArticle"] . "'>";
    echo '</form>';


    echo "<form action='../info/info.php' method='get'>";
    echo "<input type='hidden' name='id' value='" . $article["idArticle"] . "'>";
    echo '<button class="btn btn-primary" >Voir details</button>';

    echo '</form>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
echo '</div>';

// Fermer la connexion à la base de données
require_once('../bd/close.php');
