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
	// Constantes
	define('TARGET', 'images/photo/'); // Repertoire cible
	define('MAX_SIZE', 100000); // Taille max en octets du fichier
	define('WIDTH_MAX', 800); // Largeur max de l'image en pixels
	define('HEIGHT_MAX', 800); // Hauteur max de l'image en pixels
	// Tableaux de donnees
	$tabExt = array('jpg','gif','png','jpeg'); // Extensions autorisees
	$infosImg = array();

	// Variables
	$extension = '';
	$messageOK = '';
	$messageKO = '';
	$nomImage = '';
	$upload = False;

	/************************************************************
	 * Creation du repertoire cible si inexistant
	 *************************************************************/
	if( !is_dir(TARGET) ) {
		if( !mkdir(TARGET, 0755) ) {
			exit('Erreur : le r�pertoire cible ne peut-�tre cr�� ! V�rifiez que vous diposiez des droits suffisants pour le faire ou cr�ez le manuellement !');
		}
	}
	
	
	if(!empty($_POST)) {
		$_SESSION['messageKO']="";
		$_SESSION['messageOK']="";
		unset($_SESSION['messageKO']);
		unset($_SESSION['messageOK']);
		echo $_POST['login'];
		$login = $_POST['login'];
		$email = $_POST['email'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$dateNaissance = $_POST['dateNaissance'];
		if ($dateNaissance!=null && $dateNaissance!="") {
			list($jour,$mois,$annee) = explode("/",substr($dateNaissance,0,10));
			$dateNaissance = $annee."-".$mois."-".$jour;
		}
		$adresse = $_POST['adresse'];
		$codePostal = $_POST['codePostal'];
		$ville = $_POST['ville'];
		$telFixe = $_POST['telFixe'];
		$telPortable = $_POST['telPortable'];
		$superAdmin = "";
		//$superAdmin = $_POST['superAdmin'];
		
		
		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
		$managerUtilisateur = new ManagerUtilisateur($connexionBdd->getPDO());

		//$ancienLogin = $_POST['ancienLogin'];
		$managerUtilisateur->majUtilisateur($login, $email, $nom, $prenom, $dateNaissance, $adresse, $codePostal, $ville, $telFixe, $telPortable, $superAdmin, $ancienLogin);
		
		// mise � jour de l'objet Utilisateur en session
		$_SESSION['user'] = $managerUtilisateur->get($login);
		$_SESSION['messageOK'] = "<span id=\"message\" style=\"color: green; font-weight: bold; text-align: center;\">Donn&eacute;es sauvegard&eacute;es</span>";
		
		
		echo "<span id=\"message\" style=\"color: green; font-weight: bold; text-align: center;\">Donn&eacute;es sauvegard&eacute;es</span>";
	}

	header("Location: profil.php");

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>