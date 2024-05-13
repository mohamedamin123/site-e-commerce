<?php
function select($db) {
    $sql = 'SELECT * FROM `categories` ';
// On prépare la requête
$query = $db->prepare($sql);
// On exécute la requête
$query->execute();
// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);
return $result;
}
function selectRecherche($db) {
    $search = $_POST['search'];
    $sql = 'SELECT * FROM `categories` WHERE (titre LIKE :search OR description LIKE :search ) ORDER BY date DESC';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête
    $query->execute(array(':search' => '%' . $search . '%'));
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function supprimerCategories($db,$id) {
        // Supprimer d'abord les articles associés à cet utilisateur
        $sqlDeleteArticles = 'DELETE FROM `categories` WHERE `idCategories` = :id';
        $queryDeleteArticles = $db->prepare($sqlDeleteArticles);
        $queryDeleteArticles->execute(array(':id' => $id));
    
        // Ensuite, supprimez l'utilisateur lui-même
        $sqlDeleteUser = 'DELETE FROM `article` WHERE `idCategories` = :id';
        $queryDeleteUser = $db->prepare($sqlDeleteUser);
        $queryDeleteUser->execute(array(':id' => $id));
        return $queryDeleteUser;
}

function ajouter($db,$titre,$desc) {
    $sql = "INSERT INTO categories (titre, description) VALUES (:titre, :desc)";
    $query = $db->prepare($sql);
    $query->bindParam(':titre', $titre);
    $query->bindParam(':desc', $desc);
    $query->execute();
}
?>