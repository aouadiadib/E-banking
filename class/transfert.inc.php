<?php 


class transfert 
 {

 	public $id;
 	public $date;
 	public $solde;
 	public $rib;
 	public $id_client;


 	public function __construct()
 	{
 		$this->date = date('Y/m/d');
 	}

 	public function setId($id)
 	{
 		$this->id=$id;
 	}

 	public function setSolde($solde)
 	{
 		$this->solde=$solde;
 	}

 	public function setType($type)
 	{
 		$this->type=$type;
 	}


    public function setNum($num)
 	{
 		$this->num=$num;
 	}

    public function setEtat($etat)
 	{
 		$this->etat=$etat;
 	}


 	

 	public function setId_client($id_client)
 	{
 		$this->id_client=$id_client;
 	}


 	public function ajouter()
 	{
 			$insert = DataBase::connect()->prepare('insert into transfert VALUES
		(NULL,:date,:solde,:type,:num,:etat,:id_client)');
try 
{		

	$ins = $insert->execute(
	array(
	'date'=>$this->date,
	'solde'=>$this->solde,
	'type'=>$this->type,
	'num'=>$this->num,
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


public function select_transfert()
{

	$select= DataBase::connect()->prepare("select * from transfert where id_client=:id ORDER BY id_transfert DESC");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		echo "<tr>";

		
		echo "<td>";
		echo $line->date;
		echo "</td>";
		echo "<td>";
		if($line->type=="C P")
		{
			echo "carneil d'epargne";
		}

		if($line->type=="R I B")
		{
			echo "R I B";
		}
		echo "</td>";
		echo "<td>";
		echo $line->num;
		echo "</td>";
		echo "<td>";
		echo $line->solde;
		echo "</td>";
		
		echo "<td>";
		if($line->etat=="en cours")
		{
			echo "en cours de traitement";
		}
		if($line->etat=="success")
		{
			echo "envoie avec succées";
		}
		if($line->etat=="non")
		{
			echo "envoie non effectuer";
		}


		echo "</td>";
		
		echo "</tr>";

	}

}




public function liste_info_historique()
{
	$select = DataBase::connect()->query("select * from historique where id_client=$this->id_client order by id_historique DESC");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}


}








 
