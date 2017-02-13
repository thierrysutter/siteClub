<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans RechercherCompteRendu.php", Logger::GRAN_MONTH);

ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on récupère le login de l'utilisateur connecté
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de sécurité
		header("Location: ActionAccueil.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de sécurité
  header("Location: ActionAccueil.php");
}
require_once("config/config.php");

try {
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);
	unset($_SESSION['compteRendu']);
	unset($_SESSION['idRencontre']);
	
	
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$mode = $_GET['mode'];
	$idRencontre = $_GET['id'];
	$manager = new ManagerCompteRendu($connexionBdd->getPDO());
	$compteRendu = $manager->trouverParRencontre($idRencontre);
	$_SESSION['idRencontre'] = $idRencontre;
	
	if ($compteRendu != null) {
		$_SESSION['compteRendu'] = $compteRendu;
		header("Location: modificationCompteRendu.php");
	} else {
		
		header("Location: creationCompteRendu.php");
	}
	
	/*if ($mode == "popup") {
		$reponse = array('texte' => utf8_encode($compteRendu->getTexte()));
		echo json_encode($reponse);
	} else {
		header("Location: modificationCompteRendu.php");
	}*/
	
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>