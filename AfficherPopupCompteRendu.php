<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');
$logger->log('info', 'infos', "Entrée dans AfficherPopupCompteRendu.php", Logger::GRAN_MONTH);

ob_start();
session_start();

require_once("config/config.php");

try {
	$idRencontre = $_POST['id'];

	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
	$manager = new ManagerCompteRendu($connexionBdd->getPDO());
	$compteRendu = $manager->trouverParRencontre($idRencontre);

	$managerRencontre = new ManagerRencontre($connexionBdd->getPDO());
	$rencontre = $managerRencontre->get($idRencontre);
	$titre = "".$rencontre->getEquipeDom()." - ".$rencontre->getEquipeExt()." (".date_format(new DateTime($rencontre->getJour()), 'd/m/Y')." - ".$rencontre->getLibelleCompetition().")";

	$reponse = array('id' => $idRencontre,  'titre' =>  ($titre), /*'photo' => $compteRendu->getPhoto(),*/ 'texte' => ($compteRendu!=null ? $compteRendu->getTexte() : ""));
	echo json_encode($reponse);
} catch (PDOException $error) { // Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>