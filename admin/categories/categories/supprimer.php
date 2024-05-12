<?php
require_once('../../../bd/connect.php');

// Vérifiez si le bouton de suppression a été soumis
if (isset($_GET['id'])) {
    // Récupérez l'identifiant de l'utilisateur à supprimer
    $id = $_GET['id'];

    // Supprimer d'abord les articles associés à cet utilisateur
    $sqlDeleteArticles = 'DELETE FROM `categories` WHERE `idCategories` = :id';
    $queryDeleteArticles = $db->prepare($sqlDeleteArticles);
    $queryDeleteArticles->execute(array(':id' => $id));

    // Ensuite, supprimez l'utilisateur lui-même
    $sqlDeleteUser = 'DELETE FROM `article` WHERE `idCategories` = :id';
    $queryDeleteUser = $db->prepare($sqlDeleteUser);
    $queryDeleteUser->execute(array(':id' => $id));

    // Vérifiez si les requêtes se sont exécutées avec succès
    if ($queryDeleteArticles && $queryDeleteUser) {
        // Redirigez vers la page où vous souhaitez aller après la suppression
        header('Location: categories.php');
        exit();
    } else {
        // Affichez un message d'erreur si la suppression échoue
        echo "Erreur lors de la suppression de l'utilisateur.";
    }
} else {
    // Affichez un message si le bouton de suppression n'a pas été soumis
    echo "Aucun identifiant d'utilisateur n'a été reçu.";
}

require_once('../../../bd/close.php');
?>
