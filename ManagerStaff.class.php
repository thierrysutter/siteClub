<?php
class ManagerStaff
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($nom, $prenom, $age, $dateNaissance, $categorie, $fonction, $numeroLicence, $email, $photo, $video, $login)
  {
	//echo "Ajout d'un nouveau Joueur<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO membre (NOM, PRENOM, AGE, DATE_NAISSANCE, FONCTION, CATEGORIE, NUMERO_LICENCE, EMAIL, PHOTO, VIDEO, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".strtoupper($nom)."','".strtoupper($prenom)."', null, null, '".$fonction."','".$categorie."','".$numeroLicence."','".$email."','".$photo."','".$video."', '".strtoupper($login)."', now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du staff passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$staff->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function ajouterStaff($nom, $prenom, $dateNaissance, $fonction, $categorie, $numeroLicence, $email, $photo, $login)
  {
  	//echo "Ajout d'un nouveau Joueur<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO membre (NOM, PRENOM, DATE_NAISSANCE, FONCTION, CATEGORIE, NUMERO_LICENCE, EMAIL, PHOTO, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql = $sql."VALUES ('".strtoupper($nom)."','".strtoupper($prenom)."', '$dateNaissance', '".$fonction."','".$categorie."', '".$numeroLicence."', '".$email."', '".$photo."', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);

  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM membre WHERE fonction in (10,11)')->fetchColumn();
  }

  /**
   *
   * @param int $idStaff
   */
  public function supprimerStaff(int $idStaff)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM membre WHERE id = '.$idStaff);
  }

  public function delete(Staff $staff)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM membre WHERE id = '.$staff->getId());
  }

  public function exists($nom, $prenom)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un login.
	if (is_string($nom)) // On veut voir si tel Joueur ayant pour login $login existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM membre WHERE nom = '".strtoupper($nom)."' and prenom = '".strtoupper($prenom)."'")->fetchColumn();
    }
    return false;
  }

  public function get($nom)
  {
    // Si le paramètre est un entier, on veut récupérer le Joueur avec son login.
	// Sinon on renvoie null
    if (is_string($nom)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Joueur.
      $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, fonction.libelle as libelleFonction, membre.numero_licence as numeroLicence, membre.email, membre.photo, membre.video FROM membre, fonction WHERE membre.fonction in (10,11) and fonction.id=membre.fonction and nom='".strtoupper($nom)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoStaff($donnees);
    } else {
      return null;
    }
  }

  public function getList($categorie, $fonction, $nom)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$staffs = array();

	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, categorie.libelle as libelleCategorie, fonction.libelle as libelleFonction, membre.numero_licence as numeroLicence, membre.email, membre.photo, membre.video FROM membre left outer join categorie on (categorie.id=membre.categorie), fonction WHERE membre.fonction <> 12 and fonction.id=membre.fonction ";
	if ($categorie >= 9)
		$sql = $sql."and membre.categorie >= ".$categorie." ";
	else if ($categorie > 0)
		$sql = $sql."and membre.categorie = ".$categorie." ";

	if ($fonction > 0)
		$sql = $sql."and membre.fonction = ".$fonction." ";

	if ($nom != "")
		$sql = $sql."and (membre.nom like '".strtoupper($nom)."%' or membre.prenom like '".strtoupper($nom)."%') ";

	$sql = $sql."ORDER BY membre.fonction, membre.nom";

	$q = $this->_db->query($sql);
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $staffs[] = new BoStaff($donnees);
    }

    /*foreach($staffs as $staff) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$staff->setParcours($parcours);
    }*/

    return $staffs;
  }

  public function trouverTous() {
  	// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Joueur.
  	$staffs = array();
//echo "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, fonction.libelle as libelleFonction, membre.numero_licence as numeroLicence FROM membre, fonction WHERE membre.fonction <> 12 and fonction.id=membre.fonction";
  	$q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, coalesce(membre.age, '') as age, coalesce(membre.date_naissance, '') as dateNaissance, fonction.libelle as libelleFonction, coalesce(membre.numero_licence, '') as numeroLicence, membre.email, membre.photo, membre.video FROM membre, fonction WHERE membre.fonction <> 12 and fonction.id=membre.fonction order by fonction.id, membre.categorie");
  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $staffs[] = new BoStaff($donnees);
    }

    /*foreach($staffs as $staff) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$staff->setParcours($parcours);
    }*/

    return $staffs;
  }

  public function majStaff($id, $nom, $prenom, $dateNaissance, $fonction, $categorie, $numeroLicence, $email, $photo, $login)
  {
  	// Préparation de la requête d'update.
  	$sql = "UPDATE membre ";

  	$sql = $sql."SET nom = '".strtoupper($nom)."', ";
  	$sql = $sql."prenom = '".strtoupper($prenom)."', ";
  	$sql = $sql."date_naissance = '".$dateNaissance."', ";
  	$sql = $sql."fonction = '".$fonction."', ";
  	$sql = $sql."categorie = '".$categorie."', ";
  	$sql = $sql."numero_licence = '".$numeroLicence."', ";
  	$sql = $sql."email = '".$email."', ";
  	if ($photo != "")
  		$sql = $sql."photo = '".$photo."', ";
  	else
  		$sql = $sql."photo = NULL, ";

  	$sql = $sql."auteur_maj = '".strtoupper($login)."', ";
  	$sql = $sql."derniere_maj = now() ";
  	$sql = $sql."WHERE id=".$id."";

  	$q = $this->_db->query($sql);
  }

  public function trouverParId($id) {
  	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, membre.categorie, categorie.libelle as libelleCategorie, membre.fonction, fonction.libelle as libelleFonction, coalesce(membre.poste, -1) as poste, coalesce(p.libelle, '') as libellePoste, membre.numero_licence as numeroLicence, membre.email, membre.photo, membre.video, coalesce(membre.taille, 0) as taille, coalesce(membre.poids,0) as poids, coalesce(membre.meilleur_pied,'') as meilleurPied FROM membre left outer join categorie on (categorie.id=membre.categorie) left outer join fonction ON (membre.fonction=fonction.id) left outer join poste p ON (membre.poste=p.id) WHERE membre.id = ".$id." ";
// 	echo $sql;
	$q = $this->_db->query($sql);
  	$donnees = $q->fetch(PDO::FETCH_ASSOC);
  	if ($donnees != null)
  		return new BoStaff($donnees);
  	else
  		return null;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>