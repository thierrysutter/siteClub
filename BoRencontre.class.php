<?php
class BoRencontre {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_competition;
	private $_libelleCompetition;
	private $_categorie;
	private $_libelleCategorie;
	private $_jour;
	private $_equipe;
    private $_libelleEquipe;
	private $_equipeDom;
	private $_equipeExt;
	private $_scoreDom;
	private $_scoreExt;
	private $_statut;
	
	private $_heureRDV;
	private $_lieuRDV;
	private $_commentaireRDV;
	private $_heureMatch;

	private $_compteRendu;

	// GETTER
	public function getId() {
		return $this->_id;
	}

	public function getCompetition() {
		return $this->_competition;
	}

	public function getLibelleCompetition() {
		return $this->_libelleCompetition;
	}

	public function getCategorie() {
		return $this->_categorie;
	}

	public function getLibelleCategorie() {
		return $this->_libelleCategorie;
	}

	public function getJour() {
		return $this->_jour;
	}

	public function getEquipe() {
		return $this->_equipe;
	}

    public function getLibelleEquipe() {
        return $this->_libelleEquipe;
    }

	public function getEquipeDom() {
		return $this->_equipeDom;
	}

	public function getEquipeExt() {
		return $this->_equipeExt;
	}

	public function getScoreDom() {
		return $this->_scoreDom;
	}

	public function getScoreExt() {
		return $this->_scoreExt;
	}

	public function getStatut() {
		return $this->_statut;
	}

	public function getCompteRendu() {
		return $this->_compteRendu;
	}

	public function getHeureRDV() {
		return $this->_heureRDV;
	}

	public function getLieuRDV() {
		return $this->_lieuRDV;
	}

	public function getCommentaireRDV() {
		return $this->_commentaireRDV;
	}

	public function getHeureMatch() {
		return $this->_heureMatch;
	}

	//SETTER
	public function setId($id) {
		$this->_id = $id;
	}

	public function setCompetition($competition) {
		$this->_competition = $competition;
	}

	public function setLibelleCompetition($libelleCompetition) {
		$this->_libelleCompetition = $libelleCompetition;
	}

	public function setCategorie($categorie) {
		$this->_categorie = $categorie;
	}

	public function setLibelleCategorie($libelleCategorie) {
		$this->_libelleCategorie = $libelleCategorie;
	}

	public function setJour($jour) {
		$this->_jour = $jour;
	}

	public function setEquipe($equipe) {
		$this->_equipe = $equipe;
	}

    public function setLibelleEquipe($libelleEquipe) {
        $this->_libelleEquipe = $libelleEquipe;
    }

	public function setEquipeDom($equipeDom) {
		if (is_string($equipeDom)) {
			$this->_equipeDom = $equipeDom;
		}
	}

	public function setEquipeExt($equipeExt) {
		if (is_string($equipeExt)) {
			$this->_equipeExt = $equipeExt;
		}
	}

	public function setScoreDom($scoreDom) {
		$this->_scoreDom = $scoreDom;
	}

	public function setScoreExt($scoreExt) {
		$this->_scoreExt = $scoreExt;
	}

	public function setStatut($statut) {
		$this->_statut = $statut;
	}

	public function setCompteRendu($compteRendu) {
		$this->_compteRendu = $compteRendu;
	}

	public function setHeureRDV($heureRDV) {
		$this->_heureRDV = $heureRDV;
	}

	public function setLieuRDV($lieuRDV) {
		$this->_lieuRDV = $lieuRDV;
	}

	public function setCommentaireRDV($commentaireRDV) {
		$this->_commentaireRDV = $commentaireRDV;
	}

	public function setHeureMatch($heureMatch) {
		$this->_heureMatch = $heureMatch;
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