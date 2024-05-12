<?php
session_start();
require('../article/traitement2.php');

// Vérifie si l'ID de l'article est présent dans la requête
if(isset($_POST['idArticle'])) {
    $idArticle = $_POST['idArticle'];

    // Récupérer les données de l'article depuis la base de données
    $sql = "SELECT * FROM article WHERE idArticle = :idArticle";
    $query = $db->prepare($sql);
    $query->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'article existe
    if($article) {
        $titre = $article['titre'];
        $prix = $article['prix'];
        $description = $article['description'];
        $id = $article['idArticle'];

        // Récupération de l'image depuis la base de données (supposons que le champ soit nommé 'photo')
        // Assurez-vous que votre champ MEDIUMBLOB est stocké correctement
        $photo_base64 = base64_encode($article['photo']);
    } else {
        // Gérer le cas où l'article n'est pas trouvé
    }
} else {
    // Gérer le cas où l'ID de l'article n'est pas présent dans la requête
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier article</title>
    <link rel="stylesheet" href="modifier.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

    <main class="main d-block mx-auto ">
        <?php
        if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
            echo '<h1 class="titre">Veuillez remplir le formulaire</h1>';
            echo '<div class="d-block mx-auto text">';
            echo '<h2 class="titre-ajouter">Modifier un article</h2>';

            echo '<form action="update.php" method="post" enctype="multipart/form-data" class="form">';

            // Affichage de l'image dans le formulaire
            if(isset($photo_base64)) {
                echo '<img src="data:image/jpeg;base64,'. $photo_base64 .'" alt="Photo" class="form-photo" style="display: block; margin: 0 auto;" width="400" height="300">';
            }

            echo '<label>Type</label>';
            echo '<select name="categories" id="" class="form-control">';
            
            $sql = 'SELECT * FROM `categories`';
            // On prépare la requête
            $query = $db->prepare($sql);
            // On exécute la requête
            $query->execute();
            // On stocke le résultat dans un tableau associatif
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            require_once('../bd/close.php');

            foreach ($result as $user) {
                echo "<option value='" . $user['titre'] . "'>" . $user['titre'] . "</option>";
            }
            echo '</select>';
            echo '<label>Titre</label>';
            echo '<input type="text" name="titre" class="form-control" value="' . $titre . '">';
            echo '<label>Prix</label>';
            echo '<input type="number" name="prix" class="form-control" value="' . $prix . '">';
            echo '<label>Description</label>';
            echo '<textarea name="description" cols="15" rows="5" class="form-control">' . $description . '</textarea>';
            echo '<input class="mb-2 mt-4 btn btn-primary" type="submit" value="Modifier" name="modifier">';
            echo '<a class="btn btn-danger" href="myProduit.php"> Retour </a>';
            echo '<input type="hidden" name="idArticle" class="form-control" value="' . $id . '">';

            echo '</form>';

            echo '</div>';
        } else {
            echo '<div class="d-block mx-auto text text-center" >';
            echo '<p class="p1">Veuillez vous connecter!</p>';
            echo '<button class="btn btn-danger" onclick="login()">Se connecter</button>';
            echo '</div>';
        }

        ?>
    </main>
    <script src="ajouter.js"></script>
</body>

</html>
