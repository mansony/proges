<?php
class Ecole
{
		public $id_ecole,
		 $nom_ecole,
		 $nom_fondateur_ecole,
		 $nom_directeur_ecole,
		 $contact_1_ecole,
		 $contact_2_ecole,
		 $localisation_ecole,
		 $mdp_fondateur_ecole,
		 $mdp_adjoint_ecole,
		 $devise_ecole,
		 $logo_ecole;


	public function __construct(array $ecole)
	{
		$this->hydrate($ecole);
	}

	public function hydrate(array $ecole)
	{
		foreach ($ecole as $key => $value)
		{
			$method = 'set'.ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}
	
// SETTERS //
public function setid_ecole($id_ecole)
{
$this->id_ecole = (int) $id_ecole;
}
public function setnom_ecole($nom_ecole)
{
$this->nom_ecole =  $nom_ecole;
}
public function setnom_fondateur_ecole($nom_fondateur_ecole)
{
$this->nom_fondateur_ecole =  $nom_fondateur_ecole;
}
public function setnom_directeur_ecole($nom_directeur_ecole)
{
$this->nom_directeur_ecole = $nom_directeur_ecole;
}
public function setlocalisation_ecole($localisation_ecole)
{
$this->localisation_ecole =  $localisation_ecole;
}

public function setcontact_1_ecole($contact_1_ecole)
{
$this->contact_1_ecole =  $contact_1_ecole;
}

public function setcontact_2_ecole($contact_2_ecole)
{
$this->contact_2_ecole =  $contact_2_ecole;
}


public function setmdp_fondateur_ecole($mdp_fondateur_ecole)
{
$this->mdp_fondateur_ecole =  $mdp_fondateur_ecole;
}
public function setmdp_adjoint_ecole($mdp_adjoint_ecole)
{
$this->mdp_adjoint_ecole = $mdp_adjoint_ecole;
}
public function setdevise_ecole($devise_ecole)
{
$this->devise_ecole = $devise_ecole;
}
public function setlogo_ecole($logo_ecole)
{
$this->logo_ecole =  $logo_ecole;
}


// GETTERS //
public function id_ecole()
{
return $this->id_ecole;
}
public function nom_ecole()
{
return $this->nom_ecole;
}
public function nom_fondateur_ecole()
{
return $this->nom_fondateur_ecole;
}
public function nom_directeur_ecole()
{
return $this->nom_directeur_ecole ;
}
public function localisation_ecole()
{
return $this->localisation_ecole;
}
public function contact_1_ecole()
{
return $this->contact_1_ecole;
}
public function contact_2_ecole()
{
return $this->contact_2_ecole;
}


public function mdp_fondateur_ecole()
{
return $this->mdp_fondateur_ecole;
}
public function mdp_adjoint_ecole()
{
return $this->mdp_adjoint_ecole;
}
public function devise_ecole()
{
return $this->devise_ecole;
}
public function logo_ecole()
{

	move_uploaded_file($_FILES['logo_ecole']['tmp_name'], 'avatars/' . basename($_FILES['logo_ecole']['name']));
	return $this->logo_ecole;
}


}