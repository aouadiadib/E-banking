<?php 
require_once("connect.php");
require_once("crypt.inc.php");

 class client extends crypt
{

public $id;
public $ncin;
public $nom; 
public $prenom;
public $login;
public $pass;

public function __construct()
{

}

//les methodes SET
public function setId($id)
{
	$this->id = $id;
}

public function setNcin($ncin)
{
	$this->ncin = $ncin;
}

public function setNom($nom)
{
	$this->nom = $nom;
}

public function setPrenom($prenom)
{
	$this->prenom = $prenom;
}

public function setLogin($login)
{
	$this->login = $login;
}

public function setPass($pass)
{
	$this->pass = $pass;
}

//les methodes GET

public function getId()
{
	return $this->id;
}
 
 public function login(){


 	$this->pass  = parent::encrypt($this->pass);

	$select= DataBase::connect()->prepare("select * from client where login=:login and pass=:pass");
	$ex = $select->execute(array(
	'login'=>$this->login,
	'pass'=>$this->pass
	)
	);
	
	$e=$select->rowCount();
	
	if($e>0){

		while($line = $select->fetch(PDO::FETCH_OBJ))
		{
			$this->id = $line->id_client;
		}

		
		session_start();
		$_SESSION["login"] = $this->login;
		$_SESSION["pass"] = $this->pass;
		$_SESSION["id"] = $this->id;
		header('location:compte.php');

			} else 
	{
	return false;
	}
 }

  public function affichage()
	{
	
	if(isset($_GET["message"])) {
		$msg = $_GET["message"];
		if($msg=='delete')
	{
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Supression avec succées</div>";
	} 
	if($msg=='add')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Ajout avec succées</div>";
	}

		if($msg=='transfert')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Transfert de solde avec succées</div>";
	}

	if($msg=='update')
		{
			
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Modification avec succées</div>";
			}

	} 	else 
			{
			$message = "";
		}
	
			echo $message ;

	}
	
 

public function liste_info_client()
{
	$select = DataBase::connect()->query("select * from client where id_client=$this->id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}

 public function changer_pass(){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE client SET
pass=:pass where login=:login');

try {
  
	$success = $MODIFIER->execute(array(
    'pass'=>$this->pass,
    'login'=>$this->login
    
  ));
  }
  catch( Exception $e )
   {
	  
	  echo 'Erreur de requète : ', $e->getMessage();
	
   }
	return true;
 }





 }
