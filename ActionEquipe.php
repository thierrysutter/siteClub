<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionEquipe.php", Logger::GRAN_MONTH);

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
	
	$categorie = -1;
	if (isset($_POST['methode'])) {
		$categorie = $_POST['categorie'];
	}
	
	$manager = new ManagerEquipe($connexionBdd->getPDO());
	
	$equipes = null;
	
	if ($categorie > 0) {
		$equipes = $manager->trouverEquipesParCategorie($categorie);
		
	} else {
		$equipes = $manager->getList();
	}
	$_SESSION['categorieSelectionnee'] = $categorie;
	$_SESSION['listeEquipes'] = $equipes;
	
	
	
	header("Location: listeEquipes.php");
	
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>