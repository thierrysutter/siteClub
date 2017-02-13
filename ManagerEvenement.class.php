<?php
class ManagerEvenement
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

  public function ajouterEvenement($nom, $url, $vignette, $description, $message, $login)
  {
	//echo "Ajout d'un nouveau sponsor<br>";
    // Pr�paration de la requ�te d'insertion.
    $q = $this->_db->query("INSERT INTO evenement (ID, TITRE, TEXTE, PHOTO, LIEN, DEBUT, FIN, LIEU, STATUT, DOCUMENT, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$nom."','".$url."','".$vignette."','".$description."','".$message."','".strtoupper($login)."',now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Ex�cution de la requ�te.
	$q->execute();*/

	// Hydratation du sponsor pass� en param�tre avec assignation de son identifiant et des d�g�ts initiaux (= 0).
    /*$sponsor->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM evenement')->fetchColumn();
  }

  public function supprimerEvenement(Evenement $evenement)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM evenement WHERE id = '.$evenement->getId());
  }

  /*public function exists($login)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un login.
	if (is_string($login)) // On veut voir si tel sponsor ayant pour login $login existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM sponsor WHERE login = '".$login."'")->fetchColumn();
    }
    return false;
  }*/

  public function exists($titre)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un nom.
	if (is_string($titre)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM evenement WHERE titre = '".$titre."'")->fetchColumn();
    }
    return false;
  }

  public function get($titre)
  {
    // Si le param�tre est un string, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($titre)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, titre, texte, photo, lien, debut, fin, lieu, statut, document FROM evenement WHERE titre = '".$titre."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoEvenement($donnees);
    } else {
      return null;
    }
  }

  public function getList()
  {
    // Retourne la liste des sponsors.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$evenements = array();

    $q = $this->_db->query("SELECT id, titre, texte, photo, lien, debut, fin, lieu, statut, document FROM evenement where statut = 1 ORDER BY debut asc");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $evenements[] = new BoEvenement($donnees);
    }

    return $evenements;
  }
}
?>