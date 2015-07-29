<?php 

class historique
{	
	public $id;
	public $date;
	public $solde;
	public $id_client;

	public function __construct()
	{
		$this->date=date('Y/m/d');
	}

	public function setId($id)
 	{
 		$this->id=$id;
 	}




 	public function setSolde($solde)
 	{
 		$this->solde=$solde;
 	}

 	public function setId_client($id_client)
 	{
 		$this->id_client=$id_client;
 	}



 	public function ajouter()
 	{
 			$insert = DataBase::connect()->prepare('insert into historique VALUES
		(NULL,:date,:solde,:id_client)');
	try 
	{		

		$ins = $insert->execute
		(
			array(
			'date'=>$this->date,
			'solde'=>$this->solde,
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





}