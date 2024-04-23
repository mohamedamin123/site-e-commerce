<?php
require_once('../home/traitement.php');

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

?>