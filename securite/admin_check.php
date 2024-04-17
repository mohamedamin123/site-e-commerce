<?php
// Démarrez la session
session_start();

// Vérifiez si la session existe et si l'utilisateur est connecté
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirigez l'utilisateur vers la page de connexion ou affichez un message d'erreur
    header("Location: ../../../login/login.php");
    exit;
}
?>
