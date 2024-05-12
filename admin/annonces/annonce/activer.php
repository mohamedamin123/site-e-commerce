<?php
require_once('../../../bd/connect.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../../phpMailer/src/Exception.php';
require '../../../phpMailer/src/PHPMailer.php';
require '../../../phpMailer/src/SMTP.php';

session_start(); // Démarrer la session si ce n'est pas déjà fait

// Vérifiez si le bouton de changement d'état a été soumis
if (isset($_POST['id']) ) {
    $id = $_POST['id'];

    // Récupérez le statut actuel de l'utilisateur
    $sqlSelect = 'SELECT * FROM `article` WHERE `idArticle` = :id';
    $querySelect = $db->prepare($sqlSelect);
    $querySelect->execute(array(':id' => $id));
    $resultSelect = $querySelect->fetch(PDO::FETCH_ASSOC);

    $sqlSelect2 = 'SELECT * FROM `client` WHERE `idClient` = :id2';
    $querySelect2 = $db->prepare($sqlSelect2);
    $querySelect2->execute(array(':id2' => $resultSelect["idClient"]));
    $resultSelect2 = $querySelect2->fetch(PDO::FETCH_ASSOC);



    if ($resultSelect) {
        // Inversez le statut actuel
        $newStatus = ($resultSelect['statut'] == 0) ? 1 : 0;

        // Préparez la requête de mise à jour
        $sqlUpdate = 'UPDATE `article` SET `statut` = :newStatus WHERE `idArticle` = :id';
        $queryUpdate = $db->prepare($sqlUpdate);

        // Exécutez la requête en remplaçant les paramètres par les valeurs appropriées
        $queryUpdate->execute(array(':newStatus' => $newStatus, ':id' => $id));



        header('Location: annonce.php');




        // Vérifiez si la requête s'est exécutée avec succès
        if ($queryUpdate) {
            // Redirection vers la page comptes.php si la requête réussit
            $mail = new PHPMailer(true);
            try {
            
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->SMTPAuth=true;
                $mail->Username='mohamedaming146@gmail.com';
                $mail->Password='nyqq atil npai frcr';
                $mail->SMTPSecure='ssl';
                $mail->Port=465;
                $mail->setFrom('mohamedaming146@gmail.com');
                $mail->addAddress($resultSelect2["email"]);
                $mail->isHTML(true);
    
                $mail->Subject="Information sur votre compte";
                if($newStatus==1){
                    $mail->Body="votre article ". $resultSelect["titre"].  "est publiée ";
                } else {
                    $mail->Body="votre article ". $resultSelect["titre"].  "est desactivé ";
                }
    
                $mail->send();

        
            }  catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            exit();
        } else {
            // Affichez un message d'erreur si la requête échoue
            echo "Erreur lors de la mise à jour du statut.";
        }
    } else {
        // Affichez un message d'erreur si l'utilisateur n'a pas été trouvé
        echo "Utilisateur non trouvé.";
    }
} else {
    // Affichez un message si le bouton de changement d'état n'a pas été soumis
    echo "Aucun identifiant d'utilisateur n'a été reçu.";
}

require_once('../../../bd/close.php');
