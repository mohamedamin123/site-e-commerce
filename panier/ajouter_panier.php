<?php
require_once('../bd/connect.php');
session_start();

// Vérifiez si le bouton de soumission a été envoyé
if (isset($_POST['id']) && isset($_POST['quantite'])) {
    // Récupérez l'identifiant de l'article à ajouter au panier
    $id = $_POST['id'];
    $q = $_POST['quantite'];


    // Récupérez l'email de l'utilisateur à partir de la session
    $email = strip_tags($_SESSION['email']);

    // Requête pour récupérer l'ID du client à partir de son email
    $sql_client = 'SELECT * FROM `Client` WHERE `email`=:email';
    $query_client = $db->prepare($sql_client);
    $query_client->bindValue(':email', $email, PDO::PARAM_STR);
    $query_client->execute();
    $client = $query_client->fetch();

    // Requête pour vérifier s'il existe déjà un panier en attente pour ce client
    $sql_panier = 'SELECT * FROM `panier` WHERE `idClient`=:id AND `statut` = "en attente"';
    $query_panier = $db->prepare($sql_panier);
    $query_panier->bindValue(':id', $client["idClient"], PDO::PARAM_STR);
    $query_panier->execute();
    $panier = $query_panier->fetch();

    // Si aucun panier en attente n'existe pour ce client, en créer un nouveau
    if (!$panier) {
        // Code pour créer un nouveau panier et ajouter l'article
        $sql_article = 'SELECT * FROM `Article` WHERE `idArticle`=:idArticle';
        $query_article = $db->prepare($sql_article);
        $query_article->bindValue(':idArticle', $id, PDO::PARAM_STR);
        $query_article->execute();
        $article = $query_article->fetch();

        $sql_insert_panier = 'INSERT INTO `panier` (`idClient`, `statut`, `prix_total`) VALUES (:idClient, :statut, :prix)';
        $query_insert_panier = $db->prepare($sql_insert_panier);
        $query_insert_panier->bindValue(':idClient', $client["idClient"], PDO::PARAM_STR);
        $query_insert_panier->bindValue(':statut', "en attente", PDO::PARAM_STR);
        $query_insert_panier->bindValue(':prix', $article["prix"], PDO::PARAM_STR);
        $query_insert_panier->execute();

        // Récupérer l'ID du panier nouvellement inséré
        $idPanier = $db->lastInsertId();

        // Insérer l'article dans la table panier_article
        $sql_insert_panier_article = 'INSERT INTO `panier_article` (`idPanier`, `idArticle`, `quantite`) VALUES (:idPanier, :idArticle, :quantite)';
        $query_insert_panier_article = $db->prepare($sql_insert_panier_article);
        $query_insert_panier_article->bindValue(':idPanier', $idPanier, PDO::PARAM_STR);
        $query_insert_panier_article->bindValue(':idArticle', $id, PDO::PARAM_STR);
        $query_insert_panier_article->bindValue(':quantite', 1, PDO::PARAM_INT); // Par défaut, une quantité de 1
        $query_insert_panier_article->execute();

        // Redirection vers la page du panier
        header('Location: panier.php');
        exit();
    } else {
        // Si un panier en attente existe déjà, vérifiez si l'article a déjà été ajouté au panier

        // Récupérer l'ID du panier existant
        $idPanier = $panier['idPanier'];

        // Vérifier si l'article existe déjà dans le panier
        $sql_article_existe = 'SELECT * FROM `panier_article` WHERE `idPanier`=:idPanier AND `idArticle`=:idArticle';
        $query_article_existe = $db->prepare($sql_article_existe);
        $query_article_existe->bindValue(':idPanier', $idPanier, PDO::PARAM_STR);
        $query_article_existe->bindValue(':idArticle', $id, PDO::PARAM_STR);
        $query_article_existe->execute();
        $article_existe = $query_article_existe->fetch();

        if ($article_existe) {
            // L'article existe déjà dans le panier, définissez une variable de session pour indiquer cela
            $_SESSION['article_deja_ajoute'] = true;
            header('Location: ../home/index.php');
            exit();
        } else {
            // Insérer l'article dans la table panier_article
            $sql_insert_panier_article = 'INSERT INTO `panier_article` (`idPanier`, `idArticle`, `quantite`) VALUES (:idPanier, :idArticle, :quantite)';
            $query_insert_panier_article = $db->prepare($sql_insert_panier_article);
            $query_insert_panier_article->bindValue(':idPanier', $idPanier, PDO::PARAM_STR);
            $query_insert_panier_article->bindValue(':idArticle', $id, PDO::PARAM_STR);
            $query_insert_panier_article->bindValue(':quantite', $q, PDO::PARAM_INT); // Par défaut, une quantité de 1
            $query_insert_panier_article->execute();

            // Mettre à jour le prix total du panier
// Mettre à jour le prix total du panier
$sql_update_prix_total = 'UPDATE `panier` SET `prix_total` = `prix_total` + ((SELECT `prix` FROM `Article` WHERE `idArticle` = :idArticle) * :quantite) WHERE `idPanier` = :idPanier';
$query_update_prix_total = $db->prepare($sql_update_prix_total);
$query_update_prix_total->bindValue(':idArticle', $id, PDO::PARAM_STR);
$query_update_prix_total->bindValue(':quantite', $q, PDO::PARAM_INT); // Lier la quantité à :quantite
$query_update_prix_total->bindValue(':idPanier', $idPanier, PDO::PARAM_STR);
$query_update_prix_total->execute();


            // Redirection vers la page du panier
            header('Location: panier.php');
            exit();
        }
    }
} else {
    // Affichez un message si le bouton de soumission n'a pas été envoyé
    echo "Aucun identifiant d'article spécifié.";
}

require_once('../bd/close.php');
?>
