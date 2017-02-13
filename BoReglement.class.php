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
	// Un tableau de donn�es doit �tre pass� � la fonction (d'o� le pr�fixe � array �).
	public function hydrate(array $donnees) {
		//echo "Entr�e dans l'hydratation de la classe Sponsor<br>";
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