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
		header("Location: ActionAccueil.php");
	}
}  else {
  // redirection vers la page d'accueil avec deconnexion pour + de sécurité
	header("Location: ActionAccueil.php");
}

require_once("config/config.php");

// connexion avec la base de données
try {
	unset($_SESSION['messageKO']);
	unset($_SESSION['messageOK']);

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
	$message = '';
	$nomImage = '';
	$upload = False;

	/************************************************************
	 * Creation du repertoire cible si inexistant
	 *************************************************************/
	if( !is_dir(TARGET) ) {
		if( !mkdir(TARGET, 0755) ) {
			exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
		}
	}

	$methode = "";

	if(!empty($_POST)) {
		$methode = $_POST['methode'];

		// récupération des filtres
		$filtreCategorie = $_POST['filtreCategorie'];
		$filtreNom = $_POST['filtreNom'];
		$filtreFonction = $_POST['filtreFonction'];
		$filtrePoste = $_POST['filtrePoste'];

		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$dateNaissance = $_POST['dateNaissance'];
		if ($dateNaissance!=null && $dateNaissance!="") {
			list($jour,$mois,$annee) = explode("/",substr($dateNaissance,0,10));
			$dateNaissance = $annee."-".$mois."-".$jour;
		}
		$email = $_POST['email'];
		$categorie = $_POST['categorie'];
		$fonction = $_POST['fonction'];
		$poste = $_POST['poste'];
		$numeroLicence = $_POST['numLicence'];
		$taille = $_POST['taille'];
		$poids = $_POST['poids'];
		$meilleurPied = $_POST['meilleurPied'];

		$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);
		$managerJoueur = new ManagerJoueur($connexionBdd->getPDO());
		$managerStaff = new ManagerStaff($connexionBdd->getPDO());

		/************************************************************
		 * Script d'upload
		 *************************************************************/
		$photo = $_FILES['photo']['name'];

		// On verifie si le champ est rempli
		if( !empty($_FILES['photo']['name']) ) {

			// Recuperation de l'extension du fichier
			$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

			// On verifie l'extension du fichier
			if(in_array(strtolower($extension),$tabExt)) {

				// On recupere les dimensions du fichier
				$infosImg = getimagesize($_FILES['photo']['tmp_name']);
				// On verifie le type de l'image
				if($infosImg[2] >= 1 && $infosImg[2] <= 14) {
					// On verifie les dimensions et taille de l'image
					//if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['photo']['tmp_name']) <= MAX_SIZE)) {

					// Parcours du tableau d'erreurs
					if(isset($_FILES['photo']['error']) && UPLOAD_ERR_OK === $_FILES['photo']['error']) {
						// On renomme le fichier
						//$nomImage = md5(uniqid()) .'.'. $extension;
						// Si c'est OK, on teste l'upload

						if (!file_exists(TARGET.$_FILES['photo']['name'])) {

							if(move_uploaded_file($_FILES['photo']['tmp_name'], TARGET.$_FILES['photo']['name'])) {
								$message = 'Upload réussi !';
								$upload = True;
							} else {
								// Sinon on affiche une erreur systeme
								$message = 'Problème lors de l\'upload !';
							}
						}
					}
					else {
						$message = 'Une erreur interne a empêché l\'uplaod de l\'image';
					}
				}
				else
				{
					// Sinon erreur sur le type de l'image
					$message = 'Le fichier à uploader n\'est pas une image !';
				}
			}
			else {
				// Sinon on affiche une erreur pour l'extension
				$message = 'L\'extension du fichier est incorrecte !';
			}
		}
		if ($methode == "create") {
			//création de l'utilisateur en base
			if ($fonction == 12) {
				echo "coucou"."<br>";
				$managerJoueur->ajouterJoueur($nom, $prenom, $dateNaissance, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $email, ($_FILES['photo']['name'] != "" ? TARGET.$_FILES['photo']['name'] : ""), $user->getLogin());
			} else {
				echo "salut"."<br>";
				$managerStaff->ajouterStaff($nom, $prenom, $dateNaissance, $fonction, $categorie, $numeroLicence, $email, ($_FILES['photo']['name'] != "" ? TARGET.$_FILES['photo']['name'] : ""), $user->getLogin());
			}

		} else {
			$id = $_POST['id'];
			if ($fonction == 12) {
				//echo "maj joueur<br>";
				$managerJoueur->majJoueur($id, $nom, $prenom, $dateNaissance, $categorie, $poste, $taille, $poids, $meilleurPied, $numeroLicence, $email, ($_FILES['photo']['name'] != "" ? TARGET.$_FILES['photo']['name'] : ""), $user->getLogin());
			} else {
				//echo "maj staff<br>";
				$managerStaff->majStaff($id, $nom, $prenom, $dateNaissance, $fonction, $categorie, $numeroLicence, $email, ($_FILES['photo']['name'] != "" ? TARGET.$_FILES['photo']['name'] : ""), $user->getLogin());
			}
		}
	}

	header("Location: ActionMembre.php?methode=".$methode."&filtreCategorie=".$filtreCategorie."&filtreFonction=".$filtreFonction."&filtrePoste=".$filtrePoste."&filtreNom=".$filtreNom);

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}
ob_end_flush();
?>