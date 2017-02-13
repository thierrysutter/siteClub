<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
ob_start();
session_start();
$listeProchainesRencontres = array();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on r�cup�re le login de l'utilisateur connect�
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de s�curit�
		header("Location: ActionAccueil.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de s�curit�
  header("Location: ActionAccueil.php");
}

require_once("config/config.php");

// connexion avec la base de donn�es
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
		// mise � jour du r�sultat en base
			$managerRencontre->updateResultatRencontre($idRencontre, $scoreDom, $scoreExt, $user->getLogin());
		}
	}

	header("Location: ActionResultat.php");

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>