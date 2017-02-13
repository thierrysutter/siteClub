<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
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

// connexion avec la base de données
try {

	if(!empty($_POST)) {
		$methode = $_POST['methode'];

		$saison = $_POST['saison'];
		$libelle = $_POST['libelle'];
		$categorie = $_POST['categorie'];
		$equipe = $_POST['equipe'];
		$typeCompetition = $_POST['typeCompetition'];
		$division = $_POST['division'];
		$actif= 1;
		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
		$managerCompetition = new ManagerCompetition($connexionBdd->getPDO());
/*
		echo "libelle= ".$libelle."<br>";
		echo "type comp= ".$typeCompetition."<br>";
		echo "categorie= ".$categorie."<br>";
		echo "division= ".$division."<br>";
		echo "saison= ".$saison."<br>";
		echo "equipe= ".$equipe."<br>";
		echo "actif= ".$actif."<br>";
*/
		if ($methode == "create") {
			$managerCompetition->ajouterCompetition($libelle, $typeCompetition, $categorie, $division, $saison, $equipe, $actif, $user->getLogin());
		} else {
			$idCompetition = $_POST['id'];
			$managerCompetition->majCompetition($idCompetition, $libelle, $typeCompetition, $categorie, $division, $saison, $equipe, $actif, $user->getLogin());
		}
	}


	header("Location: ActionCompetition.php");

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>