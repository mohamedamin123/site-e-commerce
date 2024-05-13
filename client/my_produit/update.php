<?php
session_start();
require("../../bd/connect.php");
require('../requets.php');

// Vérifie si les données du formulaire ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si toutes les données nécessaires sont présentes
    if(isset($_POST['idArticle'], $_POST['titre'], $_POST['prix'], $_POST['description'], $_POST['categories'])) {
        // Récupère les données du formulaire
        $idArticle = $_POST['idArticle'];
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $categorieTitre = $_POST['categories'];

        $result=selectCategoriesByTitre($db,$categorieTitre);

        if($result) {
            $idCategories = $result['idCategories'];

            // Exécute la requête
            if (updateArticle($db,$titre,$prix,$description,$idCategories,$idArticle)) {
                // Redirection vers la page des produits après la mise à jour
                header("Location: myProduit.php");
                exit;
            } else {
                echo "Erreur lors de la mise à jour de l'article.";
            }
        } else {
            echo "La catégorie sélectionnée n'existe pas.";
        }
    } else {
        echo "Tous les champs requis ne sont pas renseignés.";
    }
} else {
    // Redirection vers la page de connexion si les données n'ont pas été soumises via POST
    header("Location: login.php");
    exit;
}
?>
