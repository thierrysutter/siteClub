<script>
$(document).ready( function () {
	$("#user").click(function(){
		$.ajax({ // fonction permettant de faire de l'ajax
		   type: "POST", // methode de transmission des données au fichier php
		   url: "Deconnexion.php", // url du fichier php
		   success: function(msg){ // si l'appel a bien fonctionné
				document.location = "ActionAccueil.php";
		   }
		});
		return false; // permet de rester sur la même page à la soumission du formulaire
	});
});
</script>

 

<?php
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$logger = new Logger('logs/');

ob_start();

// récupération des éléments du menu en base
require_once("config/config.php");

$listeMenu = array();
try {
	// connexion avec la base de données
	$connexionBdd = new Connexion($db_host, $db_login, $db_password, $db_name);

	$manager = new ManagerMenu($connexionBdd->getPDO());
	
	$listeMenu = $manager->getList();

} catch (PDOException $error) { //Le catch est chargé d’intercepter une éventuelle erreur
	echo "N° : ".$error->getCode()."<br />";
	die ("Erreur : ".$error->getMessage()."<br />");
}

if (!empty($listeMenu)) {
?>

<nav class="navbar navbar-expand-md fixed-top w-75 mx-auto navbar-dark bg-dark">
    <div class="container-fluid">
      
      <a class="navbar-brand" href="ActionAccueil.php"><img alt="" src="images/ASSJLMBLANC.png" style="width: 50px; height: 50px; padding: 4px;"/></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto w-100">
          
        <?php foreach($listeMenu as $menu) { 
        	if ($menu->getLibelle() != "ACCUEIL") {
        	?>
		  <li class="nav-item text-capitalize"><a class="nav-link" href="<?php echo $menu->getURL();?>"><?php echo $menu->getLibelle();?></a></li>
	  	<?php } } ?>
        
        <?php
		session_start(); 
		$user = null;
		if (isset($_SESSION['session_started'])) {
			if (isset($_SESSION['user'])) {
				$user = $_SESSION['user'];
			}
		}
		if (isset($user) && $user != null) {
		?>
		<li class="nav-item"><a class="nav-link" href="ActionProfil.php">Espace membre <?php echo $user->getNom()." ".$user->getPrenom();?></a></li>
		<!-- <li id="user"><a href="#"><img id="user" src="images/exit16.png" alt="Deconnexion" title="Deconnexion" style="vertical-align: middle;"/></a></li>  -->

        </ul>
		<?php } else {?>
		<!-- <li><a href="administration.php">Connexion</a></li> -->

        </ul>
        <form class="form-inline m-0 w-50" action="ActionLogin.php" method="post">
          <input class="form-control mr-sm-2 form-control-sm col-xl-3 col-lg-3 col-md-6 col-sm-9 col-xs-12" type="text" placeholder="Login" id="login" name="login" required>
          <input class="form-control mr-sm-2 form-control-sm col-xl-3 col-lg-3 col-md-6 col-sm-9 col-xs-12" type="password" placeholder="Password" id="password" name="password" required>
          <button class="btn btn-sm btn-success btn-sm col-xl-3 col-lg-3 col-md-6 col-sm-9 col-xs-12" type="submit">Connexion</button>
        </form>
        <?php } ?>
      </div>
      <!-- <div><img alt="" src="images/ASSJLMBLANC.png" style="width: 50px; height: 50px; padding: 4px;"/></div> -->
    </div>
</nav>


<?php } ?>

