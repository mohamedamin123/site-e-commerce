<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifier</title>
    <link rel="stylesheet" href="verifier.css">
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

                                <h2 class="fw-bold mb-2">Comfirmer votre account</h2>
                                <p class="text-white-50 ">Veuillez saisir le code qui a été envoyé dans votre email </p><br>

                                <img src="../assets/images/security.png" alt="" width="250" height="250">
                                <form action="" method="post">
                                    <div class="pin-input-container mt-4">
                                        <?php for ($i = 1; $i <= 6; $i++) { ?>
                                            <input type="text" class="pin-input" id="input<?= $i ?>" name="input<?= $i ?>" maxlength="1" pattern="[0-9]*" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                        <?php } ?>
                                    </div>
                                    <div class="small text-danger mt-2" id="codeError"></div>

                                    <button class="btn btn-outline-light btn-lg px-5 mb-4 mt-4" type="submit" style="width: 350px; height: 50px;">Continuer</button>
                                </form>

                                <?php
                                session_start(); // Démarrer la session si ce n'est pas déjà fait

                                // Vérifier si le formulaire a été soumis
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Récupérer les données de la session
                                    if (isset($_SESSION['email']) && isset($_SESSION['number'])) {
                                        $userEmail = $_SESSION['email'];
                                        $number = $_SESSION['number'];
                                        $code = "";
                                        echo"$number";

                                        // Concaténer les valeurs des inputs dans la chaîne
                                        for ($i = 1; $i <= 6; $i++) {
                                            $code .= $_POST["input$i"];
                                        }

                                        // Vérifier si le code est correct
                                        if ($code == $number) {
                                            echo "<div style='color: green;'>Le code est correct : $code</div>";
                                            // Faire quelque chose avec $userEmail
                                            // Par exemple, afficher ou utiliser l'e-mail
                                        } else {
                                            echo "<div style='color: red;'>Le code est incorrect. Veuillez réessayer.</div>";
                                        }
                                    } else {
                                        // Gérer le cas où les données de session ne sont pas définies
                                    }
                                }
                                ?>


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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>