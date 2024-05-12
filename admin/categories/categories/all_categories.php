<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../bd/connect.php');

$sql = 'SELECT * FROM `categories` ';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// Fermer la connexion à la base de données
require_once('../../../bd/close.php');
$i = 1;

foreach ($result as $user) {
    echo "<tr>";
    echo "<td>" . $i . "</td>";
    echo "<td>" . $user['titre'] . "</td>";
    echo "<td>" . $user['description'] . "</td>";
    echo "<td>" . $user['date'] . "</td>";
    echo "<td>";
    echo "<form method='post' action='supprimer.php'>";
    echo "<a class='btn btn-danger' href='supprimer.php?id=" . $user['idCategories'] . "'>Supprimer</a></td>";
    echo "</form>";
    echo "</tr>";
    $i++;
}
?>
