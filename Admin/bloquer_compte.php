<?php 
require_once('class/main.php');
$id = $_GET['id'];
$compte->setId($id);
$compte->bloquer_compte();
header('location:compte.php?message=bloquer');

?>