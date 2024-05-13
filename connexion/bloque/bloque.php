<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte bloquée</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<?php
require "../requets.php";
?>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>titre de boutique</p>
                <img src="../../assets/images/logo.jpeg" alt="" width="50" height="50" ">
            </div>
            <div class=" nav-button">
                <button class="btn " onclick="signip()" id="loginBtn">Sign In</button>
                <button onclick="signup()" class="btn" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu"></i>
            </div>
        </nav>

        <form action="" method="post">

            <div class="mb-md-5 mt-md-1 pb-5">

                <h2 class="fw-bold mb-2 text text-center">Compte bloqué</h2>
                <div style="text-align: center;">
                    <img src="../../assets/images/warning.png" style="display: inline-block;">
                    <p class="text-white-50 mb-2" style="display: inline-block; margin-right: 10px; margin-left: 10px; ">Ops votre
                        compte a été bloqué !</p>
                    <img src="../../assets/images/warning.png" style="display: inline-block;">

                    <br>
                </div>
                <img class="img d-block mx-auto text text-center" src="../../assets/images/user.png" alt="User photo" width="120" height="120">

                <div class="form-outline form-white mb-4  mt-5">
                    <?php
                    session_start();
                    require_once('../../bd/connect.php');

                    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
                        $email = $_SESSION['email'];
                        $client=select($email,$db);
                        echo "<h4 class='text text-center'>". $client["prenom"] . " ". $client["nom"]. "</h4>";
                        echo "<h4> ".$client["email"]."</h4>";
                    } else {
                        header("Location: ../login/login.php");

                    }
                    require_once('../../bd/close.php');
                    ?>


                </div>


                <button class="btn btn-outline-light btn-lg px-5 mb-4 d-block mx-auto" type="button" onclick="retour()" style="width: 350px; height: 50px;">Retour</button>

                <div class="border-bottom mx-0 mt-3"></div>
                <div>
                    <p class="mt-5 mb-0 text text-center">Vous n'avez pas de compte ?</p>
                    <a href="../register/register.php" class="text-white-50 fw-bold d-block mx-auto text text-center">Construire un nouveau compte</a>
                </div>
                <div>
                    <p class="mt-5 mb-0 text text-center">Vous avez contient un compte ?</p>
                    <a href="../login/login.php" class="text-white-50 fw-bold d-block mx-auto text text-center">Connecter</a>
                </div>
            </div>
        </form>
    </div>

    <script src="script.js"></script>

</body>

</html>