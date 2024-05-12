
<?php

session_start(); // Démarrer la session si ce n'est pas déjà fait
require_once('../../bd/connect.php');


if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    // Récupération des données
    $email = $_SESSION["email"];

    $sql = 'SELECT * FROM `client` WHERE `email`=:email';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $produit = $query->fetch();
}
require_once('../../bd/close.php');

?>