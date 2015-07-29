<?php 
require_once('class/main.php');
$id = $_GET['id'];
$client->setId($id);
$client->bloquer_client();
header('location:liste_client.php?message=bloquer');

?>