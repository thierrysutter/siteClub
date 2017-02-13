<?php
class ManagerTypeCompetition
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($id, $libelle, $anneeDebut, $anneeFin, $login)
  {
	//echo "Ajout d'un nouveau article<br>";
    // Pr�paration de la requ�te d'insertion.
    $q = $this->_db->query("INSERT INTO categorie (ID, LIBELLE, ANNEE_DEBUT, ANNEE_FIN, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".strtoupper($libelle)."','".$anneeDebut."','".$anneeFin."','".strtoupper($login)."',now())");
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
  public function ajouterTypeCompetition($libelle, $categorie, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO type_competition (LIBELLE, CATEGORIE, AUTEUR_MAJ, DERNIERE_MAJ) ";
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
  public function modifierTypeCompetition($id, $libelle, $categorie, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE type_competition ";
  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
  	$sql .= "CATEGORIE='".$categorie."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM type_competition')->fetchColumn();
  }

  	/**
   	 *
   	 * @param int $idTypeCompetition
   	 */
  	public function supprimerTypeCompetition($idTypeCompetition) {
	    // Ex�cute une requ�te de type DELETE.
		$this->_db->exec('DELETE FROM type_competition WHERE id = '.$idTypeCompetition);
  	}

  public function delete($idTypeCompetition)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM type_competition WHERE id = '.$idTypeCompetition);
  }

  public function exists($libelle)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un nom.
	if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM type_competition WHERE type_competition.libelle = '".strtoupper($libelle)."'")->fetchColumn();
    }
    return false;
  }

  public function get($libelle)
  {
    // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($libelle)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT type_competition.id, type_competition.libelle, type_competition.categorie, categorie.libelle as libelleCategorie FROM type_competition inner join categorie on type_competition.categorie=categorie.id WHERE type_competition.libelle = '".strtoupper($libelle)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoTypeCompetition($donnees);
    } else {
      return null;
    }
  }

  public function trouverTypeCompetitionParId($id)
  {
  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
  	// Sinon on renvoie null
  	if ($id > 0) {
  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
  		$q = $this->_db->query("SELECT type_competition.id, type_competition.libelle, type_competition.categorie, categorie.libelle as libelleCategorie FROM type_competition inner join categorie on type_competition.categorie=categorie.id WHERE type_competition.id = '".$id."'");
  		$donnees = $q->fetch(PDO::FETCH_ASSOC);

  		$typeCompetition = new BoTypeCompetition($donnees);

		return $typeCompetition;
  	} else {
  		return null;
  	}
  }

  public function trouverTypeCompetitionParCategorie($categorie)
  {
  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
  	// Sinon on renvoie null
  	if ($categorie > 0) {
  		$typeCompetitions = array();
  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
  		$q = $this->_db->query("SELECT type_competition.id, type_competition.libelle, type_competition.categorie, categorie.libelle as libelleCategorie FROM type_competition inner join categorie on type_competition.categorie=categorie.id WHERE type_competition.categorie = '".$categorie."'");

  		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
	    {
	      $typeCompetitions[] = new BoTypeCompetition($donnees);
	    }

	    return $typeCompetitions;
  	} else {
  		return null;
  	}
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$typeCompetitions = array();

    $q = $this->_db->query("SELECT type_competition.id, type_competition.libelle, type_competition.categorie, categorie.libelle as libelleCategorie FROM type_competition inner join categorie on type_competition.categorie=categorie.id ");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $typeCompetitions[] = new BoTypeCompetition($donnees);
    }

    return $typeCompetitions;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>