<?php 


require_once("client.inc.php");
require_once("compte.inc.php");
require_once("crypt.inc.php");
require_once("ctrl.php");
require_once("reclamation.inc.php");
require_once("demande.inc.php");
require_once("transfert.inc.php");
require_once("historique.inc.php");

$client = new client();
$compte = new compte();
$crypt = new crypt();
$controle = new ctrl();
$demande = new demande();
$transfert = new transfert();
$reclamation = new reclamation();
$historique = new historique();
