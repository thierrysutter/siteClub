<script>
$(document).ready( function () {
	$("#user").click(function(){
		$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des donn�es au fichier php
		   url: "Deconnexion.php", // url du fichier php
		   success: function(msg){ // si l'appel a bien fonctionn�
				document.location = "ActionAccueil.php";
		   }
		});
		return false; // permet de rester sur la m�me page � la soumission du formulaire
	});
});
</script>

 

<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');

ob_start();

// r�cup�ration des �l�ments du menu en base
require_once("config/config.php");

$listeMenu = array();
try {
	// connexion avec la base de donn�es
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$manager = new ManagerMenu($connexionBdd->getPDO());
	
	$listeMenu = $manager->getList();

} catch (PDOException $error) { //Le catch est charg� d�intercepter une �ventuelle erreur
	echo "N� : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

if (!empty($listeMenu)) { ?>
<div id="navigation">
	<div class="menu">
		
		<div class="cl">&nbsp;</div>
		<ul>
			
			<?php foreach($listeMenu as $menu) { ?>
			<li><a href="<?php echo $menu->getURL();?>"><?php echo $menu->getLibelle();?></a></li>
			<?php } ?>
			
			<?php
			session_start(); 
			$user = null;
			if (isset($_SESSION['session_started'])) {
				if (isset($_SESSION['user'])) {
					$user = $_SESSION['user'];
				}
			}
			
			if (isset($user) && $user != null) {?>
			<li ><a href="ActionProfil.php">Espace membre<br><?php echo $user->getNom()." ".$user->getPrenom();?></a></li>
			<li id="user"><a href="#"><img id="user" src="images/exit16.png" alt="Deconnexion" title="Deconnexion" style="vertical-align: middle;"/></a></li>
			<?php } else {?>
			<li><a href="administration.php">Connexion</a></li>
			<?php } ?>
		</ul>
		<div class="cl">&nbsp;</div>
	</div>
</div>
<?php } ?>

