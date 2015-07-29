<?php
require 'class/main.php';
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;Filename=document_name.doc");



$id = $_GET["id"];

$client->setId($id);
$liste_client = $client->liste_info_client();

foreach ($liste_client as $row) {
	
	$ncin = $row["ncin"];
	$nom = $row["nom"];
	$prenom = $row["prenom"];
	
}


$compte->setId_client($id);

$liste = $compte->liste_info_compte();

foreach ($liste as $row) {
	
	$rib = $row["RIB"];
	$type = $row["type"];
	
	
}
$transfert->setId_client($id);
$liste_h = $transfert->liste_info_historique();


	$mouthN = date('m');
	$yearN = date('Y');




echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo "<b><center><font color=red size=+3>Extrait Bancaire</font></center></b>";
echo "<br><br><center>";
echo"
	<table border=0 width=400>
	<tr>
		<tr>
	<td>N C I N  : </td>
	<td>".$ncin."</td>
	</tr>
	<td>Nom : </td>
	<td>".$nom."</td>
	</tr>
	<tr>
	<td>Prenom : </td>
	<td>".$prenom."</td>
	</tr>
	<tr>
		<td>Type : </td>
	<td>".$type."</td>
	</tr>
	<td>R I B  : </td>
	<td>".$rib."</td>
	</tr>
	</table>
	</font>
	<br><br>

	<br><br>
	<b><center><font color=green size=+2>extrait bancaire de ".$mouthN."/".$yearN."</font></center></b>
	<table border=3 width=400>
		<thead>
		<tr>
		<td>Date</td><td>Solde</td>
		</tr>
		</thead>
	";

	foreach ($liste_h as $row) {
	
	$date = $row["date"];
	$solde = $row["solde"];
	$month = date("m",strtotime($date));
	$year = date("Y",strtotime($date));

	if($year==$yearN && $mouthN==$month)
	{

echo "<tr>";
echo "<td>".$date."</td>";
echo "<td>".$solde." DT</td>";
echo "</tr>";

	
}
}

echo "	</table>
	</center>

";	
echo "</body>";
echo "</html>";
?>