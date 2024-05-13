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
