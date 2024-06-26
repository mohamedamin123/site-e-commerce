<?php
require_once('../../bd/connect.php');
require_once('../requets.php');

session_start();

// Vérifiez si le bouton de soumission a été envoyé
if (isset($_POST['idCli']) && isset($_POST['idArt'])) {
    // Récupérez l'identifiant du client et de l'article à ajouter au favoris
    $idCli = $_POST['idCli'];
    $idArt = $_POST['idArt'];
    echo "client ".$idCli;
    echo "art ".$idArt ;
    $favoris=selectFavoris($db, $idCli, $idArt);
    $currentURL = $_SERVER['REQUEST_URI'];
    $page=$_POST["page"];
    // Si aucun favoris n'existe pour ce client et cet article, en créer un nouveau
    if (!$favoris) {
        
        insertFavoris($db,$idCli,$idArt);
    } else {
        // Si un favoris existe déjà pour ce client et cet article, supprimer l'article du favoris
        $idFavoris = $favoris['idFavoris'];
        supprimerFavoris($db,$idFavoris);
    }
    if($page==1) {
        header('Location: ../../../client/home/index.php');
    } else {
        header('Location: ../../../client/favoris/favoris.php');
    }
    exit();

} else {
    // Affichez un message si le bouton de soumission n'a pas été envoyé
    echo "Aucun identifiant de client ou d'article spécifié.";
}

require_once('../../bd/close.php');
?>
