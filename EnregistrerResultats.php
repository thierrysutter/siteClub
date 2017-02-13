<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
ob_start();
session_start();
$listeProchainesRencontres = array();
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

// connexion avec la base de données
try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());

	if (isset($_SESSION['listeProchainesRencontres'])) {
		$listeProchainesRencontres = $_SESSION['listeProchainesRencontres'];
	}

	foreach($listeProchainesRencontres as $prochain) {
		$idRencontre = $prochain->getId();
		$scoreDom = $_POST["scoreDom_$idRencontre"];
		$scoreExt = $_POST["scoreExt_$idRencontre"];

		if (isset($scoreDom) && isset($scoreExt) && $scoreDom!=null && $scoreExt != null) {
		// mise à jour du résultat en base
			$managerRencontre->updateResultatRencontre($idRencontre, $scoreDom, $scoreExt, $user->getLogin());
		}
	}

	header("Location: ActionResultat.php");

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>