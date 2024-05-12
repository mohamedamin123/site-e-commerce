<?php
session_start();
require('../article/traitement2.php');

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

        // Récupère l'ID de la catégorie à partir du titre
        $sql = "SELECT idCategories FROM categories WHERE titre = :titre";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':titre', $categorieTitre);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result) {
            $idCategories = $result['idCategories'];

            // Prépare et exécute la requête de mise à jour
            $sql = "UPDATE article SET titre = :titre, prix = :prix, description = :description, idCategories = :idCategories WHERE idArticle = :idArticle";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idCategories', $idCategories);
            $stmt->bindParam(':idArticle', $idArticle);
            
            // Exécute la requête
            if ($stmt->execute()) {
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
