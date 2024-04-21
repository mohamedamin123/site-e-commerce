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
    <section>
        <table>
            <tr>
                <th>Photo de produit</th>
                <th>Nom</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Prix total</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            <?php
            require("traitement.php");

            ?>

            <tr class="total">
                <?php
                echo '<th>Total : '.$panier["prix_total"].'</th>';
                ?>
                
            </tr>
        </table>
    </section>
    <script src="script.js"></script>
</body>
</html>