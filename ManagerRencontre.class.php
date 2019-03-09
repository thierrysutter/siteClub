<?php
class ManagerRencontre
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function add($titre, $texte, $photo, $lien, $statut, $dateParution, $auteur) {
	//echo "Ajout d'un nouveau rencontre<br>";
    // Préparation de la requête d'insertion.
    //$q = $this->_db->query("INSERT INTO rencontre (TITRE, TEXTE, PHOTO, LIEN, STATUT, DATE_PARUTION, AUTEUR, DATE_MAJ) VALUES ('".$titre."','".$texte."','".$photo."','".$lien."','".$statut."','".$dateParution."','".$auteur."',now())");
    // Assignation des valeurs pour le nom du personnage.
    /*$q->bindValue(':login', $login);
	$q->bindValue(':password', $password);
	$q->bindValue(':email', $email);
    // Exécution de la requête.
	$q->execute();*/

	// Hydratation du rencontre passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
    /*$rencontre->hydrate(array(
      'id' => $this->_db->lastInsertId(),
      'degats' => 0,
    ));*/
  }

  public function ajouterRencontre($competition, $jour, $equipeDom, $equipeExt, $heureMatch, $login) {
  	$sql = "INSERT INTO rencontre (COMPETITION, JOUR, EQUIPE_DOM, EQUIPE_EXT, SCORE_DOM, SCORE_EXT, STATUT, HEURE_MATCH, AUTEUR_MAJ, DERNIERE_MAJ) ";
  	$sql .= "VALUES ('".$competition."','".$jour."','".strtoupper($equipeDom)."','".strtoupper($equipeExt)."', 0, 0, 0, '".$heureMatch."', '".strtoupper($login)."',now())";
  	$q = $this->_db->query($sql);
  }

  public function majRencontre($idRencontre, $competition, $jour, $equipeDom, $equipeExt, $heureMatch, $login) {
  	// Exécute une requête de type DELETE.
  	$this->_db->query("UPDATE rencontre set competition='".$competition."', jour='".$jour."', equipe_dom='".strtoupper($equipeDom)."', equipe_ext='".strtoupper($equipeExt)."', heure_match='".$heureMatch."', auteur_maj='".strtoupper($login)."' WHERE id = ".$idRencontre);
  }

  public function count() {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM rencontre')->fetchColumn();
  }

  public function delete(Rencontre $rencontre) {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM rencontre WHERE id = '.$rencontre->getId());
  }

  public function supprimerRencontre($idRencontre) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM rencontre WHERE id = '.$idRencontre);
  }

  public function get($id) {
  	// Si le paramètre est un entier, on veut récupérer le sponsor avec son nom.
	// Sinon on renvoie null

    $sql = "SELECT rencontre.id, rencontre.competition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, competition.equipe, competition.libelle as libelleCompetition FROM rencontre inner join competition on (rencontre.competition=competition.id) inner join categorie on (competition.categorie=categorie.id) left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) WHERE rencontre.id = ".$id."";
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
    $q = $this->_db->query($sql);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
    return new BoRencontre($donnees);
  }

  public function getList($competition) {
    // Retourne la liste des menus.
    // Le résultat sera un tableau d'instances de Sponsor.

	$rencontres = array();

    $q = $this->_db->query("SELECT rencontre.id, rencontre.competition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, competition.equipe, competition.libelle as libelleCompetition FROM rencontre inner join competition on (rencontre.competition=competition.id) inner join categorie on (competition.categorie=categorie.id) left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) WHERE rencontre.competition='".$competition."' ORDER BY rencontre.jour");
    //$q->execute();

    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
    	$rencontres[] = new BoRencontre($donnees);
    }

    return $rencontres;
  }

  public function trouverRencontres($debut, $fin, $categorie, $equipe, $lieu) {

  	$rencontres = array();
  	$sql = "";
  	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, categorie.libelle as libelleCategorie, ";
  	$sql .= "rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, ";
  	$sql .= "rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, ";
  	$sql .= "compte_rendu.texte as compteRendu, equipe.libelle as libelleEquipe ";
  	$sql .= "FROM rencontre inner join competition on (rencontre.competition=competition.id) ";
  	$sql .= "inner join categorie on (competition.categorie=categorie.id) ";
  	$sql .= "inner join equipe on (competition.equipe=equipe.id) ";
  	$sql .= "left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id) ";
  	$sql .= "WHERE rencontre.jour between '".$debut."' and '".$fin."'  ";

  	if (isset($categorie) && $categorie!="-1")
  		$sql.="AND competition.categorie='".$categorie."' " ;

  	if (isset($equipe) && $equipe!="-1")
  		$sql.="AND competition.equipe='".$equipe."' " ;

  	if (isset($lieu) && strtoupper($lieu)=="DOMICILE")
  		$sql.="AND rencontre.equipe_dom='ST JULIEN' " ;
  	else if (isset($lieu) && strtoupper($lieu)=="EXTERIEUR")
  		$sql.="AND rencontre.equipe_ext='ST JULIEN' " ;

  	$sql.=" ORDER BY rencontre.jour ";
echo $sql;
  	$q = $this->_db->query($sql);

  	//$q->execute();

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoRencontre($donnees);
  	}

  	return $rencontres;
  }

  public function getDernier($categorie) {
  	$rencontres = array();
  	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, equipe.libelle as equipe ";
  	$sql .= "FROM rencontre left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id), competition, equipe, categorie, (select max(jour) as jour, competition from rencontre where statut=1 group by competition) tmp ";
  	$sql .= "WHERE tmp.jour=rencontre.jour and tmp.competition=rencontre.competition and rencontre.competition=competition.id and competition.actif=1 and competition.equipe=equipe.id and competition.categorie=categorie.id ";
  	$sql.="AND rencontre.jour > now() - INTERVAL 15 DAY " ;
  	if (isset($categorie) && $categorie!=-1)
  		$sql.="AND competition.categorie='".$categorie."' " ;

  	$sql .= "ORDER BY jour, competition.categorie, competition";

  	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoRencontre($donnees);
  	}

  	return $rencontres;
  }

  public function getProchain($categorie) {
  	// Retourne la liste des menus.
  	// Le résultat sera un tableau d'instances de Sponsor.

  	$rencontres = array();
	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, equipe.libelle as equipe  FROM rencontre left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id), competition, equipe, categorie, (select min(jour) as jour, competition from rencontre where statut=0 group by competition) tmp ";
	$sql .= "WHERE tmp.jour=rencontre.jour and tmp.competition=rencontre.competition and rencontre.competition=competition.id and competition.actif=1 and competition.equipe=equipe.id and competition.categorie=categorie.id ";
	$sql.="AND rencontre.jour < now() + INTERVAL 15 DAY " ;
	if (isset($categorie) && $categorie!=-1)
		$sql.="AND competition.categorie='".$categorie."' " ;

	$sql .= "ORDER BY jour, competition.categorie, competition";
	//echo $sql;

	$q = $this->_db->query($sql);
  	//$q->execute();

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoRencontre($donnees);
  	}

  	return $rencontres;
  }

  public function getDernierParEquipe($equipe) {
  	$rencontres = array();
  	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, rencontre.jour, rencontre.equipe_dom as equipeDom, ";
  	$sql .= "rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, ";
  	$sql .= "rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, ";
  	$sql .= "competition.categorie, categorie.libelle as libelleCategorie, equipe.libelle as equipe ";
  	$sql .= "FROM rencontre left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id), "; 
  	$sql .= "competition, equipe, categorie, ";
  	$sql .= "(select max(jour) as jour, competition from rencontre where statut=1 group by competition) tmp ";
  	$sql .= "WHERE tmp.jour=rencontre.jour and tmp.competition=rencontre.competition and rencontre.competition=competition.id ";
  	$sql .= "and competition.actif=1 and competition.equipe=equipe.id and competition.categorie=categorie.id ";
  	$sql .= "AND rencontre.jour > now() - INTERVAL 360 DAY " ;
  	if (isset($equipe) && $equipe != -1)
  		$sql.="AND equipe.id = '".$equipe."' " ;

  	$sql .= "ORDER BY jour, competition.categorie, competition";

  	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoRencontre($donnees);
  	}

  	return $rencontres;
  }

  public function getProchainParEquipe($equipe) {
  	$rencontres = array();
	$sql = "SELECT rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch, compte_rendu.texte as compteRendu, competition.categorie, categorie.libelle as libelleCategorie, equipe.libelle as equipe  FROM rencontre left outer join compte_rendu on (compte_rendu.rencontre=rencontre.id), competition, equipe, categorie, (select min(jour) as jour, competition from rencontre where statut=0 group by competition) tmp ";
	$sql .= "WHERE tmp.jour=rencontre.jour and tmp.competition=rencontre.competition and rencontre.competition=competition.id and competition.actif=1 and competition.equipe=equipe.id and competition.categorie=categorie.id ";
	$sql.="AND rencontre.jour < now() + INTERVAL 360 DAY " ;
	if (isset($equipe) && $equipe != -1)
  		$sql.="AND equipe.id = '".$equipe."' " ;

	$sql .= "ORDER BY jour, competition.categorie, competition";

	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
  	{
  		$rencontres[] = new BoRencontre($donnees);
  	}

  	return $rencontres;
  }

  public function updateResultatRencontre($idRencontre, $scoreDom, $scoreExt, $login) {
    // Prépare une requête de type UPDATE.
    $q = $this->_db->query("UPDATE rencontre SET SCORE_DOM = ".$scoreDom.", SCORE_EXT = ".$scoreExt.", DERNIERE_MAJ = now(), AUTEUR_MAJ = '".strtoupper($login)."', STATUT = 1 WHERE ID = ".$idRencontre."");
  }

  public function updateRDV($idRencontre, $heureRDV, $lieuRDV, $commentaireRDV, $login) {
    // Prépare une requête de type UPDATE.
  	$sql = "UPDATE rencontre SET HEURE_RDV = '".$heureRDV."', LIEU_RDV = '".strtoupper($lieuRDV)."', COMMENTAIRE_RDV = '".$commentaireRDV."', DERNIERE_MAJ = now(), AUTEUR_MAJ = '".strtoupper($login)."' WHERE ID = ".$idRencontre." ";
  	$q = $this->_db->query($sql);
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
  }
}
?>