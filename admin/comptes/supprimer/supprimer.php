<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suprimer compte</title>
    <link rel="stylesheet" href="supprimer.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body>
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
        $client->setId($produit['idClient']); // Supposons que 'statut' est un champ de la table Client
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
<div class="container  p-5" >

<h1 style="font-weight: bold; text-align: center; margin-bottom: 30px;">Suppression du compte</h1>

<h3 style="margin-bottom: 30px; font-style: italic;">Voulez-vous vraiment supprimer ce compte ?</h3>
<div>
    <h4>Voici quelque info du compte</h4>
    <hr >
    <dl class="row">
        <dt class="col-sm-2">
            <b>Nom:</b>
        </dt>
        <dd class="col-sm-10">
            <b> <?php echo $client->getNom()?></b>
        </dd>
        <dt class="col-sm-2">
            <b>Prénom:</b>
        </dt>
        <dd class="col-sm-10">
            <b> <?php echo $client->getPrenom()?></b>
        </dd>
        <dt class="col-sm-2">
            <b>Email:</b>
        </dt>
        <dd class="col-sm-10">
            <b> <?php echo $client->getEmail()?></b>
        </dd>
    </dl>
    
    <form method="post" action="traitement.php">
        <input type='hidden' name='id' value="<?php echo $client->getId(); ?>">
        <button type="submit" value="Suprrimer" name="submit" class="btn btn-danger" style="margin-right: 40px;" > Supprimer</button>
        <button onclick="retour();" type="button" value="Retour" class="btn btn-info" style="margin-right: 40px;" > Retour</button>
    </form>
</div>
</div>
<script src="supprimer.js"></script>
</body>
</html>