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

    <div class="mt-2 text-center">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px;"><img onclick="retour()" src="../../../assets/images/fleche.png" alt="Flèche"></div>
            <h1 class="d-block mx-auto" type="button">Liste de articles</h1>
        </div>
    </div>


    <div class="container p-2">

        <input class="form-control" type="text" placeholder="Rechercher..." />

        <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Date de publication</th>
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col">Change Etat</th>
                    <th scope="col">Supprimer</th>

                </tr>
            </thead>

            <tbody>

                <?php
                // On inclut la connexion à la base
                require_once('../../../bd/connect.php');
                // On écrit notre requête
                $sql = 'SELECT * FROM `Article` order by date desc';
                // On prépare la requête
                $query = $db->prepare($sql);
                // On exécute la requête
                $query->execute();
                // On stocke le résultat dans un tableau associatif
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                require_once('../../../bd/close.php');

                $i=1;

                foreach ($result as $user) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $i. "</th>";
                    echo "<td>" . $user['titre'] . "</td>";
                    echo "<td>" . $user['date'] . "</td>";
                    echo "<td>" . $user['statut'] . "</td>";
                    echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $user['idArticle'] . "'>Consulter</a></td>";
                    echo "<td id='userStatus'>";
                    echo "<form method='post' action='traitement.php'>";
                    echo "<button class='btn btn-warning' type='submit' name='id' value='" . $user['idArticle'] . "'>" . ($user['statut'] == 1 ? 'Active' : 'Desactive') . "</button>";
                    echo "</form>";

                    echo "</td>";
                    echo "<td><a class='btn btn-danger' href='../supprimer/supprimer.php?id=" . $user['idArticle'] . "'>Supprimer</a></td>";
                    echo "</tr>";
                    $i++;
                }




                ?>
            </tbody>
        </table>

    </div>
<script src="script.js"></script>
</body>

</html>