<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de commande</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php
require_once('../home/traitement.php');
require_once('../panier/sqlpanier.php');
?>

<body>
    <h1>Passer la commande</h1>

    <div id="formulaireCommande" class="modal">
        <div class="modal-content">
            <h2>Veuillez remplir ce formulaire</h2>
            <div>
                <form action="../facture/genererPDF.php" method="post">

                    <div class="row">

                        <div class="col-md-6">
                            <label for="nom">Nom :</label><br>
                            <input class="form-control custom-size" type="text" id="nom" name="nom" value="<?php echo $produit["nom"]  ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="prix">Prix :</label><br>
                            <input class="form-control custom-size" type="text" id="prix" name="prix" value="<?php echo $panier["prix_total"]. " dt" ?>"  readonly>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="prenom">Prenom :</label><br>
                            <input class="form-control custom-size" type="text" id="prenom" name="prenom" value="<?php echo $produit["prenom"]  ?>"  readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="frais">Frais de livraison :</label><br>
                            <input class="form-control custom-size" type="text" id="frais" name="frais" value="2 dt" readonly>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <label for="email">Email :</label><br>
                            <input class="form-control custom-size" type="email" id="email" name="email" value="<?php echo $produit["email"]  ?>"  readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="date">Date :</label><br>
                            <input class="form-control custom-size" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <label for="tel">Numéro de téléphone :</label><br>
                            <input class="form-control custom-size" type="tel" id="tel" name="tel"readonly value="<?php echo $produit["tel"];  ?>" >
                        </div>
                        <div class="col-md-6">
                            <label for="date">Prix total :</label><br>
                            <input class="form-control custom-size" type="text" id="prix-total" name="prix-total" value="<?php echo ($panier["prix_total"] + 2). " dt" ?>" readonly>
                        </div>
                    </div>

                    <label for="message">Message:</label>
                    <textarea class="form-control custom-size-area" id="message" name="message" cols="10" rows="3"> </textarea>

                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <label for="modePaiement" style="text-align: center;">Mode de paiement : </label><br>
                                <select class="form-control" id="modePaiement" name="modePaiement" required><br>
                                    <option value="carte_credit">Carte de crédit</option><br>
                                    <option value="espece">Espèces</option>
                                </select>
                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        <input class="form-control" type="submit" value="Valider">

                        </div>
                        <div class="col-md-4">
                        </div>
                    </div>

                </form>
            </div>



        
        </div>
    </div>
</body>

</html>