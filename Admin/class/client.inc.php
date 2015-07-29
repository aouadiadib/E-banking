<?php 
require_once("connect.php");
require_once("crypt.inc.php");

 class client extends Crypt
{

public $id;
public $ncin;
public $nom; 
public $prenom;
public $login;
public $pass;
public $i;

public function __construct()
{

	$this->pass = 0;
	for ($i = 1; $i < 10; $i++)
	{
		$this->pass =  $this->pass . mt_rand(0, 9);
	}
	$this->pass = parent::encrypt($this->pass);
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

public function setTel($tel)
{
	$this->tel = $tel;
}


//les methodes GET

public function getId()
{
	return $this->id;
}
 


public function ajouter()
 	{

 			$insert = DataBase::connect()->prepare('insert into client VALUES
		(NULL,:ncin,:nom,:prenom,:active,:login,:pass)');
try 
{		

	$ins = $insert->execute(
	array(
	'ncin'=>$this->ncin,
	'nom'=>$this->nom,
	'prenom'=>$this->prenom,
	'login'=>$this->login,
	'active'=>1,
	 'pass'=>$this->pass
	)
	);
}
		
		catch( Exception $e )
			
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
 	}




 	public function select_client()
{

	$select= DataBase::connect()->prepare("select * from client  ORDER BY id_client DESC");
	$ex = $select->execute();

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		if($line->active==1)
		{
		echo "<tr>";

		echo "<td>";
		echo $line->id_client;
		echo "</td>";
		echo "<td>";
		echo $line->ncin;
		echo "</td>";
		echo "<td>";
		echo $line->nom;
		echo "</td>";
		echo "<td>";
		echo $line->prenom;
		echo "</td>";
		echo "<td>";
		echo $line->login;
		echo "</td>";
		echo "<td>";
		if($line->active == 1)
		{
			echo " <img src='img/active.png' width='30' height='30'></img> </a>";                    
		}
		if($line->active == 0)
		{
			echo " <img src='img/non.png' width='30' height='30'></img> </a>";                    
		}
		echo "</td>";

		echo "<td>";
		echo "**********";
		echo "</td>";

		echo "<td>";
		echo "<a href='consulter_client.php?id=$line->id_client'>"; 
		echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
		echo "</td>";
			echo "<td>";
			echo "<a href='bloquer_client.php?id=$line->id_client'  onclick='if (confirm(&quot;Voulez vous vraiment bloquer le client:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/block.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
		echo "</tr>";

	}

}
}


public function option_client()
	{
		$select = DataBase::connect()->query("select * from client   
			where id_client not in (select id_client from compte)
			ORDER BY id_client DESC");
		
		while($donnees = $select->fetch(PDO::FETCH_OBJ))
		{
			$id_client= $donnees->id_client;
			$nom= $donnees->nom;
			$prenom= $donnees->prenom;
			$ncin= $donnees->ncin;
			
			
			echo "<option value=$id_client>";
			echo $nom." ".$prenom;
			echo "</option>";
			
		}
	}



 public function login(){


 	$this->pass  = parent::encrypt($this->pass);

	$select= DataBase::connect()->prepare("select * from admin where login=:login and pass=:pass");
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
		header('location:liste_client.php');

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
	if($msg=='bloquer')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Bloquage avec succées</div>";
	}

		if($msg=='transfert')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Transfert de solde avec succées</div>";
	}
	if($msg=='traiter')
	{
		
		$message ="<div class='alert alert-success alert-dismissable'>
   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
      &times;
   </button>Traitement de solde avec succées</div>";
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


 public function bloquer_client()
	{
	
		$up = DataBase::connect()->prepare('update  client SET
		active=:active where id_client=:id');
try {		
	$update = $up->execute(
	array(
	'active'=>0,
	'id'=>$this->id
	
	)
	);
	
}
		catch( Exception $e )
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
		
	}


	public function changer_pass(){
	
	
$MODIFIER = DataBase::connect()->prepare('UPDATE admin SET
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
