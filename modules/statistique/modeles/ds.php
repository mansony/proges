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
		$dep = array() ;
		$req = $this->_db->query('SELECT * FROM eleve WHERE sexe_e = "'.$sexe.'" AND classe_e = "'.$classe.'" ') ;
		$stat = $req->rowCount();
		return $stat ;
	}


// Methode ajoutant un mois de plus à l'élève qui vient de payer
	public function paye_sco()
	{	
		$q = $this->_db->query('UPDATE mensualite SET mois = mois + 1 WHERE id_m_e ='.$_POST['eleve'].'');
	}
	
}


?>