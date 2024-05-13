<?php
require_once('../../bd/connect.php');

// Initialisation de la session
session_start();

if (
    empty($_POST["email"]) || empty($_POST["nom"]) ||
    empty($_POST["prenom"]) || empty($_POST["tel"]) || empty($_POST["date"])
) {
    // Redirection si des données sont manquantes
    header("Location: ../login/login.php");
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

        $sql = 'SELECT idClient FROM `client` WHERE `email`=:email';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $produit = $query->fetch();

        // Requête SQL pour mettre à jour les données du client
        $sql = 'UPDATE `client` SET `email` = :email, `nom` = :nom, `prenom` = :prenom, `tel` = :tel, `date` = :date WHERE `idClient` = :idClient';

        // Préparation de la requête
        $query = $db->prepare($sql);

        // Liaison des valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':tel', $tel, PDO::PARAM_STR);
        $query->bindValue(':date', $date, PDO::PARAM_STR);
        $query->bindValue(':idClient', $produit["idClient"], PDO::PARAM_INT);

        // Exécution de la requête
        $query->execute();

        // Message de succès
        $_SESSION['success'] = "Mise à jour réussie.";

        // Redirection avec les données de l'utilisateur
        header("Location: profile.php?email=$email");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../login/login.php");
        exit();
    }
}
require_once('../../bd/close.php');
?>
