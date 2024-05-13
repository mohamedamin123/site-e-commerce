<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../bd/connect.php');
require("../requets.php");
$result=selectAllArticle($db);
require_once('../../../bd/close.php');

$i=1;

foreach ($result as $article) {
    echo "<tr>";
    echo "<th scope='row'>" . $i. "</th>";
    echo "<td>" . $article['titre'] . "</td>";
    echo "<td>" . $article['date'] . "</td>";
    echo "<td>" . $article['statut'] . "</td>";
    echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $article['idArticle'] . "'>Consulter</a></td>";
    echo "<td id='userStatus'>";
    echo "<form method='post' action='activer.php'>";
    echo "<button class='btn btn-warning' type='submit' name='id' value='" . $article['idArticle'] . "'>" . ($article['statut'] == 1 ? 'Active' : 'Desactive') . "</button>";
    echo "</form>";

    echo "</td>";
    echo "<form method='post' action='supprimer.php'>";
    echo "<td><a class='btn btn-danger' href='supprimer.php?id=" . $article['idArticle'] . "'>Supprimer</a></td>";
    echo "</form>";
        echo "</tr>";
    $i++;
}
?>
