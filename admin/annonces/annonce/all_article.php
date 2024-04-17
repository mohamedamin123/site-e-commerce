<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../bd/connect.php');

$sql = 'SELECT * FROM `Article` order by date desc';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('../../../bd/close.php');

$i=1;

foreach ($result as $user) {
    echo "<tr>";
    echo "<th scope='row'>" . $i. "</th>";
    echo "<td>" . $user['titre'] . "</td>";
    echo "<td>" . $user['date'] . "</td>";
    echo "<td>" . $user['statut'] . "</td>";
    echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $user['idArticle'] . "'>Consulter</a></td>";
    echo "<td id='userStatus'>";
    echo "<form method='post' action='activer.php'>";
    echo "<button class='btn btn-warning' type='submit' name='id' value='" . $user['idArticle'] . "'>" . ($user['statut'] == 1 ? 'Active' : 'Desactive') . "</button>";
    echo "</form>";

    echo "</td>";
    echo "<form method='post' action='supprimer.php'>";
    echo "<td><a class='btn btn-danger' href='supprimer.php?id=" . $user['idArticle'] . "'>Supprimer</a></td>";
    echo "</form>";
        echo "</tr>";
    $i++;
}
?>
