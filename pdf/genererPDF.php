<?php
require('fpdf.php');
require_once('../home/traitement.php');
require_once('../panier/sqlpanier.php');

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
    $sql4 = 'SELECT * FROM `Article` WHERE `idArticle`=:idArticle';
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

// Afficher le script JavaScript pour ouvrir le PDF dans un nouvel onglet
echo "<script>window.open('$file_name', '_blank');</script>";

exit;
?>
