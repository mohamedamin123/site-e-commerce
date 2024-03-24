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

<body>
    <h2 class="text-center mt-5 mb-3" style="font-weight: bold;">Consultation du compte</h2>

    <div class="container rounded bg-container  mb-5">
        <div class="row">

            <div class="col-md-3 border-right " style="margin-top: 125px;">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../../../assets/images/user.png"><span class="font-weight-bold">{{user.prenom}} {{user.nom}}</span><span class="text-black-50">{{user.email}}</span><span> </span></div>
            </div>

            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Nom</label>
                            <input value="user.nom" type="text" class="form-control" placeholder="Nom" disabled>

                        </div>
                        <div class="col-md-6"><label class="labels">Prenom</label>
                            <input type="text" class="form-control" value="user.prenom" placeholder="Prenom" disabled>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Téléphone</label>
                            <input type="text" class="form-control" placeholder="Téléphone" value="user.telephone" disabled>

                        </div>
                        <div class="col-md-12"><label class="labels">Date de naissance</label>
                            <input type="date" class="form-control" placeholder="Date de naissance" value="user.dateDeNaissance" disabled>

                        </div>
                        <div class="col-md-12"><label class="labels">Email</label>
                            <input type="email" class="form-control" placeholder="Email" value="user.email" disabled>
                        </div>

                        <div class="col-md-12"><label class="labels">Statut</label>
                            <input type="Statut" class="form-control" placeholder="Statut" value="compte" disabled>
                        </div>

                        <div class="col-md-12"><label class="labels">Nombre de annonces</label>
                            <input type="Statut" class="form-control" placeholder="Statut" value="user.annonces" disabled>
                        </div>
                        <div class="col-md-12"><label class="labels">Nombre de signal reçu</label>
                            <input type="Statut" class="form-control" placeholder="Statut" value="nbrSignal" disabled>
                        </div>
                        <div class="col-md-12"><label class="labels">Date de creation compte</label>
                            <input type="Statut" class="form-control" placeholder="Statut" value="user.dateCreation" disabled>
                        </div>

                    </div>
        </div>

        <div class="mt-2 mb-5 text-center ">
            <button onclick="retour()" class="btn btn-secondary profile-button-retour col-md-3" style="margin-right: 50px;" type="button">Retour</button>
        </div>


    </div>
<script src="consulter.js"></script>
</body>

</html>