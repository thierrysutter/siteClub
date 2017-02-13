<?php

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionEvenement.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");
$listeEvenements = array();
try {
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$manager = new ManagerEvenement($connexionBdd->getPDO());
	$listeEvenements = $manager->getList();
	$_SESSION['listeEvenements']=$listeEvenements;
	
	header("Location: evenements.php");

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

?>