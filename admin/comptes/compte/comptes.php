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

    <div class="mt-2 text-center">
        <div style="display: flex; align-items: center;">
            <div style="margin-right: 10px;"><img onclick="retour()" src="../../../assets/images/fleche.png" alt="Flèche"></div>
            <h1 class="d-block mx-auto" type="button">Liste de comptes</h1>
        </div>
    </div>


    <div class="container p-2">

        <input class="form-control" type="text" placeholder="Rechercher..." />

        <table class="table table-bordered" style="margin-top: 10px;">
            <thead>
                <tr>

                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
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
            $sql = 'SELECT * FROM `Client`';
            // On prépare la requête
            $query = $db->prepare($sql);
            // On exécute la requête
            $query->execute();
            // On stocke le résultat dans un tableau associatif
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            require_once('../../../bd/close.php');

            foreach ($result as $user) {
                echo "<tr>";
                echo "<th scope='row'>" . $user['idClient'] . "</th>";
                echo "<td>" . $user['nom'] . "</td>";
                echo "<td>" . $user['prenom'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td><a class='btn btn-info' href='../consulter/consulter.php?id=" . $user['idClient'] . "'>Consulter</a></td>";
                echo "<td id='userStatus'>";
                echo "<form method='post' action='traitement.php'>";
                echo "<button class='btn btn-warning' type='submit' name='id' value='" . $user['idClient'] . "'>" . ($user['statut'] == 1 ? 'Active' : 'Blocked') . "</button>";
                echo "</form>";
                
                echo "</td>";
                echo "<td><a class='btn btn-danger' href='../supprimer/supprimer.php?id=" . $user['idClient'] . "'>Supprimer</a></td>";
                echo "</tr>";
            }
            
            
            
            
            ?>
            </tbody>
        </table>

    </div>

</body>

</html>
