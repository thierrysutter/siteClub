<?php

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans ActionJoueurs.php", Logger::GRAN_MONTH);

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

$equipeD = 26; // seniors C
$equipeFem = 28; // seniors C


try {
	// connexion avec la base de donn�es
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);

	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	$listeDernier = $managerRencontre->getDernier($categorie);
	$listeProchain = $managerRencontre->getProchain($categorie);
	
	$managerCompetition = new ManagerCompetition($connexionBdd->getPDO());
	$managerGroupe = new ManagerGroupe($connexionBdd->getPDO());

	$listeDernierA = $managerRencontre->getDernierParEquipe($equipeA);
	$listeProchainA = $managerRencontre->getProchainParEquipe($equipeA);
	$competitionA = $managerCompetition->trouverCompetitionChampionnatParCategorieEtEquipe($categorie, $equipeA, -1);
	$groupeA = $managerGroupe->trouverGroupeParCompetition($competitionA->getId());
	
	$listeDernierB = $managerRencontre->getDernierParEquipe($equipeB);
	$listeProchainB = $managerRencontre->getProchainParEquipe($equipeB);
	$competitionB = $managerCompetition->trouverCompetitionChampionnatParCategorieEtEquipe($categorie, $equipeB, -1);
	$groupeB = $managerGroupe->trouverGroupeParCompetition($competitionB->getId());
	
	$listeDernierC = $managerRencontre->getDernierParEquipe($equipeC);
	$listeProchainC = $managerRencontre->getProchainParEquipe($equipeC);
	$competitionC = $managerCompetition->trouverCompetitionChampionnatParCategorieEtEquipe($categorie, $equipeC, -1);
	$groupeC = $managerGroupe->trouverGroupeParCompetition($competitionC->getId());
	
	$listeDernierD = $managerRencontre->getDernierParEquipe($equipeD);
	$listeProchainD = $managerRencontre->getProchainParEquipe($equipeD);
	$competitionD = $managerCompetition->trouverCompetitionChampionnatParCategorieEtEquipe($categorie, $equipeD, -1);
	$groupeD = $managerGroupe->trouverGroupeParCompetition($competitionD->getId());
	
	$listeDernierFem = $managerRencontre->getDernierParEquipe($equipeFem);
	$listeProchainFem = $managerRencontre->getProchainParEquipe($equipeFem);
	$competitionFem = $managerCompetition->trouverCompetitionChampionnatParCategorieEtEquipe($categorie, $equipeFem, -1);
	$groupeFem = $managerGroupe->trouverGroupeParCompetition($competitionFem->getId());

	$_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeDernier']=$listeDernier;
	$_SESSION['listeProchain']=$listeProchain;
	
	$_SESSION['competitionA']=$competitionA;
	$_SESSION['groupeA']=$groupeA;
	$_SESSION['listeDernierA']=$listeDernierA;
	$_SESSION['listeProchainA']=$listeProchainA;

	$_SESSION['competitionB']=$competitionB;
	$_SESSION['groupeB']=$groupeB;
	$_SESSION['listeDernierB']=$listeDernierB;
	$_SESSION['listeProchainB']=$listeProchainB;
	
	$_SESSION['competitionC']=$competitionC;
	$_SESSION['groupeC']=$groupeC;
	$_SESSION['listeDernierC']=$listeDernierC;
	$_SESSION['listeProchainC']=$listeProchainC;
	
	$_SESSION['competitionD']=$competitionD;
	$_SESSION['groupeD']=$groupeD;
	$_SESSION['listeDernierD']=$listeDernierD;
	$_SESSION['listeProchainD']=$listeProchainD;
	
	$_SESSION['competitionFem']=$competitionFem;
	$_SESSION['groupeFem']=$groupeFem;
	$_SESSION['listeDernierFem']=$listeDernierFem;
	$_SESSION['listeProchainFem']=$listeProchainFem;

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

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>