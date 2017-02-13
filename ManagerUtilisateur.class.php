<?php
class ManagerUtilisateur
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }


  public function add($login, $password, $email)
  {
	//echo "Ajout d'un nouveau utilisateur<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO utilisateur (LOGIN, PASSWORD, ACTIF, NB_ECHEC, PWD_USAGE_UNIQUE, DATE_EXPIRATION, EMAIL, DATE_MAJ) VALUES ('".$login."','".$password."','1','0','1','2014-01-01','".$email."',now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du utilisateur passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$utilisateur->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }
  
  public function ajouterUtilisateur($login, $password, $email, $nom, $prenom, $dateNaissance, $adresse, $codePostal, $ville, $telFixe, $telPortable, $superAdmin, $photo)
  {
  	//echo "Ajout d'un nouveau utilisateur<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO utilisateur (LOGIN, PASSWORD, ACTIF, NB_ECHEC, PWD_USAGE_UNIQUE, DATE_EXPIRATION, EMAIL, NOM, PRENOM, DATE_NAISSANCE, ADRESSE, CODE_POSTAL, VILLE, TEL_FIXE, TEL_PORTABLE, PHOTO, SUPER_ADMIN, DERNIERE_MAJ) ";
  	$sql = $sql."VALUES ('".$login."', '".$password."', '1', '0', '1', '2999-01-01', '".$email."', '".strtoupper($nom)."', '".strtoupper($prenom)."', '".$dateNaissance."', '".strtoupper($adresse)."', '".strtoupper($codePostal)."', '".strtoupper($ville)."', '".$telFixe."', '".$telPortable."', '".$photo."', '".$superAdmin."', now())";
  	$q = $this->_db->query($sql);
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM utilisateur')->fetchColumn();
  }

  public function delete(Utilisateur $utilisateur)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM utilisateur WHERE login = '.$utilisateur->getLogin());
  }
  
  public function supprimerUtilisateur($userLogin)
  {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec("DELETE FROM utilisateur WHERE login = '".$userLogin."'");
  }

  public function exists($login, $password)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un login.
	if (is_string($login)) // On veut voir si tel utilisateur ayant pour login $login existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM utilisateur WHERE login = '".$login."' and password = '".$password."'")->fetchColumn();
    }
    return false;
  }

  public function get($login)
  {
    // Si le paramètre est un entier, on veut récupérer le utilisateur avec son login.
	// Sinon on renvoie null
    if (is_string($login)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Utilisateur.
    	$sql = "SELECT login, actif, nb_echec as nbEchec, PWD_USAGE_UNIQUE as pwdUsageUnique, date_expiration as dateExpiration, email, nom, prenom, sexe, date_naissance as dateNaissance, adresse, code_postal as codePostal, ville, pays, tel_fixe as telFixe, tel_portable as telPortable, photo, super_admin as superAdmin, categorie, derniere_connexion as dateDerniereConnexion FROM utilisateur WHERE login = '".$login."'";
    	//echo $sql."";
    	
      $q = $this->_db->query($sql);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoUtilisateur($donnees);
    } else {
      return null;
    }
  }

  public function getList()
  {
    // Retourne la liste des utilisateurs.
    // Le résultat sera un tableau d'instances de Utilisateur.

	$utilisateurs = array();

    $q = $this->_db->query("SELECT login, actif, nb_echec as nbEchec, date_expiration as dateExpiration, email, nom, prenom, sexe, date_naissance as dateNaissance, adresse, code_postal as codePostal, ville, pays, tel_fixe as telFixe, tel_portable as telPortable, photo, super_admin as superAdmin, categorie, derniere_connexion as dateDerniereConnexion FROM utilisateur ORDER BY login");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $utilisateurs[] = new BoUtilisateur($donnees);
    }

    return $utilisateurs;
  }

  public function updatePassword($login, $password)
  {
    // Prépare une requête de type UPDATE.
    $q = $this->_db->query("UPDATE utilisateur SET password = '".$password."', pwd_usage_unique = 0, nb_echec = 0, date_expiration = '2999-01-01', derniere_maj = now() WHERE login = '".$login."'");
  }

  public function updateEmail($login, $email)
  {
    // Prépare une requête de type UPDATE.
	$q = $this->_db->query("UPDATE utilisateur SET email = '".$email."', derniere_maj = now() WHERE login = '".$login."'");
  }

  public function updateActif($login, $actif)
  {
    // Prépare une requête de type UPDATE.
    $q = $this->_db->query("UPDATE utilisateur SET actif = '".$actif."', derniere_maj = now() WHERE login = '".$login."'");
  }

  public function updateDerniereConnexion($login)
  {
    // Exécute une requête de type UPDATE.
    $this->_db->query("UPDATE utilisateur SET derniere_connexion = now() WHERE login = '".$login."'");
  }
  
  public function majUtilisateur($login, $email, $nom, $prenom, $dateNaissance, $adresse, $codePostal, $ville, $telFixe, $telPortable, $superAdmin, $ancienLogin)
  {
  	// Préparation de la requête d'update.
  	$sql = "UPDATE utilisateur ";
  	
  	$sql = $sql."SET email = '".$email."', ";
  	
  	//$sql = $sql."login = '".$login."', ";
  	
  	$sql = $sql."nom = '".strtoupper($nom)."', ";
  	
  	$sql = $sql."prenom = '".strtoupper($prenom)."', ";
  	
  	$sql = $sql."date_naissance = '".$dateNaissance."', ";
  	
  	$sql = $sql."adresse = '".strtoupper($adresse)."', ";
  	
  	$sql = $sql."code_postal = '".strtoupper($codePostal)."', ";
  	
  	$sql = $sql."ville = '".strtoupper($ville)."', ";
  	
  	$sql = $sql."tel_fixe = '".$telFixe."', ";
  	
  	$sql = $sql."tel_portable = '".$telPortable."', ";
  	
  	if ($superAdmin != null && $superAdmin != "") {
  		$sql = $sql."super_admin = '".$superAdmin."', ";
  	}
  	
  	$sql = $sql."derniere_maj = now() ";
  	$sql = $sql."WHERE login='".$login."'";

  	$q = $this->_db->query($sql);
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>