<?php
$pathRoot = $_SERVER['DOCUMENT_ROOT'];
include_once '../class/bdd/connexionbdd.php';
require_once($pathRoot . './vendor/fpdf/fpdf/original/fpdf.php');


class myPDF extends FPDF
{

    function header()
    {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276, 5, 'FACTURE', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(276, 10, ' Au bon resto', 0, 0, 'C');
        $this->Ln(20);
    }
    function footer()
    {
        $this->Image($_SERVER['DOCUMENT_ROOT'] . '\images\bonAppetit.jpg', 100, 100, 100);
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        date_default_timezone_set('Europe/Paris');
        $this->Cell(0, 10, date('d-m-Y H:i:s', time()), 0, 0, 'C');
    }
    function headerTable()
    {
        $this->SetFont('Times', 'B', 12);
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(40, 10, 'Articles', 1, 0, 'C');
        $this->Cell(40, 10, 'Prix', 1, 0, 'C');
        $this->Cell(40, 10, 'statut panier', 1, 0, 'C');
        $this->Cell(40, 10, 'total panier', 1, 0, 'C');
        $this->Ln();
    }
    function viewTable()
    {
        $idUser = $_SESSION['id_user'];
        $ConnexionBDD = new ConnexionBDD();
        $conn = $ConnexionBDD->OpenCon();
        $this->SetFont('Times', '', 12);
        $stmt = ("SELECT * FROM panier WHERE id_user = " . $idUser);
        $result = $ConnexionBDD->getResults($conn, $stmt);
        $total = 0;


        while ($row = $result->fetch_row()) {
            
    
        $articlesArray = unserialize($row[2]);
        foreach ($articlesArray as $value)  {


            $query = ("SELECT * FROM articles WHERE id_article = $value");
            $result = mysqli_query($conn, $query);

            $article = mysqli_fetch_all($result, MYSQLI_ASSOC);


            
            $this->Cell(20, 10, '', 0, 0, 'C');
            $this->Cell(20, 10, '', 0, 0, 'C');
            $this->Cell(20, 10, '', 0, 0, 'C');
            $this->Cell(40, 10, utf8_decode($article[0]['name_article']), 1, 0, 'C');
            $this->Cell(40, 10, utf8_decode($article[0]['prix_article'].' euro'), 1, 0, 'C');
            $this->Cell(40, 10, utf8_decode($row[4]), 1, 0, 'C');
            $this->Ln();
            $total += $row[3];
        }
        }
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(20, 10, '', 0, 0, 'C');
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Cell(40, 10, $total . ' Euro', 1, 0, 'C');
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
