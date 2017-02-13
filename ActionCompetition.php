<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans ActionCompetition.php", Logger::GRAN_MONTH);

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
	
	$categorie = -1;
	$equipe = -1;
	if (isset($_POST['methode'])) {
		$categorie = $_POST['categorie'];
		$equipe = $_POST['equipe'];
	}
	
	// liste des cat�gories
	$managerDivision = new ManagerDivision($connexionBdd->getPDO());
	$listeDivisions = $managerDivision->getList();
	
	$managerSaison = new ManagerSaison($connexionBdd->getPDO());
	$listeSaisons = $managerSaison->getList(true);
	
	$managerTypeCompetition = new ManagerTypeCompetition($connexionBdd->getPDO());
	$listeTypeCompetitions = $managerTypeCompetition->getList();
	
	$manager = new ManagerCompetition($connexionBdd->getPDO());
	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	
	$listeCompetitions = null;
	$listeEquipes = null;
	
	if ($categorie > 0) {
		if ($equipe > 0) {
			$listeCompetitions = $manager->trouverListeCompetitionParCategorieEtEquipe($categorie, $equipe);
		} else {
			$listeCompetitions = $manager->trouverCompetitionParCategorie($categorie);
		}
		$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
		$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);
	} else {
		$listeCompetitions = $manager->getList();
		$listeEquipes = $managerEquipe->getList();
	}
	
	$_SESSION['categorieSelectionnee'] = $categorie;
	$_SESSION['equipeSelectionnee'] = $equipe;
	$_SESSION['listeSaisons'] = $listeSaisons;
	$_SESSION['listeCompetitions']=$listeCompetitions;
	$_SESSION['listeDivisions']=$listeDivisions;
	$_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeTypeCompetitions']=$listeTypeCompetitions;
	
	header("Location: listeCompetitions.php");

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

?>