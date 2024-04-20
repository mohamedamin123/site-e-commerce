<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    $email = strip_tags($_SESSION['email']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `Client` WHERE `email`=:email';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On attache les valeurs
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    // On exécute la requête
    $query->execute();
    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    // Requête SQL pour récupérer tous les articles du client
    $sql2 = 'SELECT * FROM `Article` WHERE `idClient`=:idClient';
    // Préparer la requête
    $query2 = $db->prepare($sql2);
    // Attacher les valeurs
    $query2->bindValue(':idClient', $produit["idClient"], PDO::PARAM_INT);
    // Exécuter la requête
    $query2->execute();
    // Récupérer les résultats
    $articles = $query2->fetchAll(PDO::FETCH_ASSOC);
    
    echo '<div class="list">';
    echo '<div class="admin-icon-container">';
    foreach ($articles as $article) {
        echo '<div class="product" style="margin-right: 20px;">'; // Ajout de la marge à droite
        echo '<div class="image-product">';
        echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
        echo '<div class="content">';
        echo '<h4 class="name">' . $article["titre"] . '</h4>';
        echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';
        echo '<a href="#" class="id_product">Ajouter au panier</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
} else {
    // Gérer le cas où l'utilisateur n'est pas connecté
    echo "Vous n'êtes pas connecté."; 
}

// Fermer la connexion à la base de données
require_once('../bd/close.php');
?>
