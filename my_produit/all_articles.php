<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
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

    // Requête SQL pour récupérer tous les articles du client
    $sql = 'SELECT * FROM `Article` WHERE `idClient`=:idClient';
    // Préparer la requête
    $query = $db->prepare($sql);
    // Attacher les valeurs
    $query->bindValue(':idClient', $produit["idClient"], PDO::PARAM_INT);
    // Exécuter la requête
    $query->execute();
    // Récupérer les résultats
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les articles
    foreach ($articles as $article) {
        echo '<p>' . $article["titre"] . '</p>';
        echo '<img class="img_principal" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    }
} else {
    // Gérer le cas où l'utilisateur n'est pas connecté
    echo "Vous n'êtes pas connecté.";
}

// Fermer la connexion à la base de données
require_once('../bd/close.php');
?>
