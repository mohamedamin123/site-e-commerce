<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../phpMailer/src/SMTP.php';
require_once __DIR__ . '/../phpMailer/src/Exception.php';
require_once __DIR__ . '/../phpMailer/src/PHPMailer.php';

function envoyerCompte($add,$new) {
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
        $mail->addAddress($add);
        $mail->isHTML(true);

        $mail->Subject="Information sur votre compte";
        if($new==1){
            $mail->Body="votre compte est activer ";
        } else {
            $mail->Body="votre compte est desactiver ";
        }

        $mail->send();

    }  catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function send($add,$newStatus,$result) {
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
        $mail->addAddress($add);
        $mail->isHTML(true);

        $mail->Subject="Information sur votre compte";
        if($newStatus==1){
            $mail->Body="votre article ". $result.  "est publiée ";
        } else {
            $mail->Body="votre article ". $result.  "est desactivé ";
        }

        $mail->send();


    }  catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>