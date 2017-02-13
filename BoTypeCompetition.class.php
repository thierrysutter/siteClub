<?php
class BoTypeCompetition {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_libelle;
	private $_categorie;
	private $_libelleCategorie;

	// GETTER
	public function getId() {
		return $this->_id;
	}

	public function getLibelle() {
		return $this->_libelle;
	}

	public function getCategorie() {
		return $this->_categorie;
	}

	public function getLibelleCategorie() {
		return $this->_libelleCategorie;
	}

	//SETTER
	public function setId($id) {
		$this->_id = $id;
	}

	public function setLibelle($libelle) {
		if (is_string($libelle)) {
			$this->_libelle = $libelle;
		}
	}

	public function setCategorie($categorie) {
		$this->_categorie = $categorie;
	}

	public function setLibelleCategorie($libelleCategorie) {
		if (is_string($$libelleCategorie)) {
			$this->_libelleCategorie = $libelleCategorie;
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