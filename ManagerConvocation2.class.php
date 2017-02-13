<?php
class ManagerConvocation
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function ajouterConvocation($rencontre, $listeJoueurs, $login) {
  	$sql = "INSERT INTO convocation2 (RENCONTRE, JOUEUR, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ";
  	foreach($listeJoueurs as $joueur) {
  		$sql .= "(".$rencontre.", '".strtoupper($joueur)."', '".strtoupper($login)."',now()), ";
  	}
  	$sql = substr($sql, 0, strlen($sql)-2);
  	
  	echo $sql;
  	$q = $this->_db->query($sql);
  }

  public function majConvocation($rencontre, $joueur, $login) {
  	// Exécute une requête de type DELETE.
  	$this->_db->query("UPDATE convocation2 set rencontre='".$rencontre."', joueur='".strtoupper($joueur)."', auteur_maj='".strtoupper($login)."' WHERE rencontre = ".$rencontre);
  }

  public function count() {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM convocation2')->fetchColumn();
  }

  public function trouverListeJoueurs($rencontre) {
  	// Retourne la liste des joueurs.
  	$listeJoueurs = array();

  	$sql = "SELECT joueur as nom ";
  	$sql .= "FROM convocation2 ";
  	$sql .= "WHERE rencontre = ".$rencontre." ";

  	$q = $this->_db->query($sql);
  	//$q->execute();

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		//echo $donnees."<br>".$donnees[0]."<br>";
  		$listeJoueurs[] = new BoJoueur($donnees);
  	}

  	return $listeJoueurs;
  }

  public function supprimerConvocation($rencontre) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM convocation2 WHERE rencontre = '.$rencontre);
  }

  public function get($rencontre) {
  	// Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null
   	$sql = "SELECT rencontre.id, rencontre.competition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, competition.equipe, competition.libelle as libelleCompetition FROM rencontre inner join competition on (rencontre.competition=competition.id) inner join categorie on (competition.categorie=categorie.id) left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) WHERE rencontre.id = ".$rencontre."";
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
    $q = $this->_db->query($sql);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new BoConvocation($donnees);
  }

  public function getList($competition) {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Sponsor.

	$rencontres = array();

    $q = $this->_db->query("SELECT rencontre.id, rencontre.competition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, competition.equipe, competition.libelle as libelleCompetition FROM rencontre inner join competition on (rencontre.competition=competition.id) inner join categorie on (competition.categorie=categorie.id) left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) WHERE rencontre.competition='".$competition."' ORDER BY rencontre.jour");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $rencontres[] = new BoConvocation($donnees);
    }

    return $rencontres;
  }

  public function trouverConvocations($debut, $fin, $categorie, $equipe, $lieu) {
  	// Retourne la liste des rencontres entre $debut et $fin.
  	// Le résultat sera un tableau d'instances de Rencontre.

  	$rencontres = array();
  	$sql = "";
  	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, categorie.libelle as libelleCategorie, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, compte_rendu.texte as compteRendu FROM rencontre inner join competition on (rencontre.competition=competition.id) inner join categorie on (competition.categorie=categorie.id) left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) WHERE rencontre.jour between '".$debut."' and '".$fin."'  ";



  	if (isset($categorie) && $categorie!="tout")
  		$sql.="AND competition.categorie='".$categorie."' " ;

  	if (isset($equipe) && $equipe!="tout")
  		$sql.="AND competition.equipe='".$equipe."' " ;

  	if (isset($lieu) && strtoupper($lieu)=="DOMICILE")
  		$sql.="AND rencontre.equipe_dom='ST JULIEN' " ;
  	else if (isset($lieu) && strtoupper($lieu)=="EXTERIEUR")
  		$sql.="AND rencontre.equipe_ext='ST JULIEN' " ;

  	$sql.=" ORDER BY rencontre.jour";

  	$q = $this->_db->query($sql);

  	//$q->execute();

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoConvocation($donnees);
  	}

  	return $rencontres;
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
  }
}
?>