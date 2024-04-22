<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');
require_once('traitement.php');

// Requête SQL pour récupérer tous les articles favoris d'un client
$sql = 'SELECT * FROM `Favoris` WHERE idClient = :idClient';

// Préparer la requête
$query = $db->prepare($sql);

// Récupérer l'ID du client
$idClient = $client["idClient"];

// Exécuter la requête avec le paramètre lié
$query->execute(array(':idClient' => $idClient));

// Récupérer les résultats
$favoris = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($favoris as $fv) {
        // Afficher les articles
        echo '<div class="list" style=width:"400px">';
        echo '<div class="admin-icon-container">';
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




    foreach ($articles as $index => $article) {
        echo '<div class="product" style="margin-right: 20px; position:relative;">';
        echo '<div class="image-product" >';
        echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
    
        echo '<form id="favoris" action="../favoris/ajouter_favoris2.php" method="POST">';
        echo '<button id="favoriteButton" onclick="toggleFavorite(' . $index . ')">';
        echo "<input type='hidden' name='idArt' value='" . $article["idArticle"] . "'>";
        echo "<input type='hidden' name='idCli' value='" . $client["idClient"] . "'>";
    
        $sql_check_favoris = 'SELECT * FROM `Favoris` WHERE `idClient`=:idClient AND `idArticle`=:idArticle';
        $query_check_favoris = $db->prepare($sql_check_favoris);
        $query_check_favoris->bindValue(':idClient', $client["idClient"], PDO::PARAM_INT);
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

}
echo '</div>';
echo '</div>';

// Fermer la connexion à la base de données
require_once('../bd/close.php');
?>
