<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../../../bd/connect.php');
    require("../requets.php");
    // Valeur de recherche saisie par l'utilisateur
    $result=selectRecherche($db);
    // Vérifier si des résultats ont été trouvés
    if ($result) {
        $i = 1;
        foreach ($result as $user) {
            echo "<tr>";
            echo "<th scope='row'>" . $i . "</th>";
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
    } else {
        // Aucun résultat trouvé
        echo "<tr><td colspan='7'>Aucun résultat trouvé.</td></tr>";
    }

    // Fermer la connexion à la base de données
    require_once('../../../bd/close.php');
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo 'non'; // ou une autre indication selon vos besoins
}
?>
