<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';


if (
    empty($_POST["email"])
) {
    header("Location: ../login/login.php");
    exit();
} else {
    // Vérification de la présence et de la non-vacuité des données
    if (
        isset($_POST["email"]) && !empty($_POST["email"])
    ) {
        // Récupération des données
        $userEmail = $_POST["email"];


        //cree random number
        $randomNumber = mt_rand(100000, 999999);
        session_start(); // Démarrer la session si ce n'est pas déjà fait

        // Stocker les données dans la session
        $_SESSION['email'] = $userEmail;
        $_SESSION['number'] = $randomNumber;
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
            $mail->addAddress($userEmail);
            $mail->isHTML(true);

            $mail->Subject="Code de verification";
            $mail->Body="votre code est ".$randomNumber;

            $mail->send();
    
    
            // Redirection vers la page de destination
            header("Location: ../verifier/verifier.php");
    
            // Redirection avec les données de l'utilisateur
            exit();
        }  catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Redirection vers la page de destination
        header("Location: ../verifier/verifier.php");
        exit();
    } else {
        // Redirection si des données sont manquantes
        header("Location: ../login/login.php");
        exit();
    }
}
