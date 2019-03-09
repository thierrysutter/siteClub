<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionEcoleDeFoot.php", Logger::GRAN_MONTH);

ob_start();
session_start();
/*$user = null;
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
}*/
require_once("config/config.php");

try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	/*
	$categorie = 1; // u7 par défaut
	if (isset($_POST['categorie'])) {
		$categorie = $_POST['categorie'];
	}
	/*
	$managerCategorie = new ManagerCategorie($connexionBdd->getPDO());
	$cat = $managerCategorie->trouverCategorieParId($categorie);
	
	$managerStaff = new ManagerStaff($connexionBdd->getPDO());
	$listeStaffs = $managerStaff->getList($categorie);
	
	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);
	
	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	$listeDernier =$managerRencontre->getDernier($categorie);
	$listeProchain =$managerRencontre->getProchain($categorie);
	
	$managerJoueur = new ManagerJoueur($connexionBdd->getPDO());
	$listeJoueurs = $managerJoueur->getList($categorie);
	
	$_SESSION['categorie']=$categorie;
	$_SESSION['cat']=$cat;
	$_SESSION['listeStaffs']=$listeStaffs;
	$_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeDernier']=$listeDernier;
	$_SESSION['listeProchain']=$listeProchain;
	$_SESSION['listeJoueurs']=$listeJoueurs;
	*/
	header("Location: ecoledefoot.php");
	
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>