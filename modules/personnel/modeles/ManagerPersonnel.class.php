<?php
class ManagerPersonnel 
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
	
public function add(Personnel $ident)
{	
		$q = $this->_db->prepare('INSERT INTO personnel VALUES(:id_p,UPPER(:nom_p),UPPER(:prenom_p),:sexe_p,:matricule_p,:poste_p,:dnaiss_p,:lnaiss_p,:nation_p,:residence_p,:numero_p,:photo_p)');
		$q->bindValue(':id_p', $ident->id_p());
		$q->bindValue(':nom_p', $ident->nom_p());
		$q->bindValue(':prenom_p', $ident->prenom_p());
		$q->bindValue(':sexe_p', $ident->sexe_p());
		$q->bindValue(':matricule_p', $ident->matricule_p());
		$q->bindValue(':poste_p', $ident->poste_p());
		$q->bindValue(':dnaiss_p', $ident->dnaiss_p());
		$q->bindValue(':lnaiss_p', ucfirst($ident->lnaiss_p()));
		$q->bindValue(':nation_p', $ident->nation_p());
		$q->bindValue(':residence_p', $ident->residence_p());
		$q->bindValue(':numero_p', $ident->numero_p());
		$q->bindValue(':photo_p',$ident->photo_p());
		$q->execute();
}


public function edit(Personnel $ident)
{	
		
$q = $this->_db->prepare('UPDATE personnel SET nom_p = UPPER(:nom_p), prenom_p = UPPER(:prenom_p), matricule_p = :matricule_p, poste_p = :poste_p ,sexe_p = :sexe_p ,dnaiss_p = :dnaiss_p,  
						lnaiss_p = :lnaiss_p, nation_p = :nation_p ,residence_p = :residence_p , numero_p= :numero_p , photo_p = :photo_p  WHERE id_p = :id_p  ');
		$q->bindValue(':id_p', $ident->id_p());
		$q->bindValue(':nom_p', $ident->nom_p());
		$q->bindValue(':prenom_p', $ident->prenom_p());
		$q->bindValue(':sexe_p', $ident->sexe_p());
		$q->bindValue(':matricule_p', $ident->matricule_p());
		$q->bindValue(':poste_p', $ident->poste_p());
		$q->bindValue(':dnaiss_p', $ident->dnaiss_p());
		$q->bindValue(':lnaiss_p', ucfirst($ident->lnaiss_p()));
		$q->bindValue(':nation_p', $ident->nation_p());
		$q->bindValue(':residence_p', $ident->residence_p());
		$q->bindValue(':numero_p', $ident->numero_p());
		$q->bindValue(':photo_p',$ident->photo_p());
		$q->execute();
}




	public function tabpays(){
		$individu = array() ;
		$q = $this->_db->query('SELECT nom_pays FROM pays') ;
		while( $donnees = $q ->fetch() ){
		$individu[] = $donnees['nom_pays'] ;
		}
		return $individu ;
	}


		public function listePersonnel(){
			$individu = array();
			$q = $this->_db->query('SELECT * FROM personnel') ;
			while( $donnees = $q->fetch(PDO::FETCH_ASSOC)){
				$individu[] = new Personnel($donnees) ;
			}
			return $individu ;
		}

		public function fichePersonnel(){
			$donnees = array();
		$q = $this->_db->query('SELECT id_p,nom_p,prenom_p,sexe_p,matricule_p,DATE_FORMAT(dnaiss_p, "%e/%m/%Y") AS dnaiss_p,
  lnaiss_p,nation_p,residence_p,tuteure_e,numero_p,poste_p,photo_p FROM personnel ') ;
		while( $donnee = $q->fetch(PDO::FETCH_ASSOC)){
				$donnees[] = new Personnel($donnee) ;
			}
			return $donnees ;

	}

}
//objet de reception des donnees

?>