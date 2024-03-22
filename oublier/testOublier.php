<?php
if (
    empty($_POST["email"])
) {
    header("Location: ../login/login.php");
    exit();
} else {
    // Vérification de la présence et de la non-vacuité des données
    if (
        isset($_POST["email"]) && !empty($_POST["email"])
    ) {
        // Récupération des données
        $userEmail = $_POST["email"];


        //cree random number
        $randomNumber = mt_rand(100000, 999999);
        session_start(); // Démarrer la session si ce n'est pas déjà fait

        // Stocker les données dans la session
        $_SESSION['email'] = $userEmail;
        $_SESSION['number'] = $randomNumber;


        // Redirection vers la page de destination
        header("Location: ../verifier/verifier.php");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../login/login.php");
        exit();
    }
}
