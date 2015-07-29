<?php 
require_once("connect.php");
class compte 
{

public $id;
public $type;
public $num;
public $RIB;
public $date;
public $block;
public $solde;
public $id_client;

public function __construct()
{
	
}


//les methodes SET
public function setId($id)
{
	$this->id = $id;
}
public function  setRIB($RIB)
{
	$this->RIB = $RIB;
}

public function  setType($type)
{
	$this->type = $type;
}

public function setNum($num)
{
	$this->num = $num;
}

public function setSolde($solde)
{
	$this->solde = $solde;
}
public function setBlock($block)
{
	$this->block = $block;
}
public function setDate($date)
{
	$this->date = $date;
}

public function setId_client($id_client)
{
	$this->id_client = $id_client;
}

//les methodes GET

public function getId()
{
	return $this->id;
}



public function getId_client()
{
	return $this->id_client;
}

public function ajouter()
 	{

 			$insert = DataBase::connect()->prepare('insert into compte VALUES
		(NULL,:RIB,:num,:type,:date,:solde,:block,:id_client)');
try 
{		

	$ins = $insert->execute(
	array(
	'RIB'=>$this->RIB,
	'num'=>$this->num,
	'type'=>$this->type,
	'date'=>$this->date,
	'solde'=>$this->solde,
	 'block'=>$this->block,
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

public function select_compte()
{

	$select= DataBase::connect()->prepare("select * from compte as c inner join client as cl
	on c.id_client=cl.id_client ");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{	
		if ($line->block == 0)
		{

		echo "<tr>";

		echo "<td>";
		echo $line->nom." ".$line->prenom;
		echo "</td>";
		echo "<td>";
		echo $line->type;
		echo "</td>";
		
	
		echo "<td>";
		echo $line->solde;
		echo "</td>";

		echo "<td>";
		echo "<a href='consulter_compte.php?id=$line->id_compte'>"; 
		echo " <img src='img/chercher.png' width='30' height='30'></img> </a>";                    
		echo "</td>";

			echo "<td>";
			echo "<a href='bloquer_compte.php?id=$line->id_compte'  onclick='if (confirm(&quot;Voulez vous vraiment bloquer le compte:   ?&quot;)) { return true; } return false;'>"; 
			echo " <img src='img/block.jpg' width='30' height='30'></img> </a>";                    
			echo "</td>";
		echo "</tr>";

			}	

	}
	

}

public function select_solde()
{
	$select= DataBase::connect()->prepare("select * from compte where id_client=:id");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		$solde = $line->solde; 
	}

	return $solde;

}

public function select_RIB()
{

	$select= DataBase::connect()->prepare("select * from compte where id_client=:id");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		$rib =$line->RIB ;
	}

	return $rib;
	

}

public function select_NUM()
{

	$select= DataBase::connect()->prepare("select * from compte where id_client=:id");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		$num =$line->num_c ;
	}

	return $num;
	

}

public function modifier_solde($solde)
{

	$select= DataBase::connect()->prepare("update  compte set solde=:solde where id_client=:id");
	$ex = $select->execute(array(
	'id'=>$this->id_client,
	'solde'=>$solde
	)
	);

	

	return true;
	

}

public function liste_info_compte()
{
	$select = DataBase::connect()->query("select * from compte where id_compte=$this->id");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}
 public function bloquer_compte()
	{
	
		$up = DataBase::connect()->prepare('update  compte SET
		block=:block where id_compte=:id');
try {		
	$update = $up->execute(
	array(
	'block'=>1,
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



}

