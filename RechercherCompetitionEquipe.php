<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans RechercherCompetitionEquipe.php", Logger::GRAN_MONTH);

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
	$manager = new ManagerCompetition($connexionBdd->getPDO());

	if(isset($_GET['go']) || (isset($_GET['categorie']) && isset($_GET['equipe']))) {

		$competitions = array();
		$result = array();

		if(isset($_GET['categorie']) && isset($_GET['equipe'])) {
			$categorie = htmlentities(intval($_GET['categorie']));
			$equipe = htmlentities(intval($_GET['equipe']));

			// requête qui récupère les départements selon la région
			$competitions = $manager->trouverListeCompetitionParCategorieEtEquipe($categorie, $equipe);

		}
		if ($competitions != null && isset($competitions) && count($competitions)>0) {
			foreach ($competitions as $competition) {
				$result[$competition->getId()][] = utf8_encode($competition->getLibelle());
	 		}
	 	}

	 	// envoi du résultat au success
	 	echo json_encode($result);
	}

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>

<?php

?>