<?php
class BoEvenement {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_titre;
	private $_texte;
	private $_photo;
	private $_lien;
	private $_debut;
	private $_fin;
	private $_lieu;
	private $_statut;
	
	//SETTER
	public function setId($id) {
		$this->_id = $id;
	}
	
	public function setTitre($titre) {
		if (is_string($titre)) {
			$this->_titre = $titre;
		}
	}
	
	public function setTexte($texte) {
		if (is_string($texte)) {
			$this->_texte = $texte;
		}
	}
	
	public function setPhoto($photo) {
		if (is_string($photo)) {
			$this->_photo = $photo;
		}
	}
	
	public function setLien($lien) {
		if (is_string($lien)) {
			$this->_lien = $lien;
		}
	}
	
	public function setDebut($debut) {
		$this->_debut = $debut;
	}
	
	public function setFin($fin) {
		$this->_fin = $fin;
	}
	
	public function setLieu($lieu) {
		if (is_string($lieu)) {
			$this->_lieu = $lieu;
		}
	}
	
	public function setStatut($statut) {
		$this->_statut = $statut;
	}
	
	public function setDocument($document) {
		if (is_string($document)) {
			$this->_document = $document;
		}
	}
	
	// GETTER
	public function getId() {
		return $this->_id;
	}
	
	public function getTitre() {
		return $this->_titre;
	}
	
	public function getTexte() {
		return $this->_texte;
	}
	
	public function getPhoto() {
		return $this->_photo;
	}
	
	public function getLien() {
		return $this->_lien;
	}
	
	public function getDebut() {
		return $this->_debut;
	}
	
	public function getFin() {
		return $this->_fin;
	}
	
	public function getLieu() {
		return $this->_lieu;
	}
	
	public function getStatut() {
		return $this->_statut;
	}
	
	public function getDocument() {
		return $this->_document;
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