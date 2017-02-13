<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionRencontre.php", Logger::GRAN_MONTH);

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
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	
	$managerEquipe = new ManagerEquipe($connexionBdd->getPDO());
	$equipes = $managerEquipe->getList();
	$_SESSION['listeEquipes'] = $equipes;
	
	$debut = "";
	$fin = "";
	
	$debut = trouver_date(date('W'), date('Y'), 1);
	$fin = trouver_date(date('W'), date('Y'), 7);
	
	$categorie = -1;
    $equipe = -1;
	if (isset($_POST['methode'])) {
		$categorie = $_POST['categorie'];
        $equipe = $_POST['equipe'];
		$debut = $_POST['debut'];
		$fin = $_POST['fin'];
	}
	
	$_SESSION['debut'] = $debut;
	$_SESSION['fin'] = $fin;
	
	list($jour,$mois,$annee) = explode("/",substr($debut,0,10));
	$debut = $annee."-".$mois."-".$jour;
	
	list($jour,$mois,$annee) = explode("/",substr($fin,0,10));
	$fin = $annee."-".$mois."-".$jour;
	
	$manager = new ManagerRencontre($connexionBdd->getPDO());
	
	$rencontres = null;
	
	
	if ($categorie > 0) {
        if ($equipe > 0) {
            $rencontres = $manager->trouverRencontres($debut, $fin, $categorie, $equipe, '');
        } else {
		  $rencontres = $manager->trouverRencontres($debut, $fin, $categorie, -1, '');
        }
		$listeEquipes = $managerEquipe->trouverEquipesParCategorie($categorie);
	} else {
		$rencontres = $manager->trouverRencontres($debut, $fin, -1, -1, '');
        $listeEquipes = $managerEquipe->getList();
	}
	$_SESSION['categorieSelectionnee'] = $categorie;
    $_SESSION['equipeSelectionnee'] = $equipe;
    $_SESSION['listeEquipes']=$listeEquipes;
	$_SESSION['listeRencontres'] = $rencontres;
	
	header("Location: listeRencontres.php");
	
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