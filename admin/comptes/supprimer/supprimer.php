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
            <b>{{user.nom}}</b>
        </dd>
        <dt class="col-sm-2">
            <b>Prénom:</b>
        </dt>
        <dd class="col-sm-10">
            <b>{{user.prenom}}</b>
        </dd>
        <dt class="col-sm-2">
            <b>Email:</b>
        </dt>
        <dd class="col-sm-10">
            <b>{{user.email}}</b>
        </dd>
    </dl>
    
    <form>
        <button type="submit" value="Suprrimer" class="btn btn-danger" style="margin-right: 40px;" > Supprimer</button>
        <button onclick="retour();" type="button" value="Retour" class="btn btn-info" style="margin-right: 40px;" > Retour</button>
    </form>
</div>
</div>
<script src="supprimer.js"></script>
</body>
</html>