<?php
class ManagerCompteRendu
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($rencontre, $texte, $login)
  {
    // Pr�paration de la requ�te d'insertion.
    $q = $this->_db->query("INSERT INTO compte_rendu (RENCONTRE, TEXTE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES (".$rencontre.",'".$texte."','".strtoupper($login)."',now())");
  }

  public function ajouterCompteRendu($rencontre, $texte, $login)
  {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO compte_rendu (RENCONTRE, TEXTE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES (".$rencontre.",'".$texte."','".strtoupper($login)."',now())";
  	$q = $this->_db->query($sql);
  }

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM compte_rendu')->fetchColumn();
  }

  public function delete(BoCompteRendu $compteRendu)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM compte_rendu WHERE rencontre = '.$compteRendu->getRencontre());
  }

  public function supprimerCompteRendu($rencontre)
  {
  	// Ex�cute une requ�te de type DELETE.
  	$this->_db->exec('DELETE FROM compte_rendu WHERE rencontre = '.$rencontre);
  }

  public function majCompteRendu($rencontre, $texte, $login) {
  	// Ex�cute une requ�te de type DELETE.
  	echo "coucou";
  	$this->_db->query("UPDATE compte_rendu set texte='".$texte."', auteur_maj='".strtoupper($login)."', derniere_maj=now() WHERE rencontre = ".$rencontre);
  }

  /*public function exists($titre)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un nom.
	if (is_string($titre)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM article WHERE titre = '".$titre."'")->fetchColumn();
    }
    return false;
  }*/

  public function get($rencontre)
  {
    // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
    $q = $this->_db->query("SELECT rencontre, texte, auteur_maj as auteur, derniere_maj as derniereMaj FROM compte_rendu WHERE rencontre = ".$rencontre."");
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new BoCompteRendu($donnees);

  }

  public function trouverParRencontre($rencontre)
  {
  	// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
  	$q = $this->_db->query("SELECT rencontre, texte, auteur_maj as auteur, derniere_maj as derniereMaj FROM compte_rendu WHERE rencontre = ".$rencontre."");
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
    	return new BoCompteRendu($donnees);
    }
    return null;
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$compteRendus = array();

    $q = $this->_db->query("SELECT rencontre, texte, auteur_maj as auteur, derniere_maj as derniereMaj FROM compte_rendu ");

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $compteRendus[] = new BoCompteRendu($donnees);
    }

    return $compteRendus;
  }

  public function getTrouverTous()
  {
  	// Retourne la liste des menus.
  	// Le r�sultat sera un tableau d'instances de Sponsor.

  	$compteRendus = array();

    $q = $this->_db->query("SELECT rencontre, texte, auteur_maj as auteur, derniere_maj as derniereMaj FROM compte_rendu ");

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $compteRendus[] = new BoCompteRendu($donnees);
    }

    return $compteRendus;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>