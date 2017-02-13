<?php
class ManagerContenu
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

  public function getContenu($zone) {
    // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($zone)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT texte FROM contenu WHERE zone = '".strtoupper($zone)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return $donnees;
    } else {
      return null;
    }
  }

  public function ajouterContenu($zone, $contenu, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO poste (ZONE, TEXTE, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".strtoupper($zone)."', '".strtoupper($contenu)."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierContenu($zone, $contenu, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE contenu ";
  	$sql .= "SET TEXTE='".$contenu."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE zone='".strtoupper($zone)."' ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerContenu(string $zone) {
  	// Ex�cute une requ�te de type DELETE.
  	$this->_db->exec('DELETE FROM contenu WHERE zone = '.strtoupper($zone));
  }
}
?>