<?php
// Inclure le fichier de connexion à la base de données
require_once('../../../bd/connect.php');

$sql = 'SELECT * FROM `client` where role ="client" order by date desc';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
// Fermer la connexion à la base de données
require_once('../../../bd/close.php');
$i=1;
foreach ($result as $user) {
    echo "<tr>";
    echo "<th scope='row'>" . $i. "</th>";
    echo "<td>" . $user['nom'] . "</td>";
    echo "<td>" . $user['prenom'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $user['idClient'] . "'>Consulter</a></td>";
    echo "<td>";
    echo "<form method='post' action='traitement.php'>";
    echo "<button class='btn btn-warning' type='submit' name='id' value='" . $user['idClient'] . "'>" . ($user['statut'] == 1 ? 'Active' : 'Blocked') . "</button>";
    echo "</form>";
    echo "</td>";
    echo "<td><a class='btn btn-danger' href='../supprimer/supprimer.php?id=" . $user['idClient'] . "'>Supprimer</a></td>";
    echo "</tr>";
    $i++;
}
?>
