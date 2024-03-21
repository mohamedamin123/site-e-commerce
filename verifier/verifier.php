<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifier</title>
    <link rel="stylesheet" href="verifier.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="verifier.js"></script>
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
                                <div class="pin-input-container mt-4">
                                    <input min="0" max="9" type="number" class="pin-input" #input1 maxlength="1" (input)="onInput(input1)" (keydown)="onBackspace($event, input1)" pattern="[0-9]* " onpaste="return false;">
                                    <input  min="0" max="9" type="number" class="pin-input" #input2 maxlength="1" (input)="onInput(input2)" (keydown)="onBackspace($event, input2)" pattern="[0-9]*" onpaste="return false;" />
                                    <input  min="0" max="9" type="number" class="pin-input" #input3 maxlength="1" (input)="onInput(input3)" (keydown)="onBackspace($event, input3)" pattern="[0-9]*" onpaste="return false;" />
                                    <input  min="0" max="9" type="number" class="pin-input" #input4 maxlength="1" (input)="onInput(input4)" (keydown)="onBackspace($event, input4)" pattern="[0-9]*" onpaste="return false;" />
                                    <input  min="0" max="9" type="number" class="pin-input" #input5 maxlength="1" (input)="onInput(input5)" (keydown)="onBackspace($event, input5)" pattern="[0-9]*" onpaste="return false;" />
                                    <input  min="0" max="9" type="text" class="pin-input" #input6 maxlength=1 (input)="onInput(input6)" (keydown)="onBackspace($event, input6)" pattern="[0-9]*" onpaste="return false;" />
                                </div>
                                <div class="small text-danger mt-2" id="codeError"></div>


                                <button  class="btn btn-outline-light btn-lg px-5 mb-4 mt-4" type="submit" style="width: 350px; height: 50px;">Continuer</button>

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