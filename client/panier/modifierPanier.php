<?php
    require_once('../../bd/connect.php');
    require_once('../requets.php');

    $quantite = $_POST['quantite'];
    $idPanierArt = $_POST['id'];
    $idArt = $_POST['idArt'];
    $produit=connect($db);
    // Mettre à jour la quantité du produit dans la table panier_article
    $sql_update_quantite = 'UPDATE `panier_article` SET `quantite` = :quantite WHERE `id` = :id';
    $query_update_quantite = $db->prepare($sql_update_quantite);
    $query_update_quantite->bindValue(':id', $idPanierArt, PDO::PARAM_INT);
    $query_update_quantite->bindValue(':quantite', $quantite, PDO::PARAM_INT);
    $query_update_quantite->execute();

    // Récupérer l'ID du panier associé au client en attente
    $sql_panier = 'SELECT * FROM `panier` WHERE `idClient` = :id AND `statut` = "en attente"';
    $query_panier = $db->prepare($sql_panier);
    $query_panier->bindValue(':id', $produit["idClient"], PDO::PARAM_STR); // Assurez-vous que $produit["idClient"] contient l'ID du client
    $query_panier->execute();
    $panier = $query_panier->fetch();
    $idPanier = $panier['idPanier'];

    // Mettre à jour le prix total du panier en fonction du prix des articles dans la table Article
    $sql_update_prix_total = 'UPDATE `panier` SET `prix_total` = (SELECT SUM(`article`.`prix` * `panier_article`.`quantite`) FROM `article` INNER JOIN `panier_article` ON `article`.`idArticle` = `panier_article`.`idArticle` WHERE `panier_article`.`idPanier` = :idPanier) WHERE `idPanier` = :idPanier';
    $query_update_prix_total = $db->prepare($sql_update_prix_total);
    $query_update_prix_total->bindValue(':idPanier', $idPanier, PDO::PARAM_INT);
    $query_update_prix_total->execute();

    // Rediriger l'utilisateur vers la page du panier
    header('Location: panier.php');
    exit();

    require_once('../../bd/close.php');
?>
