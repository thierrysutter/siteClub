<?php
class ManagerSponsor
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

  public function ajouterSponsor($nom, $url, $adresse, $codePostal, $ville, $tel, $fax, $email, $vignette, $login)
  {
	//echo "Ajout d'un nouveau sponsor<br>";
    // Préparation de la requête d'insertion.
    $sql = "INSERT INTO sponsor (NOM, URL, ADRESSE, CP, VILLE, TEL, FAX, EMAIL, VIGNETTE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$nom."', '".$url."', '".strtoupper($adresse)."', '".strtoupper($codePostal)."', '".strtoupper($ville)."', '".$tel."', '".$fax."', '".$email."', '".$vignette."', '".strtoupper($login)."', now())";
    echo $sql;
    $q = $this->_db->query($sql);
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM sponsor')->fetchColumn();
  }

  public function supprimerSponsor($idSponsor)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec("DELETE FROM sponsor WHERE id = ".$idSponsor);
  }

  /*public function exists($login)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un login.
	if (is_string($login)) // On veut voir si tel sponsor ayant pour login $login existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM sponsor WHERE login = '".$login."'")->fetchColumn();
    }
    return false;
  }*/

  public function exists($nom)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un nom.
	if (is_string($nom)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM sponsor WHERE nom = '".$nom."'")->fetchColumn();
    }
    return false;
  }

  public function get($nom)
  {
    // Si le paramètre est un string, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($nom)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, nom, url, vignette FROM sponsor WHERE nom = '".$nom."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoSponsor($donnees);
    } else {
      return null;
    }
  }

  public function trouverParId($id)
  {
  	// Si le paramètre est un string, on veut récupérer le sponsor avec son nom.
  	// Sinon on renvoie null

	// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.

	$sql = "SELECT id, nom, url, adresse, cp, ville, tel, fax, email, vignette FROM sponsor WHERE id = ".$id."";
	//echo $sql;
	$q = $this->_db->query($sql);
	$donnees = $q->fetch(PDO::FETCH_ASSOC);
	return new BoSponsor($donnees);
  }

  public function getList()
  {
    // Retourne la liste des sponsors.
    // Le résultat sera un tableau d'instances de Sponsor.

	$sponsors = array();

    $q = $this->_db->query("SELECT id, nom, url, vignette, adresse, cp, ville, tel, fax, email, description, message FROM sponsor where vignette is not null and vignette <> '' ORDER BY nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $sponsors[] = new BoSponsor($donnees);
    }

    return $sponsors;
  }

  public function majSponsor($id, $nom, $url, $adresse, $codePostal, $ville, $tel, $fax, $email, $photo, $ogin) {
  	// Exécute une requête de type DELETE.
  	$sql = "UPDATE sponsor set nom='".$nom."', url='".$url."', adresse='".strtoupper($adresse)."', cp='".strtoupper($codePostal)."', ville='".strtoupper($ville)."', tel='".$tel."', fax='".$fax."', email='".$email."', vignette='".($photo != '' ? $photo : 'NULL')."', auteur_maj='".strtoupper($login)."' WHERE id = ".$id;
  	echo $sql;
  	$this->_db->query($sql);
  }
}
?>