<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans RechercherTypeCompetition.php", Logger::GRAN_MONTH);

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
	$manager = new ManagerTypeCompetition($connexionBdd->getPDO());

	if(isset($_GET['go']) || isset($_GET['categorie'])) {

		$typeCompetitions = array();
		$json = array();

		if(isset($_GET['go'])) {
			// requ�te qui r�cup�re les r�gions
			$typeCompetitions = $manager->getList();
		} else if(isset($_GET['categorie'])) {
			$id = htmlentities(intval($_GET['categorie']));
			// requ�te qui r�cup�re les d�partements selon la r�gion
			$typeCompetitions = $manager->trouverTypeCompetitionParCategorie($id);

		}

		foreach ($typeCompetitions as $typeCompetition) {
			$json[$typeCompetition->getId()][] = utf8_encode($typeCompetition->getLibelle());
		}

		// envoi du r�sultat au success
		echo json_encode($json);
	}

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>

<?php

?>