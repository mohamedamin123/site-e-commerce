<?php
require_once('../../../bd/connect.php');
require("../requets.php");
require("../../../utils/email.php");

// Vérifiez si le bouton de changement d'état a été soumis
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $resultSelect=selectClient($db,$id);
    if ($resultSelect) {
        // Inversez le statut actuel
        $newStatus = ($resultSelect['statut'] == 0) ? 1 : 0;

        // update statut
        $queryUpdate=updateStatut($db,$id,$newStatus);

        header('Location: comptes.php');

        // Vérifiez si la requête s'est exécutée avec succès
        if ($queryUpdate) {
            // Redirection vers la page comptes.php si la requête réussit
            envoyerCompte($resultSelect["email"],$newStatus);
            exit();
        } else {
            // Affichez un message d'erreur si la requête échoue
            echo "Erreur lors de la mise à jour du statut.";
        }
    } else {
        // Affichez un message d'erreur si l'utilisateur n'a pas été trouvé
        echo "Utilisateur non trouvé.";
    }
} else {
    // Affichez un message si le bouton de changement d'état n'a pas été soumis
    echo "Aucun identifiant d'utilisateur n'a été reçu.";
}

require_once('../../../bd/close.php');
