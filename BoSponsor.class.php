<?php
class BoSponsor {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_nom;
	private $_url;
	private $_vignette;
	
	private $_adresse;
	private $_cp;
	private $_ville;
	private $_tel;
	private $_fax;
	private $_email;
	private $_description;
	private $_message;
	
	//SETTER
	public function setId($id) {
		$this->_id = $id;
	}
	
	public function setNom($nom) {
		if (is_string($nom)) {
			$this->_nom = $nom;
		}
	}
	
	public function setURL($url) {
		if (is_string($url)) {
			$this->_url = $url;
		}
	}
	
	public function setVignette($vignette) {
		if (is_string($vignette)) {
			$this->_vignette = $vignette;
		}
	}
	
	public function setAdresse($adresse) {
		if (is_string($adresse)) {
			$this->_adresse = $adresse;
		}
	}
	
	public function setCP($cp) {
		if (is_string($cp)) {
			$this->_cp = $cp;
		}
	}
	
	public function setVille($ville) {
		if (is_string($ville)) {
			$this->_ville = $ville;
		}
	}
	
	public function setTel($tel) {
		if (is_string($tel)) {
			$this->_tel = $tel;
		}
	}
	
	public function setFax($fax) {
		if (is_string($fax)) {
			$this->_fax = $fax;
		}
	}
	
	public function setEmail($email) {
		if (is_string($email)) {
			$this->_email = $email;
		}
	}
	
	public function setDescription($description) {
		if (is_string($description)) {
			$this->_description = $description;
		}
	}
	
	public function setMessage($message) {
		if (is_string($message)) {
			$this->_message = $message;
		}
	}
	
	// GETTER
	public function getId() {
		return $this->_id;
	}
	
	public function getNom() {
		return $this->_nom;
	}
	
	public function getURL() {
		return $this->_url;
	}
	
	public function getVignette() {
		return $this->_vignette;
	}
	
	public function getAdresse() {
		return $this->_adresse;
	}
	
	public function getCP() {
		return $this->_cp;
	}
	
	public function getVille() {
		return $this->_ville;
	}
	
	public function getTel() {
		return $this->_tel;
	}
	
	public function getFax() {
		return $this->_fax;
	}
	
	public function getEmail() {
		return $this->_email;
	}
	
	public function getDescription() {
		return $this->_description;
	}
	
	public function getMessage() {
		return $this->_message;
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