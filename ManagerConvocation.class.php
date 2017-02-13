<?php
class ManagerConvocation
{
  private $_db;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function ajouterConvocation($rencontre, $listeJoueurs, $login) {
  	$sql = "INSERT INTO convocation (RENCONTRE, JOUEUR, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ";
  	foreach($listeJoueurs as $joueur) {
  		$sql .= "(".$rencontre.", ".$joueur.", '".strtoupper($login)."',now()), ";
  	}
  	$sql = substr($sql, 0, strlen($sql)-2);

  	$q = $this->_db->query($sql);
  }

  public function majConvocation($rencontre, $joueur, $login) {
  	// Exécute une requête de type DELETE.
  	$this->_db->query("UPDATE convocation set rencontre='".$rencontre."', joueur=".$joueur.", auteur_maj='".strtoupper($login)."' WHERE rencontre = ".$rencontre);
  }

  public function count() {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
	return $this->_db->query('SELECT COUNT(*) FROM convocation')->fetchColumn();
  }

  public function trouverConvocationsParCategorie($categorie) {
  	$listeRencontres = array();

  	$sql="SELECT distinct rencontre.id, rencontre.competition, competition.libelle as libelleCompetition, categorie.libelle as libelleCategorie, rencontre.jour, rencontre.equipe_dom as equipeDom, rencontre.equipe_ext as equipeExt, rencontre.score_dom as scoreDom, rencontre.score_ext as scoreExt, rencontre.statut, rencontre.heure_rdv as heureRDV, rencontre.lieu_rdv as lieuRDV, rencontre.commentaire_rdv as commentaireRDV, rencontre.heure_match as heureMatch ";
  	$sql.="FROM convocation, rencontre, competition, categorie ";
  	$sql.="WHERE convocation.rencontre=rencontre.id ";
  	$sql.="AND rencontre.competition=competition.id ";
  	$sql.="AND competition.categorie=categorie.id ";
  	$sql.="AND rencontre.jour >  NOW() - INTERVAL 10 DAY ";
  	if ($categorie > 0) {
  		$sql.="AND categorie.id = $categorie ";
  	}

  	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
  		$listeRencontres[] = new BoRencontre($donnees);
  	}

  	return $listeRencontres;
  }

  public function trouverListeJoueurs($rencontre) {
  	// Retourne la liste des joueurs.
  	$listeJoueurs = array();

  	//$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo ";
  	$sql = "SELECT membre.id ";
  	$sql .= "FROM convocation inner join membre on (convocation.joueur=membre.id) left outer join poste on (poste.id=membre.poste) ";
  	$sql .= "WHERE membre.fonction=12 and convocation.rencontre = ".$rencontre." ";

  	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
  		$listeJoueurs[] = new BoJoueur($donnees);
  	}

  	return $listeJoueurs;
  }

  public function trouverListeJoueursComplet($rencontre) {
  	// Retourne la liste des joueurs.
  	$listeJoueurs = array();

  	$sql = "SELECT membre.id, membre.nom, membre.prenom, membre.age, membre.date_naissance as dateNaissance, poste.libelle as libellePoste, membre.numero_licence as numeroLicence, membre.taille, membre.poids, membre.meilleur_pied as meilleurPied, membre.photo ";
  	$sql .= "FROM convocation inner join membre on (convocation.joueur=membre.id) left outer join poste on (poste.id=membre.poste) ";
  	$sql .= "WHERE membre.fonction=12 and convocation.rencontre = ".$rencontre." ";

  	$q = $this->_db->query($sql);

  	while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
  		$listeJoueurs[] = new BoJoueur($donnees);
  	}

  	return $listeJoueurs;
  }

  public function supprimerConvocation($rencontre) {
  	// Exécute une requête de type DELETE.
  	$this->_db->exec('DELETE FROM convocation WHERE rencontre = '.$rencontre);
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
  }
}
?>