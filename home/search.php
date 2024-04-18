<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../bd/connect.php');

    // Valeur de recherche saisie par l'utilisateur
    $search = $_POST['search'];

    // Requête SQL pour rechercher les articles par titre ou catégorie
    $sql = "SELECT * FROM `Article` WHERE (`titre` LIKE :search OR `idCategories` LIKE :search) and statut!=0";
    // Préparer la requête
    $query = $db->prepare($sql);
    // Attacher les valeurs et exécuter la requête
    $query->execute(array(':search' => '%' . $search . '%'));

    // Récupérer les résultats de la recherche
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // Afficher les résultats sous forme de HTML
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
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo ''; // ou une autre indication selon vos besoins
}
?>
