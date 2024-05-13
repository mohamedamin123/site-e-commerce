<?php
session_start();
require_once('../bd/connect.php');

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    if (isset($_POST['quantite'])) {
        $quantites = $_POST['quantite'];
        foreach ($quantites as $key => $quantite) {
            // Mettre à jour la quantité dans la base de données pour l'article correspondant
            $sql = 'UPDATE panier_article SET quantite=:quantite WHERE id=:id';
            $query = $db->prepare($sql);
            $query->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            $query->bindValue(':id', $_POST['id'][$key], PDO::PARAM_INT);
            $query->execute();
        }
        // Redirection vers la page du panier ou autre page après la modification des quantités
        header("Location: panier.php");
        exit();
    }
}
?>
