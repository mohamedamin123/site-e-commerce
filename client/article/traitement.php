<?php
require("../requets.php");
session_start();
if(isset($_POST['session_data'])) {
    $session_data = json_decode(htmlspecialchars_decode($_POST['session_data']), true);
    $_SESSION = $session_data;
    session_write_close();
}


// Maintenant vous pouvez accéder aux données de session normalement
if(isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

    if (
        isset($_FILES["image"]) &&
        isset($_POST["categories"]) && !empty($_POST["categories"]) &&
        isset($_POST["titre"]) && !empty($_POST["titre"]) &&
        isset($_POST["prix"]) && !empty($_POST["prix"]) &&
        isset($_POST["description"]) && !empty($_POST["description"])
    ) {
    
        
        // Récupération des données du fichier téléchargé
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $imageType = $_FILES["image"]["type"];
    
        // Vérification du type de fichier
        if ($imageType !== 'image/jpeg' && $imageType !== 'image/png') {
            echo "Le format de l'image doit être JPEG ou PNG.";
            exit;
        }
    
        // Récupération des autres données du formulaire
        $categories = $_POST["categories"];
        $titre = $_POST["titre"];
        $prix = $_POST["prix"];
        $description = $_POST["description"];
        $email = $_SESSION["email"]; // Récupération de l'email de l'utilisateur

        // Connexion à la base de données
        require_once('../../bd/connect.php');


        // Requête pour récupérer l'identifiant du client

        $result_client = connect($db);
        $idClient = $result_client['idClient'];
        $statut=0;
    
        // Requête pour récupérer l'identifiant de la catégorie

        $result_category = selectIdCategories($db,$categories);
        $idCategorie = $result_category['idCategories'];
    
        // Requête d'insertion

    
    
        // Exécution de la requête
        if (ajouter($db,$imageData,$idCategorie,$titre,$prix,$description,$idClient,$statut)) {
            header('Location: ../../../client/my_produit/myProduit.php');
            exit();
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement de l'article.";
        }
    
        // Fermeture de la connexion à la base de données
        require_once('../../bd/close.php');
    } else {
        $champs_non_remplis = array();
        if (!isset($_FILES["image"]) || empty($_FILES["image"]["tmp_name"])) {
            $champs_non_remplis[] = "Image";
        }
        if (!isset($_POST["categories"]) || empty($_POST["categories"])) {
            $champs_non_remplis[] = "Catégorie";
        }
        if (!isset($_POST["titre"]) || empty($_POST["titre"])) {
            $champs_non_remplis[] = "Titre";
        }
        if (!isset($_POST["prix"]) || empty($_POST["prix"])) {
            $champs_non_remplis[] = "Prix";
        }
        if (!isset($_POST["description"]) || empty($_POST["description"])) {
            $champs_non_remplis[] = "Description";
        }
    
        echo "Les champs suivants sont obligatoires et doivent être remplis : " . implode(", ", $champs_non_remplis);
    }
    // Le reste de votre traitement...
} else {
    header('Location: ../../../connexion/login/login.php');
    exit();
}

?>
