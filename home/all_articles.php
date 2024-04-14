<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

// Requête SQL pour récupérer tous les articles
$sql = 'SELECT * FROM `Article`';
// Préparer la requête
$query = $db->prepare($sql);
// Exécuter la requête
$query->execute();
// Récupérer les résultats
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

// Afficher les articles
foreach ($articles as $article) {
    echo '<p>' . $article["titre"] . '</p>';
    echo '<img class="img_principal" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
}

// Fermer la connexion à la base de données
require_once('../bd/close.php');
?>
