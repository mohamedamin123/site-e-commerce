<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../../bd/connect.php');
    require("../requets.php");
    session_start();

    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
        $email=$_SESSION["email"];
        $produit = selectCLient($db,$email);

        // On stocke le résultat dans un tableau associatif

        // Valeur de recherche saisie par l'utilisateur
        $search = $_POST['search'];

        $articles=selectRechercheByIdCLient($db,$search,$produit["idClient"]);

        // Afficher les résultats sous forme de HTML
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
        
            echo '<form id="ajouterPanierForm" action="../panier/ajouter_panier.php" method="POST">';
            echo '<input type="button" value="Traiter" class="btn btn-info" style="margin-bottom:20px" onclick="ajouterAuPanier(' . $article["idArticle"] . ');"/> <br>';
            echo "<input type='hidden' id='idArticle' name='id' value='" . $article["idArticle"] . "'>";
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
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo ''; // ou une autre indication selon vos besoins
}
?>
