<?php
require_once('../bd/connect.php');

// Vérifiez si le bouton de suppression a été soumis
if (isset($_POST['id']) && isset($_POST['prix']) && isset($_POST['id2'])) {
    // Récupérez les identifiants de l'article et du panier
    $id = $_POST['id'];
    $prix = $_POST['prix'];
    $idPanier = $_POST['id2'];

    // Supprimez l'article du panier
    $sqlDeleteArticle = 'DELETE FROM `panier_article` WHERE `id` = :id';
    $queryDeleteArticle = $db->prepare($sqlDeleteArticle);
    $queryDeleteArticle->execute(array(':id' => $id));

    // Vérifiez si la suppression de l'article a réussi
    if ($queryDeleteArticle) {
        // Mettez à jour le prix total du panier
        $sqlUpdatePrixTotal = 'UPDATE `panier` SET `prix_total` = `prix_total` - :prix WHERE `idPanier` = :idPanier';
        $queryUpdatePrixTotal = $db->prepare($sqlUpdatePrixTotal);
        $queryUpdatePrixTotal->execute(array(':prix' => $prix, ':idPanier' => $idPanier));

        // Vérifiez si la mise à jour du prix total a réussi
        if ($queryUpdatePrixTotal) {
            // Redirigez vers la page du panier
            header('Location: panier.php');
            exit();
        } else {
            // Affichez un message d'erreur si la mise à jour du prix total échoue
            echo "Erreur lors de la mise à jour du prix total.";
        }
    } else {
        // Affichez un message d'erreur si la suppression de l'article échoue
        echo "Erreur lors de la suppression de l'article.";
    }
} else {
    // Affichez un message si les données nécessaires ne sont pas fournies
    echo "Données manquantes pour la suppression de l'article.";
}

require_once('../bd/close.php');
?>
