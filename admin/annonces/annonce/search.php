<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../../../bd/connect.php');

    // Valeur de recherche saisie par l'utilisateur
    $search = $_POST['search'];
    $sql = 'SELECT * FROM `article` WHERE  (titre LIKE :search OR description LIKE :search ) ORDER BY date DESC';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête
    $query->execute(array(':search' => '%' . $search . '%'));
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier si des résultats ont été trouvés
    if ($result) {
        $i = 1;
    
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
    } else {
        // Aucun résultat trouvé
        echo "<tr><td colspan='7'>Aucun résultat trouvé.</td></tr>";
    }

    // Fermer la connexion à la base de données
    require_once('../../../bd/close.php');
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo ''; // ou une autre indication selon vos besoins
}
?>
