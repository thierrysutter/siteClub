<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionMembre.php", Logger::GRAN_MONTH);

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
	
	unset($_SESSION['listeJoueurs']);
	unset($_SESSION['listeStaffs']);
	
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$categorie = -1;
	$fonction = -1;
	$poste = -1;
	$nom = "";
	
	if (isset($_POST['methode']) || isset($_GET['methode'])) {
		$categorie = isset($_POST['filtreCategorie']) ? $_POST['filtreCategorie'] : (isset($_GET['filtreCategorie']) ? $_GET['filtreCategorie'] : -1);
		$nom = isset($_POST['filtreNom']) ? $_POST['filtreNom'] : (isset($_GET['filtreNom']) ? $_GET['filtreNom'] : "");
		$fonction = isset($_POST['filtreFonction']) ? $_POST['filtreFonction'] : (isset($_GET['filtreFonction']) ? $_GET['filtreFonction'] : -1);
		$poste = isset($_POST['filtrePoste']) ? $_POST['filtrePoste'] : (isset($_GET['filtrePoste']) ? $_GET['filtrePoste'] : -1);
	} else {
		unset($_SESSION['filtreCategorie']);
		unset($_SESSION['filtreNom']);
		unset($_SESSION['filtreFonction']);
		unset($_SESSION['filtrePoste']);
	}

	if ($fonction == -1 || $fonction == 12) {
		$managerJoueur = new ManagerJoueur($connexionBdd->getPDO());
		$joueurs = $managerJoueur->getList($categorie, $poste, $nom);
		$_SESSION['listeJoueurs'] = $joueurs;
	}
	
	if ($fonction <> 12) {
		$managerStaff = new ManagerStaff($connexionBdd->getPDO());
		$staffs = $managerStaff->getList($categorie, $fonction, $nom);
		$_SESSION['listeStaffs'] = $staffs;
	}
	
	$_SESSION['filtreCategorie'] = $categorie;
	$_SESSION['filtreNom'] = $nom;
	$_SESSION['filtreFonction'] = $fonction;
	$_SESSION['filtrePoste'] = $poste;

	header("Location: listeMembres.php");

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>