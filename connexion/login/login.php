<?php
session_start();

// Effacer les variables de session si le formulaire a été soumis avec succès
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    $error = isset($_SESSION['error']) ? $_SESSION['error'] : '';
    unset($_SESSION['error']);
} else {
    $errorMessage = '';
}

// Pré-remplir les champs email et mot de passe avec les valeurs stockées dans la session
$userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$userPass = isset($_SESSION['pass']) ? $_SESSION['pass'] : '';

// Vider les variables de session après les avoir utilisées
unset($_SESSION['email']);
unset($_SESSION['pass']);
unset($_SESSION['error']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>titre de boutique</p>
                <img src="../../assets/images/logo.jpeg" alt="" width="50" height="50">
            </div>
            <div class="nav-button">
                <button class="btn white-btn" id="loginBtn">Sign In</button>
                <button onclick="signup()" class="btn" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu"></i>
            </div>
        </nav>

        <div class="mb-md-5 mt-md-1 pb-5">
            <h2 class="titre">Se connecter</h2>
            <p class="text-white-50 text text-center">Veuillez saisir votre email et votre mot de passe !</p>


            <form id="myForm" action="traitementLogin.php" method="post">
                <div class="form-outline form-white mb-3" style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box ">
                            <input type="email" name="email" id="typeEmailX" class="input-field input-field-long" placeholder="Email" size="30" required value="<?php echo $userEmail; ?>">
                            <i class="bx bx-envelope"></i>
                        </div>
                    </div>
                    <div class="small text-danger " id="emailError"></div>
                </div>

                <div class="form-outline form-white mb-2" style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box ">
                            <input type="password" id="typePasswordX" class="input-field input-field-long " name="pass" placeholder="Mot de passe" style="padding-right: 40px;" size="28" required value="<?php echo $userPass; ?>">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <span class="input-group-password">
                            <i id="showPassword" class="bx bxs-show" style="display: none; position:relative; top:50%; margin-bottom:20px"></i>
                            <i id="hidePassword" class="bx bxs-hide" style="display: block; position:relative; top:50%; margin-bottom:20px"></i>
                        </span>
                    </div>
                    <div class="small text-danger " id="passwordError">
                    <?php echo $error; ?>
                    </div>
                </div>

                <p class=" mb-2 pb-lg-2" ><a class="text-white-80" href="../oublier/oublier.php" >Mot de passe oublié ?</a></p>

                <button class="btn btn-outline-light btn-lg px-5 mb-4 d-block mx-auto " onclick="valideCompte()"type="button" style="width: 350px; height: 50px;">Login</button>

            </form>

            <div class="border-bottom mx-0 mt-3"></div>
            <div>
                <p class="mt-5 mb-0 text-black-50 text text-center fw-bold ">Vous n'avez pas de compte ?</p>
                <a href="../register/register.php" class="text-blue-50 fw-bold d-block mx-auto text-center">Construire un nouveau compte</a>
            </div>
            <div>
                <p class="mt-5 mb-0 text-black-50 text text-center fw-bold ">Voulez vous accéder à la page d'accueil</p>
                <a href="../home/index.php" class="text-bleu-50 fw-bold d-block mx-auto text-center">Accéder à l'accueil</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>