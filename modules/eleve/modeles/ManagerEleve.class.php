<?php
class ManagerEleve 
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
	
public function add(Eleve $ident)
{	
		$q = $this->_db->prepare('INSERT INTO eleve VALUES(:id_e,UPPER(:nom_e),UPPER(:prenom_e),:sexe_e,:matricule_e,:classe_e,:salle_e,:dnaiss_e,:lnaiss_e,:nation_e,:residence_e,:tuteure_e,:numero_e,:statut_e,:photo_e)');
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

		$req = $this->_db->query('SELECT max(id_e) as id_e FROM eleve') ;
		$donnees = $req ->fetch();
		
		$q = $this->_db->prepare('INSERT INTO mensualite (id_m_e,mois) VALUES (:id_m_e,:mois)');
		$q->bindValue(':id_m_e', $donnees['id_e']);
		$q->bindValue(':mois', 0);
		$q->execute();
		
		$q = $this->_db->prepare('INSERT INTO cantine (id_c_e,mois_c) VALUES (:id_c_e,:mois_c)');
		$q->bindValue(':id_c_e', $donnees['id_e']);
		$q->bindValue(':mois_c', 0);
		$q->execute();
		
}

	public function tabClasse(){
		$individu = array() ;
		$q = $this->_db->query('SELECT nom_classe FROM classe') ;
		while( $donnees = $q ->fetch() ){
		$individu[] = $donnees['nom_classe'] ;
		}
		return $individu ;
	}

//selection des pays de la table pays
	public function tabpays(){
		$individu = array() ;
		$q = $this->_db->query('SELECT nom_pays FROM pays') ;
		while( $donnees = $q ->fetch() ){
		$individu[] = $donnees['nom_pays'] ;
		}
		return $individu ;
	}


//selection de tout les élèves	
	public function listEleve(){
		$rec = array() ;
		$q = $this->_db->query('SELECT * FROM eleve') ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC) ){
		$rec[] = new Eleve($donnees) ;
		}
		return $rec ;
	}



//Methode de selection des élèves par classe dont le chemin est: module=eleve&action=liste&classe=3e annee
	public function listeEleveParClasse($classe){
		$individu = array();
		$q = $this->_db->query('SELECT * FROM eleve WHERE classe_e = "'.$classe.'" ORDER BY nom_e') ;
		while( $donnees = $q -> fetch(PDO::FETCH_ASSOC)){
		$individu[] = new Eleve($donnees) ;
		}
		return $individu ;
	}


//Page d'inscription

	//Recuperation des données de l'école pour établissement du récu
	public function donneeConfig(){
		$req = $this->_db->query('SELECT * FROM config') ;
		$config = $req ->fetch();
		return $config ;
	}

	//Recuperation des données sur l'élève inscrit et insertion de l'inscrption dans la base de donnée
	public function donneeEleve($eleve,$montant){

		$req = $this->_db->query('SELECT * FROM eleve WHERE matricule_e = "'.$eleve.'" ') ;
		$eleve = $req ->fetch();

		$q = $this->_db->prepare('INSERT INTO recette(montant_rec,intituler_rec,date_rec) VALUES (:montant_rec,:intituler_rec,NOW())');
		$q->bindValue(':montant_rec', $montant);
		$q->bindValue(':intituler_rec', 'Inscription de l élève '.$eleve['nom_e'].' '.$eleve['prenom_e']);
		$q->execute();

		return $eleve ;

	}





}
//objet de reception des donnees

?>