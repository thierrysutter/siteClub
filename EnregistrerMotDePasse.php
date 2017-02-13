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
	}
}  else {
  // redirection vers la page d'accueil avec deconnexion pour + de s�curit�
	header("Location: ActionAccueil.php");
}

require_once("config/config.php");

// connexion avec la base de donn�es
try {
	// Variables
	$messageOK = '';
	$messageKO = '';
	
	if(!empty($_POST)) {
		$login = $_POST['login'];
			
		if (isset($_POST['ancienMdp']) && isset($_POST['nouveauMdp']) && isset($_POST['confirmMdp'])) {
			$ancienMotDePasse = $_POST['ancienMdp'];
			$nouveauMotDePasse = $_POST['nouveauMdp'];
			$confirmMotDePasse = $_POST['confirmMdp'];
			
			if ($ancienMotDePasse != $nouveauMotDePasse && $nouveauMotDePasse == $confirmMotDePasse) {
				// si le nouveau mot de passe est diff�rent de l'ancien et que le nouveau mot de passe a bien �t� confirm� par l'utilisateur
				$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
				$managerUtilisateur = new ManagerUtilisateur($connexionBdd->getPDO());
				
				$ancienMotDePasse = hash('sha256', $_POST['ancienMdp']);
				$nouveauMotDePasse = hash('sha256', $_POST['nouveauMdp']);
				
				if ($managerUtilisateur->exists($login, $ancienMotDePasse)) {
					
					$managerUtilisateur->updatePassword($login, $nouveauMotDePasse);
					
					// mise � jour de l'objet Utilisateur en session
					$_SESSION['user'] = $managerUtilisateur->get($login);
					
					echo "<span id=\"message\" style=\"color: green; font-weight: bold; text-align: center;\">Mise a jour du mot de passe effectu&eacute;e</span>";
				} else {
					echo "<span id=\"message\" style=\"color: red; font-weight: bold; text-align: center;\">Utilisateur inconnu</span>";
				}
			} else {
				echo "<span id=\"message\" style=\"color: red; font-weight: bold; text-align: center;\">Erreur lors de la saisie du mot de passe</span>";
			}
		} else {
			echo "<span id=\"message\" style=\"color: red; font-weight: bold; text-align: center;\">Erreur lors de la saisie du mot de passe</span>";
		}
	}

	//header("Location: profil.php");

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>