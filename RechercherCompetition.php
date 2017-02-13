<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans RechercherCompetition.php", Logger::GRAN_MONTH);

ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on r�cup�re le login de l'utilisateur connect�
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de s�curit�
		header("Location: Deconnexion.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de s�curit�
  header("Location: Deconnexion.php");
}
require_once("config/config.php");

try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$manager = new ManagerCompetition($connexionBdd->getPDO());



	if(isset($_GET['go']) || isset($_GET['categorie'])) {

		$equipes = array();
		$json = array();

		if(isset($_GET['go'])) {
			// requ�te qui r�cup�re les r�gions
			$equipes = $manager->getList();
		} else if(isset($_GET['categorie'])) {
			$id = htmlentities(intval($_GET['categorie']));
			// requ�te qui r�cup�re les d�partements selon la r�gion
			$equipes = $manager->trouverEquipesParCategorie($id);

		}

		foreach ($equipes as $equipe) {
			$json[$equipe->getId()][] = $equipe->getLibelle();
		}

		// envoi du r�sultat au success
		echo json_encode($json);
	} else {
		$idCompetition = $_GET['id'];
		$competition = $manager->trouverCompetitionParId($idCompetition);
		$_SESSION['competition'] = $competition;

		$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
		$listeEquipes = $managerEquipe->trouverEquipesParCategorie($competition->getCategorie());

		$managerTypeCompetition = new ManagerTypeCompetition($connexionBdd->getPDO());
		$listeTypeCompetitions = $managerTypeCompetition->trouverTypeCompetitionParCategorie($competition->getCategorie());

		$managerDivision = new ManagerDivision($connexionBdd->getPDO());
		$listeDivisions = $managerDivision->trouverDivisionParCategorie($competition->getCategorie());

		$_SESSION['listeEquipes']=$listeEquipes;
		$_SESSION['listeTypeCompetitions']=$listeTypeCompetitions;
		$_SESSION['listeDivisions']=$listeDivisions;

		header("Location: modificationCompetition.php");
	}



} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>