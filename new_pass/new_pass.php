<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change mot de passe</title>
    <link rel="stylesheet" href="new_pass.css">
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

                                <h2 class="fw-bold mb-2">Nouveau mot de passe</h2>
                                <p class="text-white-50 ">Veuillez saisir votre nouveau mot de passe !</p><br>

                                <img src="../assets/images/logo.jpeg" alt="" width="350" height="350" style="margin-bottom:10px; ">

                                <form id="myForm" action="testNew_pass.php" method="post">

                                <div class="form-outline form-white mb-4 mt-4" style="position: relative;">
                                    <div class="input-group" style="border-radius: 50%;">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" placeholder="Mot de passe" style="padding-right: 40px;" />
                                        <div style=" padding: 20px; background-color: white;">
                                            <div class="input-group" style="position: absolute; top: 50%; right: 2px; transform: translateY(-50%);">
                                                <!-- Utilisation d'éléments <i> pour les icônes et de l'attribut onclick pour gérer les événements -->
                                                <i id="showPassword" class="far fa-eye password-icon" style="display: none;"></i>
                                                <i id="hidePassword" class="far fa-eye-slash password-icon" style="display: block;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-danger mt-2" id="passwordError"></div>
                                </div>


                                <div class="form-outline form-white mb-4" style="position: relative;">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" id="typePasswordComfirmeX" class="form-control form-control-lg" placeholder="Nouveau mot de passe" style="padding-right: 40px;" />
                                        <div style=" padding: 20px; background-color: white;">
                                        <div class="input-group" style="position: absolute; top: 50%; right: 2px; transform: translateY(-50%);">
                                                <!-- Utilisation d'éléments <i> pour les icônes et de l'attribut onclick pour gérer les événements -->
                                                <i id="showPasswordComfirme" class="far fa-eye password-icon" style="display: none;"></i>
                                                <i id="hidePasswordComfirme" class="far fa-eye-slash password-icon" style="display: block;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small text-danger mt-2" id="passwordErrorComfirme"></div>
                                </div>


                                <button  id="myLogin"class="btn btn-outline-light btn-lg px-5 mb-4" type="button" style="width: 350px; height: 50px;">Login</button>
                                </form>
                                <div class="border-bottom mx-0 mt-3"></div>
                                <div>
                                    <p class="mt-5 mb-0">Vous n'avez pas de compte ?</p>
                                    <a href="../register/register.php" class="text-white-50 fw-bold">Construire un nouveau compte</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="new_pass.js"></script>

</body>

</html>