<!DOCTYPE html>
<html lang="en">

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
        <a href="../annonces/annonces.php">
            <div class="admin-icon">
                <img src="../../assets/images/produits.png" height="300" width="300">
            </div>
        </a>
        <div class="admin-icon" onclick="logOut()">
            <img src="../../assets/images/logout.png" height="300" width="300">
        </div>
    </div>
    <script src="adminHome.js"></script>
</body>

</html>
