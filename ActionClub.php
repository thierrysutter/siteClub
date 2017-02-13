<?php

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans ActionClub.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");

try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$managerPalmares = new ManagerPalmares($connexionBdd->getPDO());
	$listePalmares = $managerPalmares->getList();
	$_SESSION['listePalmares']=$listePalmares;
	
	$managerReglement = new ManagerReglement($connexionBdd->getPDO());
	$listeReglements = $managerReglement->getList();
	$_SESSION['listeReglements']=$listeReglements;
	
	header("Location: club.php");

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

?>