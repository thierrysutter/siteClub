<?php
class ManagerDivision {
	/**
	 *
	 * @var PDO
	 */
  	private $_db;

	/**
   	 *
   	 * @param PDO $db
   	 */
  	public function __construct($db) {
  		$this->setDb($db);
  	}

  	/**
	 *
   	 * @param PDO $db
   	 */
  	public function setDb(PDO $db) {
	    $this->_db = $db;
  	}

	/**
   	 *
   	 * @param int $id
   	 * @param string $libelle
	 * @param int $categorie
   	 * @param string $login
   	 */
  	public function add($id, $libelle, $categorie, $login) {
		//echo "Ajout d'un nouveau article<br>";
	    // Pr�paration de la requ�te d'insertion.
	    $q = $this->_db->query("INSERT INTO division (ID, LIBELLE, CATEGORIE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".$libelle."','".$categorie."','".$login."',now())");
	    // Assignation des valeurs pour le nom du personnage.
	    /*$q->bindValue(':login', $login);
		$q->bindValue(':password', $password);
		$q->bindValue(':email', $email);
	    // Ex�cution de la requ�te.
		$q->execute();*/

		// Hydratation du article pass� en param�tre avec assignation de son identifiant et des d�g�ts initiaux (= 0).
	    /*$article->hydrate(array(
	      'id' => $this->_db->lastInsertId(),
	      'degats' => 0,
	    ));*/
	}

  	/**
   	 *
   	 * @param string $libelle
   	 * @param int $categorie
   	 * @param string $login
   	 */
  	public function ajouterDivision($libelle, $categorie, $login) {
	  	// Pr�paration de la requ�te d'insertion.
	  	$sql = "INSERT INTO division (LIBELLE, CATEGORIE, AUTEUR_MAJ, DERNIERE_MAJ) ";
	  	$sql .= "VALUES ('".strtoupper($libelle)."', ".$categorie.", '".strtoupper($login)."', now())";

	  	$q = $this->_db->query($sql);
  	}

  	/**
   	 *
   	 * @param int $id
   	 * @param string $libelle
   	 * @param int $categorie
   	 * @param string $login
   	 */
  	public function modifierDivision($id, $libelle, $categorie, $login) {
	  	// Pr�paration de la requ�te d'insertion.
	  	$sql = "UPDATE division ";
	  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
	  	$sql .= "CATEGORIE='".$categorie."', ";
	  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
	  	$sql .= "DERNIERE_MAJ=now() ";
	  	$sql .= "WHERE id=".$id." ";

	  	$q = $this->_db->query($sql);
  	}

  	/**
   	 *
   	 * @return string
   	 */
  	public function count() {
	    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
		return $this->_db->query('SELECT COUNT(*) FROM division')->fetchColumn();
  	}

  	/**
   	 *
   	 * @param int $idDivision
   	 */
  	public function supprimerDivision($idDivision) {
	    // Ex�cute une requ�te de type DELETE.
		$this->_db->exec('DELETE FROM division WHERE id = '.$idDivision);
  	}

  	/**
   	 *
   	 * @param int $id
   	 * @return BoDivision|NULL
   	 */
  	public function trouverDivisionParId($id) {
	  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	  	// Sinon on renvoie null
	  	if ($id > 0) {
	  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
	  		$q = $this->_db->query("SELECT division.id, division.libelle, division.categorie, categorie.libelle as libelleCategorie FROM division inner join categorie on categorie.id=division.categorie WHERE division.id = '".$id."'");
	  		$donnees = $q->fetch(PDO::FETCH_ASSOC);
	  		$division = new BoDivision($donnees);
	  		return $division;
	  	} else {
	  		return null;
	  	}
  	}

  	/**
   	 *
   	 * @param int $categorie
   	 * @return multitype:BoDivision |NULL
   	 */
  	public function trouverDivisionParCategorie($categorie) {
	  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	  	// Sinon on renvoie null
	  	if ($categorie > 0) {
	  		$divisions = array();
	  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
	  		$sql = "SELECT division.id, division.libelle, division.categorie, categorie.libelle as libelleCategorie FROM division inner join categorie on categorie.id=division.categorie WHERE categorie.id = ".$categorie." ";
	  		$q = $this->_db->query($sql);
	  		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	  			$divisions[] = new BoDivision($donnees);
	    	}
	   		return $divisions;
	  	} else {
	  		return null;
	  	}
  	}

  	/**
   	 *
   	 * @return multitype:BoDivision
   	 */
  	public function getList() {
	    // Retourne la liste des menus.
	    // Le r�sultat sera un tableau d'instances de Sponsor.

		$divisions = array();
		$sql = "SELECT division.id, division.libelle, division.categorie, categorie.libelle as libelleCategorie FROM division inner join categorie on categorie.id=division.categorie ";
	    $q = $this->_db->query($sql);

	    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	    	$divisions[] = new BoDivision($donnees);
	    }

	    return $divisions;
  	}
}
?>