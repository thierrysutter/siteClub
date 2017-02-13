<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
ob_start();
session_start();
$user = null;
if (isset($_SESSION['session_started'])) {
	// une session est ouverte, on r�cup�re le login de l'utilisateur connect�
	if (isset($_SESSION['user'])) {
		$user = $_SESSION['user'];
	} else {
		// redirection vers la page d'accueil avec deconnexion pour + de s�curit�
		header("Location: Deconnexion.php");
	}
} else {
  // redirection vers la page d'accueil avec deconnexion pour + de s�curit�
  header("Location: Deconnexion.php");
}

require_once("config/config.php");

// connexion avec la base de donn�es
try {

	if(!empty($_POST)) {
		$methode = $_POST['methode'];
		$categorie = $_POST['categorie'];
		$equipe = $_POST['equipe'];
		$jour = $_POST['jour'];
		$lieu = $_POST['lieu'];
		$idCompetition = $_POST['competition'];
		$adversaire = $_POST['adversaire'];

		$equipeDom = "";
		$equipeExt = "";
		if ($lieu == "domicile") {
			$equipeDom = "ST JULIEN";
			$equipeExt = $adversaire;
		} else {
			$equipeDom = $adversaire;
			$equipeExt = "ST JULIEN";
		}

		if ($jour!=null && $jour!="") {
			list($jourr,$mois,$annee) = explode("/",substr($jour,0,10));
			$jour = $annee."-".$mois."-".$jourr;
		}


		/*
		echo "methode= ".$methode."<br>";
		echo "categorie= ".$categorie."<br>";
		echo "equipe= ".$equipe."<br>";
		echo "jour= ".$jour."<br>";
		echo "lieu= ".$lieu."<br>";
		echo "competition= ".$idCompetition."<br>";
		echo "adversaire= ".$adversaire."<br>";
		*/

		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

		// recherche de la comp�tition en fonction de la cat�gorie et du type de match
		$managerCompetition = new ManagerCompetition($connexionBdd->getPDO());
		$competition = $managerCompetition->trouverCompetitionParCategorieEtEquipe($categorie, $equipe, $idCompetition);

		$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());

		echo "competition= ".$competition->getId()."<br>";


		if ($methode == "create") {
			$managerRencontre->ajouterRencontre($competition->getId(), $jour, $equipeDom, $equipeExt, '', $user->getLogin());
		} else {
			$idRencontre = $_POST['id'];
			echo $idrencontre;
			$managerRencontre->majRencontre($idRencontre, $competition->getId(), $jour, $equipeDom, $equipeExt, '', $user->getLogin());
		}
	}


	header("Location: ActionRencontre.php");

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>