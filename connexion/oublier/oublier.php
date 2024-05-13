<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oublier mot de passe</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

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

        <form action="testOublier.php" method="post">

            <div class="mb-md-5 mt-md-1 pb-5">

                <h2 class="fw-bold mb-2 text text-center">Mot de passe oublié</h2>
                <p class="text-white-50  text text-center">Veuillez saisir votre email !</p><br>

                <img src="../../assets/images/security.png" class="d-block mx-auto mb-4" alt="" width="250" height="250">

                <div class="form-outline form-white mb-3" style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box ">
                            <input type="email" name="email" id="typeEmailX" class="input-field input-field-long" placeholder="Email" size="30" required>
                            <i class="bx bx-envelope"></i>
                        </div>
                    </div>
                    <div class="small text-danger " id="emailError"></div>
                </div>


                <button class="btn btn-outline-light btn-lg px-5 mb-4 d-block mx-auto" type="submit" style="width: 350px; height: 50px;">Continue</button>

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