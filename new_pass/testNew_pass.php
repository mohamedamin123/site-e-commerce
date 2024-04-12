<?php
require '../class/client.php';

// Démarrer la session si ce n'est pas déjà fait

session_start();

// Vérifier si les données clientData sont présentes dans la session
if (isset($_SESSION['clientData'])) {
    // Désérialisez les données de l'objet Client
    $clientData = unserialize($_SESSION['clientData']);

    // Récupérez les attributs de l'objet Client
    $userPass = $_POST["pass"];
    $userNom = $clientData->getNom();
    $userPrenom = $clientData->getPrenom();
    $userTel = $clientData->getTel();
    $userDate = $clientData->getDate();
    $userStatut = $clientData->getStatut();
    $userRole = $clientData->getRole();
    $userEmail = $clientData->getEmail();

    // Connexion à la base de données
    require_once('../bd/connect.php');

    // Préparation de la requête SQL INSERT INTO
    $sql = "INSERT INTO Client (nom, prenom, email, password, tel, role, statut, date) 
            VALUES (:nom, :prenom, :email, :password, :tel, :role, :statut, :date)";
    $query = $db->prepare($sql);

    // Exécution de la requête en remplaçant les paramètres par les valeurs appropriées
    $query->execute(array(
        ':nom' => $userNom,
        ':prenom' => $userPrenom,
        ':email' => $userEmail,
        ':password' => $userPass,
        ':tel' => $userTel,
        ':role' => $userRole,
        ':statut' => $userStatut,
        ':date' => $userDate
    ));

    // Fermeture de la connexion à la base de données
    require_once('../bd/close.php');
    header("Location: ../home/index.php");

} else {
    // Gérer le cas où les données clientData ne sont pas présentes dans la session
}
