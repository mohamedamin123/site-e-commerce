<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>

<body style="background-color: #eee;">
    <?php
    require_once('../../../securite/admin_check.php');
    ?>

    <div class="list">

        <div class="admin-icon-container">
            <div *ngFor="let maison of maisons | rechercheAnnonce: searchText; let i = index" class="admin-icon" (click)="versHome(maison)">
                <img [src]="photos[i] ? photos[i] : '/assets/images/home/no-photo.png'" width="400px" height="330px">
                <div style="margin-left: 20px;">

                    <p style=" margin-bottom: 0; font-weight: bold; margin-top: 10px;">{{maison.titre}}</p>
                    <p style=" margin-bottom: 0; color: grey;">{{maison.prix}} dt <b style="color: black;"> {{duree}}</b> <i class="fas fa-star" style="color: rgb(87, 127, 213); margin-left: 250px; "></i> {{star}}

                    </p>

                    <p style="margin-bottom: 0;">{{maison.description}}</p>
                </div>

            </div>
        </div>
    </div>

</body>

</html>