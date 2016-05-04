<?php
class Personnel
{
		public $id_p,
		 $nom_p,
		 $prenom_p,
		 $matricule_p,
		 $sexe_p,
		 $poste_p,
		 $dnaiss_p,
		 $lnaiss_p,
		 $nation_p,
		 $residence_e,
		 $numero_p,
		 $photo_p;


	public function __construct(array $personnel)
	{
		$this->hydrate($personnel);
	}

	public function hydrate(array $personnel)
	{
		foreach ($personnel as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	



// SETTERS //
public function setid_p($id_p)
{
$this->id_p = (int) $id_p;
}
public function setnom_p($nom_p)
{
$this->nom_p =  $nom_p;
}
public function setprenom_p($prenom_p)
{
$this->prenom_p =  $prenom_p;
}
public function setmatricule_p($matricule_p)
{
$this->matricule_p = (int) $matricule_p;
}
public function setsexe_p($sexe_p)
{
$this->sexe_p =  $sexe_p;
}

public function setposte_p($poste_p)
{
$this->poste_p =  $poste_p;
}

public function setdnaiss_p($dnaiss_p)
{
$this->dnaiss_p =  $dnaiss_p;
}
public function setlnaiss_p($lnaiss_p)
{
$this->lnaiss_p =  $lnaiss_p;
}
public function setnation_p($nation_p)
{
$this->nation_p = $nation_p;
}
public function setresidence_p($residence_p)
{
$this->residence_p = $residence_p;
}
public function setnumero_p($numero_p)
{
$this->numero_p = $numero_p;
}
public function setphoto_p($photo_p)
{
$this->photo_p =  $photo_p;
}


// GETTERS //
public function id_p()
{
return $this->id_p;
}
public function nom_p()
{
return $this->nom_p;
}
public function prenom_p()
{
return $this->prenom_p;
}
public function matricule_p()
{
return $this->matricule_p ;
}
public function sexe_p()
{
return $this->sexe_p;
}
public function poste_p()
{
return $this->poste_p;
}
public function dnaiss_p()
{
return $this->dnaiss_p;
}
public function lnaiss_p()
{
return $this->lnaiss_p;
}
public function nation_p()
{
return $this->nation_p;
}
public function residence_p()
{
return $this->residence_p;
}
public function numero_p()
{
return $this->numero_p;
}
public function photo_p()
{

	move_uploaded_file($_FILES['photo_p']['tmp_name'], 'avatars/' . basename($_FILES['photo_p']['name']));
	return $this->photo_p;
}


}