<?php

function selectAllArticle($db) {
$sql = 'SELECT * FROM `article` order by date desc';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
return $result;
}

function articleById($db,$id) {

    $sqlSelect = 'SELECT * FROM `article` WHERE `idArticle` = :id';
    $querySelect = $db->prepare($sqlSelect);
    $querySelect->execute(array(':id' => $id));
    $resultSelect = $querySelect->fetch(PDO::FETCH_ASSOC);
    return $resultSelect;
}

function clientByID($db,$id2) {
    $sqlSelect2 = 'SELECT * FROM `client` WHERE `idClient` = :id2';
    $querySelect2 = $db->prepare($sqlSelect2);
    $querySelect2->execute(array(':id2' => $id2));
    $resultSelect2 = $querySelect2->fetch(PDO::FETCH_ASSOC);
    return $resultSelect2;
}

function update ($db,$newStatus,$id) {
    $sqlUpdate = 'UPDATE `article` SET `statut` = :newStatus WHERE `idArticle` = :id';
    $queryUpdate = $db->prepare($sqlUpdate);

    // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
    $queryUpdate->execute(array(':newStatus' => $newStatus, ':id' => $id));
    return $queryUpdate;
}

function selectByRecherche($db,$search) {
    $sql = 'SELECT * FROM `article` WHERE  (titre LIKE :search OR description LIKE :search ) ORDER BY date DESC';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête
    $query->execute(array(':search' => '%' . $search . '%'));
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function supprimer($db,$id) {
    $sqlDeleteArticles = 'DELETE FROM `article` WHERE `idArticle` = :id';
    $queryDeleteArticles = $db->prepare($sqlDeleteArticles);
    return $queryDeleteArticles->execute(array(':id' => $id));
}

?> 