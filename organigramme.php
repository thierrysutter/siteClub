<div id="main">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			<div id="sidebar"></div>
			<div id="content">
				<div class="featured-main-bas">
					<div class="cl">&nbsp;</div>
					<h1><a href="#">Organigramme</a></h1>

						<?php
						$managerStaff = new ManagerStaff($connexionBdd->getPDO());
						$listeStaffs = $managerStaff->trouverTous();

						if (!empty($listeStaffs)) {
							foreach($listeStaffs as $staff) {
								echo "<div class=\"organigramme\">";
								?>
								<input type="hidden" id="nom_<?php echo $staff->getId();?>" name="nom_<?php echo $staff->getId();?>" value="<?php echo $staff->getNom();?>" />
								<input type="hidden" id="prenom_<?php echo $staff->getId();?>" name="prenom_<?php echo $staff->getId();?>" value="<?php echo $staff->getPrenom();?>" />
								<input type="hidden" id="dateNaissance_<?php echo $staff->getId();?>" name="dateNaissance_<?php echo $staff->getId();?>" value="<?php echo date_format(new DateTime($staff->getDateNaissance()), 'd/m/Y');?>" />
								<input type="hidden" id="fonction_<?php echo $staff->getId();?>" name="fonction_<?php echo $staff->getId();?>" value="<?php echo $staff->getLibelleFonction();?>" />
								<input type="hidden" id="numLicence<?php echo $staff->getId();?>" name="numLicence<?php echo $staff->getId();?>" value="<?php echo $staff->getNumeroLicence();?>" />
								<input type="hidden" id="email_<?php echo $staff->getId();?>" name="email_<?php echo $staff->getId();?>" value="<?php echo $staff->getEmail();?>" />
								<input type="hidden" id="video_<?php echo $staff->getId();?>" name="video_<?php echo $staff->getId();?>" value="<?php echo $staff->getVideo();?>" />
								<input type="hidden" id="typeVideo_<?php echo $staff->getId();?>" name="typeVideo_<?php echo $staff->getId();?>" value="<?php echo pathinfo($staff->getVideo(),PATHINFO_EXTENSION);?>" />
								<?php 
								echo "<h3><a href=\"#\">".$staff->getNom()." ".$staff->getPrenom()."</a></h3>";
								echo "<p><span>".$staff->getLibelleFonction()."</span></p>";
								if ($staff->getPhoto() != null && $staff->getPhoto() != "" && $staff->getPhoto() != "images/photo/" && file_exists($staff->getPhoto())) {
									echo "<img class=\"vignette\" id=\"".$staff->getId()."\" src=\"".$staff->getPhoto()."\" width=\"55px\" height=\"65px\" alt=\"\" />";
								} else {
									echo "<img class=\"vignette\" id=\"".$staff->getId()."\" src=\"images/silhouette.jpeg\" width=\"55px\" height=\"65px\" alt=\"\" />";
								}
								echo "</div>";
							}
						} ?>

						<!-- <img alt="email" src="images/mail216.png" style="vertical-align: middle;"/> -->

				</div>
				<div class="featured-side-bas">
					<div id="detail" class="featured-main-bas-item" style="float: right;">
						<img id="detailPhoto" src="<?php echo ($listeStaffs[0]->getPhoto() != '' && $listeStaffs[0]->getPhoto() != 'images/photo/' && (file_exists($listeStaffs[0]->getPhoto())) ? $listeStaffs[0]->getPhoto() : 'images/silhouette.jpeg'); ?>" width="130px" height="160px" alt="" />
						
						<!-- 
						<br/>
						<video id="lecteurVideo" width="130px" height="160px" controls><source id="detailVideo" src="<?php echo ($listeStaffs[0]->getVideo() != '' && (file_exists($listeStaffs[0]->getVideo())) ? $listeStaffs[0]->getVideo() : ''); ?>" type="video/<?php echo pathinfo($listeStaffs[0]->getVideo(),PATHINFO_EXTENSION); ?>"/></video>
						-->
						<!-- si il y a une video de présentation, on affiche un lien pour l'ouvrir dans une popup -->
						
						
						<div class="cl">&nbsp;</div>
						<h4><a><div id="identiteDetail"><?php echo $listeStaffs[0]->getNom()." ".$listeStaffs[0]->getPrenom(); ?></div></a></h4>
						<p><div id="ageDetail"><?php echo date_format(new DateTime($listeStaffs[0]->getDateNaissance()), 'd/m/Y'); ?></div></p>
						<p><div id="fonctionDetail"><?php echo $listeStaffs[0]->getLibelleFonction(); ?></div></p>
						<p><div id="parcoursDetail"></div></p>
						<?php if($listeStaffs[0]->getVideo() != '' && (file_exists($listeStaffs[0]->getVideo()))) {?>
						<img id="imageLecteurVideo" class="lecteurVideo" src="images/video16.png" style="width: 16px; height: 16px; vertical-align: middle; cursor: pointer;">
						<input type="hidden" id="nomFichierVideo" name="nomFichierVideo" value="<?php echo $listeStaffs[0]->getVideo();?>">
						<input type="hidden" id="extensionFichierVideo" name="extensionFichierVideo" value="<?php echo pathinfo($listeStaffs[0]->getVideo(),PATHINFO_EXTENSION);?>">
						<?php } else {?>
						<img id="imageLecteurVideo" class="lecteurVideo" src="images/video16.png" style="display: none; width: 16px; height: 16px; vertical-align: middle; cursor: pointer;">
						<input type="hidden" id="nomFichierVideo" name="nomFichierVideo" value="">
						<input type="hidden" id="extensionFichierVideo" name="extensionFichierVideo" value="">
						<?php } ?>
						<img class="email" alt="email" src="images/mail216.png" style="vertical-align: middle; cursor: pointer;"/>
						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>






<div id="videoDialog" style="text-align: center; vertical-align: middle;">
<video id="lecteurVideoPopup" width="550px" height="325px" controls><source id="detailVideoPopup" src=""/></video>
</div>

	<div id="emailDialog">
		<form id="form1" action="EnvoyerMessage.php" method="post">
			<div id="erreurFiltre"></div><!-- div qui contiendra les éventuels messages d'erreur -->
			<div id="messageFiltre"></div><!-- div qui contiendra le message de retour -->
			<div>
			<div style="width: 50%;float: left;">
				<input type="hidden" id="destinataire" name="destinataire" value=""/>
				<fieldset><legend>légende</legend>
				<p><label for="civilite">Civilit&eacute;</label></p>
				<p>
					<select name="civilite" id="civilite" >
					  <option value="M" <?php if (isset($_SESSION['messageKO']) && $civilite == "M") { echo "selected"; } ?>>Mr</option>
					  <option value="MME" <?php if (isset($_SESSION['messageKO']) && $civilite == "MME") { echo "selected"; } ?>>Mme</option>
					</select>
				</p>

				<p><label for="nom">Nom</label></p>
				<p>
					<input type="text" name="nom" id="nom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$nom'"; } ?> required="required"/>
				</p>

				<p><label for="prenom">Prénom</label></p>
				<p>
					<input type="text" name="prenom" id="prenom" <?php if (isset($_SESSION['messageKO'])) { echo "value='$prenom'"; } ?> required="required"/>
				</p>

				<p><label for="email">Email</label></p>
				<p>
					<input type="text" name="email" id="email" <?php if (isset($_SESSION['messageKO'])) { echo "value='$email'"; } ?> required="required"/>
				</p>

				<p><label for="objet">Objet</label></p>
				<p>
					<input type="text" name="objet" id="objet" value="Question" readonly="readonly"/>
				</p>
				</fieldset>
			</div>
			<div style="width: 50%; float: right;">
				<fieldset>
				<p><label for="captcha">Combien font 1+3</label></p>
				<p>
					<input type="text" name="captcha" id="captcha" required="required"/>
				</p>
				<p><label for="contenu">Message</label></p>
				<p>
					<textarea name="contenu" id="contenu" cols="30" rows="15" required="required"><?php if (isset($_SESSION['messageKO'])) { echo "$message"; } ?></textarea>
				</p>
				</fieldset>
			</div>
			</div>
			<!--<p class="submit"><button type="submit">Envoyer</button></p>-->

		</form>
	</div>