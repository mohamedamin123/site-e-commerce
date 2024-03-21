<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oublier mot de passe</title>
    <link rel="stylesheet" href="oublier.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="oublier.js"></script>
</head>

<body>
    <section class="vh-120 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <form action="testOublier.php" method="post">

                            <div class="mb-md-5 mt-md-1 pb-5">

                                <h2 class="fw-bold mb-2">Mot de passe oublié</h2>
                                <p class="text-white-50 ">Veuillez saisir votre email !</p><br>

                                <img src="../assets/images/security.png" alt="" width="250" height="250">

                                <div class="form-outline form-white mb-4  mt-5">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg" placeholder="Email" />
                                    </div>
                                    <div class="small text-danger mt-2" id="emailError"></div>
                                </div>


                                <button class="btn btn-outline-light btn-lg px-5 mb-4" type="submit" style="width: 350px; height: 50px;">Continue</button>

                                <div class="border-bottom mx-0 mt-3"></div>
                                <div>
                                    <p class="mt-5 mb-0">Vous n'avez pas de compte ?</p>
                                    <a href="../register/register.php" class="text-white-50 fw-bold">Construire un nouveau compte</a>
                                </div>
                                <div>
                                    <p class="mt-5 mb-0">Vous avez contient un compte ?</p>
                                    <a href="../login/login.php" class="text-white-50 fw-bold">Connecter</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>