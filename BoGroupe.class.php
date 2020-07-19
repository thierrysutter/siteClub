<?php
class BoGroupe {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_libelle;
	private $_competition;
	private $_equipe;
    private $_libelleCompetition;

	// GETTER
	public function getId() {
		return $this->_id;
	}

	public function getLibelle() {
		return $this->_libelle;
	}

	public function getCompetition() {
		return $this->_competition;
	}

	public function getEquipe() {
		return $this->_equipe;
	}

	public function getLibelleCompetition() {
		return $this->_libelleCompetition;
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

	public function setCompetition($competition) {
		if (is_string($competition)) {
			$this->_competition = $competition;
		}
	}

	public function setEquipe($equipe) {
		$this->_equipe = $equipe;
	}

	public function setLibelleCompetition($libelleCompetition) {
		$this->_libelleCompetition = $libelleCompetition;
	}

	public function __construct(array $donnees) {
		$this->hydrate($donnees);
	}

	// HYDRATATION
	// Un tableau de donn�es doit �tre pass� � la fonction (d'o� le pr�fixe � array �).
	public function hydrate(array $donnees) {
		foreach ($donnees as $key => $value) {
			// On r�cup�re le nom du setter correspondant � l'attribut.
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