<?php 

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans ActionAccueil.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

$listeArticles = array();
$listeDernier = array();
$listeProchain = array();
try {
	
	/*if (isset($_SESSION['listeArticles'])) {
		$listeArticles = $_SESSION['listeArticles'];
	}
	if (isset($_SESSION['listeDernier'])) {
		$listeDernier = $_SESSION['listeDernier'];
	}
	if (isset($_SESSION['listeProchain'])) {
		$listeProchain = $_SESSION['listeProchain'];
	}*/

// 	if (empty($listeArticles) || empty($listeDernier) || empty($listeProchain)) {
		// connexion avec la base de donn�es
		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
		
		// recherche les articles visibles
		$manager = new ManagerArticle($connexionBdd->getPDO());
		
		$listeArticles = $manager->getList();
	
		// recherche derniers r�sultats des �quipes
		$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
		$listeDernier = $managerRencontre->getDernier(-1);
	
		// recherche prochains matchs des �quipes
		$listeProchain = $managerRencontre->getProchain(-1);
// 	}
	$_SESSION['listeArticles']=$listeArticles;
	$_SESSION['listeDernier']=$listeDernier;
	$_SESSION['listeProchain']=$listeProchain;

	header("Location: accueil.php");

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>