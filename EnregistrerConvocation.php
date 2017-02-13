<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
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

// connexion avec la base de données
try {
	
	if(!empty($_POST)) {
		$methode = $_POST['methode'];
		$finSaisie = $_POST['finSaisie'];
		
		$categorie = $_POST['categorie'];	// pour redirection en cas de success
		$jour = $_POST['debut'];			// pour redirection en cas de success
		$lieu = $_POST['fin'];				// pour redirection en cas de success
		
		$idRencontre = $_POST['rencontre'];
		$heureRDV = $_POST['heureRDV'];
		$lieuRDV = $_POST['lieuRDV'];
		$commentaireRDV = $_POST['commentaireRDV'];
		
		//$listeJoueurs = array();
		$listeJoueurs = $_POST['nomJoueur'];
		
		// supprime les valeurs NULL ou '' du tableau
		//$listeJoueurs = array_filter($listeJoueurs, function($var){
		//	return (!($var == '' || is_null($var)));
		//});
		
		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
		
		// recherche de la compétition en fonction de la catégorie et du type de match
		$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
		$managerConvocation = new ManagerConvocation($connexionBdd->getPDO());
		
		$managerRencontre->updateRDV($idRencontre, $heureRDV, $lieuRDV, $commentaireRDV, $user->getLogin());
		$managerConvocation->supprimerConvocation($idRencontre);
		if (!empty($listeJoueurs))
			$managerConvocation->ajouterConvocation($idRencontre, $listeJoueurs, $user->getLogin());
		
	}

	if ($finSaisie == 0) {
		$url = "ActionConvocation.php?rencontre=$idRencontre";
	} else {
		$url = "ActionRencontre.php";
	}
	
	header("Location: $url");

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>