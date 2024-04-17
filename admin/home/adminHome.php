<!DOCTYPE html>
<html lang="en">

<?php
// Incluez le fichier de vérification de session
require_once('../../securite/admin_check.php');

// Le reste de votre code pour cette page admin
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin home</title>
    <link rel="stylesheet" href="adminHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <div class="admin-icon-container admin">
        <a href="../comptes/compte/comptes.php">
            <div class="admin-icon">
                <img src="../../assets/images/comptes.png" height="300" width="300">
            </div>
        </a>
        <a href="../profile/profile.php">
            <div class="admin-icon">
                <img src="../../assets/images/profile.png" height="300" width="300">
            </div>
        </a>
        <a href="../annonces/annonce/annonce.php">
            <div class="admin-icon">
                <img src="../../assets/images/produits.png" height="300" width="300">
            </div>
        </a>
        <a href="../categories/categories/categories.php">
            <div class="admin-icon">
                <img src="../../assets/images/categories.png" height="300" width="300">
            </div>
        </a>
        <form action="logout.php" method="post">
    <div class="admin-icon">
        <button type="submit">
            <img src="../../assets/images/logout.png" height="300" width="300">
        </button>
    </div>
</form>


    </div>
</body>

</html>
