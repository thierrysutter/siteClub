<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionProfil.php", Logger::GRAN_MONTH);

ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on récupère l'utilisateur connecté
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	}
}  else {
  // redirection vers la page d'accueil avec deconnexion pour + de sécurité
  header("Location: ActionAccueil.php");
}
require_once("config/config.php");

try {
	$_SESSION['messageKO']="";
	$_SESSION['messageOK']="";
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);
	header("Location: changementMotDePasse.php");
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>