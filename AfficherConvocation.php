<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entr�e dans AfficherConvocation.php", Logger::GRAN_MONTH);

ob_start();
session_start();
require_once("config/config.php");

try {
	$idRencontre = $_GET['rencontre'];

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	// recherche la rencontre
	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	$rencontre = $managerRencontre->get($idRencontre);
	
	// recherche les joueurs convoqu�s pour le match choisi
	$managerConvocation = new ManagerConvocation($connexionBdd->getPDO());
	$listeJoueursConvoques = $managerConvocation->trouverListeJoueursComplet($idRencontre);

	$convocation = new BoConvocation(array());
	$convocation->setRencontre($rencontre);
	if ($listeJoueursConvoques != null && count($listeJoueursConvoques)>0) {
		foreach($listeJoueursConvoques as $joueur) {
			$convocation->ajouterJoueur($joueur);
		}
	}

	$_SESSION['convocation'] = $convocation;
	header("Location: convocation.php");

} catch (PDOException $error) { // Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

ob_end_flush();
?>