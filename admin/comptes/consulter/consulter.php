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


    <?php
    session_start();
    // On inclut la connexion à la base
    require_once('../../../bd/connect.php');
    require_once('../../../class/client.php');

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = strip_tags($_GET['id']);
        // On écrit notre requête
        $sql = 'SELECT * FROM `Client` WHERE `idClient`=:id';
        // On prépare la requête
        $query = $db->prepare($sql);
        // On attache les valeurs
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        // On exécute la requête
        $query->execute();
        // On stocke le résultat dans un tableau associatif
        $produit = $query->fetch();
        $client = new Client();
        $client->setNom($produit['nom']); // Supposons que 'nom' est un champ de la table Client
        $client->setPrenom($produit['prenom']); // Supposons que 'prenom' est un champ de la table Client
        $client->setEmail($produit['email']); // Supposons que 'email' est un champ de la table Client
        $client->setTel($produit['tel']); // Supposons que 'tel' est un champ de la table Client
        $client->setStatut($produit['statut']); // Supposons que 'statut' est un champ de la table Client
        $client->setDate($produit['date']); // Supposons que 'statut' est un champ de la table Client


        if (!$produit) {
            header('Location: ../compte/comptes.php');
        }
    } else {
        header('Location: ../compte/comptes.php');
    }
    require_once('../../../bd/close.php');
    ?>

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
                                    <p class="text-muted mb-0"> <?php echo $client->getNom()?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Prenom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> <?php echo $client->getPrenom()?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> <?php echo $client->getEmail() ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Telephone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> <?php echo $client->getTel() ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Date de naissance</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> <?php echo $client->getdate() ?></p>
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
                                        <?php
                                        $statut = $client->getStatut();
                                        if ($statut == 1) {
                                            echo "<p class='text-muted mb-0'>Bloque</p>";
                                        } else {
                                            echo "<p class='text-muted mb-0'>Active</p>";
                                        }
                                        ?>
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