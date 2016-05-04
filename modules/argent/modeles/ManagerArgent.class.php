<?php

class ManagerArgent
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
	
// Methode d'enregistrement des depenses
public function add_dep(Argent $ident)
{	

		$q = $this->_db->prepare('INSERT INTO depense VALUES(:id_dep,:date_dep,:montant_dep,:intituler_dep)');
		$q->bindValue(':id_dep', $ident->id_dep());
		$q->bindValue(':date_dep', $ident->date_dep());
		$q->bindValue(':montant_dep', $ident->montant_dep());
		$q->bindValue(':intituler_dep', $ident->intituler_dep());
		$q->execute();

}

// Methode d'enregistrement des recettes
public function add_rec(Argent $ident)
{	
	
		$q = $this->_db->prepare('INSERT INTO recette VALUES(:id_rec,:montant_rec,:intituler_rec,:date_rec,:type)');
		$q->bindValue(':id_rec', $ident->id_rec());
		$q->bindValue(':montant_rec', $ident->montant_rec());
		$q->bindValue(':intituler_rec', $ident->intituler_rec());
		$q->bindValue(':date_rec', $ident->date_rec());
		$q->bindValue(':type', "autres");
		$q->execute();

}

// Methode de selection des données des recettes pour afficher sur tableau
public function tabRec(){
		$rec = array() ;
		$q = $this->_db->query("SELECT id_rec,montant_rec,intituler_rec,DATE_FORMAT(date_rec, '%e/%m/%Y') AS date_rec FROM recette ORDER BY id_rec DESC LIMIT 20") ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC) ){
		$rec[] = new Argent($donnees) ;
		}
		return $rec ;
	}
	
// Methode de selection des données des dépenses pour afficher sur tableau
	public function tabDep(){
		$dep = array() ;
		$q = $this->_db->query("SELECT id_dep,montant_dep,intituler_dep,DATE_FORMAT(date_dep, '%e/%m/%Y') AS date_dep FROM depense ORDER BY id_dep DESC LIMIT 20") ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC) ){
		$dep[] = new Argent($donnees) ;
		}
		return $dep ;
	}


// Methode de selection du bilan pour afficher sur tableau
		public function bilan(){
		$bil = array() ;
		$q = $this->_db->query('SELECT * FROM bilan') ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC) ){
		$bil[] = new Argent($donnees) ;
		}
		return $bil ;
	}
	

// Methode de calcul de la dépense totale
	public function sommeDep(){
		$i = 0 ;
		$q = $this->_db->query('SELECT montant_dep FROM depense') ;
		while( $donnees = $q ->fetch() ){
		$i = $i + $donnees['montant_dep'] ;
		}
		return $i ;
	}


// Methode de calcul de la somme totale
	public function sommeRec(){
		$i = 0 ;
		$q = $this->_db->query('SELECT montant_rec FROM recette') ;
		while( $donnees = $q ->fetch() ){
		$i = $i + $donnees['montant_rec'] ;
		}
		return $i ;
	}

// Methode de calcul des bilan afin de passer au mois suivant
	public function calcul_bilan(){

		$i = 0 ;
		$q = $this->_db->query('SELECT montant_rec FROM recette') ;
		while( $donnees = $q ->fetch() ){
		$i = $i + $donnees['montant_rec'] ;
		}

		$j = 0 ;
		$q = $this->_db->query('SELECT montant_dep FROM depense') ;
		while( $donnees = $q ->fetch() ){
		$j = $j + $donnees['montant_dep'] ;
		}

		$solde = $i - $j;

		$q = $this->_db->query('INSERT INTO bilan VALUE (NULL,"'.$j.'","'.$i.'","'.$solde.'")');

		$q = $this->_db->query('TRUNCATE TABLE recette');

		$q = $this->_db->query('TRUNCATE TABLE depense');
	}

		

// Methode de calcul des bilan afin de passer au mois suivant
public function tabEleve(){
		$dep = array() ;
		$q = $this->_db->query('SELECT id_e  FROM eleve') ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC) ){
		$dep[] = $donnees['id_e'] ;
		}
		return $dep ;
	}


// Methode ajoutant un mois de plus à l'élève qui vient de payer
	public function paye_sco()
	{	
		$q = $this->_db->query('UPDATE mensualite SET mois = mois + 1 WHERE id_m_e ='.$_POST['eleve'].'');
	}


//Methode commune à la page cantine et scolarite
	public function config(){
		$q = $this->_db->query("SELECT * FROM config ") ;
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return $donnees ;
	}

	public function eleveCantine($id){
		$q = $this->_db->query('SELECT * FROM eleve WHERE id_e = "'.$id.'" ');
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		return $donnees ;
	}


//ensemble des methodes de la page reçu de la scolarité

public function registerScolariteRecette($montant,$nom,$prenom)
	{	
		$this->_db->query('INSERT INTO recette(montant_rec,intituler_rec,date_rec,type) VALUES ('.$montant.',"payement de la scolarité de l élève '.$nom.' '.$prenom.'",NOW(),"scolarite")');
	}

	public function registerScolarite($id)
	{	
		$this->_db->query('UPDATE mensualite SET mois = mois + 1 WHERE id_m_e ='.$_GET['elv'].'');
	}

	public function selectMoisScolarite($id){
		$q = $this->_db->query('SELECT mois FROM mensualite WHERE id_m_e ='.$_GET['elv'].' ') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		return $donnees ;
	}

//ensemble des methodes de la page reçu de la cantine

	public function registerCantineRecette($montant,$nom,$prenom)
	{	
		$this->_db->query('INSERT INTO recette(montant_rec,intituler_rec,date_rec,type) VALUES ('.$montant.',"payement de la cantine de l élève '.$nom.' '.$prenom.'",NOW(),"cantine")');
	}

	public function registerCantine($id)
	{	
		$this->_db->query('UPDATE cantine SET mois_c = mois_c + 1 WHERE id_c_e ='.$id.'');
	}

	public function selectMoisCantine($id){
		$q = $this->_db->query('SELECT mois_c FROM cantine WHERE id_c_e ='.$_GET['elv'].' ') ;
		$donnees = $q -> fetch(PDO::FETCH_ASSOC);
		return $donnees ;
	}
	
}


?>