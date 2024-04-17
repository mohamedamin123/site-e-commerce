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
    <?php
    // Incluez le fichier de vérification de session
    require_once('../../securite/admin_check.php');

    // Le reste de votre code pour cette page admin
    ?>

    <?php
    require_once('traitement.php');

    ?>
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
            <form action="form.php" method="post" id="myForm" enctype="multipart/form-data">

                <div class="row">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <label for="fileInput">
                                        <?php
                                        // Vérifier si la photo est NULL
                                        if ($produit["photo"] == null) {
                                            // Si la photo est NULL, afficher la photo par défaut
                                            echo '<img src="../../../assets/images/user.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px; cursor: pointer;">';
                                        } else {
                                            // Si la photo n'est pas NULL, afficher la photo de la base de données
                                            echo '<img style="width: 150px; cursor: pointer;" class="rounded-circle img-fluid" src="data:image/jpeg;base64,' . base64_encode($produit["photo"]) . '" alt="Image">';
                                        }
                                        ?>
                                    </label>
                                    <input id="fileInput" name="image" id="image" type="file" style="display: none;">

                                    <h5 class="my-3"><?php echo $produit["prenom"] . " " . $produit["nom"]; ?></h5>
                                    <p class="text-muted mb-1"><?php echo $produit["email"]; ?></p>

                                </div>
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
                                        <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" value="<?php echo $produit["nom"]; ?>" required>
                                    </div>
                                    <div class="small text-danger mt-2 mb-2 text text-center" id="nomError"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Prenom</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="text" id="prenom" name="prenom" placeholder="Prenom" class="form-control" value="<?php echo $produit["prenom"]; ?>" required>
                                    </div>
                                    <div class="small text-danger mt-2 mb-2 text text-center" id="prenomError"></div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="example@example.com" value="<?php echo $produit["email"]; ?>" readonly>
                                    </div>
                                    <div class="small text-danger mt-2 mb-2 text text-center" id="emailError"></div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telephone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="tel" name="tel" class="form-control" id="tel" placeholder="xx xxx xx" value="<?php echo $produit["tel"]; ?>" required>
                                    </div>
                                    <div class="small text-danger mt-2 mb-2 text text-center" id="telError"></div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date de naissance</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <input type="date" name="date" class="form-control" id="date" placeholder="" value="<?php echo $produit["date"]; ?>" required>
                                    </div>
                                    <div class="small text-danger mt-2 mb-2 text text-center" id="dateError"></div>

                                </div>
                                <div class="row">
                                    <div class="d-flex justify-content-center align-items-center mt-4">
                                        <button onclick="valider()" class="btn btn-primary btn-lg me-3" type="button" style="width: 350px; height: 50px;">Sauvegarde</button>
                                    </div>

                                </div>
                                <?php
                                session_start();

                                // Vérification si la session de succès est définie
                                if (isset($_SESSION['success'])) {
                                    // Affichage du message de succès
                                    echo "<p class='text text-center success' >{$_SESSION['success']}</p>";
                                    // Suppression de la session de succès pour éviter l'affichage répété
                                    unset($_SESSION['success']);
                                }
                                ?>
                            </div>
                        </div>

                    </div>
            </form>

        </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="profile.js"></script>
</body>

</html>