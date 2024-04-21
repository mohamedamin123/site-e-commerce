<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

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
foreach ($articles as $article) {
    echo '<div class="product" style="margin-right: 20px;">'; 
    echo '<div class="image-product">';
    echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    echo '</div>';
    echo '<div class="content">';
    echo '<h4 class="name">' . $article["titre"] . '</h4>';
    echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';

    echo '<form id="ajouterPanierForm" action="../panier/ajouter_panier.php" method="POST">';
    echo '<input type="button" value="Ajouter au panier" class="btn btn-info" style="margin-bottom:20px" onclick="ajouterAuPanier(' . $article["idArticle"] . ');"/> <br>';
    echo "<input type='hidden' id='idArticle' name='id' value='".$article["idArticle"]."'>";
    echo '</form>';
    

    echo "<form action='../info/info.php' method='get'>";
    echo "<input type='hidden' name='id' value='".$article["idArticle"]."'>";
    echo '<button class="btn btn-primary" >Voir details</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}
echo '</div>';
echo '</div>';

// Fermer la connexion à la base de données
require_once('../bd/close.php');
