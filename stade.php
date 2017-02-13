<?php
					$dir_nom = 'images/installation/'; // dossier listé (pour lister le répertoir courant : $dir_nom = '.'  --> ('point')
					$dir = opendir($dir_nom) or die('Erreur de listage : le répertoire n\'existe pas'); // on ouvre le contenu du dossier courant
					$fichier= array(); // on déclare le tableau contenant le nom des fichiers
					$dossier= array(); // on déclare le tableau contenant le nom des dossiers
					
					while($element = readdir($dir)) {
						if($element != '.' && $element != '..') {
							if (!is_dir($dir_nom.'/'.$element)) {
								$fichier[] = $element;
							} else {
								$dossier[] = $element;
							}
						}
					}
					
					closedir($dir);
?>

<link rel="stylesheet" href="css/blueimp-gallery.css">
<script src="js/blueimp-gallery.js"></script>
		
<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById('links').onclick = function (event) {
		    event = event || window.event;
		    var target = event.target || event.srcElement,
		        link = target.src ? target.parentNode : target,
		        options = {index: link, event: event},
		        links = this.getElementsByTagName('a');
		    blueimp.Gallery(links, options);
		};
	});
</script>

<div id="main">
	<div class="shell">
		<div class="cl">&nbsp;</div>
		<div id="sidebar">
			<!-- vide -->
			<?php
/*					if(!empty($dossier)) {
						sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
						//echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
						echo "\t\t<ul>\n";
							foreach($dossier as $lien){
								echo "\t\t\t<li><img src=\"images/tri_plus48.png\" style=\"width:20px;height:20px;vertical-align: middle;margin-right: 4px;\" /><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
							}
						echo "\t\t</ul>";
					}
	*/		?>
			
			Cliquez sur une photo pour agrandir
		</div>

		<div id="content">
			<div class="cl">&nbsp;</div>
			<!-- The Gallery as lightbox dialog, should be a child element of the document body -->
			<div id="blueimp-gallery" class="blueimp-gallery">
			    <div class="slides"></div>
			    <h3 class="title"></h3>
			    <a class="prev">‹</a>
			    <a class="next">›</a>
			    <a class="close">×</a>
			    <a class="play-pause"></a>
			    <ol class="indicator"></ol>
			</div>
			
			<div id="links">
				<!-- parcourir le répertoire images/installation -->
				<?php
			/*		if(!empty($dossier)) {
						sort($dossier); // pour le tri croissant, rsort() pour le tri décroissant
						//echo "Liste des dossiers accessibles dans '$dir_nom' : \n\n";
						//echo "\t\t<ul>\n";
							foreach($dossier as $lien){
								//echo "\t\t\t<li><a href=\"$dir_nom/$lien \">$lien</a></li>\n";
								//echo "<a href=\"$dir_nom/$lien\" title=\"1\"><img src=\"images/dossier.png\" alt=\"1\" style=\"width: 120px; height: 120px;\">$lien</a>";
								
								echo "<a href=\"\" style=\"background: url(images/dossier.png) no-repeat 0 0; width: 120px; height: 120px;\">$lien</a>";
							}
						//echo "\t\t</ul>";
					}
			*/		
					if(!empty($fichier)){
						sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
						foreach($fichier as $lien) {
							echo "<a href=\"$dir_nom/$lien\" title=\"1\"><img src=\"$dir_nom/$lien\" alt=\"1\" style=\"width: 120px; height: 120px;\"></a> ";
						}
					 }
					?>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
		<div class="cl">&nbsp;</div>
	</div>
</div>