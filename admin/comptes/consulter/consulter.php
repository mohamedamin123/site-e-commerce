<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter</title>
    <link rel="stylesheet" href="consulter.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
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
                            <li class="breadcrumb-item"><a href="../compte/comptes.php">comptes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
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
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Bloquer</button>
                                <button type="button" class="btn btn-danger ms-1">Supprimer</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0">Parfum </p>
                                    <p class="mb-0">2</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0">dideron</p>
                                    <p class="mb-0">10</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0">Nombre de produit </p>
                                    <p class="mb-0">15</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0">Nombre de produit </p>
                                    <p class="mb-0">15</p>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                    <p class="mb-0">Nombre de produit </p>
                                    <p class="mb-0">15</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Gana</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Prenom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">Mohamed Amin</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">example@example.com</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telephone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">(216) 234-5678</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date de naissance</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">13/06/2001</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Status</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">Activer</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre de signals</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">0</p>
                                    </div>
                                </div>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="consulter.js"></script>
</body>

</html>