<?php 
require_once("connect.php");
class compte 
{

public $id;
public $type;
public $num;
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

public function  setType_c($type)
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


public function select_compte()
{

	$select= DataBase::connect()->prepare("select * from compte as c inner join client as cl
	on c.id_client=cl.id_client where c.id_client=:id");
	$ex = $select->execute(array(
	'id'=>$this->id_client
	)
	);

	while($line = $select->fetch(PDO::FETCH_OBJ))
	{
		echo "<tr>";

		echo "<td>";
		echo $line->nom." ".$line->prenom;
		echo "</td>";
		echo "<td>";
		echo $line->type;
		echo "</td>";
		echo "<td>";
		echo $line->date;
		echo "</td>";
		echo "<td>";
		echo "T N D";
		echo "</td>";
		echo "<td>";
		echo $line->solde;
		echo "</td>";

		echo "</tr>";

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
	$select = DataBase::connect()->query("select * from compte where id_client=$this->id_client");
		$liste = $select->fetchAll(PDO::FETCH_ASSOC);
		return $liste;

}




}

