<?php

function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionAgenda.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");

try {

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

    if (isset($_SESSION['listeCategories'])) {
        $listeCategories = $_SESSION['listeCategories'];
    } else {
        $managerCategorie = new ManagerCategorie($connexionBdd->getPDO());
        $_SESSION['listeCategories'] = $managerCategorie->getList();
    }
	
	$categorie = -1;
	$equipe = -1;
	$debut = "";
	$fin = "";
	$lieu = "";
	if (isset($_POST['methode'])) {
		if (isset($_POST['debut']) && $_POST['debut'] != "") {
			$debut = $_POST['debut'];
		} else {
			$debut = trouver_date(date('W'), date('Y'), 1);
		}
		list($jour,$mois,$annee) = explode("/",substr($debut,0,10));
		$debut = $annee."-".$mois."-".$jour;
		
		if (isset($_POST['fin']) && $_POST['fin'] != "") {
			$fin = $_POST['fin'];
		} else {
			$fin = trouver_date(date('W'), date('Y'), 7);
		}
		list($jour,$mois,$annee) = explode("/",substr($fin,0,10));
		$fin = $annee."-".$mois."-".$jour;
		
		$categorie = $_POST['categorie'];
		$equipe = $_POST['equipe'];
		$lieu = $_POST[lieu];
	} else {
		$debut = trouver_date(date('W'), date('Y'), 1);
		list($jour,$mois,$annee) = explode("/",substr($debut,0,10));
		$debut = $annee."-".$mois."-".$jour;
		$fin = trouver_date(date('W'), date('Y'), 7);
		list($jour,$mois,$annee) = explode("/",substr($fin,0,10));
		$fin = $annee."-".$mois."-".$jour;
	}
	
	/*list($jour,$mois,$annee) = explode("/",substr($debut,0,10));
	$debut = $annee."-".$mois."-".$jour;*/
	
	/*list($jour,$mois,$annee) = explode("/",substr($fin,0,10));
	$fin = $annee."-".$mois."-".$jour;*/
	
	// liste des équipes
	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	
	$listeEquipes = null;
	$listeRencontres = null;
	
	echo "catégorie = ".$categorie."<br><br>";
	echo "équipe = ".$equipe."<br><br>";
	echo "début = ".$debut."<br><br>";
	echo "fin = ".$fin."<br><br>";
	
	if ($categorie > 0) {
		if ($equipe > 0) {
			$listeRencontres = $managerRencontre->trouverRencontres($debut, $fin, $categorie, $equipe, $lieu);
		} else {
			$listeRencontres = $managerRencontre->trouverRencontres($debut, $fin, $categorie, $equipe, $lieu);
		}
		
		$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);
	} else {
		$listeRencontres = $managerRencontre->trouverRencontres($debut, $fin, $categorie, $equipe, $lieu);
		$listeEquipes = $managerEquipe->getList();
	}
	
	list($annee,$mois,$jour) = explode("-",substr($debut,0,10));
	$debut = $jour."/".$mois."/".$annee;

	list($annee,$mois,$jour) = explode("-",substr($fin,0,10));
	$fin = $jour."/".$mois."/".$annee;
		
	$_SESSION['debut'] = $debut;
	$_SESSION['fin'] = $fin;
	$_SESSION['categorieSelectionnee'] = $categorie;
	$_SESSION['equipeSelectionnee'] = $equipe;
	$_SESSION['lieuSelectionne'] = $lieu;
	
	$_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeRencontres']=$listeRencontres;

	header("Location: agenda.php");
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}



function trouver_date($sem, $annee, $j)
{
	$jour_dans_le_mois = array();
	$mois = 1;
	$jour = 0;

	for($a=1;$a<=365+date('L');$a++)
	{
	for($i=1;$i<=12;$i++)
	{
	$jour += date('t', mktime(0, 0, 0, $i, 1, date('Y')));
	$jour_dans_le_mois[$i] = $jour;
	}

	$today = mktime(0, 0, 0, $mois, $a, date('Y'));
	$semaine = date('W', $today);
	$day = date('N', $today);
	$date = date('d/m/Y', $today);
	if(in_array($a, $jour_dans_le_mois)) $mois++;

	if($semaine == $sem && $day == $j)
		return $date;
	}
}

ob_end_flush();
?>