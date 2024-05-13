<?php
session_start();
require("../requets.php");
require("../../bd/connect.php");

$produit=connect($db);

$panier=selectPanierByIdClient($db,$produit["idClient"]);

$articles=selectAllPanierByIdlient($db,$produit["idClient"]);


// Calculer le prix total
$prix_total = calculerPrixTotal($articles, $db);

updatePanier($db,$prix_total,$panier["idPanier"]) ;
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

                $article_details = selectArticleByIdArticle($db,$article["idArticle"]);
                // Afficher les détails de l'article dans le tableau
                echo '<tr>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($article_details["photo"]) . '"></td>';

                echo '<td>' . $article_details['titre'] . '</td>';
                echo '<td>' . $article_details['prix'] . 'Dt</td>'; // Modification ici pour afficher le prix unitaire
                echo '<td>' . $article['quantite'] . '</td>';
                echo '<td>' . $article['quantite'] * $article_details['prix'] . 'Dt </td>';
                echo '<td><a href="info_panier.php"><img src="../../assets/images/voir.png"</a></td>';
                
                echo '<form  id="myForm2' . $index . '" action="modifierPanier.php" method="POST">';
                echo '<td><img onclick="traiter2(' . $article["id"] . ', ' . $article_details['idArticle'] . ');" style="cursor: pointer;" src="../../assets/images/modifier.png"></td>';
                echo '</form>';

                echo '<form  id="myForm' . $index . '" action="supprimer.php" method="POST">';
                echo '<td><img onclick="traiter(' . $index . ');" src="../../assets/images/souriant.png" style="cursor: pointer;"</td>';
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
