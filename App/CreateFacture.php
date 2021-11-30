<?php

require_once('C:\Users\deladjonks\Documents\projectResto\aubonresto\vendor\fpdf\fpdf\original\fpdf.php');



class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'FACTURE',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,' Au bon resto',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->Image('C:\Users\deladjonks\Documents\projectResto\aubonresto\images\bonAppetit.jpg',100,100,100);
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        date_default_timezone_set('Europe/Paris');
        $this->Cell(0,10,date('d-m-Y H:i:s', time()),0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'articles',1,0,'C');
        $this->Cell(40,10,'statut panier',1,0,'C');
        $this->Cell(40,10,'total panier',1,0,'C');
        $this->Ln();
    }
    function viewTable(){
        $this->SetFont('Times','',12);
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'',0,0,'C');
        $this->Cell(20,10,'Bokit',1,0,'C');
        $this->Cell(40,10,'Valider',1,0,'C');
        $this->Cell(40,10,'15'.' euro',1,0,'C');
        $this->Ln();
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
