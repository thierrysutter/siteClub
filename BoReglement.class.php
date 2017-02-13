<?php
class BoReglement {
	// ATTRIBUTS PRIVES
	private $_id;
	private $_titre;
	private $_texte;
		
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