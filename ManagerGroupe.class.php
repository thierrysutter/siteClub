<?php
class ManagerGroupe {

	/**
	 *
	 * @var PDO
	 */
	private $_db;

	/**
	 *
	 * @param PDO $db
	 */
  	public function __construct($db) {
  		$this->setDb($db);
  	}

  	/**
  	 *
  	 * @param PDO $db
  	 */
  	public function setDb(PDO $db) {
  		$this->_db = $db;
  	}

  	/**
  	 *
  	 * @param int $id
  	 * @param string $libelle
  	 * @param string $competition
  	 * @param string $equipe
  	 * @param string $login
  	 */
  	public function add($id, $libelle, $competition, $equipe, $login) {
		//echo "Ajout d'un nouveau article<br>";
	    // Préparation de la requète d'insertion.
	    $q = $this->_db->query("INSERT INTO groupe (ID, LIBELLE, COMPETITION, EQUIPE, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$id."','".$libelle."','".$competition."','".$equipe."','".strtoupper($login)."',now())");
	}

  	/**
  	 *
  	 * @param string $libelle
  	 * @param int $competition
  	 * @param int $equipe
  	 * @param string $login
  	 */
  	public function ajouterGroupe($libelle, $competition, $equipe, $login) {
  		// Pr�paration de la requ�te d'insertion.
  		$sql = "INSERT INTO groupe (LIBELLE, COMPETITION, EQUIPE, AUTEUR_MAJ, DERNIERE_MAJ) ";
  		$sql .= "VALUES ('".strtoupper($libelle)."','".$competition."','".$equipe."','".strtoupper($login)."', now())";

  		$q = $this->_db->query($sql);
  	}

  	/**
  	 *
  	 * @param ints $id
  	 * @param string $libelle
  	 * @param int $typeCompetition
  	 * @param int $categorie
  	 * @param int $division
  	 * @param int $saison
  	 * @param int $equipe
  	 * @param int $actif
  	 * @param string $login
  	 */
  	public function majGroupe($id, $libelle, $competition, $equipe, $login) {
	  	// Pr�paration de la requ�te d'insertion.
	  	$sql = "UPDATE groupe ";
	  	$sql .= "SET LIBELLE='".strtoupper($libelle)."', ";
	  	$sql .= "COMPETITION='".$competition."', ";
	  	$sql .= "EQUIPE='".$equipe."', ";
	  	$sql .= "AUTEUR_MAJ='".strtoupper($login)."', ";
	  	$sql .= "DERNIERE_MAJ=now() ";
	  	$sql .= "WHERE id=".$id." ";

	  	$q = $this->_db->query($sql);
  	}

  	/**
  	 *
  	 * @param unknown $idCompetition
  	 */
  	public function supprimerGroupe($idGroupe) {
	    // Ex�cute une requ�te de type DELETE.
		$this->_db->exec('DELETE FROM groupe WHERE id = '.$idGroupe);
  	}

  	/**
  	 *
  	 * @return string
  	 */
  	public function count() {
	    // Ex�cute une requ�te COUNT() et retourne le nombre de r�sultats retourn�.
		return $this->_db->query('SELECT COUNT(*) FROM groupe')->fetchColumn();
  	}

  	/**
  	 *
  	 * @param unknown $libelle
  	 * @return boolean
  	 */
  	public function exists($libelle) {
		// Si le param�tre est un string, c'est qu'on a fourni un nom.
		if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
	    {
		  // On ex�cute alors une requ�te COUNT() avec une clause WHERE, et on retourne un boolean.
	      return (bool) $this->_db->query("SELECT COUNT(*) FROM groupe WHERE libelle like '%".strtoupper($libelle)."%'")->fetchColumn();
	    }
	    return false;
  	}

  	/**
  	 *
  	 * @param unknown $id
  	 * @return BoCompetition|NULL
  	 */
  	// public function trouverGroupeParId($id) {
	//   	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	//   	// Sinon on renvoie null
	//   	if ($id > 0) {
	//   		// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.

	//   		$sql = "SELECT comp.id, comp.libelle, comp.categorie, comp.division, comp.saison, comp.equipe, ";
	//   		$sql .= "cat.libelle as libelleCategorie, coalesce(divi.libelle, '') as libelleDivision, eq.libelle as libelleEquipe,  ";
	//   		$sql .= "typeComp.id as typeCompetition, typeComp.libelle as libelleTypeCompetition  ";
	//   		$sql .= "FROM competition comp LEFT OUTER JOIN division divi ON (comp.division=divi.id), ";
	//   		$sql .= "categorie cat, saison s, equipe eq, type_competition typeComp ";
	//   		$sql .= "WHERE comp.categorie=cat.id and comp.saison=s.id and s.etat=1 and comp.equipe=eq.id and comp.type_competition=typeComp.id and comp.id = " . $id;
	//   		$sql .= " ORDER BY comp.categorie ";

	//   		$q = $this->_db->query($sql);
	//   		$donnees = $q->fetch(PDO::FETCH_ASSOC);

	//   		$competition = new BoCompetition($donnees);

	//   		return $competition;
	//   	} else {
	//   		return null;
	//   	}
  	// }

  	/**
  	 *
  	 * @param unknown $categorie
  	 * @param unknown $equipe
  	 * @param unknown $competition
  	 * @return BoCompetition
  	 */
  	// public function trouverCompetitionParCategorieEtEquipe($categorie, $equipe, $competition) {
  	// // Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
  	// // Sinon on renvoie null

  	// 	// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.

  	// 	$sql = "SELECT comp.id, comp.libelle, comp.categorie, comp.division, comp.saison, comp.equipe, ";
  	// 	$sql .= "cat.libelle as libelleCategorie, coalesce(divi.libelle, '') as libelleDivision, eq.libelle as libelleEquipe, s.libelle as libelleSaison  ";
  	// 	$sql .= "FROM competition comp ";
	// 	$sql .= "INNER JOIN type_competition typComp ON (comp.type_competition=typComp.id) ";
  	// 	$sql .= "INNER JOIN categorie cat ON (comp.categorie=cat.id) ";
  	// 	$sql .= "INNER JOIN saison s ON (comp.saison=s.id and s.etat=1) ";
  	// 	$sql .= "INNER JOIN equipe eq ON (comp.equipe=eq.id) ";
  	// 	$sql .= "LEFT OUTER JOIN division divi ON (comp.division=divi.id) ";
  	// 	$sql .= "WHERE comp.categorie = " . $categorie . " ";
  	// 	$sql .= "AND comp.equipe = ".$equipe." ";
  	// 	$sql .= "AND comp.actif = 1 ";

  	// 	if ($competition!=null && $competition>0) {
  	// 		$sql .= "AND comp.id = '" . $competition . "' ";
  	// 	}

  	// 	$sql .= "ORDER BY comp.categorie, comp.equipe ";

  	// 	$q = $this->_db->query($sql);
  	// 	$donnees = $q->fetch(PDO::FETCH_ASSOC);

  	// 	$competition = new BoCompetition($donnees);

  	// 	return $competition;
  	// }

  	/**
  	 *
  	 * @param unknown $categorie
  	 * @param unknown $equipe
  	 * @return multitype:BoCompetition
  	 */
  	// public function trouverListeCompetitionParCategorieEtEquipe($categorie, $equipe) {
	//   	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	//   	// Sinon on renvoie null

	//   	// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
	//   	$competitions = array();

	//   	$sql = "SELECT comp.id, comp.libelle, comp.categorie, comp.division, comp.saison, comp.equipe, ";
	//   	$sql .= "cat.libelle as libelleCategorie, coalesce(divi.libelle, '') as libelleDivision, eq.libelle as libelleEquipe, s.libelle as libelleSaison  ";
	//   	$sql .= "FROM competition comp ";
	//   	$sql .= "INNER JOIN type_competition typComp ON (comp.type_competition=typComp.id) ";
	//   	$sql .= "INNER JOIN categorie cat ON (comp.categorie=cat.id) ";
	//   	$sql .= "INNER JOIN saison s ON (comp.saison=s.id and s.etat=1) ";
	//   	$sql .= "INNER JOIN equipe eq ON (comp.equipe=eq.id) ";
	//   	$sql .= "LEFT OUTER JOIN division divi ON (comp.division=divi.id) ";
	//   	$sql .= "WHERE comp.categorie = " . $categorie . " ";
	//   	$sql .= "AND comp.equipe = ".$equipe." ";
	//   	$sql .= "AND comp.actif = 1 ";
	//   	$sql .= "ORDER BY comp.categorie, comp.equipe ";

	//   	$q = $this->_db->query($sql);
	//     while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	//     	$competitions[] = new BoCompetition($donnees);
	//     }

	//     return $competitions;
  	// }

  	/**
  	 *
  	 * @param unknown $categorie
  	 * @return multitype:BoCompetition
  	 */
  	public function trouverGroupeParCompetition($competition) {
	  	// Si le param�tre est un entier, on veut r�cup�rer le sponsor avec son nom.
	  	// Sinon on renvoie null

	  	// Ex�cute une requ�te de type SELECT avec une clause WHERE, et retourne un objet Sponsor.
	  	$groupes = array();

	  	$sql = "SELECT gr.id, gr.libelle, gr.equipe ";
	  	$sql .= " ";
	  	$sql .= "FROM groupe gr ";
	  	$sql .= "INNER JOIN competition comp ON (gr.competition=comp.id) ";
	  	$sql .= "WHERE gr.competition = " . $competition . " ";
	  	$sql .= "ORDER BY gr.competition, gr.equipe ";

	  	$q = $this->_db->query($sql);
	    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
	    {
	      $groupes[] = new BoGroupe($donnees);
	    }

	    return $groupes;
  	}

  	/**
  	 *
  	 * @return multitype:BoCompetition
  	 */
  	public function getList() {
	    // Retourne la liste des menus.
	    // Le r�sultat sera un tableau d'instances de Sponsor.

		$competitions = array();

		$sql = "SELECT comp.id, comp.libelle, comp.categorie, comp.division, comp.saison, comp.equipe, ";
		$sql .= "cat.libelle as libelleCategorie, coalesce(division.libelle, '') as libelleDivision, eq.libelle as libelleEquipe, s.libelle as libelleSaison ";
		$sql .= "FROM competition comp ";
		$sql .= "INNER JOIN categorie cat ON (comp.categorie=cat.id) ";
		$sql .= "LEFT OUTER JOIN division division ON (comp.division=division.id) ";
		$sql .= "INNER JOIN saison s ON (comp.saison=s.id and s.etat=1) ";
		$sql .= "INNER JOIN equipe eq ON (comp.equipe=eq.id) ";
		$sql .= "ORDER BY comp.categorie, comp.equipe ";

		$q = $this->_db->query($sql);
	    //$q->execute();

	    while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
	      $competitions[] = new BoCompetition($donnees);
	    }

	    return $competitions;
  	}
}
?>