<?php
class ManagerPalmares
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

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM palmares')->fetchColumn();
  }

  public function supprimerPalmares(BoPalmares $palmares)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM palmares WHERE id = '.$palmares->getId());
  }

  public function get($annee)
  {
    // Si le param�tre est un string, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($annee)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Palmares.
      $q = $this->_db->query("SELECT id, annee, texte FROM palmares WHERE annee = '".$annee."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoPalmares($donnees);
    } else {
      return null;
    }
  }

  public function getList()
  {
    // Retourne la liste des sponsors.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$palmares = array();

    $q = $this->_db->query("SELECT id, annee, texte FROM palmares ORDER BY annee desc");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $palmares[] = new BoPalmares($donnees);
    }

    return $palmares;
  }


  public function ajouterPalmares($annee, $texte, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO palmares (ANNEE, TEXTE, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".$annee."', '".$texte."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierPalmares($id, $annee, $texte, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE palmares ";
  	$sql .= "SET ANNEE='".$annee."', ";
  	$sql .= "TEXTE='".$texte."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }
}
?>