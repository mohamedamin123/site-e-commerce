<?php
require_once('sqlpanier.php');

$sql_update = 'UPDATE `panier` SET `statut` = "effectué" WHERE `idPanier` = :idPanier';
$query_update = $db->prepare($sql_update);
$query_update->bindValue(':idPanier', $panier["idPanier"], PDO::PARAM_STR);
$query_update->execute();


?>