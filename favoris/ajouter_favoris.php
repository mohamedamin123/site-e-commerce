<?php
require_once('../bd/connect.php');
require_once('traitement.php');

session_start();

// Vérifiez si le bouton de soumission a été envoyé
if (isset($_POST['idCli']) && isset($_POST['idArt'])) {
    // Récupérez l'identifiant du client et de l'article à ajouter au favoris
    $idCli = $_POST['idCli'];
    $idArt = $_POST['idArt'];

    // Requête pour vérifier s'il existe déjà un favoris pour ce client et cet article
    $sql_favoris = 'SELECT * FROM `favoris` WHERE `idClient`=:idCli AND `idArticle`=:idArt';
    $query_favoris = $db->prepare($sql_favoris);
    $query_favoris->bindValue(':idCli', $idCli, PDO::PARAM_INT);
    $query_favoris->bindValue(':idArt', $idArt, PDO::PARAM_INT);
    $query_favoris->execute();
    $favoris = $query_favoris->fetch();

    // Si aucun favoris n'existe pour ce client et cet article, en créer un nouveau
    if (!$favoris) {
        $sql_insert_favoris = 'INSERT INTO `favoris` (`idClient`, `idArticle`) VALUES (:idCli, :idArt)';
        $query_insert_favoris = $db->prepare($sql_insert_favoris);
        $query_insert_favoris->bindValue(':idCli', $idCli, PDO::PARAM_INT);
        $query_insert_favoris->bindValue(':idArt', $idArt, PDO::PARAM_INT);
        $query_insert_favoris->execute();
        header('Location: ../../../home/index.php');
        exit();
    } else {
        // Si un favoris existe déjà pour ce client et cet article, supprimer l'article du favoris
        $idFavoris = $favoris['idFavoris'];
        $sql_delete_favoris = 'DELETE FROM `favoris` WHERE `idFavoris`=:idFavoris';
        $query_delete_favoris = $db->prepare($sql_delete_favoris);
        $query_delete_favoris->bindValue(':idFavoris', $idFavoris, PDO::PARAM_INT);
        $query_delete_favoris->execute();
        header('Location: ../../../home/index.php');
        exit();
    }
} else {
    // Affichez un message si le bouton de soumission n'a pas été envoyé
    echo "Aucun identifiant de client ou d'article spécifié.";
}

require_once('../bd/close.php');
?>
