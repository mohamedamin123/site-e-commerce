<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    $email = strip_tags($_SESSION['email']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `client` WHERE `email`=:email';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On attache les valeurs
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    // On exécute la requête
    $query->execute();
    // On stocke le résultat dans un tableau associatif
    $produit = $query->fetch();

    // Requête SQL pour récupérer tous les articles du client
    $sql2 = 'SELECT * FROM `article` WHERE `idClient`=:idClient';
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
    foreach ($articles as $index => $article) {
        echo '<div class="product" style="margin-right: 20px; position:relative;">';
        echo '<div class="image-product">';
        echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
    
        echo '</button>';
        echo '<div class="content">';
        echo '<h4 class="name">' . $article["titre"] . '</h4>';
        echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';
        
        echo '<form id="ajouterPanierForm" action="modifierArticle.php" method="POST">';
        echo '<input type="submit" value="Traiter" class="btn btn-info" style="margin-bottom:20px"/> <br>';
        echo "<input type='hidden' name='idArticle' value='" . $article["idArticle"] . "'>";
        echo '</form>';
        
    
    
        echo '</form>';
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
