<?php
class ManagerEntrainement
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($id, $libelle, $anneeDebut, $anneeFin, $login)
  {
	//echo "Ajout d'un nouveau article<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO categorie (ID, LIBELLE, ANNEE_DEBUT, ANNEE_FIN, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".$libelle."','".$anneeDebut."','".$anneeFin."','".strtoupper($login)."',now())");
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
	return $this->_db->query('SELECT COUNT(*) FROM entrainement')->fetchColumn();
  }

  public function delete(Entrainement $entrainement)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM entrainement WHERE id = '.$entrainement->getId());
  }

  public function exists($jour)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un nom.
	if (is_string($jour)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM entrainement WHERE jour = '".$jour."'")->fetchColumn();
    }
    return false;
  }

  public function get($jour)
  {
    // Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($jour)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, jour, heure_debut as heureDebut, heure_fin as heureFin, lieu FROM entrainement WHERE jour = '".$jour."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return BoEntrainement($donnees);
    } else {
      return null;
    }
  }

  public function trouverEntrainementParCategorie($categorie)
  {
  	// Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
  	// Sinon on renvoie null
  	$entrainements = array();
  	if ($categorie > 0) {
  		// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.

  		$q = $this->_db->query("SELECT id, jour, heure_debut as heureDebut, heure_fin as heureFin, lieu FROM entrainement WHERE categorie = '".$categorie."'");
	  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
	    {
	      $entrainements[] = new BoEntrainement($donnees);
	    }
	    return $entrainements;

  	} else {
  		return null;
  	}
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Sponsor.

	$entrainements = array();

    $q = $this->_db->query("SELECT id, jour, heure_debut as heureDebut, heure_fin as heureFin, lieu FROM entrainement");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $entrainements[] = new BoEntrainement($donnees);
    }

    return $entrainements;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }

  public function ajouterEntrainement($categorie, $jour, $heureDebut, $heureFin, $lieu, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO entrainement (CATEGORIE, JOUR, HEURE_DEBUT, HEURE_FIN, LIEU, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES (".$categorie.", ".$jour.", ".$heureDebut.", ".$heureFin.", ".$lieu.", '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function modifierEntrainement($id, $categorie, $jour, $heureDebut, $heureFin, $lieu, $login) {
  	// Préparation de la requête d'insertion.
  	$sql = "UPDATE entrainement ";
  	$sql .= "SET CATEGORIE=".$categorie.", ";
  	$sql .= "JOUR='".$jour."', ";
  	$sql .= "HEURE_DEBUT='".$heureDebut."', ";
  	$sql .= "HEURE_FIN='".$heureFin."', ";
  	$sql .= "LIEU='".$lieu."', ";
  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
  	$sql .= "DERNIERE_MAJ=now() ";
  	$sql .= "WHERE id=".$id." ";

  	$q = $this->_db->query($sql);
  }

  public function supprimerEntrainement(int $idEntrainement) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM entrainement WHERE id = '.$idEntrainement);
  }
}
?>