<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-1 pb-5">

                                <h2 class="fw-bold mb-2">S'inscrire</h2>
                                <p class="text-white-50 ">Veuillez remplir tous les champs</p><br>

                                <img src="../assets/images/logo.jpeg" alt="" width="250" height="175" style="margin-bottom:10px; ">
                                </div>
                                <div class="form-outline form-white mb-4 mt-3">
                                <form id="myForm"action="testRegister.php" method="post">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" id="typeNom" name="nom" class="form-control form-control-lg" placeholder="Nom" />
                                    </div>
                                    <div class="small text-danger mt-2" id="nomError"></div>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" id="typePrenom" name="prenom" class="form-control form-control-lg" placeholder="Prenom" />
                                    </div>
                                    <div class="small text-danger mt-2" id="prenomError"></div>
                                </div>

                                <div class="form-outline form-white mb-4 mt-3">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="email" id="typeEmail" name="email" class="form-control form-control-lg" placeholder="Email"/>
                                    </div>
                                    <div class="small text-danger mt-2" id="emailError"></div>

                                </div>


                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <input type="date" id="typeDate" name="date" class="form-control form-control-lg" placeholder="Date de naissance" />
                                    </div>
                                    <div class="small text-danger mt-2" id="dateError"></div>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="number" id="typeTel" name="tel" class="form-control form-control-lg" placeholder="Téléphone" />
                                    </div>
                                    <div class="small text-danger " id="telError"></div>
                                </div>


                                <div class="form-outline form-white mb-4 mt-3">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="password" name="pass" id="typePass" class="form-control form-control-lg" placeholder="mot de passe"/>
                                        <div style=" padding: 20px; background-color: white;">
                                            <div class="input-group" style="position: absolute; top: 50%; right: 2px; transform: translateY(-50%);">
                                                <!-- Utilisation d'éléments <i> pour les icônes et de l'attribut onclick pour gérer les événements -->
                                                <i id="showPassword" class="far fa-eye password-icon" style="display: none;"></i>
                                                <i id="hidePassword" class="far fa-eye-slash password-icon" style="display: block;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-danger mt-2" id="passError"></div>

                                </div>
                                <div class="border-bottom  mb-4"></div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button onclick="valider()" class="btn btn-outline-light btn-lg me-3" type="button" style="width: 350px; height: 50px;">Sauvegarde</button>
                                </div>
                                <div class="border-bottom mx-0 mt-3"></div>
                                </form>
                                <div>
                                    <p class="mt-5 mb-0">Vous avez contient un compte ?</p>
                                    <a href="/login/login.php" class="text-white-50 fw-bold">Connecter</a>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="register.js"></script>

</body>

</html>