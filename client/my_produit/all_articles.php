<?php
// Inclure le fichier de connexion à la base de données
require_once('../../bd/connect.php');
require("../requets.php");
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    $email = ($_SESSION['email']);
    $client=selectCLient($db,$email);

    $articles=selectArticle($db,$client["idClient"]);
    
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
require_once('../../bd/close.php');
?>
