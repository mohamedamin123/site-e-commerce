<?php
require_once('../../../bd/connect.php');

// Vérifiez si le bouton de changement d'état a été soumis
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Récupérez le statut actuel de l'utilisateur
    $sqlSelect = 'SELECT `statut` FROM `Client` WHERE `idClient` = :id';
    $querySelect = $db->prepare($sqlSelect);
    $querySelect->execute(array(':id' => $id));
    $resultSelect = $querySelect->fetch(PDO::FETCH_ASSOC);

    if ($resultSelect) {
        // Inversez le statut actuel
        $newStatus = ($resultSelect['statut'] == 0) ? 1 : 0;

        // Préparez la requête de mise à jour
        $sqlUpdate = 'UPDATE `Client` SET `statut` = :newStatus WHERE `idClient` = :id';
        $queryUpdate = $db->prepare($sqlUpdate);

        // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
        $queryUpdate->execute(array(':newStatus' => $newStatus, ':id' => $id));

        // Vérifiez si la requête s'est exécutée avec succès
        if ($queryUpdate) {
            // Redirection vers la page comptes.php si la requête réussit
            header('Location: comptes.php');
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
