<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>titre de boutique</p>
                <img src="../../assets/images/logo.jpeg" alt="" width="50" height="50" ">
            </div>
            <div class=" nav-button">
                <button class="btn " onclick="signip();" id="loginBtn">Sign In</button>
                <button class="btn " onclick="signup()" id="registerBtn">Sign Up</button>
            </div>
            <div class="nav-menu-btn">
                <i class="bx bx-menu"></i>
            </div>
        </nav>
        <div class="mb-md-5 mt-md-1 pb-5 text text-center">

            <h2 class="fw-bold mb-2">Comfirmer votre account</h2>
            <p class="text-white-50 ">Veuillez saisir le code qui a été envoyé dans votre email </p><br>

            <img src="../../assets/images/security.png" alt="" width="250" height="250">
            <form action="" method="post">
                <div class="pin-input-container mt-4">
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <input type="text" class="pin-input" id="input<?= $i ?>" name="input<?= $i ?>" maxlength="1" pattern="[0-9]*" oninput="moveToNextInput(this, <?= $i ?>);">

                    <?php } ?>
                </div>
                <div class="small text-danger mt-2" id="codeError"></div>

                <button class="btn btn-outline-light btn-lg px-5 mb-4 mt-4" type="submit" style="width: 350px; height: 50px;">Continuer</button>
            </form>

            <?php
            require '../../class/client.php';

            session_start(); // Démarrer la session si ce n'est pas déjà fait

            // Vérifier si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Récupérer les données de la session
                if (isset($_SESSION['email']) && isset($_SESSION['number']) && isset($_SESSION['clientData'])) {
                    $userEmail = $_SESSION['email'];
                    $number = $_SESSION['number'];
                    $code = "";


                    // Désérialisez les données de l'objet Client



                    // Concaténer les valeurs des inputs dans la chaîne
                    for ($i = 1; $i <= 6; $i++) {
                        $code .= $_POST["input$i"];
                    }

                    // Vérifier si le code est correct
                    if ($code == $number) {
                        // Faire quelque chose avec $userEmail
                        // Par exemple, afficher ou utiliser l'e-mail
                        session_start(); // Démarrer la session si ce n'est pas déjà fait

                        $clientData = unserialize($_SESSION['clientData']);


                        // Stocker les données dans la session
                        $_SESSION['email'] = $userEmail;

                        $_SESSION['clientData'] = serialize($clientData);


                        // Redirection vers la page de destination
                        header("Location: ../new_pass/new_pass.php");
                        exit();
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
    <script src="script.js"></script>
</body>

</html>