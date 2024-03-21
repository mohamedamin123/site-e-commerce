<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="login.js"></script>
</head>

<body>

    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-50">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-1 pb-5">

                                <h2 class="fw-bold mb-2">Se connecter</h2>
                                <p class="text-white-50 ">Veuillez saisir votre email et votre mot de passe !</p>

                                <img src="../assets/images/logo.jpeg" alt="" width="350" height="350" style="margin-bottom:10px; ">

                                <form id="myForm" action="testLogin.php" method="post">



                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email"name="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email"  required >
                                    </div>
                                    <div class="small text-danger mt-2" id="emailError"></div>
                                </div>


                                <div class="form-outline form-white mb-4" style="position: relative;">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="pass" placeholder="Mot de passe" style="padding-right: 40px;" required/>
                                        <div style=" padding: 20px; background-color: white;">
                                            <div class="input-group" style="position: absolute; top: 50%; right:2px; transform: translateY(-50%);">
                                                <i class="far fa-eye password-icon" id="showPasswordIcon" style="cursor: pointer; color: black;"></i>
                                                <i class="far fa-eye-slash password-icon" id="hidePasswordIcon" style="cursor: pointer; color: black; display: none;"></i>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="small text-danger mt-2" id="passwordError"></div>
                                </div>


                                <p class="small mb-2 pb-lg-2"><a class="text-white-50" href="/mot-de-passe-oublié">Mot de passe oublié ?</a></p>

                                <button class="btn btn-outline-light btn-lg px-5 mb-4" type="button" onclick="valideCompte();"  style="width: 350px; height: 50px;">Login</button>

                                </form>

                                <div class="border-bottom mx-0 mt-3"></div>
                                <div>
                                    <p class="mt-5 mb-0">Vous n'avez pas de compte ?</p>
                                    <a href="/register" class="text-white-50 fw-bold">Construire un nouveau compte</a>
                                </div>
                                <div>
                                    <p class="mt-5 mb-0">Voulez vous accéder à la page d'accueil</p>
                                    <a href="/home" class="text-white-50 fw-bold">Accéder à l'accueil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>