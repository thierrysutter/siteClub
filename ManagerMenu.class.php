<?php
class ManagerMenu
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function ajouterMenu($libelle, $url, $icone, $ordre, $actif, $login)
  {
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO menu (LIBELLE, URL, ICONE, ORDRE, ACTIF, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".strtoupper($libelle)."','".$url."','".$icone."','".$ordre."','".$actif."','".strtoupper($login)."',now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du menu passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$menu->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function supprimerMenu(BoMenu $menu)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM menu WHERE id = '.$menu->getId());
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM menu')->fetchColumn();
  }


  public function exists($libelle)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un libelle.
	if (is_string($libelle)) // On veut voir si tel menu ayant pour libelle $libelle existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM menu WHERE libelle = '".strtoupper($libelle)."'")->fetchColumn();
    }
    return false;
  }

  public function get($libelle)
  {
    // Si le paramètre est un String, on veut récupérer le menu avec son nom.
	// Sinon on renvoie null
    if (is_string($libelle)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Menu.
      $q = $this->_db->query("SELECT id, libelle, url, icone FROM menu WHERE libelle = '".strtoupper($libelle)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoMenu($donnees);
    } else {
      return null;
    }
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Menu.
	$menu = array();

    $q = $this->_db->query("SELECT id, libelle, url, icone, ordre, actif FROM menu WHERE actif=1 ORDER BY ordre");

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $menu[] = new BoMenu($donnees);
    }

    return $menu;
  }

  public function activerMenu($idMenu, $login)
  {
    // Prépare une requête de type UPDATE.
    $q = $this->_db->query("UPDATE menu SET actif=1, auteur_maj = '".strtoupper($login)."', derniere_maj = now() WHERE id = '".$idMenu."'");
  }

  public function desactiverMenu($idMenu, $login)
  {
    // Prépare une requête de type UPDATE.
    $q = $this->_db->query("UPDATE menu SET actif=0, auteur_maj = '".strtoupper($login)."', derniere_maj = now() WHERE id = '".$idMenu."'");
  }

	/**
	*
	*
	*
	**/
	public function updateMenu($idMenu, $libelle, $url, $icone, $ordre, $login) {
		// Prépare une requête de type UPDATE.
		$q = $this->_db->query("UPDATE menu SET libelle = '".strtoupper($libelle)."', url = '".$url."', icone = '".$icone."', ordre = '".$ordre."', auteur_maj = '".strtoupper($login)."', derniere_maj = now() WHERE id = '".$idMenu."'");
	}

}
?>