<?php
function select($db)
{
    $sql = 'SELECT * FROM `client` where role ="client" order by date desc';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête
    $query->execute();
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function selectRecherche($db)
{
    $search = $_POST['search'];
    $sql = 'SELECT * FROM `client` WHERE role = "client" AND (email LIKE :search OR nom LIKE :search OR prenom LIKE :search) ORDER BY date DESC';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête
    $query->execute(array(':search' => '%' . $search . '%'));
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function selectClient($db, $id)
{
    // Récupérez le statut actuel de l'utilisateur
    $sqlSelect = 'SELECT * FROM `client` WHERE `idClient` = :id';
    $querySelect = $db->prepare($sqlSelect);
    $querySelect->execute(array(':id' => $id));
    $resultSelect = $querySelect->fetch(PDO::FETCH_ASSOC);
    return $resultSelect;
}

function updateStatut($db, $id, $newStatus)
{
    $sqlUpdate = 'UPDATE `client` SET `statut` = :newStatus WHERE `idClient` = :id';
    $queryUpdate = $db->prepare($sqlUpdate);

    // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
    $queryUpdate->execute(array(':newStatus' => $newStatus, ':id' => $id));
    return $queryUpdate;
}

function supprimerCLient($db, $id)
{
    // Supprimer d'abord les articles associés à cet utilisateur
    $sqlDeleteArticles = 'DELETE FROM `article` WHERE `idClient` = :id';
    $queryDeleteArticles = $db->prepare($sqlDeleteArticles);
    $queryDeleteArticles->execute(array(':id' => $id));

    // Ensuite, supprimez l'utilisateur lui-même
    $sqlDeleteUser = 'DELETE FROM `client` WHERE `idClient` = :id';
    $queryDeleteUser = $db->prepare($sqlDeleteUser);
    $queryDeleteUser->execute(array(':id' => $id));

    return $queryDeleteUser;
}
