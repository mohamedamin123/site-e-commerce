<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body style="background-color: #eee;">
    <?php
require_once('../../../connexion/securite/admin_check.php');
require("../../../bd/connect.php");
require("../requets.php");
$id=$_GET["id"];
$article=articleById($db,$id);

?>
<div class="mt-2 text-center">
<nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="../annonce/annonce.php">Retour</a></li>
                <li class="breadcrumb-item active" aria-current="page">Consulter produit : <?php echo $article["titre"]  ?> </li>
            </ol>
        </nav>
    </div>
<?php



echo '<div class="list">';
echo '<div class="admin-icon-container">';

    echo '<div class="product" style="margin-right: 20px;">';
    echo '<p style="opacity:0;" class="desc" id="description">' . $article["description"] . 'dt </p>';

    echo '<div class="image-product">';
    echo '<img class="img" id="image" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
    echo '</div>';

    echo '<div class="content">';
    
    echo '<h4 class="name" id="titre">' . $article["titre"] . '</h4>';
    echo '<h2 class="price" id="prix">' . $article["prix"] . 'dt </h2>';
    //

    // Button to show details
    echo '<button class="btn btn-primary" onclick="showDetails()">Voir détails</button>';
    echo '</div>'; // .content
    echo '</div>'; // .product


echo '</div>';
echo '</div>';

?>
<script src="script.js"></script>
</body>

</html>