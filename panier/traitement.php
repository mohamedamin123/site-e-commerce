<?php
session_start();
require_once('../bd/connect.php');

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

    $total = 0;

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


    $sql2 = 'SELECT * FROM `panier` WHERE `idClient`=:id AND `statut` = "en attente"';
    // On prépare la requête
    $query2 = $db->prepare($sql2);
    // On attache les valeurs
    $query2->bindValue(':id', $produit["idClient"], PDO::PARAM_STR);
    // On exécute la requête
    $query2->execute();
    // On stocke le résultat dans un tableau associatif
    $panier = $query2->fetch();

    $sql3 = 'SELECT * FROM `panier_article` WHERE `idPanier`=:idPanier';
    $query3 = $db->prepare($sql3);
    $query3->bindValue(':idPanier', $panier["idPanier"], PDO::PARAM_STR);
    $query3->execute();

    // Récupération de tous les articles associés à ce panier
    $articles = $query3->fetchAll();

    // Parcourir les articles associés à ce panier
    foreach ($articles as $index => $article) {
        // Récupérer les détails de l'article depuis la base de données
        $sql4 = 'SELECT * FROM `Article` WHERE `idArticle`=:idArticle';
        $query4 = $db->prepare($sql4);
        $query4->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_STR);
        $query4->execute();
        $article_details = $query4->fetch();
        // Afficher les détails de l'article dans le tableau
        echo '<tr>';
        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($article_details["photo"]) . '"></td>';

        echo '<td>' . $article_details['titre'] . '</td>';
        echo '<td>' . $article_details['prix'] . 'Dt</td>'; // Modification ici pour afficher le prix unitaire
        echo '<td>' . $article['quantite'] . '</td>';
        echo '<td>' . $article['quantite'] * $article_details['prix'] . 'Dt </td>';
        echo '<td><a href="info_panier.php"><img src="../assets/images/voir.png"</a></td>';
        echo '<td><a href=""><img src="../assets/images/modifier.png"</a></td>';

        echo '<form  id="myForm' . $index . '" action="supprimer.php" method="POST">';
        echo '<td><img onclick="traiter(' . $index . ');" src="../assets/images/souriant.png" style="cursor: pointer;"</td>';
        echo '<input href="#" type="hidden" name="id" value="' . $article["id"] . '"/>';
        echo '<input href="#" type="hidden" name="id2" value="' . $panier["idPanier"] . '"/>';
        echo '<input href="#" type="hidden" name="prix" value="' . $article['quantite'] * $article_details['prix'] . '"/>';

        echo '</form>';
        echo '</tr>';
    }
}
