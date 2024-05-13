<?php
require '../../class/client.php';
require '../requets.php';


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
    require_once('../../bd/connect.php');

    // Préparation de la requête SQL INSERT INTO
    $con=insert($db,$userNom,$userPrenom,$userEmail,$userPass,$userTel,$userRole,$userStatut,$userDate);

    // Fermeture de la connexion à la base de données
    require_once('../../bd/close.php');
    header("Location: ../../../../client/home/index.php");

} else {
    // Gérer le cas où les données clientData ne sont pas présentes dans la session
}
