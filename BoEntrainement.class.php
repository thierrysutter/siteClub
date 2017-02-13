<?php
class BoEntrainement {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_jour;
	private $_heureDebut;
	private $_heureFin;
	private $_lieu;

	// GETTER
	public function getId() {
		return $this->_id;
	}

	public function getJour() {
		return $this->_jour;
	}

	public function getHeureDebut() {
		return $this->_heureDebut;
	}

	public function getHeureFin() {
		return $this->_heureFin;
	}

	public function getLieu() {
		return $this->_lieu;
	}
	//SETTER
	public function setId($id) {
		$this->_id = $id;
	}

	public function setJour($jour) {
		if (is_string($jour)) {
			$this->_jour = $jour;
		}
	}

	public function setHeureDebut($heureDebut) {
		if (is_string($heureDebut)) {
			$this->_heureDebut = $heureDebut;
		}
	}

	public function setHeureFin($heureFin) {
		if (is_string($heureFin)) {
			$this->_heureFin = $heureFin;
		}
	}
	
	public function setLieu($lieu) {
		if (is_string($lieu)) {
			$this->_lieu = $lieu;
		}
	}

	public function __construct(array $donnees) {
		$this->hydrate($donnees);
	}

	// HYDRATATION
	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees) {
		//echo "Entrée dans l'hydratation de la classe Sponsor<br>";
		foreach ($donnees as $key => $value) {
			// On récupère le nom du setter correspondant à l'attribut.
			$method = 'set'.ucfirst($key);
			// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
			  // On appelle le setter.
			  $this->$method($value);
			}
		}
	}
}
?>