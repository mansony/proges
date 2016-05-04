<?php

class ManagerSearch
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


public function edit(Eleve $ident)
{	
		
$q = $this->_db->prepare('UPDATE eleve SET nom_e = UPPER(:nom_e), prenom_e = UPPER(:prenom_e),sexe_e = :sexe_e ,matricule_e = :matricule_e,classe_e = :classe_e,salle_e = :salle_e,dnaiss_e = :dnaiss_e,  
						lnaiss_e = :lnaiss_e, nation_e = :nation_e ,residence_e = :residence_e , tuteure_e= :tuteure_e , numero_e= :numero_e , statut_e= :statut_e , photo_e = :photo_e  WHERE id_e = :id_e ');
		$q->bindValue(':id_e', $ident->id_e());
		$q->bindValue(':nom_e', $ident->nom_e());
		$q->bindValue(':prenom_e', $ident->prenom_e());
		$q->bindValue(':sexe_e', $ident->sexe_e());
		$q->bindValue(':matricule_e', $ident->matricule_e());
		$q->bindValue(':classe_e', $ident->classe_e());
		$q->bindValue(':salle_e', $ident->salle_e());
		$q->bindValue(':dnaiss_e', $ident->dnaiss_e());
		$q->bindValue(':lnaiss_e', ucfirst($ident->lnaiss_e()));
		$q->bindValue(':nation_e', $ident->nation_e());
		$q->bindValue(':residence_e', $ident->residence_e());
		$q->bindValue(':tuteure_e', ucfirst($ident->tuteure_e()));
		$q->bindValue(':numero_e', $ident->numero_e());
		$q->bindValue(':statut_e', $ident->statut_e());
		$q->bindValue(':photo_e',$ident->photo_e());
		$q->execute();
}

	public function countEleveByName($nom){
		$req = $this->_db->query('SELECT id_e,nom_e,prenom_e,photo_e FROM eleve WHERE nom_e LIKE "'.$nom.'%" OR  prenom_e LIKE "'.$nom.'%" ') ;
		$count = $req->rowCount();
		return $count ;
	}

	public function search($nom){
		$individu = array() ;
		$q = $this->_db->query('SELECT nom_e,prenom_e,id_e,photo_e FROM eleve WHERE nom_e LIKE "'.$nom.'%" OR  prenom_e LIKE "'.$nom.'%" ') ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC)){
		$individu[] = new Eleve($donnees) ;
		}
		return $individu ;
		}

	public function ficheEleve($id){
		$q = $this->_db->query('SELECT id_e,nom_e,prenom_e,sexe_e,matricule_e,classe_e,salle_e,DATE_FORMAT(dnaiss_e, "%e/%m/%Y") AS dnaiss_e,
  lnaiss_e,nation_e,residence_e,tuteure_e,numero_e,statut_e,photo_e FROM eleve WHERE id_e = "'.$id.'" ') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		
		return $donnees ;
	}

	public function scolarite($id){
		$q = $this->_db->query('SELECT mois FROM mensualite WHERE id_m_e = "'.$id.'" ') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		
		return $donnees ;
	}

	public function cantine($id){
		$q = $this->_db->query('SELECT mois_c FROM cantine WHERE id_c_e = "'.$id.'" ') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		
		return $donnees ;
	}

	public function exclusion($exclu)
	{	
		$this->_db->query('DELETE FROM eleve WHERE id_e = '.$exclu.' ');
		$this->_db->query('DELETE FROM mensualite WHERE id_m_e = "'.$exclu.'" ');
	}
	
}


?>