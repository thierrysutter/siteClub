<script >


	


</script>


<div id="main">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">
				<h1><a href="#">Réglement intérieur</a></h1>
				<DIV>Tous les adhérents de l'AS SAINT JULIEN LES METZ à quelque titre que ce soit : joueurs, éducateurs, ditigeants, arbitres..., sont tenus de respecter le règlement intérieur du club affiché en permanence au club house du Stade de Grimont (ainsi que sur le site internet du club).</DIV>
				<br>
				<?php 
						if (!empty($listeReglements)) {
							foreach($listeReglements as $reglement) {
						?>
							<h4><a class="titreArticle" id="<?php echo $reglement->getId(); ?>" href="#">> <?php echo $reglement->getTitre(); ?></a></h4>
							<DIV class="article" id="article_<?php echo $reglement->getId(); ?>"><?php echo $reglement->getTexte(); ?></div>
						<?php } } ?>
				
				
				
				<!--
				<h4><a class="titreArticle" id="1" href="#">> Article 1</a></h4>
				<DIV class="article" id="article_1">
					Tout affilié de l'AS Saint Julien Les Metz, membre ou licencié, s'engage à respecter dans son intégralité le présent règlement, les statuts du club, la charte ainsi que le règlement de fonctionnement et doit adhérer aux projets du club.
				</DIV>

				<h4><a class="titreArticle" id="2" href="#">> Article 2</a></h4>
				<DIV class="article" id="article_2">
					Selon les  statuts du club, les membres du bureau gérent les actions sous l'autorité du président et en concertation avec les membres du comité.
				</DIV>

				<h4><a class="titreArticle" id="3" href="#">> Article 3</a></h4>
				<DIV class="article" id="article_3">
					Tout joueur, dirigeant, délégué, entraineur ou arbitre de l'AS Saint Julien Les Metz doit être en possession d'une licence signée et validée par avis médical. Cette licence doit être intégralement payée pour les joueurs. Tout manquement à cet article entrainera une interdction d'entrée sur les terrains et la pratique du football en compétition.
				</DIV>

				<h4><a class="titreArticle" id="4" href="#">> Article 4</a></h4>
				<DIV class="article" id="article_4">
					Tout licencié ou membre se doit de respecter les infrastructures du club, le matériel mis à disposition, les instances dirigeantes du club ainsi que le corps arbitral.
				</DIV>

				<h4><a class="titreArticle" id="5" href="#">> Article 5</a></h4>
				<DIV class="article" id="article_5">
					Tout membre de l'association se doit de respecter les règles du fair-play à l'égard des autres memmbres et de l'ensemble des visiteurs (joueurs, arbitres, spectateurs, etc...).
				</DIV>

				<h4><a class="titreArticle" id="6" href="#">> Article 6</a></h4>
				<DIV class="article" id="article_6">
					Tout joueur doit être présent aux entrainements et honorer les convocations aux matchs. En cas d'empêchement, il doit avertir son entraineur le plus rapidement possible. Tout joueur absent ou en retard à l'entrainement sans raison valable donnée à l'entraineur est passible d'une sanction.
				</DIV>

				<h4><a class="titreArticle" id="7" href="#">> Article 7</a></h4>
				<DIV class="article" id="article_7">
					Tout entraineur doit s'assurer que les joueurs mineurs sous sa responsabilité au départ du club voyagent à l'exterieur en toute sécurité. En cas de doute, il a la possibilité de retarder le départ, voire d'annuler le déplacement.
				</DIV>

				<h4><a class="titreArticle" id="8" href="#">> Article 8</a></h4>
				<DIV class="article" id="article_8">
					Tout joueur se doit de s'informer de la suffisance des moyens de locomotion en cas de déplacement. Pour les joueurs mineurs, les parents ne doivent pas déposer leur enfant sans savor avec qui et comment celui-ci va se rendre à l'extérieur du club.
				</DIV>

				<h4><a class="titreArticle" id="9" href="#">> Article 9</a></h4>
				<DIV class="article" id="article_9">
					Tout joueur de moins de 13 ans doit être accompagné d'un parent ou tuteur jusqu'à sa prise en charge par un membre dirigeant ou un éducateur. De même, tout joueur de moins de 13 ans ne peut quitter l'enceinte du club sans être accompagnê d'un parent, d'un tuteur, d'une personne mandatée. Jusqu'à son départ le joueur de moins de 13 ans reste sous la responsabilité de son éducateur.
				</DIV>

				<h4><a class="titreArticle" id="10" href="#">> Article 10</a></h4>
				<DIV class="article" id="article_10">
					Tout joueurde moins de 18 ans reste sous la responsabilité de son éducateur jusqu'à se sortie de I'enceinte du club. Il sera donc soumis à son autorité.
				</DIV>

				<h4><a class="titreArticle" id="11" href="#">> Article 11</a></h4>
				<DIV class="article" id="article_11">
					Tout entraîneur et tout joueur s'engage à honorer les couleurs du club (Short et chaussettes aux couleurs du club étant le minimum).
				</DIV>

				<h4><a class="titreArticle" id="12" href="#">> Article 12</a></h4>
				<DIV class="article" id="article_12">
					Le présent règlement est susceptible d'être modifié par décision des membres du bureau et du président. En cas de modification, un avenant sera remis aux membres du club pour priàe de connaissance et signature.
				</DIV>

				<h4><a class="titreArticle" id="13" href="#">> Article 13</a></h4>
				<DIV class="article" id="article_13">
					L'introduction et ou la consommation de substances classées stupêfiantes sera suivie d'une sanction pouvant aller jusqu'à l'exclusion.
				</DIV>

				<h4><a class="titreArticle" id="14" href="#">> Article 14</a></h4>
				<DIV class="article" id="article_14">
					Tout manquement sera passible d'une convocation en conseil de discipline (dont le règlement peut être consulté au secrêtariat du club). En cas d'amende, le membre responsable devra assumer les conÀéquences financières pour le club.
				</DIV>
-->
				</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>