<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
<?php
// Incluez le fichier de vérification de session
require_once('../../../securite/admin_check.php');

// Le reste de votre code pour cette page admin
?>

    <main class="main d-block mx-auto ">
        <div style="margin: 15px;">
            <h1 class="titre">Ajouter nouveau categories</h1>
            <div class="d-block mx-auto text">
                <form action="traitement.php" method="post" enctype="multipart/form-data" id="myForm" class="form ml-3">
                    <!-- Ajout de la classe "ml-3" pour une marge à gauche de 3 unités Bootstrap -->

                    <!-----------------------------------NOM------------------------------------->
                    <label for="titre">Titre:</label>
                    <input type="text" name="titre" id="titre" class="form-control" value="<?php echo $produit['titre'] ?>" required>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="titreError"></div>
                    <!-----------------------------------/NOM------------------------------------->

                    <!-----------------------------------PRENOM------------------------------------->
                    <label for="description">Description:</label>
                    <textarea name="description" cols="15" rows="5" class="form-control" value="<?php echo $produit['description'] ?>" required></textarea>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="descriptionError"></div>
                    <!-----------------------------------/PRENOM------------------------------------->

                    <!-----------------------------------/TEL------------------------------------->

                    <input class="mb-2 mt-4 btn btn-danger" type="submit" value="Ajouter" name="ajouter">

                </form>
            </div>
        </div>

    </main>

</body>

</html>