<?php
class ManagerArticle
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($titre, $texte, $photo, $lien, $statut, $dateParution, $login)
  {
	//echo "Ajout d'un nouveau article<br>";
    // Préparation de la requête d'insertion.
    $q = $this->_db->query("INSERT INTO article (TITRE, TEXTE, PHOTO, LIEN, STATUT, DATE_PARUTION, AUTEUR, DERNIERE_MAJ) VALUES ('".$titre."','".$texte."','".$photo."','".$lien."','".$statut."','".$dateParution."','".strtoupper($login)."',now())");
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

  /*
  public function ajouterArticle($titre, $texte, $photo, $video, $login) {
  	//echo "Ajout d'un nouveau article<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO article (TITRE, TEXTE, PHOTO, VIDEO, STATUT, DATE_PARUTION, AUTEUR, DERNIERE_MAJ) VALUES ('".$titre."','".$texte."','".$photo."','".$video."','1',now(),'".strtoupper($login)."',now())";
  	$q = $this->_db->query($sql);

  }
  */

  public function ajouterArticle($titre, $texte, $photos, $login) {
  	//echo "Ajout d'un nouveau article<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO article (TITRE, TEXTE, PHOTO, VIDEO, STATUT, DATE_PARUTION, AUTEUR, DERNIERE_MAJ) VALUES ('".$titre."', '".$texte."', '".$photos[0]."', '', '1', now(), '".strtoupper($login)."', now())";
  	$q = $this->_db->query($sql);

  	$idArticle = $this->_db->query("SELECT MAX(ID) FROM article WHERE TITRE='".$titre."' and AUTEUR='".$login."'")->fetchColumn();

  	foreach ($photos as $photo) {
  		$sql = "INSERT INTO photo_article (ARTICLE, PHOTO) VALUES (".$idArticle.", '".$photo."')";
  		$q = $this->_db->query($sql);
  	}

  }
  
  public function ajouterArticleSansPhoto($titre, $texte, $login) {
  	//echo "Ajout d'un nouveau article<br>";
  	// Préparation de la requête d'insertion.
  	$sql = "INSERT INTO article (TITRE, TEXTE, STATUT, DATE_PARUTION, AUTEUR, DERNIERE_MAJ) VALUES ('".$titre."', '".$texte."', '1', now(), '".strtoupper($login)."', now())";
  	$q = $this->_db->query($sql);
  }

  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM article')->fetchColumn();
  }

  public function delete(Article $article)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM article WHERE id = '.$article->getId());
  }

  public function supprimerArticle($idArticle)
  {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM article WHERE id = '.$idArticle);
  }

  public function depublierArticle($idArticle, $login) {
  	// Exécute une requête de type DELETE.
  	$sql = "UPDATE article set statut=0, auteur='".strtoupper($login)."' WHERE id = ".$idArticle;

  	$this->_db->query($sql);
  }

  public function publierArticle($idArticle, $login) {
  	// Exécute une requête de type DELETE.
  	$this->_db->query("UPDATE article set statut=1, auteur='".strtoupper($login)."' WHERE id = ".$idArticle);
  }

  public function majArticle($idArticle, $titre, $texte, $login) {
  	// Exécute une requête de type DELETE.
  	$this->_db->query("UPDATE article set titre='".$titre."', texte='".$texte."', auteur='".strtoupper($login)."' WHERE id = ".$idArticle);
  }

  public function exists($titre)
  {
	// Si le paramètre est un string, c'est qu'on a fourni un nom.
	if (is_string($titre)) // On veut voir si tel sponsor ayant pour nom $nom existe.
    {
	  // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
      return (bool) $this->_db->query("SELECT COUNT(*) FROM article WHERE titre = '".$titre."'")->fetchColumn();
    }
    return false;
  }

  public function get($titre)
  {
    // Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null
    if (is_string($titre)) {
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
      $q = $this->_db->query("SELECT id, titre, texte, photo, video, lien, statut, date_parution as dateParution, auteur FROM article WHERE titre = '".$titre."'");
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      return new BoArticle($donnees);
    } else {
      return null;
    }
  }

  public function trouverParId($idArticle)
  {
  	// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
	$sql = "SELECT id, titre, texte, photo, video, lien, statut, date_parution as dateParution, auteur FROM article WHERE id = ".$idArticle."";
	//echo $sql;
  	$q = $this->_db->query($sql);
  	$donnees = $q->fetch(PDO::FETCH_ASSOC);

  	$article = new BoArticle($donnees);

  	$listePhotos = array();
  	$q2 = $this->_db->query("SELECT article, photo FROM photo_article WHERE article = ".$idArticle."");
  	while ($donnes = $q2->fetch(PDO::FETCH_ASSOC)) {
  		$article->ajouterPhoto(new BoPhoto($donnes));
  	}

 	return $article;
  }

  public function getList()
  {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Sponsor.

	$articles = array();

    $q = $this->_db->query("SELECT id, titre, texte, photo, video, lien, statut, auteur FROM article WHERE statut=1 ORDER BY date_parution desc");

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
    	$article = new BoArticle($donnees);

    	$listePhotos = array();
    	$q2 = $this->_db->query("SELECT article, photo FROM photo_article WHERE article = ".$article->getId()."");
    	while ($donnes = $q2->fetch(PDO::FETCH_ASSOC)) {
    		$article->ajouterPhoto(new BoPhoto($donnes));
    	}

    	$articles[] = $article;
    }

    return $articles;
  }

  public function getTrouverTous()
  {
  	// Retourne la liste des menus.
  	// Le résultat sera un tableau d'instances de Sponsor.

  	$articles = array();

  	$q = $this->_db->query("SELECT id, titre, texte, photo, video, lien, statut, auteur, date_parution as dateParution FROM article ORDER BY date_parution desc");

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$articles[] = new BoArticle($donnees);
  	}

  	return $articles;
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>