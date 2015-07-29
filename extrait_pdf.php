<?php

require 'fpdf/fpdf.php';
require 'class/main.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","","20");
$pdf->Cell(0,1,"Extrait Bancaire",0,0,'C');

$id = $_GET["id"];


$client->setId($id);
$liste_client = $client->liste_info_client();

foreach ($liste_client as $row) {
	
	$ncin = $row["ncin"];
	$nom = $row["nom"];
	$prenom = $row["prenom"];
	
}
$nomG= "Nom: ".$nom ; 
$prenomG= "Nom: ".$prenom ; 
$ncinG= "N C I N : ".$ncin ; 

$pdf->SetFont("Arial","","15");
$pdf->write(30,$nomG,"L");
 $pdf->Ln(10); 
$pdf->write(30,$prenomG,"L");
 $pdf->Ln(10); 
$pdf->write(30,$ncinG,"L");
 $pdf->Ln(10); 
 $compte->setId_client($id);

$liste = $compte->liste_info_compte();




foreach ($liste as $row) {
	
	$rib = $row["RIB"];
	$type = $row["type"];
	
	
}



$ribG = "R I B :".$rib;
$typeG = "Type :".$type;
$pdf->write(30,$ribG,"L");
 $pdf->Ln(10);
 $pdf->write(30,$typeG,"L");
 $pdf->Ln(30);
	$mouthN = date('m');
	$yearN = date('Y');

 $pdf->write(30,"Extrait bancaire de  "); 
  $pdf->write(30,$mouthN);
   $pdf->write(30," / "); 
  $pdf->write(30,$yearN);

$pdf->Ln(20);
 $pdf->write(30,"Date");
$pdf->write(30,"                ");
 $pdf->write(30,"Solde");

  $pdf->Ln(20); 



$transfert->setId_client($id);
$liste_h = $transfert->liste_info_historique();






 foreach ($liste_h as $row) {
	
	$date = $row["date"];
	$solde = $row["solde"];
	$month = date("m",strtotime($date));
	$year = date("Y",strtotime($date));

	if($year==$yearN && $mouthN==$month)
	{



$pdf->write(30,$date);
$pdf->write(30,"     ");
$pdf->write(30,$solde);
 $pdf->write(30,"   DT");
 $pdf->Ln(10); 



		}
	}
	$pdf->Output();
