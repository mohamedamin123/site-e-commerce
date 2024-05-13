<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
                <button class="btn " onclick="signup();" id="loginBtn">Sign In</button>
                <button class="btn white-btn" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu"></i>
            </div>
        </nav>
        <div class="card-body p-5">

            <div class="mb-md-2 mt-md-3 ">

                <h2 class="fw-bold mb-2 titre ">S'inscrire</h2>
                <p class="text-white-50 text text-center">Veuillez remplir tous les champs</p><br>

            </div>

            <form id="myForm"action="testRegister.php" method="post">
                <!-----------------------------------NOM------------------------------------->

                <div class=" form-white   ">
                    <div class="input-group ">
                        <div class="input-box d-block mx-auto  ">

                            <input type="text" id="typeNom" name="nom" class="input-field input-field-long " placeholder="Nom" size="35" required />
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="nomError"></div>
                </div>
                <!-----------------------------------/NOM------------------------------------->

                <!-----------------------------------PRENOM------------------------------------->

                <div class=" form-white ">
                    <div class="input-group" style="position: relative; ">
                        <div class="input-box d-block mx-auto ">
                            <input type="text" id="typePrenom" name="prenom" class="input-field input-field-long" placeholder="Prenom" size="35" required />
                            <i class="bx bx-user"></i>
                        </div>
                    </div>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="prenomError"></div>
                </div>
                <!-----------------------------------/PRENOM------------------------------------->

                <!-----------------------------------EMAIL------------------------------------->

                <div class="form-outline form-white ">
                    <div class="input-group">
                        <div class="input-box d-block mx-auto ">
                            <input type="email" name="email" id="typeEmail" class="input-field input-field-long" placeholder="Email" size="35" required>
                            <i class="bx bx-envelope"></i>
                        </div>
                    </div>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="emailError"></div>
                </div>
                <!-----------------------------------/EMAIL------------------------------------->


                <!-----------------------------------DATE------------------------------------->

                <div class="form-outline form-white mb-4 ">
                    <div class="input-group">
                        <div class="input-box mx-auto ">
                            <i class="bx bx-calendar" style="position:absolute; left:605px;top:20px;"></i>
                            <input type="date" id="typeDate" name="date" class="input-field input-field-long" placeholder="Date de naissance" size="35" required />
                        </div>
                    </div>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="dateError"></div>
                </div>

                <!-----------------------------------/DATE------------------------------------->

                <!-----------------------------------TEL------------------------------------->


                <div class="form-outline form-white mb-4">
                    <div class="input-group">
                        <div class="input-box d-block mx-auto ">
                            <i class="bx bx-phone" style="position:absolute; left:605px;top:20px;"></i>
                            <input type="number" id="typeTel" name="tel" class="input-field input-field-long" placeholder="Téléphone" />
                        </div>
                    </div>
                    <div class="small text-danger mt-2 mb-2 text text-center" id="telError"></div>
                </div>

                <!-----------------------------------/TEL------------------------------------->

                <!-----------------------------------/PASSWORD------------------------------------->

<!--
                <div class="form-outline form-white mb-4" style="position: relative;">
                    <div class="input-group" style="position: relative;">
                        <div class="input-box d-block mx-auto  ">

                            <input type="password" name="pass" id="typePass" class="input-field input-field-long" placeholder="mot de passe" size="35" />
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <span class="input-group-password">
                            <i id="showPassword" class="bx bxs-show" style="display: none; "></i>
                            <i id="hidePassword" class="bx bxs-hide" style="display: block;"></i>
                        </span>

                    </div>
                </div>
                <div class="small text-danger mt-2 mb-2 text text-center" id="passError"></div>
-->
                <!-----------------------------------/PASSWORD------------------------------------->


                <div class="border-bottom  mb-4"></div>
                <div class="d-flex justify-content-center align-items-center">
                    <button onclick="valider()" class="btn btn-outline-light btn-lg me-3" type="button" style="width: 350px; height: 50px;">Sauvegarde</button>
                </div>
                <div class="border-bottom mx-0 mt-3"></div>
            </form>
            <div>
                <p class="mt-4 mb-0 text-white-50 text text-center fw-bold ">Vous avez contient un compte ?</p>
                <a href="/login/login.php" class="text-bleu-50 fw-bold d-block mx-auto text-center">Connecter</a>
            </div>
        </div>

    </div>
    <script src="script.js"></script>

</body>

</html>