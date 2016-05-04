<?php
class Eleve
{
		public $id_e,
		 $nom_e,
		 $prenom_e,
		 $matricule_e,
		 $sexe_e,
		 $classe_e,
		 $salle_e,
		 $dnaiss_e,
		 $lnaiss_e,
		 $nation_e,
		 $residence_e,
		 $tuteure_e,
		 $numero_e,
		 $statut_e,
		 $photo_e;


	public function __construct(array $eleves)
	{
		$this->hydrate($eleves);
	}

	public function hydrate(array $eleves)
	{
		foreach ($eleves as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	
// SETTERS //
public function setid_e($id_e)
{
$this->id_e = (int) $id_e;
}
public function setnom_e($nom_e)
{
$this->nom_e =  $nom_e;
}
public function setprenom_e($prenom_e)
{
$this->prenom_e =  $prenom_e;
}
public function setmatricule_e($matricule_e)
{
$this->matricule_e = (int) $matricule_e;
}
public function setsexe_e($sexe_e)
{
$this->sexe_e =  $sexe_e;
}

public function setclasse_e($classe_e)
{
$this->classe_e =  $classe_e;
}
public function setsalle_e($salle_e)
{
$this->salle_e =  $salle_e;
}
public function setdnaiss_e($dnaiss_e)
{
$this->dnaiss_e =  $dnaiss_e;
}
public function setlnaiss_e($lnaiss_e)
{
$this->lnaiss_e =  $lnaiss_e;
}
public function setnation_e($nation_e)
{
$this->nation_e = $nation_e;
}
public function setResidence_e($residence_e)
{
$this->residence_e = $residence_e;
}
public function settuteure_e($tuteure_e)
{
$this->tuteure_e =  $tuteure_e;
}
public function setnumero_e($numero_e)
{
$this->numero_e = $numero_e;
}
public function setstatut_e($statut_e)
{
$this->statut_e =  $statut_e;
}
public function setphoto_e($photo_e)
{
$this->photo_e =  $photo_e;
}


// GETTERS //
public function id_e()
{
return $this->id_e;
}
public function nom_e()
{
return $this->nom_e;
}
public function prenom_e()
{
return $this->prenom_e;
}
public function matricule_e()
{
return $this->matricule_e ;
}
public function sexe_e()
{
return $this->sexe_e;
}
public function Classe_e()
{
return $this->classe_e;
}
public function salle_e()
{
return $this->salle_e;
}
public function dnaiss_e()
{
return $this->dnaiss_e;
}
public function lnaiss_e()
{
return $this->lnaiss_e;
}
public function nation_e()
{
return $this->nation_e;
}
public function residence_e()
{
return $this->residence_e;
}
public function tuteure_e()
{
return $this->tuteure_e;
}
public function numero_e()
{
return $this->numero_e;
}
public function statut_e()
{
return $this->statut_e;
}
public function photo_e()
{

	move_uploaded_file($_FILES['photo_e']['tmp_name'], 'avatars/' . basename($_FILES['photo_e']['name']));
	return $this->photo_e;
}


}