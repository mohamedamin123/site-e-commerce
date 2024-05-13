<?php
require('../pdf/fpdf.php');
require_once('../home/traitement.php');
require_once('../panier/sqlpanier.php');
require_once('../panier/updatePanier.php');


require '../phpMailer/src/Exception.php';
require '../phpMailer/src/PHPMailer.php';
require '../phpMailer/src/SMTP.php';
require '../class/client.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Créer une classe héritant de FPDF

class PDF extends FPDF {
    // En-tête
    function Header() {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Facture des Produits',0,1,'C');
        $this->Ln(10);
    }

    // Pied de page
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Tableau des produits
    function ProductTable($header, $data) {
        // En-tête
        $this->SetFont('Arial','B',12);
        foreach($header as $col) {
            $this->Cell(40,7,$col,1);
        }
        $this->Ln();

        // Données
        $this->SetFont('Arial','',12);
        foreach($data as $row) {
            foreach($row as $col) {
                $this->Cell(40,7,$col,1);
            }
            $this->Ln();
        }
    }

    // Informations du client
    function ClientInfo($client_info) {
        $this->SetFont('Arial','B',12);
        $this->Cell(0,10,'Informations du Client',0,1,'L');
        $this->SetFont('Arial','',12);
        foreach($client_info as $key => $value) {
            $this->Cell(0,10,"$key: $value",0,1,'L');
        }
        $this->Ln(10);
    }
}

// Données des produits (à titre d'exemple)
$header = array('Produit', 'Prix Unitaire', 'Quantite', 'Total');

$data = array();

foreach ($articles as $article) {
    // Récupérer les détails de l'article depuis la base de données
    $sql4 = 'SELECT * FROM `article` WHERE `idArticle`=:idArticle';
    $query4 = $db->prepare($sql4);
    $query4->bindValue(':idArticle', $article["idArticle"], PDO::PARAM_STR);
    $query4->execute();
    $article_details = $query4->fetch();

    // Ajouter les détails de l'article au tableau de données
    $data[] = array(
        $article_details["titre"],
        $article_details["prix"],
        $article['quantite'],
        $article['quantite'] * $article_details['prix']
    );
}


// Informations du client (à titre d'exemple)
$client_info = array(
    'Nom' => $produit["nom"],
    'Prenom' => $produit["prenom"],
    'Email' => $produit["email"],
    'Telephone' => $produit["tel"],
    'Mode de Paiement' => 'Carte de Credit'
);

// Calcul du total général
$total_general = 0;
foreach($data as $row) {
    $total_general += str_replace('$', '', $row[3]);
}
$total_general = $total_general+2;

// Instancier un nouvel objet PDF
$pdf = new PDF();
$pdf->AliasNbPages();

// Ajouter une page
$pdf->AddPage();

// Afficher les informations du client
$pdf->ClientInfo($client_info);

// Afficher le tableau des produits
$pdf->ProductTable($header, $data);

// Afficher le total général
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'Total general: $'.$total_general,0,1,'R');

// Nom du fichier PDF
$file_name = 'facture_produits.pdf';

// Créer le fichier PDF
$pdf->Output($file_name,'F');

// Forcer le téléchargement du fichier PDF
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="'.$file_name.'"');
readfile($file_name);
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['date']) && isset($_POST['prix-total']) && isset($_POST['modePaiement']) && isset($_POST['message'])) {
    $prix_total = $_POST['prix-total'];
    $modePaiement = $_POST['modePaiement'];
    $message = $_POST['message'];

    echo $prix_total;
// Convertir la chaîne '2 dt' en un nombre en retirant les caractères non numériques
$prix_total = filter_var($_POST['prix-total'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
echo $prix_total;

// Insérer la valeur correcte dans la colonne 'total'
$sql_insert_facture = 'INSERT INTO `facture` (`idClient`, `total`, `mode_paiement`, `commentaire`) VALUES (:idClient, :total, :modePaiement, :commentaire)';
$query_insert_facture = $db->prepare($sql_insert_facture);
$query_insert_facture->bindValue(':idClient', $produit["idClient"], PDO::PARAM_STR);
$query_insert_facture->bindValue(':total', $prix_total, PDO::PARAM_STR); // Utiliser le prix total corrigé
$query_insert_facture->bindValue(':modePaiement', $modePaiement, PDO::PARAM_STR);
$query_insert_facture->bindValue(':commentaire', $message, PDO::PARAM_STR);
$query_insert_facture->execute();
header('Location: ../home/index.php');



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
            $mail->addAddress($produit["email"]);
            $mail->isHTML(true);

            $mail->Subject = "Votre Facture ";
            $mail->Body = "Votre facture est attachée à cet e-mail.";
        
            // Joindre la facture PDF
            $mail->addAttachment($file_name);
            $mail->send();
        
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    // Maintenant, utilisez ces données pour générer votre PDF
    // ...
} else {
    // Gérer le cas où une ou plusieurs valeurs sont manquantes
    header('Location: ../login/login.php');

}




// Afficher le script JavaScript pour ouvrir le PDF dans un nouvel onglet
echo "<script>window.open('$file_name', '_blank');</script>";



exit;
?>
