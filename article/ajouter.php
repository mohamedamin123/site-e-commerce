<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter article</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
<?php
    session_start();
    require('traitement2.php');
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
                            <input id="searchInput" style="margin-top: 20px; border-radius: 50px;" type="search" class="form-control" placeholder="Rechercher" name="search">
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
                            echo '<form action="../admin/home/adminHome.php" method="post" style="margin-left:40px ">';
                            echo "<i id='login' name='profile'>" . $produit["prenom"] . " " . $produit["nom"] . "</i>";
                            echo "<i class='deconexion' > Déconnecte </i>";
                            echo '</form ">';

                        } else {
                            echo "<i onclick='login()'class='deconexion'> Créer un compte ! </i>";
                        }
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
        <a class="navbar-brand" href="../article/ajouter.php" style="color: green;">Ajouter</a>
    </nav>

    <main class="main d-block mx-auto ">
        <?php
        if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
            echo '<h1 class="titre">Veuillez remplir le formulaire</h1>';
            echo '<div class="d-block mx-auto text">';
            echo '<h2 class="">Ajouter un article</h2>';
            echo '<form action="traitement.php" method="post" enctype="multipart/form-data" class="form">';

            echo '<label for="image">Image:</label>';
            echo '<input type="file" name="image" id="photo" class="form-control" required>';
            echo '<label>Type</label>';
            echo '<select name="categories" id="" class="form-control">';
            
            $sql = 'SELECT * FROM `Categories`';
            // On prépare la requête
            $query = $db->prepare($sql);
            // On exécute la requête
            $query->execute();
            // On stocke le résultat dans un tableau associatif
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            require_once('../bd/close.php');

            foreach ($result as $user) {
                echo "<option value='" . $user['titre'] . "'>" . $user['titre'] . "</option>";
            }
            echo '</select>';
            echo '<label>Titre</label>';
            echo '<input type="text" name="titre" class="form-control">';
            echo '<label>Prix</label>';
            echo '<input type="number" name="prix" class="form-control">';
            echo '<label>Description</label>';
            echo '<textarea name="description" cols="15" rows="5" class="form-control"></textarea>';
            echo '<input class="mb-2 mt-4 btn btn-primary" type="submit" value="Ajouter" name="ajouter">';
            echo '<input class="btn btn-danger" type="reset" value="supprimer" name="supp">';
            echo '<input type="hidden" name="session_data" value="' . htmlspecialchars(json_encode($_SESSION)) . '">';
            echo '</form>';
            echo '</div>';
        } else {
            echo '<div class="d-block mx-auto text text-center" >';
            echo '<p class="p1">Créer un compte svp!</p>';
            echo '<button class="btn btn-danger" onclick="login()">Créer un compte</button>';
            echo '</div>';
        }

        ?>
    </main>
    <script src="ajouter.js"></script>
</body>

</html>