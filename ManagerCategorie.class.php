<?php
class ManagerCategorie
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

  public function count()
  {
    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
	return $this->_db->query('SELECT COUNT(*) FROM categorie')->fetchColumn();
  }

  public function delete(Categorie $categorie)
  {
    // Ex�cute une requ�te de type DELETE.
	$this->_db->exec('DELETE FROM categorie WHERE id = '.$categorie->getId());
  }

  public function exists($libelle)
  {
	// Si le param�tre est un string, c'est qu'on a fourni un nom.
	if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM categorie WHERE libelle = '".strtoupper($libelle)."'")->fetchColumn();
    }
    return false;
  }

  public function get($libelle)
  {
    // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($libelle)) {
      // Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, libelle, annee_debut as anneeDebut, annee_fin as anneeFin FROM categorie WHERE libelle = '".strtoupper($libelle)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoCategorie($donnees);
    } else {
      return null;
    }
  }

  public function trouverCategorieParId($id)
  {
  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
  	// Sinon on renvoie null
  	if ($id > 0) {
  		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
  		$q = $this->_db->query("SELECT id, libelle, annee_debut as anneeDebut, annee_fin as anneeFin FROM categorie WHERE id = '".$id."'");
  		$donnees = $q->fetch(PDO::FETCH_ASSOC);

  		$categorie = new BoCategorie($donnees);

		$managerEntrainement = new ManagerEntrainement($this->_db);
  		$entrainements = $managerEntrainement->trouverEntrainementParCategorie($id);

  		if ($entrainements != null && !empty($entrainements))
  			$categorie->setEntrainements($entrainements);

  		return $categorie;
  	} else {
  		return null;
  	}
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le r�sultat sera un tableau d'instances de Sponsor.

	$categories = array();

    $q = $this->_db->query("SELECT id, libelle, annee_debut as anneeDebut, annee_fin as anneeFin FROM categorie ");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $categories[] = new BoCategorie($donnees);
    }

    return $categories;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function ajouterCategorie($libelle, $anneeDebut, $anneeFin, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "INSERT INTO categorie (LIBELLE, ANNEE_DEBUT, ANNEE_FIN, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".strtoupper($libelle)."', '".$anneeDebut."', '".$anneeFin."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierCategorie($id, $libelle, $anneeDebut, $anneeFin, $login) {
  	// Pr�paration de la requ�te d'insertion.
  	$sql = "UPDATE categorie ";
  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
  	$sql .= "ANNEE_DEBUT='".$anneeDebut."', ";
  	$sql .= "ANNEE_FIN='".$anneeFin."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerCategorie(int $idCategorie) {
  	// Ex�cute une requ�te de type DELETE.
  	$this->_db->exec('DELETE FROM categorie WHERE id = '.$idCategorie);
  }
}
?>