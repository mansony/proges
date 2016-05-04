<?php

class ManagerEcole
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


	public function add(Ecole $ident)
	{	
		$q = $this->_db->prepare('INSERT INTO config VALUES(:nom_ecole,:nom_fondateur_ecole,:nom_directeur_ecole,:contact_1_ecole,:contact_2_ecole,:localisation_ecole,:mdp_fondateur_ecole,:mdp_adjoint_ecole,:devise_ecole,:logo_ecole,:id_ecole)');
	
		$q->bindValue(':nom_ecole', $ident->nom_ecole());
		$q->bindValue(':nom_fondateur_ecole', $ident->nom_fondateur_ecole());
		$q->bindValue(':nom_directeur_ecole', $ident->nom_directeur_ecole());
		$q->bindValue(':contact_1_ecole', $ident->contact_1_ecole());
		$q->bindValue(':contact_2_ecole', $ident->contact_2_ecole());
		$q->bindValue(':localisation_ecole', $ident->localisation_ecole());
		$q->bindValue(':mdp_fondateur_ecole', $ident->mdp_fondateur_ecole());
		$q->bindValue(':mdp_adjoint_ecole', $ident->mdp_adjoint_ecole());
		$q->bindValue(':devise_ecole', $ident->devise_ecole());
		$q->bindValue(':logo_ecole', $ident->logo_ecole());
		$q->bindValue(':id_ecole', $ident->id_ecole());
		$q->execute();
	}


	public function ficheEcole(){
		$q = $this->_db->query('SELECT * FROM config') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		return $donnees ;
	}

	public function today_rec(){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%e') = DATE_FORMAT(NOW(), '%e') AND DATE_FORMAT(date_rec, '%m') = DATE_FORMAT(NOW(), '%m')  ORDER BY id_rec DESC ") ;
		return $q ;
	}

	public function jour_rec($jour){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%e') = '".$jour."' AND DATE_FORMAT(date_rec, '%m') = DATE_FORMAT(NOW(), '%m')  ORDER BY id_rec DESC") ;
		return $q ;
	}

	public function mois_rec($mois){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%m') = '".$mois."'  ORDER BY id_rec DESC") ;
		return $q ;
	}

	public function today_rec_type($type){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%e') = DATE_FORMAT(NOW(), '%e') AND DATE_FORMAT(date_rec, '%m') = DATE_FORMAT(NOW(), '%m') AND type='".$type."' ORDER BY id_rec DESC ") ;
		return $q ;
	}

	public function jour_rec_type($jour,$type){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%e') = '".$jour."' AND DATE_FORMAT(date_rec, '%m') = DATE_FORMAT(NOW(), '%m') AND type='".$type."' ORDER BY id_rec DESC") ;
		return $q ;
	}

	public function mois_rec_type($mois,$type){
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette WHERE DATE_FORMAT(date_rec, '%m') = '".$mois."' AND type='".$type."' ORDER BY id_rec DESC") ;
		return $q ;
	}


	public function today_dep(){
		$q = $this->_db->query("SELECT id_dep,montant_dep,intituler_dep,DATE_FORMAT(date_dep, '%e/%m/%Y') AS date_dep FROM depense WHERE DATE_FORMAT(date_dep, '%e') = DATE_FORMAT(NOW(), '%e') AND DATE_FORMAT(date_dep, '%m') = DATE_FORMAT(NOW(), '%m')  ORDER BY id_dep DESC") ;
		return $q ;
	}

	public function jour_dep($jour){
		$q = $this->_db->query("SELECT id_dep,montant_dep,intituler_dep,DATE_FORMAT(date_dep, '%e/%m/%Y') AS date_dep FROM depense WHERE DATE_FORMAT(date_dep, '%e') = '".$jour."' AND DATE_FORMAT(date_dep, '%m') = DATE_FORMAT(NOW(), '%m')  ORDER BY id_dep DESC") ;
		return $q ;
	}

	public function mois_dep($mois){
		$q = $this->_db->query("SELECT id_dep,montant_dep,intituler_dep,DATE_FORMAT(date_dep, '%e/%m/%Y') AS date_dep FROM depense WHERE DATE_FORMAT(date_dep, '%m') = '".$mois."' ORDER BY id_dep DESC") ;
		return $q ;
	}


	public function listePersonnel(){
		$q = $this->_db->query("SELECT matricule_p,nom_p,prenom_p,sexe_p,poste_p,dnaiss_p,lnaiss_p,nation_p,residence_p,numero_p FROM personnel") ;
		return $q ;
	}

	public function listePayer($classe,$salle){
		$q = $this->_db->query("SELECT matricule_e,nom_e,prenom_e,sexe_e,numero_e,mois FROM eleve LEFT JOIN mensualite ON id_e = id_m_e WHERE classe_e='".$classe."' AND salle_e='".$salle."' ") ;
		return $q ;
	}


}

?>