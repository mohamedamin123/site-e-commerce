<?php
require_once('../../../bd/connect.php');
require("../requets.php");
// Vérifiez si le bouton de suppression a été soumis
if (isset($_POST['submit'])) {
    // Récupérez l'identifiant de l'utilisateur à supprimer
    $id = $_POST['id'];

    $queryDeleteUser=supprimerCLient($db,$id);
    // Vérifiez si les requêtes se sont exécutées avec succès
    if ($queryDeleteUser) {
        // Redirigez vers la page où vous souhaitez aller après la suppression
        header('Location: ../compte/comptes.php');
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
