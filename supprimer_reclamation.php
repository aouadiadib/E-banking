<?php 
require_once('class/main.php');
$id = $_GET['id'];
$reclamation->setId($id);
$reclamation->supprimer_reclamation();
header('location:reclamation.php?message=delete');

?>