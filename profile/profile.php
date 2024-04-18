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


    <header class="custom-bg-color">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-3 d-flex justify-content-start align-items-center">
                    <img src="../assets/images/logo.jpeg" style="margin-top: 10px; margin-right:10px" alt="" height="100px" width="100px" class="d-flex justify-content-start align-items-center">
                    <span class="gauche" style="font-weight:bold ;color: aliceblue; margin-top: 20px;"> titre </span>
                </div>

                <!-- Center -->
                <div class="col-6 d-flex align-items-center justify-content-center">
                <form id="searchForm" method="POST" action="">
                    <div class="input-group w-100">
                        <input style="margin-top: 20px; border-radius: 50px;" type="search" class="form-control" placeholder="Rechercher">
                    </div>
                </form>
                </div>

                <!-- Right -->
                <div class="col-3 d-flex align-items-center justify-content-end">
                <span style="margin-top: 20px;" class="form-control rounded-pill">
                        <form id="myForm" action="photo.php" method="post" enctype="multipart/form-data" >
                            <label for="avatar_input">
                                <?php
                                if (!empty($produit["photo"])) {
                                    // Si la photo dans la base de données est disponible, l'afficher
                                    echo '<img id="avatar" src="data:image/jpeg;base64,' . base64_encode($produit["photo"]) . '" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">';
                                } else {
                                    // Si la photo dans la base de données est vide, afficher l'image par défaut
                                    echo '<img id="avatar" src="../assets/images/user.png" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">';
                                }
                                ?>
                            </label>
                            <?php
                            if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                                // Afficher le champ de téléchargement de la photo uniquement si l'utilisateur est connecté
                                echo '<input type="file" id="avatar_input" name="avatar" style="display: none;" onchange="uploadAvatar(this);">';
                            }
                            ?>
                        </form>
                    </span>

                    <span style="margin-top: 20px; margin-left:20px">
                        <!--User name -->
                        <?php            

                        if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                            echo "<i id='login' name='profile'>" . $produit["prenom"] . " " . $produit["nom"] . "</i>";
                            echo "<i class='deconexion' onclick='login()'> Déconnecte </i>";
                        } else {
                            echo "<i onclick='login()' class='deconexion'> Créer un compte ! </i>";
                        }
                        require_once('../bd/close.php');
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="border-bottom mb-0 mt-3"></div>
    </header>
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="../home/index.php">Home</a>
        <a class="navbar-brand" href="../favoris/favoris.php">Favoris</a>
        <a class="navbar-brand" href="../my_produit/myProduit.php">Mon produits</a>
        <a class="navbar-brand" href="../panier/panier.php">Panier</a>
        <a class="navbar-brand" href="../article/ajouter.php" >Ajouter</a>
    </nav>

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