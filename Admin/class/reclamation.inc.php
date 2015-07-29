<?php 


class reclamation 
 {

 	public $id;
 	public $sujet;
 	public $texte;
 	public $etat;
 	public $repense;
 	public $id_client;


 	public function __construct()
 	{

 	}

 	public function setId($id)
 	{
 		$this->id=$id;
 	}

 	public function setSujet($sujet)
 	{
 		$this->sujet=$sujet;
 	}

    public function setTexte($texte)
 	{
 		$this->texte=$texte;
 	}

 	public function setEtat($etat)
 	{
 		$this->etat=$etat;
 	}

 	public function setRepense($repense)
 	{
 		$this->repense=$repense;
 	}
 	public function setId_client($id_client)
 	{
 		$this->id_client=$id_client;
 	}


 	public function ajouter()
 	{
 			$insert = DataBase::connect()->prepare('insert into reclamation VALUES
		(NULL,:sujet,:texte,:etat,:repense,:id_client)');
try 
{		

	$ins = $insert->execute(
	array(
	'sujet'=>$this->sujet,
	'texte'=>$this->texte,
	'etat'=>$this->etat,
	'repense'=>$this->repense,
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


public function select_reclamation()
{

	$select= DataBase::connect()->prepare("select * from reclamation
	as r inner join client as c on
	r.id_client=c.id_client 
	  ORDER BY r.id_reclamation DESC");
	$ex = $select->execute();

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		echo "<tr>";

		echo "<td>";
		echo $line->id_reclamation;
		echo "</td>";
		echo "<td>";
		echo $line->nom." ".$line->prenom;
		echo "</td>";
		echo "<td>";
		echo $line->sujet;
		echo "</td>";
		echo "<td>";
		echo $line->etat;
		echo "</td>";

		echo "<td>";
		echo "<a href=consulter_reclamation.php?id=$line->id_reclamation>
		 <img src='img/chercher.png' width='30' height='30'></img> </a>                   
		
		</a>";
		echo "</td>";
		echo "<td>";
		echo "<a href='traiter_reclamation.php?id=$line->id_reclamation'  >"; 
		echo " <img src='img/traiter.png' width='30' height='30'></img> </a>";                    
		echo "</td>";
		echo "</tr>";

	}

}


public function liste_reclamation()
{
	$select = DataBase::connect()->query("select * from reclamation where id_reclamation=$this->id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}


	public function supprimer_reclamation()
	{
		$delete = DataBase::connect()->query("delete from reclamation where id_reclamation = '$this->id'");
		if($delete)
		{
			return true;
		}
	}

	public function traiter_reclamation()
	{
		
		$select= DataBase::connect()->prepare("update  reclamation set 
			etat=:etat,repense=:repense where id_reclamation=:id");
	$ex = $select->execute(array(
	'id'=>$this->id,
	'etat'=>$this->etat,
	'repense'=>$this->repense
	)
	);

	

	return true;
	
	}

	
}








 
