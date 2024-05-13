<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="annonce.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

</head>

<body>
<?php
// Incluez le fichier de vérification de session
require_once('../../../connexion/securite/admin_check.php');

// Le reste de votre code pour cette page admin
?>

    <div class="mt-2 text-center">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px;"><img onclick="retour()" src="../../../assets/images/fleche.png" alt="Flèche"></div>
            <h1 class="d-block mx-auto" type="button">Liste de articles</h1>
        </div>
    </div>


    <div class="container p-2">

    <form id="searchForm" method="POST" action="">
    <input id="searchInput" class="form-control" type="search" name="search" placeholder="Rechercher..." />
    </form>
        <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col"> Etat</th>
                    <th scope="col">Supprimer</th>

                </tr>
            </thead>

            <tbody id="searchResults">

            </tbody>
        </table>

    </div>
<script src="script.js"></script>
</body>

</html>