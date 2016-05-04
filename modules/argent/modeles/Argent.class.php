<?php
class Argent
{
	public $id_dep,
			 $date_dep,
			 $montant_dep, 
			 $intituler_dep,
			
			$id_rec, 
			$date_rec,
			$montant_rec, 
			$intituler_rec,

			$montant_rec_total, 
			$montant_dep_total,
			$solde;
	

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

	public function setid_dep($id_dep)
	{
		$this->id_dep = (int) $id_dep;
	}
	public function setdate_dep($date_dep)
	{
		$this->date_dep = $date_dep;
	}
	public function setmontant_dep($montant_dep)
	{
		$this->montant_dep = (int) $montant_dep;
	}
	public function setmontant_dep_total($montant_dep_total)
	{
		$this->montant_dep_total = (int) $montant_dep_total;
	}
	public function setintituler_dep($intituler_dep)
	{
		$this->intituler_dep =  $intituler_dep;
	}

	
	//setter recette
	public function setid_rec($id_rec)
	{
		$this->id_rec = (int) $id_rec;
	}
	public function setdate_rec($date_rec)
	{
		$this->date_rec = $date_rec;
	}
	public function setmontant_rec($montant_rec)
	{
		$this->montant_rec = (int) $montant_rec;
	}
	public function setmontant_rec_total($montant_rec_total)
	{
		$this->montant_rec_total = (int) $montant_rec_total;
	}
	public function setintituler_rec($intituler_rec)
	{
		$this->intituler_rec =  $intituler_rec;
	}


	
	// GETTERS depense
	public function id_dep()
	{
		return $this->id_dep;
	}
	public function date_dep()
	{
		return $this->date_dep;
	}
	public function montant_dep()
	{
		return $this->montant_dep;
	}
	public function montant_dep_total()
	{
		return $this->montant_dep_total;
	}
	public function intituler_dep()
	{
		return $this->intituler_dep;
	}

	// GETTERS recette
	public function id_rec()
	{
		return $this->id_rec;
	}
	public function date_rec()
	{
		return $this->date_rec;
	}
	public function montant_rec()
	{
		return $this->montant_rec;
	}
	public function montant_rec_total()
	{
		return $this->montant_rec_total;
	}
	public function intituler_rec()
	{
		return $this->intituler_rec;
	}



public function setsolde($solde)
	{
		$this->solde =  $solde;
	}
public function solde()
	{
		return $this->solde;
	}

}

?>