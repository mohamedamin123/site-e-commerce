<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>

<?php
        require_once('traitement2.php');
    ?> 



<div class="mt-2 text-center">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px;"><img onclick="retour()" src="../../../assets/images/fleche.png" alt="Flèche"></div>
        </div>
    </div>

    <main class="main d-block mx-auto ">
        <h1 class="titre">Votre Profile</h1>
        <div class="d-block mx-auto text">
            <form action="traitement.php" method="post" enctype="multipart/form-data" id="myForm" class="form">

                <!-----------------------------------NOM------------------------------------->
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" class="form-control" value="<?php echo $produit['nom'] ?>" required>
                <div class="small text-danger mt-2 mb-2 text text-center" id="nomError"></div>
                <!-----------------------------------/NOM------------------------------------->




                <!-----------------------------------PRENOM------------------------------------->
                <label for="prenom">Prenom:</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="<?php echo $produit['prenom'] ?>" required>
                <div class="small text-danger mt-2 mb-2 text text-center" id="prenomError"></div>
                <!-----------------------------------/PRENOM------------------------------------->




                <!-----------------------------------EMAIL------------------------------------->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $produit['email'] ?>" readonly>
                <div class="small text-danger mt-2 mb-2 text text-center" id="nomError"></div>
                <!-----------------------------------/EMAIL------------------------------------->


                <!-----------------------------------DATE------------------------------------->
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" value="<?php echo $produit['date'] ?>" required>
                <div class="small text-danger mt-2 mb-2 text text-center" id="dateError"></div>
                <!-----------------------------------/DATE------------------------------------->

                <!-----------------------------------TEL------------------------------------->
                <label for="tel">Tel:</label>
                <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $produit['tel'] ?>" required>
                <div class="small text-danger mt-2 mb-2 text text-center" id="telError"></div>
                <!-----------------------------------/TEL------------------------------------->

                <input class="mb-2 mt-4 btn btn-danger" onclick="valider()" type="button" value="Mettre a jour" name="ajouter">

            </form>
            <?php
            session_start();

            // Vérification si la session de succès est définie
            if (isset($_SESSION['success'])) {
                // Affichage du message de succès
                echo "<p class='text text-center success' >{$_SESSION['success']}</p>";
                // Suppression de la session de succès pour éviter l'affichage répété
                unset($_SESSION['success']);
            }
            ?>

        </div>
    </main>

    <script src="profile.js"></script>
</body>

</html>