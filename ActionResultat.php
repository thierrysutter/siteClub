<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans GestionResultats.php", Logger::GRAN_MONTH);
ob_start();
session_start();
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
	unset($_SESSION['filtreCategorie']);
	
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	// liste des cat�gories
	/*$managerCategorie = new ManagerCategorie($connexionBdd->getPDO());
	$listeCategories = $managerCategorie->getList();
	$_SESSION['listeCategories'] = $listeCategories;
	*/
	$categorie = $user->getCategorie();
	
	
	if (isset($_POST['methode'])) {
		$categorie = $_POST['categorie'];
	}
	
	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	/*if ($categorie != -1)
		$listeProchain = $managerRencontre->getProchainParCategorie($categorie);
	else */
		$listeProchain = $managerRencontre->getProchain($categorie);

	$_SESSION['filtreCategorie'] = $categorie;
	$_SESSION['listeProchainesRencontres'] = $listeProchain;

	header("Location: listeResultats.php");

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>