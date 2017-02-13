<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans ActionConvocation.php", Logger::GRAN_MONTH);

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
	$idRencontre = $_GET['rencontre'];

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());

	$rencontre = $managerRencontre->get($idRencontre);
	
	// on recherche tous les joueurs de la catégorie de la rencontre
	$managerJoueur = new ManagerJoueur($connexionBdd->getPDO());
	$listeJoueursCategorie = $managerJoueur->getList($rencontre->getCategorie(), "", "");

	// recherche les joueurs convoqués pour le match choisi
	$managerConvocation = new ManagerConvocation($connexionBdd->getPDO());
	$listeJoueursConvoques = $managerConvocation->trouverListeJoueurs($idRencontre);

	$convocation = new BoConvocation(array());

	$convocation->setRencontre($rencontre);

	if ($listeJoueursConvoques != null && count($listeJoueursConvoques)>0) {
		foreach($listeJoueursConvoques as $joueur) {
			//$convocation->ajouterJoueur($joueur->getNom());
			$convocation->ajouterJoueur($joueur->getId());
		}
	}

	$_SESSION['convocation'] = $convocation;
	$_SESSION['listeJoueursCategorie'] = $listeJoueursCategorie;
	
	header("Location: creationConvocation.php");

} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

ob_end_flush();
?>