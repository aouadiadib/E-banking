<?php 


class demande 
 {

 	public $id;
 	public $type;
 	public $etat;
 	public $date;

 	public $nombre;
 	public $id_client;



 	public function __construct()
 	{
 		$this->date=date('Y/m/d');
 	}

 	public function setId($id)
 	{
 		$this->id=$id;
 	}

 	public function setNombre($nombre)
 	{
 		$this->nombre=$nombre;
 	}

 	public function setType($type)
 	{
 		$this->type=$type;
 	}

 	public function setEtat($etat)
 	{
 		$this->etat=$etat;
 	}

 	public function setId_client($id_client)
 	{
 		$this->id_client=$id_client;
 	}


 	public function ajouter_demande()
 	{
 			$insert = DataBase::connect()->prepare('insert into demande VALUES
		(NULL,:date,:type,:nombre,:etat,:id_client)');
try 
{		

	$ins = $insert->execute(
	array(
	'date'=>$this->date,
	'type'=>$this->type,
	'nombre'=>$this->nombre,
	'etat'=>$this->etat,
	 'id_client'=>$this->id_client
	)
	);
}
		
		catch( Exception $e )
			
			{
	  
					echo 'Erreur de requète : ', $e->getMessage();
	
			}
			
		return true;
 	}


public function select_demande()
{

	$select= DataBase::connect()->prepare("select * from demande where id_client=:id ORDER BY id_demande DESC");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		echo "<tr>";

		echo "<td>";
		echo $line->id_demande;
		echo "</td>";
		echo "<td>";
		echo $line->date;
		echo "</td>";
		echo "<td>";
		echo $line->type;
		echo "</td>";
		echo "<td>";
		echo $line->nombre;
		echo "</td>";
		echo "<td>";
		echo $line->etat;
		echo "</td>";
		echo "<td>";
		echo "<a href='supprimer_demande.php?id=$line->id_demande'  onclick='if (confirm(&quot;Voulez vous vraiment supprimer le Demande:  ?&quot;)) { return true; } return false;'>"; 
		echo " <img src='img/del.png' width='30' height='30'></img> </a>";                    
		echo "</td>";
		
		echo "</tr>";

	}

}


public function liste_demande()
{
	$select = DataBase::connect()->query("select * from demande where id_demande=$this->id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}

	public function supprimer_demande()
	{
		$delete = DataBase::connect()->query("delete from demande where id_demande = '$this->id'");
		if($delete)
		{
			return true;
		}
	}



	
}








 
