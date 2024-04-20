<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');
require_once('traitement.php');

// Requête SQL pour récupérer tous les articles favoris d'un client
$sql = 'SELECT * FROM `Favoris` WHERE idClient = :idClient';

// Préparer la requête
$query = $db->prepare($sql);

// Récupérer l'ID du client
$idClient = $produit["idClient"];

// Exécuter la requête avec le paramètre lié
$query->execute(array(':idClient' => $idClient));

// Récupérer les résultats
$favoris = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($favoris as $fv) {
    // Requête SQL pour récupérer les détails de l'article favori
    $sql2 = 'SELECT * FROM `Article` WHERE idArticle = :idArticle';

    // Préparer la requête
    $query2 = $db->prepare($sql2);

    // Récupérer l'ID de l'article favori
    $idArticle = $fv["idArticle"];

    // Exécuter la requête avec le paramètre lié
    $query2->execute(array(':idArticle' => $idArticle));

    // Récupérer les résultats
    $articles = $query2->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les articles
    echo '<div class="list">';
    echo '<div class="admin-icon-container">';
    foreach ($articles as $article) {
        echo '<div class="product" style="margin-right: 20px;">'; 
        echo '<div class="image-product">';
        echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
        echo '<div class="content">';
        echo '<h4 class="name">' . $article["titre"] . '</h4>';
        echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';
        echo '<button class="btn btn-info" style="margin-bottom:20px">Ajouter au panier</button> <br>';
        echo "<form action='../info/info.php' method='get'>";
        echo "<input type='hidden' name='id' value='".$article["idArticle"]."'>";
        echo '<button class="btn btn-primary" >Voir details</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
}

// Fermer la connexion à la base de données
require_once('../bd/close.php');
?>
