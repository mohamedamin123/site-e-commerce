<?php
require_once('../bd/connect.php');

// Vérifiez si les champs email et pass sont définis et non vides
if((isset($_POST["email"])) && (!empty($_POST["email"])) && (isset($_POST["pass"])) && (!empty($_POST["pass"])) ) {

    // Récupérez les valeurs des champs email et pass
    $userEmail = $_POST["email"];
    $userPass = $_POST["pass"];

    // Requête SQL pour sélectionner l'utilisateur avec l'email et le mot de passe fournis
    $sql = 'SELECT * FROM `Client` WHERE `email` = :email AND `password` = :password';

    // Préparez la requête
    $query = $db->prepare($sql);

    // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
    $query->execute(array(':email' => $userEmail, ':password' => $userPass));

    // Récupérez le résultat de la requête
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // Vérifiez si un utilisateur correspondant a été trouvé
    if ($result) {
        // Redirection vers la page d'accueil si l'utilisateur existe
        header("Location: ../home");
        exit();
    } else {
        // Redirection vers la page de connexion si l'utilisateur n'existe pas
        header("Location: login.php");
        exit();
    }
} else {
    // Redirection vers la page de connexion si les champs email et pass ne sont pas définis ou sont vides
    header("Location: login.php");
    exit();
}
require_once('../bd/close.php');

?>
