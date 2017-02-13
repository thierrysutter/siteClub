<?php
class ManagerFonction
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($id, $libelle, $login)
  {
	//echo "Ajout d'un nouveau article<br>";
    // Pr�paration de la requ�te d'insertion.
    $q = $this->_db->query("INSERT INTO fonction (ID, LIBELLE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".strtoupper($libelle)."','".strtoupper($login)."',now())");
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

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM fonction')->fetchColumn();
  }

  public function delete(Fonction $fonction)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM fonction WHERE id = '.$fonction->getId());
  }

  public function exists($libelle)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un nom.
	if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM fonction WHERE libelle = '".strtoupper($libelle)."'")->fetchColumn();
    }
    return false;
  }

  public function get($libelle)
  {
    // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($libelle)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, libelle FROM fonction WHERE libelle = '".strtoupper($libelle)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoFonction($donnees);
    } else {
      return null;
    }
  }

  public function trouverFonctionParId($id)
  {
  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
  	// Sinon on renvoie null
  	if ($id > 0) {
  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
  		$q = $this->_db->query("SELECT id, libelle FROM fonction WHERE id = '".$id."'");
  		$donnees = $q->fetch(PDO::FETCH_ASSOC);

  		$fonction = new BoFonction($donnees);

		return $fonction;
  	} else {
  		return null;
  	}
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$fonctions = array();

    $q = $this->_db->query("SELECT id, libelle FROM fonction ");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $fonctions[] = new BoFonction($donnees);
    }

    return $fonctions;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function ajouterFonction($libelle, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO fonction (LIBELLE, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".strtoupper($libelle)."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierFonction($id, $libelle, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE fonction ";
  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerFonction(int $idFonction) {
  	// Ex�cute une requ�te de type DELETE.
  	$this->_db->exec('DELETE FROM fonction WHERE id = '.$idFonction);
  }
}
?>