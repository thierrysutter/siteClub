<?php
class ManagerParcours {
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
  	 * @return multitype:BoParcours
  	 */
  	public function trouverParcoursParId($id) {

	  	$parcours = array();
	  	$sql = "SELECT id, club FROM parcours WHERE membre=".$id." ";

	  	$q = $this->_db->query($sql);

	  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	  		$parcours[] = new BoParcours($donnees);
	  	}

	  	return $parcours;
  	}

  public function ajouterParcours($membre, $club, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO parcours (MEMBRE, CLUB, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES (".$membre.", '".strtoupper($club)."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierParcours($id, $membre, $club, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "UPDATE parcours ";
  	$sql .= "SET MEMBRE=".strtoupper($membre).", ";
  	$sql .= "CLUB='".strtoupper($club)."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerParcours(int $idParcours) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM parcours WHERE id = '.$idParcours);
  }
}
?>