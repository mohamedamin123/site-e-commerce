<?php
require_once('../../bd/connect.php');



// Initialisation de la session
session_start();

if (
    empty($_POST["email"]) || empty($_POST["nom"]) ||
    empty($_POST["prenom"]) || empty($_POST["tel"]) || empty($_POST["date"])
) {
    // Redirection si des données sont manquantes
    header("Location: ../../login/login.php");
    exit();
} else {
    // Vérification de la présence et de la non-vacuité des données
    if (
        isset($_POST["email"]) && !empty($_POST["email"]) &&
        isset($_POST["nom"]) && !empty($_POST["nom"]) &&
        isset($_POST["prenom"]) && !empty($_POST["prenom"]) &&
        isset($_POST["tel"]) && !empty($_POST["tel"]) &&
        isset($_POST["date"]) && !empty($_POST["date"])
    ) {
        // Récupération des données
        $email = $_POST["email"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $tel = $_POST["tel"];
        $date = $_POST["date"];

        // Requête SQL pour mettre à jour les données du client
        $sql = 'UPDATE `client` SET `nom` = :nom, `prenom` = :prenom, `tel` = :tel, `date` = :date';

        // Si une photo est téléchargée, la traiter
        if (!empty($_FILES["image"]["name"])) {
            // Récupérer les données de l'image
            // Récupération des données du fichier téléchargé
            $photoData = file_get_contents($_FILES["image"]["tmp_name"]);
            $imageType = $_FILES["image"]["type"];

            // Vérifier si les données ont été récupérées avec succès
            if ($photoData !== false) {
                // Mettre à jour la requête pour inclure la photo
                $sql .= ', `photo` = :photo';
            } else {
                // Gérer l'erreur si les données de l'image n'ont pas pu être récupérées
                $_SESSION['error'] = "Erreur lors de la lecture de l'image.";
                header("Location: profile.php?email=$email");
                exit();
            }
        }

        $sql .= ' WHERE `email` = :email';

        // Préparation de la requête
        $query = $db->prepare($sql);

        // Liaison des valeurs
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);

        // Si une photo est téléchargée, lier la valeur de la photo
        if (!empty($photoData)) {
            $query->bindValue(':photo', $photoData, PDO::PARAM_LOB);
        }

        // Exécution de la requête
        if ($query->execute()) {
            // Message de succès
            $_SESSION['success'] = "Mise à jour réussie.";
        } else {
            // Message d'erreur
            $_SESSION['error'] = "Erreur lors de la mise à jour des informations du client.";
        }

        // Redirection vers la page de profil
        header("Location: profile.php?email=$email");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../../login/login.php");
        exit();
    }
}
require_once('../../bd/close.php');
