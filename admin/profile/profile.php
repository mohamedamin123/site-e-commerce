<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter</title>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body style="background-color: #eee;">
    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="../../admin/home/adminHome.php">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="../../../assets/images/user.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">Nom-Prenom</h5>
                            <p class="text-muted mb-1">Email</p>

                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <form action="" method="post">

                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="typeNom" name="nom" placeholder="Nom" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Prenom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="typePrenom" name="prenom" placeholder="Prenom" class="form-control" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="example@example.com" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telephone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="inputTelephone" placeholder="(216) 234-5678" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date de naissance</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="inputTelephone" placeholder="" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        <button onclick="valider()" class="btn btn-primary btn-lg me-3" type="submit" style="width: 350px; height: 50px;">Sauvegarde</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <script src="consulter.js"></script>
</body>

</html>