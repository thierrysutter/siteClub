<?php

class ManagerEquipe {
	private $_db;

	public function __construct($db)
	{
		$this->setDb($db);
	}

	public function add($categorie, $libelle, $entraineur, $adjoint, $delegue, $lienClassement, $login) {

	}

	public function ajouterEquipe($categorie, $libelle, $lienClassement, $login) {
		$sql = "INSERT INTO equipe (CATEGORIE, LIBELLE, LIEN_CLASSEMENT, AUTEUR_MAJ, DERNIERE_MAJ) VALUES ('".$categorie."','".strtoupper($libelle)."','".$lienClassement."','".strtoupper($login)."',now())";
		$q = $this->_db->query($sql);

	}

	public function count() {
		// Exécute une requête COUNT() et retourne le nombre de résultats retourné.
		return $this->_db->query('SELECT COUNT(*) FROM equipe')->fetchColumn();
	}

	public function delete(Equipe $equipe) {
		// Exécute une requête de type DELETE.
		$this->_db->exec('DELETE FROM equipe WHERE id = '.$equipe->getId());
	}

	public function supprimerEquipe($idEquipe) {
		// Exécute une requête de type DELETE.
		$this->_db->exec("DELETE FROM equipe WHERE id = ".$idEquipe);
	}

	public function exists($libelle) {
		// Si le paramètre est un string, c'est qu'on a fourni un nom.
		if (is_string($libelle)) // On veut voir si tel sponsor ayant pour nom $nom existe.
		{
			// On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
			return (bool) $this->_db->query("SELECT COUNT(*) FROM equipe WHERE libelle = '".strtoupper($libelle)."'")->fetchColumn();
		}
		return false;
	}

	public function getList() {
		// Retourne la liste des equipes.
		// Le résultat sera un tableau d'instances de Equipe.

		$equipes = array();

		$q = $this->_db->query("SELECT equipe.id, equipe.categorie, categorie.libelle as libelleCategorie, equipe.libelle, equipe.entraineur, equipe.adjoint, equipe.delegue, equipe.lien_classement as lienClassement FROM equipe left outer join categorie on (categorie.id=equipe.categorie) ORDER BY equipe.categorie asc, equipe.libelle desc");
		//$q->execute();

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$equipes[] = new BoEquipe($donnees);
		}
		sort($equipes);
		return $equipes;
	}

	public function trouverEquipesParCategorie($categorie) {
		// Retourne la liste des equipes.
		// Le résultat sera un tableau d'instances de Equipe.

		$equipes = array();

		$sql = "SELECT equipe.id, equipe.categorie, categorie.libelle as libelleCategorie, equipe.libelle, equipe.entraineur, equipe.adjoint, equipe.delegue, equipe.lien_classement as lienClassement FROM equipe left outer join categorie on (categorie.id=equipe.categorie) where categorie='".$categorie."' ORDER BY equipe.libelle desc";
		$q = $this->_db->query($sql);
		//$q->execute();

		while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
		{
			$equipes[] = new BoEquipe($donnees);
		}
		sort($equipes);
		return $equipes;
	}

	public function trouverParId($idEquipe) {
		// Retourne la liste des equipes.
		// Le résultat sera un tableau d'instances de Equipe.

		$q = $this->_db->query("SELECT equipe.id, equipe.categorie, categorie.libelle as libelleCategorie, equipe.libelle, equipe.entraineur, equipe.adjoint, equipe.delegue, equipe.lien_classement as lienClassement FROM equipe left outer join categorie on (categorie.id=equipe.categorie) where equipe.id='".$idEquipe."' ORDER BY equipe.categorie asc, equipe.libelle desc");
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
 		return new BoEquipe($donnees);
	}


	public function majEquipe($idEquipe, $categorie, $libelle, $lien, $login) {
		// Exécute une requête de type DELETE.
		$this->_db->query("UPDATE equipe set categorie='".$categorie."', libelle='".strtoupper($libelle)."', lien_classement='".$lien."', auteur_maj='".strtoupper($login)."' WHERE id = ".$idEquipe);
	}

	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
}

?>