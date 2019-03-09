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

<div id="content mx-auto">
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
		<div class="py-5 text-center bg-light">
		    <div class="container">
		      <div class="row">
		        <div class="col-md-12">
		          <h6 class="mb-4 text-dark">Cliquez sur une photo pour agrandir</h6>
		        </div>
		      </div>
		      <div class="row">
		      <?php
				if(!empty($fichier)){
					sort($fichier);// pour le tri croissant, rsort() pour le tri décroissant
					foreach($fichier as $lien) {
						?>
						<div class="col-md-3 col-6 p-1">
						<?php 
						//echo "<a href=\"$dir_nom/$lien\" title=\"1\"><img src=\"$dir_nom/$lien\" alt=\"1\" style=\"width: 120px; height: 120px;\"></a> ";
						echo "<a href=\"$dir_nom/$lien\" title=\"$lien\"><img src=\"$dir_nom/$lien\" title=\"$lien\" class=\"d-block img-fluid\" ></a>";
						?>
						</div>
						<?php 
					}
				 }
			  ?>
		      </div>
		      
		    </div>
		  </div>
	</div>
</div>
