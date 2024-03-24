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
                    <th scope="col">Status</th>
                    <th scope="col">Details</th>
                    <th scope="col">Change Etat</th>
                    <th scope="col">Supprimer</th>

                </tr>
            </thead>

            <tbody>

            <?php
// Assuming $users is an array of user objects fetched from your PHP backend

foreach ($users as $i => $user) {
    echo "<tr>";
    echo "<th scope='row'>" . ($i + 1) . "</th>";
    echo "<td>" . $user['nom'] . "</td>";
    echo "<td>" . $user['prenom'] . "</td>";
    echo "<td>" . $user['email'] . "</td>";
    echo "<td>" . $user['statut'] . "</td>";
    echo "<td><a class='btn btn-info' href='consulterUser.php?id=" . $user['id'] . "'>Consulter</a></td>";
    echo "<td id='userStatus'>";
    echo "<a class='btn btn-warning' onclick='modifierUser(" . json_encode($user) . ")'>";
    echo "<span id='userStatusText'>etat</span>";
    echo "</a>";
    echo "</td>";
    echo "<td><a class='btn btn-danger' href='deleteUser.php?id=" . $user['id'] . "'>Supprimer</a></td>";
    echo "</tr>";
}
?>


            </tbody>
        </table>

<script src="comptes.js"></script>
</body>

</html>