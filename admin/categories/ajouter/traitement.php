<?php
require_once('../../../bd/connect.php');

// Initialisation de la session
session_start();

if (
    empty($_POST["titre"]) || empty($_POST["titre"]) ||
    empty($_POST["description"]) || empty($_POST["description"]))
 {
    // Redirection si des données sont manquantes
    header("Location: ../login/login.php");
    exit();
} else {
    // Vérification de la présence et de la non-vacuité des données
    if (
        isset($_POST["titre"]) && !empty($_POST["titre"]) &&
        isset($_POST["description"]) && !empty($_POST["description"])  ) {
        // Récupération des données
        $titre = $_POST["titre"];
        $desc = $_POST["description"];


        $sql = "INSERT INTO categories (titre, description) VALUES (:titre, :desc)";
        $query = $db->prepare($sql);
        $query->bindParam(':titre', $titre);
        $query->bindParam(':desc', $desc);

    
    
        // Exécution de la requête
        if ($query->execute()) {
            echo "L'article a été enregistré avec succès.";
        } else {
            echo "Une erreur s'est produite lors de l'enregistrement de l'article.";
        }

        // Redirection avec les données de l'utilisateur
        header("Location: ../categories/categories.php");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../login/login.php");
        exit();
    }
}
require_once('../../../bd/close.php');
?>
