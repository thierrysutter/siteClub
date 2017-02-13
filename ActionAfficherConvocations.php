<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans ActionAfficherConvocations.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");

try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$managerCategorie = new ManagerCategorie($connexionBdd->getPDO());
	$listeCategories = isset($_SESSION['listeCategories']) ? $_SESSION['listeCategories'] : $managerCategorie->getList();
	$_SESSION['listeCategories'] = $listeCategories;
	
	$categorie = -1;
	if (isset($_POST['methode']) && ($_POST['methode']=="filtre" || $_POST['methode']=="retour")) {
		$categorie = $_POST['categorie'];
	}
	
	$_SESSION['categorieSelectionnee'] = $categorie;
	
	// recherche les convocations de la cat�gorie s�lectionn�e
	// si -1 ==> toutes les cat�gories
	$managerConvocation = new ManagerConvocation($connexionBdd->getPDO());
	$listeRencontres = $managerConvocation->trouverConvocationsParCategorie($categorie);
	$listeConvocations = array();
	if (!is_null($listeRencontres) && !empty($listeRencontres)) {
		
		foreach($listeRencontres as $rencontre) {
			
			$convocation = new BoConvocation(array());
			$convocation->setRencontre($rencontre);
			$listeConvocations[] = $convocation;
		}
	}
	
	$_SESSION['listeConvocations'] = $listeConvocations;
	header("Location: listeConvocations.php");
} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

ob_end_flush();
?>