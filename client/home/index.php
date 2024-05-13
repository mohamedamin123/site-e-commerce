<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../home/style.css">
</head>

<body>
    <?php
    session_start();
    require("../../bd/connect.php");
    require_once('../requets.php');
    $client=connect($db);

    $limitLignesPage = isset($_SESSION['nbrLignesAffiche']) ? $_SESSION['nbrLignesAffiche'] : 9;
    // Obtenir le nombre total des 

    $reqSql = "SELECT count(idArticle) AS nbrLignes FROM article where statut = 1";
    // On prépare la requête
    $query = $db->prepare($reqSql);
    // On exécute
    $query->execute();
    // On récupère le nombre d'enregistrements
    $resultat = $query->fetch(PDO::FETCH_ASSOC);
    $toutesLignes = (int) $resultat['nbrLignes'];
    // Calculer le nombre total de pages
    $totoalPages = ceil($toutesLignes / $limitLignesPage);

    // On détermine sur quelle page on se trouve
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }

    // Calcul de l'offset pour récupérer les éléments de la page actuelle
    $offset = ($currentPage - 1) * $limitLignesPage;

    //preparer la requete
    $requete = "select * from client where role = 'client' limit $offset,$limitLignesPage ";
    // lancer la requete
    $resultat = $db->query($requete);
    $publishers = $resultat->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['offset'] = $offset;
    $_SESSION['limitLignesPage'] = $limitLignesPage;
    require("../../bd/close.php");
    ?>
    <header class="custom-bg-color">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-3 d-flex justify-content-start align-items-center">
                    <img src="../../assets/images/logo.jpeg" style="margin-top: 10px; margin-right:10px" alt="" height="100px" width="100px" class="d-flex justify-content-start align-items-center">
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
                                if (!empty($client["photo"])) {
                                    // Si la photo dans la base de données est disponible, l'afficher
                                    echo '<img id="avatar" src="data:image/jpeg;base64,' . base64_encode($client["photo"]) . '" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">';
                                } else {
                                    // Si la photo dans la base de données est vide, afficher l'image par défaut
                                    echo '<img id="avatar" src="../../assets/images/user.png" alt="avatar" style="width: 30px; height: 30px; border-radius: 50%;">';
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
                            echo '<form action="../admin/home/logout.php" method="post" style="margin-left:40px ">';
                            echo "<i id='login' name='profile'>" . $client["prenom"] . " " . $client["nom"] . "</i>";
                            echo "<i class='deconexion' onclick='login()' > Déconnecte </i>";
                            echo '</form ">';

                        } else {
                            echo "<i onclick='login()' class='deconexion'> Créer un compte ! </i>";
                        }
                        ?>
                    </span>
                </div>
            </div>
        </div>
        <div class="border-bottom mb-0 mt-3"></div>
    </header>
    <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#" style="color: green;">Home</a>
        <a class="navbar-brand" href="../favoris/favoris.php">Favoris</a>
        <a class="navbar-brand" href="../my_produit/myProduit.php">Mon produits</a>
        <a class="navbar-brand" href="../panier/panier.php">Panier</a>
        <a class="navbar-brand" href="../article/ajouter.php">Ajouter</a>
    </nav>
    <section>

<!-- Votre formulaire d'ajout au panier ici -->

        <div id="searchResults">
            
        </div>
    </section>


    <footer class="d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php if ($currentPage <= 1) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($currentPage <= 1) {
                                                    echo '#';
                                                } else {
                                                    echo '?page=' . ($currentPage - 1);
                                                } ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Precedent</span>
                    </a>
                </li>
                <?php for ($i = 1; $i <= $totoalPages; $i++) : ?>
                    <li class="page-item <?php if ($currentPage == $i) {
                                                echo 'active';
                                            } ?>">
                        <a class="page-link" href="?page=<?= $i; ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <li class="page-item <?php if ($currentPage >= $totoalPages) {
                                            echo 'disabled';
                                        } ?>">
                    <a class="page-link" href="<?php if ($currentPage >= $totoalPages) {
                                                    echo '#';
                                                } else {
                                                    echo '?page=' . ($currentPage + 1);
                                                } ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Suivant</span>
                    </a>
                </li>
            </ul>
        </nav>
    </footer>


    <?php
session_start();

// Vérifiez si l'article a déjà été ajouté au panier et affichez une alerte si nécessaire
if (isset($_SESSION['article_deja_ajoute']) && $_SESSION['article_deja_ajoute']) {
    echo "<script>alert('Cet article est déjà ajouté au panier.');</script>";
    // Une fois l'alerte affichée, supprimez la variable de session pour éviter qu'elle ne s'affiche à nouveau lors du prochain chargement de la page
    unset($_SESSION['article_deja_ajoute']);
}
?>





    <script src="script.js"></script>


</body>

</html>