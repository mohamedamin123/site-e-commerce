<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des comptes</title>
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
            <h1 class="d-block mx-auto" type="button">Liste de categories</h1>
        </div>
    </div>


    <div class="container p-2 box">

        <form id="searchForm" method="POST" action="">
            <input id="searchInput" class="form-control" type="search" name="search" placeholder="Rechercher..." />
            <button type="button" onclick="ajouter()" class="btn btn-success mt-4 mb-2  text-right">Ajouter</button>

        </form>
        <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Description</th>
                    <th scope="col">Date</th>
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