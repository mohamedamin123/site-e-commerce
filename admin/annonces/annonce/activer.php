<?php
require_once('../../../bd/connect.php');
require("../../../utils/email.php");
require("../requets.php");
session_start(); // Démarrer la session si ce n'est pas déjà fait

// Vérifiez si le bouton de changement d'état a été soumis
if (isset($_POST['id']) ) {
    $id = $_POST['id'];

    // Récupérez le statut actuel de l'utilisateur

    $resultSelect = articleById($db,$id);
    $id2=$resultSelect["idClient"];
    $resultSelect2=clientByID($db,$id2);


    if ($resultSelect) {
        // Inversez le statut actuel
        $newStatus = ($resultSelect['statut'] == 0) ? 1 : 0;

        // Préparez la requête de mise à jour

        // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
        $queryUpdate=update ($db,$newStatus,$id);

        header('Location: annonce.php');

        // Vérifiez si la requête s'est exécutée avec succès
        if ($queryUpdate) {
            // Redirection vers la page comptes.php si la requête réussit
            send($resultSelect2["email"],$newStatus,$resultSelect["titre"]);
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
