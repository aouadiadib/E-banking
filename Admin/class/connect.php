<?php


class Database {

	public $connexion ;
	
	public function __construct() 
	{
		$this->connexion = NULL;
	}
	public static function connect() {
		
			$connexion = new PDO('mysql:host=localhost;dbname=e-banking', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			
		return $connexion;
	}
	
}  



?>