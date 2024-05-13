<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change mot de passe</title>
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

        <div class="mb-md-5 mt-md-1 pb-5">

            <h2 class="fw-bold mb-2 text text-center">Nouveau mot de passe</h2>
            <p class="text-white-50 text-center">Veuillez saisir votre nouveau mot de passe !</p><br>

            <form id="myForm" action="testNew_pass.php" method="post">

                <div class="form-outline form-white " style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box d-block mx-auto  ">

                            <input type="password" name="pass" id="typePasswordX" class="input-field input-field-long" placeholder="mot de passe" size="35" />
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <span class="input-group-password">
                            <i id="showPassword" class="bx bxs-show" style="display: none; "></i>
                            <i id="hidePassword" class="bx bxs-hide" style="display: block;"></i>
                        </span>

                    </div>
                </div>
                <div class="small text-danger text text-center mb-2" id="passwordError"></div>


                <div class="form-outline form-white " style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box d-block mx-auto  ">

                            <input type="password" name="pass" id="typePasswordComfirmeX" class="input-field input-field-long" placeholder="mot de passe" size="35" />
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <span class="input-group-password">
                            <i id="showPasswordComfirme" class="bx bxs-show" style="display: none; "></i>
                            <i id="hidePasswordComfirme" class="bx bxs-hide" style="display: block;"></i>
                        </span>

                    </div>
                </div>
                <div class="small text-danger  mb-2 text text-center" id="passwordErrorComfirme"></div>

                <button id="myLogin" class="btn btn-outline-light btn-lg px-5 mb-4 d-block mx-auto" type="button" style="width: 350px; height: 50px;">Login</button>
            </form>
            <div class="border-bottom mx-0 mt-3"></div>
            <div class=" text text-center">
                <p class="mt-2 mb-0">Vous n'avez pas de compte ?</p>
                <a href="../register/register.php" class="text-white-50 fw-bold" style="color: blue;">Construire un nouveau compte</a>
            </div>
        </div>
    </div>

    <script src="script.js"></script>

</body>

</html>