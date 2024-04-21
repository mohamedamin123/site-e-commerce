<?php
session_start();
require_once('../bd/connect.php');

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

    $total=0;

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
        foreach ($articles as $article) {
            // Récupérer les détails de l'article depuis la base de données
            $sql4 = 'SELECT * FROM `Article` WHERE `idArticle`=:idArticle';
            $query4 = $db->prepare($sql4);
            $query4->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_STR);
            $query4->execute();
            $article_details = $query4->fetch();
            // Afficher les détails de l'article dans le tableau

            echo '<div  class="product">';
            echo'<div class="image-product">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($article_details["photo"]) . '">';
            echo '</div>';
            echo '<div class="content">';
            echo '<h4 class="name">' . $article['quantite'] ." : ".$article_details['titre'] . '</h4>';
            echo '<h2 class="price">' . $article['quantite']*$article_details['prix'] . 'Dt</h2>';
            echo '<a href="#" class="id_product">Voir détails</a> <br> <br> ';
            echo '<form action="supprimer.php" method="POST">';
            echo '<button href="#" type="submit" class="btn btn-danger ">Supprimer</button>';
            echo '<input href="#" type="hidden" name="id" value="'.$article["id"].'"/>';
            echo '<input href="#" type="hidden" name="id2" value="'.$panier["idPanier"].'"/>';
            echo '<input href="#" type="hidden" name="prix" value="'.$article['quantite']*$article_details['prix'].'"/>';

            echo '</form>';
            echo  '</div>';
            echo'</div>';
        }
    }

?>
