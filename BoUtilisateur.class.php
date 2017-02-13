<?php
class BoUtilisateur {
	// ATTRIBUTS PRIVES
	private $_login;
	private $_actif;
	private $_nbEchec;
	private $_pwdUsageUnique;
	private $_dateExpiration;
	private $_email;
	
	private $_nom;
	private $_prenom;
	private $_sexe;
	private $_dateNaissance;
	private $_adresse;
	private $_codePostal;
	private $_ville;
	private $_pays;
	private $_telFixe;
	private $_telPortable;
	private $_photo;
	private $_superAdmin;	
	private $_categorie;
	
	private $_dateDerniereConnexion;
	
	//SETTER
	public function setLogin($login) {
		if (is_string($login)) {
			$this->_login = $login;
		}
	}
	
	public function setActif($actif) {
		$actif = (int) $actif;
		$this->_actif = $actif;
	}
	
	public function setNbEchec($nbEchec) {
		$nbEchec = (int) $nbEchec;
		$this->_nbEchec = $nbEchec;
	}
	
	public function setPwdUsageUnique($pwdUsageUnique) {
		$pwdUsageUnique = (int) $pwdUsageUnique;
		$this->_pwdUsageUnique = $pwdUsageUnique;
	}
	
	public function setDateExpiration($dateExpiration) {
		$this->_dateExpiration = $dateExpiration;
	}
	
	public function setEmail($email) {
		if (is_string($email)) {
			$this->_email = $email;
		}
	}
	
	public function setNom($nom) {
		if (is_string($nom)) {
			$this->_nom = $nom;
		}
	}
	
	public function setPrenom($prenom) {
		if (is_string($prenom)) {
			$this->_prenom = $prenom;
		}
	}
	
	public function setSexe($sexe) {
		if (is_string($sexe)) {
			$this->_sexe = $sexe;
		}
	}
	
	public function setDateNaissance($dateNaissance) {
		$this->_dateNaissance = $dateNaissance;
	}
	
	public function setAdresse($adresse) {
		if (is_string($adresse)) {
			$this->_adresse = $adresse;
		}
	}
	
	public function setCodePostal($codePostal) {
		if (is_string($codePostal)) {
			$this->_codePostal = $codePostal;
		}
	}
	
	public function setVille($ville) {
		if (is_string($ville)) {
			$this->_ville = $ville;
		}
	}
	
	public function setPays($pays) {
		if (is_string($pays)) {
			$this->_pays = $pays;
		}
	}
	
	public function setTelFixe($telFixe) {
		if (is_string($telFixe)) {
			$this->_telFixe = $telFixe;
		}
	}
	
	public function setTelPortable($telPortable) {
		if (is_string($telPortable)) {
			$this->_telPortable = $telPortable;
		}
	}
	
	public function setPhoto($photo) {
		if (is_string($photo)) {
			$this->_photo = $photo;
		}
	}
	
	public function setSuperAdmin($superAdmin) {
		$this->_superAdmin = $superAdmin;
	}
	
	public function setCategorie($categorie) {
		$this->_categorie = $categorie;
	}
	
	public function setDateDerniereConnexion($dateDerniereConnexion) {
		$this->_dateDerniereConnexion = $dateDerniereConnexion;
	}
	
	// GETTER
	public function getLogin() {
		return $this->_login;
	}
	
	public function getActif() {
		return $this->_actif;
	}
	
	public function getNbEchec() {
		return $this->_nbEchec;
	}
	
	public function getPwdUsageUnique() {
		return $this->_pwdUsageUnique;
	}
	
	public function getDateExpiration() {
		return $this->_dateExpiration;
	}
	
	public function getEmail() {
		return $this->_email;
	}
	
	public function getNom() {
		return $this->_nom;
	}
	
	public function getPrenom() {
		return $this->_prenom;
	}
	
	public function getSexe() {
		return $this->_sexe;
	}
	
	public function getDateNaissance() {
		return $this->_dateNaissance;
	}
	
	public function getAdresse() {
		return $this->_adresse;
	}
	
	public function getCodePostal() {
		return $this->_codePostal;
	}
	
	public function getVille() {
		return $this->_ville;
	}
	
	public function getPays() {
		return $this->_pays;
	}
	
	public function getTelFixe() {
		return $this->_telFixe;
	}
	
	public function getTelPortable() {
		return $this->_telPortable;
	}
	
	public function getPhoto() {
		return $this->_photo;
	}
	
	public function getSuperAdmin() {
		return $this->_superAdmin;
	}
	
	public function getCategorie() {
		return $this->_categorie;
	}
	
	public function getDateDerniereConnexion() {
		return $this->_dateDerniereConnexion;
	}
	
	public function __construct(array $donnees) {
		$this->hydrate($donnees);
	}
  
	// HYDRATATION
	// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
	public function hydrate(array $donnees) {
		//echo "Entrée dans l'hydratation de la classe Utilisateur<br>";
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
	
	public function isVerrouille() {
		return (bool) ($this->_nbEchec > 3);
	}
	
	public function isExpire() {
		$today = date("Y-m-d");
		$today_dt = new DateTime($today);
		$expire_dt = new DateTime($this->_dateExpiration);
		return (bool) ($expire_dt < $today_dt);
	}
	
	public function isPwdUsageUnique() {
		return (bool) ($this->getPwdUsageUnique() == 1);
	}
	
	public function getStatut() {
		if ($this->getActif() == 0) {
			return "Supprimé";
		} else if ($this->isVerrouille()) {
			return "Verrouillé";
		} else if ($this->isExpire()) {
			return "Expiré";
		} else {
			return "OK";
		}
	}
	
	public function isSuperAdmin() {
		return (bool) ($this->getSuperAdmin() == 1);
	}
}
?>