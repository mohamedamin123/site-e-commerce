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

}
