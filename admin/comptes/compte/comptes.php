<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des comptes</title>
    <link rel="stylesheet" href="comptes.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>

<body>
    <?php
    // Incluez le fichier de vérification de session
    require_once('../../../connexion/securite/admin_check.php');
    require("../../../bd/connect.php");

    $limitLignesPage = isset($_SESSION['nbrLignesAffiche']) ? $_SESSION['nbrLignesAffiche'] : 9;
    // Obtenir le nombre total des 

    $reqSql = "SELECT count(idClient) AS nbrLignes FROM client where role = 'client'";
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


    ?>
    <div class="mt-2 text-center">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px;"><img onclick="retour()" src="../../../assets/images/fleche.png" alt="Flèche"></div>
            <h1 class="d-block mx-auto" type="button">Liste de comptes</h1>
        </div>
    </div>


    <div class="container p-2 box">

        <form id="searchForm" method="POST" action="">
            <input id="searchInput" class="form-control" type="search" name="search" placeholder="Rechercher..." />
        </form>
        <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Details</th>
                    <th scope="col"> Etat</th>
                    <th scope="col">Supprimer</th>

                </tr>
            </thead>

            <tbody id="searchResults">
            </tbody>
        </table>

    </div>
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






    <script src="comptes.js"></script>
</body>

</html>