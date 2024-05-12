<?php
session_start();
require("traitement.php");

// Fonction pour calculer le prix total du panier
function calculerPrixTotal($articles, $db) {
    $prixTotal = 0;
    foreach ($articles as $article) {
        // Récupérer les détails de l'article depuis la base de données
        $sql4 = 'SELECT prix FROM article WHERE idArticle=:idArticle';
        $query4 = $db->prepare($sql4);
        $query4->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_STR);
        $query4->execute();
        $article_details = $query4->fetch(PDO::FETCH_ASSOC);

        // Ajouter le prix de chaque article au prix total
        $prixTotal += $article['quantite'] * $article_details['prix'];
    }
    return $prixTotal;
}

// Calculer le prix total
$prix_total = calculerPrixTotal($articles, $db);

// Mettre à jour le prix total dans la base de données
$sql_update_prix_total = "UPDATE panier SET prix_total = :prix_total WHERE idPanier = :idPanier";
$query_update_prix_total = $db->prepare($sql_update_prix_total);
$query_update_prix_total->bindValue(':prix_total', $prix_total, PDO::PARAM_STR);
$query_update_prix_total->bindValue(':idPanier', $panier["idPanier"], PDO::PARAM_STR);
$query_update_prix_total->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>panier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="panier">
    <a href="../home/index.php" class="link mb-4">Home</a>
    <?php
    $count_articles = count($articles);
    if($count_articles !=0) {
        echo '<a href="../commande/commande.php" class="link mb-4">Passer la commande</a>';
    }
    ?>
    
    <section>
        <table>
            <tr>
                <th>Photo de produit</th>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
                <th>Voir</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            foreach ($articles as $index => $article) {
                // Récupérer les détails de l'article depuis la base de données
                $sql4 = 'SELECT * FROM article WHERE idArticle=:idArticle';
                $query4 = $db->prepare($sql4);
                $query4->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_STR);
                $query4->execute();
                $article_details = $query4->fetch();
                // Afficher les détails de l'article dans le tableau
                echo '<tr>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($article_details["photo"]) . '"></td>';

                echo '<td>' . $article_details['titre'] . '</td>';
                echo '<td>' . $article_details['prix'] . 'Dt</td>'; // Modification ici pour afficher le prix unitaire
                echo '<td>' . $article['quantite'] . '</td>';
                echo '<td>' . $article['quantite'] * $article_details['prix'] . 'Dt </td>';
                echo '<td><a href="info_panier.php"><img src="../assets/images/voir.png"</a></td>';
                
                echo '<form  id="myForm2' . $index . '" action="modifierPanier.php" method="POST">';
                echo '<td><img onclick="traiter2(' . $article["id"] . ', ' . $article_details['idArticle'] . ');" style="cursor: pointer;" src="../assets/images/modifier.png"></td>';
                echo '</form>';

                echo '<form  id="myForm' . $index . '" action="supprimer.php" method="POST">';
                echo '<td><img onclick="traiter(' . $index . ');" src="../assets/images/souriant.png" style="cursor: pointer;"</td>';
                echo '<input href="#" type="hidden" name="id" value="' . $article["id"] . '"/>';
                echo '<input href="#" type="hidden" name="id2" value="' . $panier["idPanier"] . '"/>';
                echo '<input href="#" type="hidden" name="prix" value="' . $article['quantite'] * $article_details['prix'] . '"/>';

                echo '</form>';
                echo '</tr>';
            }
            ?>

            <tr class="total">
                <?php
                echo '<th>Total : ' . $prix_total . 'Dt</th>';
                ?>
                
            </tr>
        </table>
    </section>
    <script src="script.js"></script>
</body>
</html>
