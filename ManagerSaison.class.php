<?php
class ManagerSaison
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($id, $libelle, $etat, $login)
  {
	//echo "Ajout d'un nouveau article<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO saison (ID, LIBELLE, ETAT, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".strtoupper($libelle)."','".$etat."','".strtoupper($login)."',now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du article passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$article->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM saison')->fetchColumn();
  }

  public function delete(BoSaison $saison)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM saison WHERE id = '.$saison->getId());
  }

  public function exists($libelle)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un nom.
	if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM saison WHERE libelle = '".strtoupper($libelle)."'")->fetchColumn();
    }
    return false;
  }

  public function get($libelle)
  {
    // Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($libelle)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, libelle, etat FROM saison WHERE libelle = '".strtoupper($libelle)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoSaison($donnees);
    } else {
      return null;
    }
  }

  public function getList($actif)
  {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Sponsor.

	$saisons = array();

	$sql = "SELECT id, libelle, etat FROM saison ";
	if ($actif == null) {
		//$sql .= "WHERE actif=1 ";
	} else if ($actif) {
		$sql .= "WHERE etat=1 ";
	} else {
		$sql .= "WHERE etat=0 ";
	}

	$q = $this->_db->query($sql);

	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $saisons[] = new BoSaison($donnees);
    }

    return $saisons;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function ajouterSaison($libelle, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO saison (LIBELLE, ETAT, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".strtoupper($libelle)."', 0, '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierSaison($id, $libelle, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "UPDATE saison ";
  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerSaison(int $idSaison) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM saison WHERE id = '.$idSaison);
  }

  public function purgerSaison() {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM saison WHERE etat = 0');
  }

  public function activerSaison($id, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "UPDATE saison ";
  	$sql .= "SET ETAT=1, ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function desactiverSaison($id, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "UPDATE saison ";
  	$sql .= "SET ETAT=0, ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }
}
?>