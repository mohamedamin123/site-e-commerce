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
    require_once('traitement.php');
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
                            <?php
                            if (!empty($produit["photo"])) {
                                // Si la photo dans la base de données est disponible, l'afficher
                                echo '<img id="avatar" src="data:image/jpeg;base64,' . base64_encode($produit["photo"]) . '" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">';
                            } else {
                                // Si la photo dans la base de données est vide, afficher l'image par défaut
                                echo '<img src="../../../assets/images/user.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    ';
                            }
                            ?>
                            <h5 class="my-3"><?php echo $client->getPrenom() . " " . $client->getNom(); ?></h5>
                            <p class="text-muted mb-1"><?php echo $client->getEmail(); ?></p>
                            <div class="d-flex justify-content-center mb-2">
                                <form action="activer.php" method="post">
                                    <?php
                                    // Supposons que $statut contient la valeur du statut
                                    echo "<input type='hidden' name='id' value=".$client->getId().">";
                                    if ($produit["statut"] == 1) {
                                        // Si le statut est égal à 1, affiche "Bloquer"
                                        echo '<button type="submit" name="submit" class="btn btn-primary">Bloquer</button>';
                                    } else {
                                        // Sinon, affiche "Activer"
                                        echo '<button type="submit" name="submit" class="btn btn-primary">Activer</button>';
                                    }
                                    ?>
                                </form>

                                <form action="supprimer.php" method="POST"> 
                                <input type='hidden' name='id' value="<?php echo $client->getId(); ?>">
                                    <button type="submit" name="submit" class="btn btn-danger ms-1">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                            <ul class="list-group list-group-flush rounded-3">
                                <?php
                                foreach ($produit4 as $categorie) {
                                    echo '<li class="list-group-item d-flex justify-content-between align-items-center p-3">';
                                    echo '<p class="mb-0">' . $categorie['titre'] . '</p>';
                                    $nbr = 0; // Réinitialiser le compteur pour chaque catégorie

                                    foreach ($produit2 as $article) {
                                        if ($article['idCategories'] == $categorie['idCategories']) {
                                            $nbr++; // Incrémenter le compteur pour chaque article dans cette catégorie
                                        }
                                    }

                                    echo '<p class="mb-0">' . $nbr . '</p>';
                                    echo '</li>';
                                }
                                ?>


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
                                    <p class="text-muted mb-0"> <?php echo $client->getNom() ?></p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Prenom</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"> <?php echo $client->getPrenom() ?></p>
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
                                            echo "<p class='text-muted mb-0'>Active</p>";
                                        } else {
                                            echo "<p class='text-muted mb-0'>BLoque</p>";
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
                                        <p class="text-muted mb-0"><?php echo $produit3['count(*)']; ?></p>
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