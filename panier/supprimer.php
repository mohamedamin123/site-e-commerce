<?php
require_once('../bd/connect.php');


// Vérifiez si le bouton de suppression a été soumis
if (isset($_POST['id']) && isset($_POST['prix'])) {
    // Récupérez l'identifiant de l'utilisateur à supprimer
    $id = $_POST['id'];
    $prix = $_POST['prix'];
    $id2 = $_POST['id2'];



    // Supprimer d'abord les articles associés à cet utilisateur
    $sqlDeleteArticles = 'DELETE FROM `panier_article` WHERE `id` = :id';
    $queryDeleteArticles = $db->prepare($sqlDeleteArticles);
    $queryDeleteArticles->execute(array(':id' => $id));


    // Vérifiez si les requêtes se sont exécutées avec succès
    if ($queryDeleteArticles ) {
        // Redirigez vers la page où vous souhaitez aller après la suppression

        $sqlUpdate = 'UPDATE panier SET prix_total = prix_total - :prix WHERE idPanier = :idPanier';
        $sqlUpdate = $db->prepare($sqlUpdate);
        $sqlUpdate->execute(array(':prix' => $prix, ':idPanier' => $id2));
        

        if($sqlUpdate) {
            header('Location: panier.php');
            exit();
        } else {
            echo "update ne marche pas";
        }



    } else {
        // Affichez un message d'erreur si la suppression échoue
        echo "Erreur lors de la suppression.";
    }
} else {
    // Affichez un message si le bouton de suppression n'a pas été soumis
    echo "Aucun identifiant d'un article";
}

require_once('../bd/close.php');
?>
