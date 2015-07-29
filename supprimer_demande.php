<?php 
require_once('class/main.php');
$id = $_GET['id'];
$demande->setId($id);
$demande->supprimer_demande();
header('location:demande.php?message=delete');

?>