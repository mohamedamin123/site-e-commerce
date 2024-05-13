<?php
session_start();
function selectArticles($db)
{
    $sql = 'SELECT * FROM `article` where statut!=0';
    // Préparer la requête
    $query = $db->prepare($sql);
    // Exécuter la requête
    $query->execute();
    // Récupérer les résultats
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

function selectFavoris($db, $idCL, $idA)
{
    $sql_check_favoris = 'SELECT * FROM `favoris` WHERE `idClient`=:idClient AND `idArticle`=:idArticle';
    $query_check_favoris = $db->prepare($sql_check_favoris);
    $query_check_favoris->bindValue(':idClient', $idCL, PDO::PARAM_INT);
    $query_check_favoris->bindValue(':idArticle', $idA, PDO::PARAM_INT);
    $query_check_favoris->execute();
    $favoris_exist = $query_check_favoris->fetch();
    return $favoris_exist;
}

function selectAllFavoris($db,$idClient) {
    // Requête SQL pour récupérer tous les articles favoris d'un client
$sql = 'SELECT * FROM `favoris` WHERE idClient = :idClient';

// Préparer la requête
$query = $db->prepare($sql);

// Récupérer l'ID du client

// Exécuter la requête avec le paramètre lié
$query->execute(array(':idClient' => $idClient));

// Récupérer les résultats
$favoris = $query->fetchAll(PDO::FETCH_ASSOC);
return $favoris;
}
function supprimerFavoris($db,$idFavoris) {
    $sql_delete_favoris = 'DELETE FROM `favoris` WHERE `idFavoris`=:idFavoris';
    $query_delete_favoris = $db->prepare($sql_delete_favoris);
    $query_delete_favoris->bindValue(':idFavoris', $idFavoris, PDO::PARAM_INT);
    return $query_delete_favoris->execute();
}
function insertFavoris($db,$idCli,$idArt) {
    $sql_insert_favoris = 'INSERT INTO `favoris` (`idClient`, `idArticle`) VALUES (:idCli, :idArt)';
    $query_insert_favoris = $db->prepare($sql_insert_favoris);
    $query_insert_favoris->bindValue(':idCli', $idCli, PDO::PARAM_INT);
    $query_insert_favoris->bindValue(':idArt', $idArt, PDO::PARAM_INT);
    return $query_insert_favoris->execute();
}



function selectFavorisByIdArticle($db,$idArticle) {
    $sql2 = 'SELECT * FROM `article` WHERE idArticle = :idArticle';

    // Préparer la requête
    $query2 = $db->prepare($sql2);

    // Récupérer l'ID de l'article favori

    // Exécuter la requête avec le paramètre lié
    $query2->execute(array(':idArticle' => $idArticle));

    // Récupérer les résultats
    $articles = $query2->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}




function connect($db)
{
    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
        $email = strip_tags($_SESSION['email']);
        // On écrit notre requête
        $sql = 'SELECT * FROM `client` WHERE `email`=:email';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $client = $query->fetch();

        return $client;
    }
}


function updatePhoto($db,$photoData) {
    $sql = 'UPDATE `client` SET `photo` = :photo where `email` = :email';

    // Préparation de la requête
    $query = $db->prepare($sql);


    $query->bindValue(':email', $_SESSION["email"], PDO::PARAM_STR);
    $query->bindValue(':photo', $photoData, PDO::PARAM_LOB);
    
    $query->execute();
}

function selectCategories($db) {
    $sql = 'SELECT * FROM `categories`';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On exécute la requête,$
    $query->execute();
    // On stocke le résultat dans un tableau associatif
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function selectIdCategories($db,$categories) {
    $sql_select_category = "SELECT idCategories FROM categories WHERE titre = :titre";
    $query_select_category = $db->prepare($sql_select_category);
    $query_select_category->bindParam(':titre', $categories);
    $query_select_category->execute();
    $result_category = $query_select_category->fetch(PDO::FETCH_ASSOC);
    return $result_category;
}

function ajouter($db,$imageData,$idCategorie,$titre,$prix,$description,$idClient,$statut) {
    $sql = "INSERT INTO article (photo, idCategories, titre, prix, description, idClient,statut) VALUES (:photo, :idCategories, :titre, :prix, :description, :idClient,:statut)";
    $query = $db->prepare($sql);
    $query->bindParam(':photo', $imageData, PDO::PARAM_LOB);
    $query->bindParam(':idCategories', $idCategorie);
    $query->bindParam(':titre', $titre);
    $query->bindParam(':prix', $prix);
    $query->bindParam(':description', $description);
    $query->bindParam(':idClient', $idClient);
    $query->bindParam(':statut', $statut);
    return $query->execute();
}
function selectCLient($db,$email) {
        // On écrit notre requête
        $sql = 'SELECT * FROM `client` WHERE `email`=:email';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $client = $query->fetch();
        return $client;
}
function selectArticle($db,$idC) {
    // Requête SQL pour récupérer tous les articles du client
    $sql2 = 'SELECT * FROM `article` WHERE `idClient`=:idClient';
    // Préparer la requête
    $query2 = $db->prepare($sql2);
    // Attacher les valeurs
    $query2->bindValue(':idClient', $idC, PDO::PARAM_INT);
    // Exécuter la requête
    $query2->execute();
    // Récupérer les résultats
    $articles = $query2->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}
function selectArticleByIdArticle($db,$idArticle) {
    $sql = "SELECT * FROM article WHERE idArticle = :idArticle";
    $query = $db->prepare($sql);
    $query->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
    $query->execute();
    $article = $query->fetch(PDO::FETCH_ASSOC);

    return $article;
}
function selectCategoriesByTitre($db,$categorieTitre) {
            // Récupère l'ID de la catégorie à partir du titre
            $sql = "SELECT idCategories FROM categories WHERE titre = :titre";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':titre', $categorieTitre);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
}
            function updateArticle($db,$titre,$prix,$description,$idCategories,$idArticle) {
            // Prépare et exécute la requête de mise à jour
            $sql = "UPDATE article SET titre = :titre, prix = :prix, description = :description, idCategories = :idCategories WHERE idArticle = :idArticle";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':prix', $prix);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':idCategories', $idCategories);
            $stmt->bindParam(':idArticle', $idArticle);
            return $stmt->execute();
}

function selectRechercheByIdCLient($db,$search,$idc) {
    $sql = "SELECT * FROM `article` WHERE (`titre` LIKE :search OR `idCategories` LIKE :search) AND `idClient`=:idClient";
    // Préparer la requête
    $query = $db->prepare($sql);
    // Attacher les valeurs et exécuter la requête
    $query->execute(array(':search' => '%' . $search . '%', ':idClient' => $idc));

    // Récupérer les résultats de la recherche
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

function selectRecherche($db, $search)
{
    // Requête SQL pour rechercher les articles par titre ou catégorie
    $sql = "SELECT * FROM `article` WHERE (`titre` LIKE :search OR `idCategories` LIKE :search) and statut!=0";
    // Préparer la requête
    $query = $db->prepare($sql);
    // Attacher les valeurs et exécuter la requête
    $query->execute(array(':search' => '%' . $search . '%'));

    // Récupérer les résultats de la recherche
    $articles = $query->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}
