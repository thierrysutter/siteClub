<?php
class ManagerMembre
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

  public function add($nom, $prenom, $age, $dateNaissance, $fonction, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $login)
  {
	//echo "Ajout d'un nouveau Joueur<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO membre (NOM, PRENOM, AGE, DATE_NAISSANCE, FONCTION, CATEGORIE, POSTE, TAILLE, POIDS, MEILLEUR_PIED, NUMERO_LICENCE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".strtoupper($nom)."','".strtoupper($prenom)."', null, null, '".$fonction."','".$categorie."','".$poste."','".$taille."','".$poids."', '".$meilleurPied."', '".$numeroLicence."', '".strtoupper($login)."', now())");
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

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM membre')->fetchColumn();
  }

  public function delete(Membre $membre)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM membre WHERE id = '.$membre->getId());
  }

  public function supprimerMembre($id)
  {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec("DELETE FROM membre WHERE id = ".$id." ");
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
      $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, fonction.libelle as libelleFonction, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied FROM membre, poste, fonction WHERE poste.id=membre.poste and fonction.id=membre.fonction and membre.nom='".strtoupper($nom)."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoMembre($donnees);
    } else {
      return null;
    }
  }

  public function getList($categorie)
  {
    // Retourne la liste des joueurs d'une catégorie passée en paramètre.
    // Le résultat sera un tableau d'instances de Joueur.

	$membres = array();

    $q = $this->_db->query("SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, fonction.libelle as libelleFonction, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied FROM membre, poste, fonction WHERE poste.id=membre.poste and fonction.id=membre.fonction and membre.categorie=".$categorie." ORDER BY membre.poste, membre.nom");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $membres[] = new BoMembre($donnees);
    }

    return $membres;
  }

  public function trouverParId($id) {
  	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, categorie.libelle as libelleCategorie, fonction.libelle as libelleFonction, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied FROM membre left outer join fonction on (fonction.id=membre.fonction) left outer join poste on (poste.id=membre.poste) left outer join categorie on (categorie.id=membre.categorie) WHERE membre.id=".$id." ";
  	$q = $this->_db->query($sql);
  	$donnees = $q->fetch(PDO::FETCH_ASSOC);
 	return new BoMembre($donnees);
  }

}
?>