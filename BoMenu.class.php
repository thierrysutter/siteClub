<?php
class BoMenu {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_libelle;
	private $_url;
	private $_icone;
	private $_actif;
	private $_ordre;
	
	//SETTER
	public function setLibelle($libelle) {
		if (is_string($libelle)) {
			$this->_libelle = $libelle;
		}
	}
	
	public function setURL($url) {
		if (is_string($url)) {
			$this->_url = $url;
		}
	}
	
	public function setIcone($icone) {
		if (is_string($icone)) {
			$this->_icone = $icone;
		}
	}
	
	public function setActif($actif) {
		$this->_actif = $actif;
	}
	
	public function setOrdre($ordre) {
		$this->_ordre = $ordre;
	}
	
	// GETTER
	public function getId() {
		return $this->_id;
	}
	
	public function getLibelle() {
		return $this->_libelle;
	}
	
	public function getURL() {
		return $this->_url;
	}
	
	public function getIcone() {
		return $this->_icone;
	}
	
	public function isActif() {
		return (bool)($this->_actif == 1);
	}
	
	public function getOrdre() {
		return $this->_ordre;
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