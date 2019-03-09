<?php

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionJoueurs.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");

$listeDernier = array();
$listeProchain = array();
$listeStaffs = array();
$listeGardiens = array();
$listeDefenseurs = array();
$listeMilieux = array();
$listeAttaquants = array();
$listeEquipes = array();
$categorie = 9; // seniors
$equipeA = 1; // seniors A
$equipeB = 2; // seniors B
$equipeC = 19; // seniors C
try {
	// connexion avec la base de données
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);

	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	$listeDernier = $managerRencontre->getDernier($categorie);
	$listeProchain = $managerRencontre->getProchain($categorie);
	
	$listeDernierA = $managerRencontre->getDernierParEquipe($equipeA);
	$listeProchainA = $managerRencontre->getProchainParEquipe($equipeA);
	$listeDernierB = $managerRencontre->getDernierParEquipe($equipeB);
	$listeProchainB = $managerRencontre->getProchainParEquipe($equipeB);
	$listeDernierC = $managerRencontre->getDernierParEquipe($equipeC);
	$listeProchainC = $managerRencontre->getProchainParEquipe($equipeC);

	$_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeDernier']=$listeDernier;
	$_SESSION['listeProchain']=$listeProchain;
	
	$_SESSION['listeDernierA']=$listeDernierA;
	$_SESSION['listeProchainA']=$listeProchainA;
	$_SESSION['listeDernierB']=$listeDernierB;
	$_SESSION['listeProchainB']=$listeProchainB;
	$_SESSION['listeDernierC']=$listeDernierC;
	$_SESSION['listeProchainC']=$listeProchainC;

	/*
	$managerStaff = new ManagerStaff($connexionBdd->getPDO());
	$listeStaffs = $managerStaff->getList($categorie);

	$managerJoueur = new ManagerJoueur($connexionBdd->getPDO());
	$listeGardiens = $managerJoueur->getListGardiens($categorie);
	$listeDefenseurs = $managerJoueur->getListDefenseurs($categorie);
	$listeMilieux = $managerJoueur->getListMilieux($categorie);
	$listeAttaquants = $managerJoueur->getListAttaquants($categorie);

	$_SESSION['listeStaffs']=$listeStaffs;
	$_SESSION['listeGardiens']=$listeGardiens;
	$_SESSION['listeDefenseurs']=$listeDefenseurs;
	$_SESSION['listeMilieux']=$listeMilieux;
	$_SESSION['listeAttaquants']=$listeAttaquants;
*/
	header("Location: joueurs&staffs.php");

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>