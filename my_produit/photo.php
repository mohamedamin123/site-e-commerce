<?php
// Vérifie si un fichier a été téléchargé
require("traitement.php");


if (isset($_FILES["avatar"]) && !empty($_FILES["avatar"]["name"])) {
    // Récupère le contenu du fichier
    $photoData = file_get_contents($_FILES["avatar"]["tmp_name"]);

    $imageType = $_FILES["avatar"]["type"];
    
        // Vérification du type de fichier
        if ($imageType !== 'image/jpeg' && $imageType !== 'image/png') {
            header("Location: index.php");
            exit;
        }




    $sql = 'UPDATE `client` SET `photo` = :photo where `email` = :email';

    // Préparation de la requête
    $query = $db->prepare($sql);


    $query->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
    $query->bindValue(':photo', $photoData, PDO::PARAM_LOB);
    
    $query->execute();
    header("Location: myProduit.php");
    exit();

    // Vous devez maintenant insérer $avatarData dans votre base de données.
    // Assurez-vous de convertir le contenu du fichier en format approprié avant de l'insérer dans la base de données.
    // Par exemple, si votre base de données stocke des images au format BLOB, vous pouvez utiliser des requêtes préparées pour insérer les données.

    // Après avoir inséré l'image dans la base de données, redirigez l'utilisateur vers une autre page ou affichez un message de confirmation.
    // header("Location: somepage.php");
    // exit();
} else {
    // Si aucun fichier n'a été téléchargé, affichez un message d'erreur ou redirigez l'utilisateur.
    // header("Location: errorpage.php");
    // exit();
}
