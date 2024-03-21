<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <script src="profile.js"></script>
</head>

<body>




    <section class="vh-150 gradient-custom">
        <div class="container py-5 h-150">
            <div class="row d-flex justify-content-center align-items-center h-150">
                <div class="col-12 col-md-8 col-lg-8 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-1 pb-5">

                                <h2 class="fw-bold mb-2">Données personnelles</h2>
                                <p class="text-white-50 ">Voici votre données</p><br>

                                <div class="d-flex justify-content-center mb-4">
                                    <div class="position-relative">
                                        <!-- IMAGE-->
                                        <img src="../assets/images/user.png" alt="User photo" class="rounded-circle img-thumbnail" style="width: 250px; height: 250px;">

                                    </div>
                                </div>
                                <div class="form-outline form-white mb-4 mt-3">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" id="typeNom" class="form-control form-control-lg" placeholder="Nom" />
                                    </div>
                                    <div class="small text-danger mt-2" id="nomError"></div>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" id="typPrenom" class="form-control form-control-lg" placeholder="Prenom" />
                                    </div>
                                    <div class="small text-danger mt-2" id="prenomError"></div>
                                </div>

                                <div class="form-outline form-white mb-4 mt-3">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="email" id="typeemail" class="form-control form-control-lg" placeholder="Email" value=<?php echo isset($_GET["email"]) ? $_GET["email"] : ''; ?> readonly/>
                                    </div>
                                </div>


                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-calendar-alt"></i>
                                        </span>
                                        <input type="date" id="typeDate" class="form-control form-control-lg" placeholder="Date de naissance" />
                                    </div>
                                    <div class="small text-danger mt-2" id="dateError"></div>
                                </div>
                                <div class="form-outline form-white mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                        <input type="number" id="typeTel" class="form-control form-control-lg" placeholder="Téléphone" />
                                    </div>
                                    <div class="small text-danger " id="telError"></div>
                                </div>


                                <div class="border-bottom  mb-4"></div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <button (click)="change()" class="btn btn-outline-light btn-lg me-3" type="submit" style="width: 350px; height: 50px;">Sauvegarde</button>
                                </div>

                                <div class="d-flex justify-content-center align-items-center mt-4 ">
                                    <button (click)="change()" class="btn btn-outline-light btn-lg me-3" type="submit" style="width: 350px; height: 50px;">Change mot de passe</button>
                                </div>

                                <div class="small text-success mt-2" id="msgSuccess" style="font-weight: bold; font-size: 1.2rem"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>