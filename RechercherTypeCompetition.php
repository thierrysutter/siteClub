<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans RechercherTypeCompetition.php", Logger::GRAN_MONTH);

ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on récupère le login de l'utilisateur connecté
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de sécurité
		header("Location: Deconnexion.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de sécurité
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
			// requête qui récupère les régions
			$typeCompetitions = $manager->getList();
		} else if(isset($_GET['categorie'])) {
			$id = htmlentities(intval($_GET['categorie']));
			// requête qui récupère les départements selon la région
			$typeCompetitions = $manager->trouverTypeCompetitionParCategorie($id);

		}

		foreach ($typeCompetitions as $typeCompetition) {
			$json[$typeCompetition->getId()][] = utf8_encode($typeCompetition->getLibelle());
		}

		// envoi du résultat au success
		echo json_encode($json);
	}

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>

<?php

?>