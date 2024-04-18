<?php
// Vérifier si la requête POST contient une valeur de recherche
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search']) && !empty($_POST['search'])) {
    // Connexion à la base de données
    require_once('../bd/connect.php');

    session_start();

    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

        $email = strip_tags($_SESSION['email']);
        // On écrit notre requête
        $sql = 'SELECT * FROM `Client` WHERE `email`=:email';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $produit = $query->fetch();

        // Valeur de recherche saisie par l'utilisateur
        $search = $_POST['search'];

        // Requête SQL pour rechercher les articles par titre ou catégorie pour le client spécifique
        $sql = "SELECT * FROM `Article` WHERE (`titre` LIKE :search OR `idCategories` LIKE :search) AND `idClient`=:idClient";
        // Préparer la requête
        $query = $db->prepare($sql);
        // Attacher les valeurs et exécuter la requête
        $query->execute(array(':search' => '%' . $search . '%', ':idClient' => $produit["idClient"]));

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
    } else {
        // Gérer le cas où l'utilisateur n'est pas connecté
        echo "Vous n'êtes pas connecté.";
    }

    // Fermer la connexion à la base de données
    require_once('../bd/close.php');
} else {
    // Si aucun terme de recherche n'a été fourni, renvoyer une réponse vide
    echo ''; // ou une autre indication selon vos besoins
}
?>
