<?php
class ManagerJoueur
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($nom, $prenom, $age, $dateNaissance, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $login)
  {
	//echo "Ajout d'un nouveau Joueur<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO membre (NOM, PRENOM, AGE, DATE_NAISSANCE, FONCTION, CATEGORIE, POSTE, TAILLE, POIDS, MEILLEUR_PIED, NUMERO_LICENCE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$nom."','".$prenom."', null, null, '12','".$categorie."','".$poste."','".$taille."','".$poids."', '".$meilleurPied."', '".$numeroLicence."', '".$login."', now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du joueur passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$joueur->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function ajouterJoueur($nom, $prenom, $dateNaissance, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $email, $photo, $login)
  {
  	//echo "Ajout d'un nouveau Joueur<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO membre (NOM, PRENOM, DATE_NAISSANCE, FONCTION, CATEGORIE, POSTE, TAILLE, POIDS, MEILLEUR_PIED, NUMERO_LICENCE, EMAIL, PHOTO, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql = $sql."VALUES ('".strtoupper($nom)."','".strtoupper($prenom)."', '$dateNaissance', '12','".$categorie."','".$poste."','".$taille."','".$poids."', '".strtoupper($meilleurPied)."', '".$numeroLicence."', '".$email."', '$photo', '".strtoupper($login)."', now())";

  	$q = $this->_db->query($sql);
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM membre WHERE fonction=12')->fetchColumn();
  }

  public function delete(Joueur $joueur)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM membre WHERE id = '.$joueur->getId());
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
      $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE fonction=12 and poste.id=membre.poste and nom='".strtoupper($nom)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoJoueur($donnees);
    } else {
      return null;
    }
  }

  public function getList($categorie, $poste, $nom)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, categorie.libelle as libelleCategorie, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre left outer join poste on (poste.id=membre.poste) left outer join categorie on (categorie.id=membre.categorie) WHERE membre.fonction=12 ";

	if ($categorie >= 9)
		$sql = $sql."and membre.categorie >= ".$categorie." ";
	else if ($categorie > 0)
		$sql = $sql."and membre.categorie = ".$categorie." ";

	if ($poste > 0)
		$sql = $sql."and membre.poste = ".$poste." ";

	if ($nom != "")
		$sql = $sql."and (membre.nom like '".strtoupper($nom)."%' or membre.prenom like '".strtoupper($nom)."%') ";

	$sql = $sql."ORDER BY membre.poste, membre.nom";

	$q = $this->_db->query($sql);
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

    /*foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function getListGardiens($categorie)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE membre.fonction=12 and membre.poste=1 and poste and poste.id=membre.poste ";
	if ($categorie >= 9)
		$sql = $sql."and membre.categorie >= ".$categorie." ";
	else
		$sql = $sql."and membre.categorie = ".$categorie." ";
	$sql = $sql."ORDER BY membre.poste, membre.nom";

    $q = $this->_db->query($sql);
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

   /* foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function getListDefenseurs($categorie)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

    $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE membre.fonction=12 and membre.poste in (2,3) and poste and poste.id=membre.poste and membre.categorie=".$categorie." ORDER BY membre.poste, membre.nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

    /*foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function getListMilieux($categorie)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

    $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE membre.fonction=12 and membre.poste in (4,5,6) and poste and poste.id=membre.poste and membre.categorie=".$categorie." ORDER BY membre.poste, membre.nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

    /*foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function getListAttaquants($categorie)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

    $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE membre.fonction=12 and membre.poste in (7,8) and poste and poste.id=membre.poste and membre.categorie=".$categorie." ORDER BY membre.poste, membre.nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

    /*foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function getListPoste($categorie, $poste)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$joueurs = array();

    $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre, poste WHERE membre.fonction=12 and membre.poste=".$poste." and poste and poste.id=membre.poste and membre.categorie=".$categorie." ORDER BY membre.poste, membre.nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $joueurs[] = new BoJoueur($donnees);
    }

    /*foreach($joueurs as $joueur) {
    	// on cherche le parcours du joueur
    	$managerParcours = new ManagerParcours($this->_db);
    	$parcours = $managerParcours->trouverParcoursParId($joueur->getId());

    	if ($parcours != null)
    		$joueur->setParcours($parcours);
    }*/

    return $joueurs;
  }

  public function majJoueur($id, $nom, $prenom, $dateNaissance, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $email, $photo, $login)
  {
  	// Préparation de la requête d'update.
  	$sql = "UPDATE membre ";

  	$sql = $sql."SET nom = '".strtoupper($nom)."', ";
  	$sql = $sql."prenom = '".strtoupper($prenom)."', ";
  	$sql = $sql."date_naissance = '".$dateNaissance."', ";
  	$sql = $sql."poste = '".$poste."', ";
  	$sql = $sql."categorie = '".$categorie."', ";
  	$sql = $sql."numero_licence = '".$numeroLicence."', ";
  	$sql = $sql."taille = '".$taille."', ";
  	$sql = $sql."poids = '".$poids."', ";
  	$sql = $sql."meilleur_pied = '".strtoupper($meilleurPied)."', ";
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
  	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, membre.categorie, categorie.libelle as libelleCategorie, membre.fonction, fonction.libelle as libelleFonction, membre.poste, poste.libelle as libellePoste, membre.email, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo FROM membre inner join fonction on (fonction.id=membre.fonction and fonction=12) left outer join poste on (poste.id=membre.poste) left outer join categorie on (categorie.id=membre.categorie) WHERE membre.id=".$id." ";
  	//echo $sql;
  	$q = $this->_db->query($sql);
  	$donnees = $q->fetch(PDO::FETCH_ASSOC);

  	if ($donnees != null)
  		return new BoJoueur($donnees);
  	else
  		return null;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>