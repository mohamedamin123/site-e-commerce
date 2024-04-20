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

    echo '<div class="list">';
    echo '<div class="admin-icon-container">';
    foreach ($result as $article) {
        echo '<div class="product" style="margin-right: 20px;">'; // Ajout de la marge à droite
        echo '<div class="image-product">';
        echo '<img class="img" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
        echo '</div>';
        echo '<div class="content">';
        echo '<h4 class="name">' . $article["titre"] . '</h4>';
        echo '<h2 class="price">' . $article["prix"] . 'dt </h2>';
        echo '<a href="#" class="id_product">Ajouter au panier</a>';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
    // Fermer la connexion à la base de données
    require_once('../bd/close.php');
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo 'aucun user'; // ou une autre indication selon vos besoins
}
?>
