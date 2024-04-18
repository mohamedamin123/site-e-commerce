<?php
// Inclure le fichier de connexion à la base de données
require_once('../bd/connect.php');

// Requête SQL pour récupérer tous les articles
$sql = 'SELECT * FROM `Article` where statut!=0';
// Préparer la requête
$query = $db->prepare($sql);
// Exécuter la requête
$query->execute();
// Récupérer les résultats
$articles = $query->fetchAll(PDO::FETCH_ASSOC);

// Afficher les articles
echo '<div class="list">';
echo '<div class="admin-icon-container">';
foreach ($articles as $article) {
    echo '<div class="admin-icon">';
    echo '  <img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    echo '  <div class="info">';
    echo '      <p class="title">' . $article["titre"] . '</p>';
    echo '      <p class="price">' . $article["prix"] . ' dt</p>';
    echo '  </div>';
    echo '</div>';
}
echo '</div>';
echo '</div>';

// Fermer la connexion à la base de données
require_once('../bd/close.php');
