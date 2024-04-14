<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>
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
                        <input style="margin-top: 20px; border-radius: 50px;" id="searchInput" type="search" class="form-control" placeholder="Rechercher">
                    </div>
                </form>
                </div>

                <!-- Right -->
                <div class="col-3 d-flex align-items-center justify-content-end">
                    <span style="margin-top: 20px;" class="form-control rounded-pill">
                        <i class="fas fa-user"></i>
                    </span>

                    <span style="margin-top: 20px; margin-left:20px">
                        <!--User name -->
                        <?php
                        session_start();
                        require_once('../bd/connect.php');

                        if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                            $email = strip_tags($_SESSION['email']);
                            // On écrit notre requête
                            $sql = 'SELECT * FROM `Client` WHERE `email`=:email';
                            // On prépare la requête
                            $query = $db->prepare($sql);
                            // On attache les valeurs
                            $query->bindValue(':email', $email, PDO::PARAM_STR);
                            // On exécute la requête
                            $query->execute();
                            // On stocke le résultat dans un tableau associatif
                            $produit = $query->fetch();
                            echo "<i>" . $produit["prenom"] . " " . $produit["nom"] . "</i>";
                        } else {
                            echo "<i onclick='login()' id='login'> Créer un compte ! </i>";
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
        <a class="navbar-brand" href="../my_produit/myProduit.php" style="color: green;">Mon produits</a>
        <a class="navbar-brand" href="../panier/panier.php" >Panier</a>
        <a class="navbar-brand" href="../article/ajouter.php">Ajouter</a>
    </nav>
    <section>
    <div class="box" id="searchResults">
        <?php
        
        $sql1 = 'SELECT * FROM `Article` where idCLient=:id';
        // On prépare la requête
        $query = $db->prepare($sql1);

        $query->bindValue(':id', $produit["idClient"], PDO::PARAM_STR);


        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif

        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $article) {
            // Récupérer les données binaires de l'image depuis la base de données
            $imageData = base64_encode($article["photo"]); // Supposons que "photo" contient les données binaires de l'image
            echo '<p>' . $article["titre"] . '</p>';
            // Afficher l'image encodée en base64
            echo '<img class="img_principal" src="data:image/jpeg;base64,' . base64_encode($article["photo"]) . '" alt="Image">';
            echo '</div>';
        }
        
        require_once('../bd/close.php');
        ?>
    </div>
</section>

    <script src="script.js"></script>
</body>

</html>