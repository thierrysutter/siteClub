<?php
class ManagerReglement
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
	return $this->_db->query('SELECT COUNT(*) FROM reglement')->fetchColumn();
  }

  public function supprimerReglement(BoReglement $reglement)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM reglement WHERE id = '.$reglement->getId());
  }

  public function get($titre)
  {
    // Si le param�tre est un string, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($titre)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Palmares.
      $q = $this->_db->query("SELECT id, titre, texte FROM reglement WHERE titre = '".$titre."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoReglement($donnees);
    } else {
      return null;
    }
  }

  public function getList()
  {
    // Retourne la liste des sponsors.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$reglements = array();

    $q = $this->_db->query("SELECT id, titre, texte FROM reglement ORDER BY id asc, titre asc");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $reglements[] = new BoReglement($donnees);
    }

    return $reglements;
  }

  public function ajouterReglement($titre, $texte, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO reglement (TITRE, TEXTE, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".$titre."', '".$texte."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierReglement($id, $titre, $texte, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE reglement ";
  	$sql .= "SET TITRE='".$titre."', ";
  	$sql .= "SET TEXTE='".$texte."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }
}
?>