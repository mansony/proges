<?php
class ManagerStat
{

	private $_db; // Instance de PDO
	public function __construct($db)
	{
		$this->setDb($db);
	}
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}


// Methode de calcul des bilan afin de passer au mois suivant
	public function statClasse($classe,$sexe){
		$req = $this->_db->query('SELECT * FROM eleve WHERE sexe_e = "'.$sexe.'" AND classe_e = "'.$classe.'" ') ;
		$stat = $req->rowCount();
		return $stat ;
	}

	public function countTotal(){
		$req = $this->_db->query('SELECT * FROM eleve') ;
		$count = $req->rowCount();
		return $count ;
	}

	public function countGirl(){
		$req = $this->_db->query('SELECT * FROM eleve WHERE sexe_e = "F" ') ;
		$count = $req->rowCount();
		return $count ;
	}

	public function countBoy(){
		$req = $this->_db->query('SELECT * FROM eleve WHERE sexe_e = "M" ') ;
		$count = $req->rowCount();
		return $count ;
	}

	public function countWork(){
		$req = $this->_db->query('SELECT * FROM personnel') ;
		$count = $req->rowCount();
		return $count ;
	}
	
}

?>