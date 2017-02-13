<script >


	


</script>


<div id="main">
		<div class="shell">
			<div class="cl">&nbsp;</div>
			<div id="sidebar">

			</div>
			<div id="content">
				<h1><a href="#">R�glement int�rieur</a></h1>
				<DIV>Tous les adh�rents de l'AS SAINT JULIEN LES METZ � quelque titre que ce soit : joueurs, �ducateurs, ditigeants, arbitres..., sont tenus de respecter le r�glement int�rieur du club affich� en permanence au club house du Stade de Grimont (ainsi que sur le site internet du club).</DIV>
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
					Tout affili� de l'AS Saint Julien Les Metz, membre ou licenci�, s'engage � respecter dans son int�gralit� le pr�sent r�glement, les statuts du club, la charte ainsi que le r�glement de fonctionnement et doit adh�rer aux projets du club.
				</DIV>

				<h4><a class="titreArticle" id="2" href="#">> Article 2</a></h4>
				<DIV class="article" id="article_2">
					Selon les  statuts du club, les membres du bureau g�rent les actions sous l'autorit� du pr�sident et en concertation avec les membres du comit�.
				</DIV>

				<h4><a class="titreArticle" id="3" href="#">> Article 3</a></h4>
				<DIV class="article" id="article_3">
					Tout joueur, dirigeant, d�l�gu�, entraineur ou arbitre de l'AS Saint Julien Les Metz doit �tre en possession d'une licence sign�e et valid�e par avis m�dical. Cette licence doit �tre int�gralement pay�e pour les joueurs. Tout manquement � cet article entrainera une interdction d'entr�e sur les terrains et la pratique du football en comp�tition.
				</DIV>

				<h4><a class="titreArticle" id="4" href="#">> Article 4</a></h4>
				<DIV class="article" id="article_4">
					Tout licenci� ou membre se doit de respecter les infrastructures du club, le mat�riel mis � disposition, les instances dirigeantes du club ainsi que le corps arbitral.
				</DIV>

				<h4><a class="titreArticle" id="5" href="#">> Article 5</a></h4>
				<DIV class="article" id="article_5">
					Tout membre de l'association se doit de respecter les r�gles du fair-play � l'�gard des autres memmbres et de l'ensemble des visiteurs (joueurs, arbitres, spectateurs, etc...).
				</DIV>

				<h4><a class="titreArticle" id="6" href="#">> Article 6</a></h4>
				<DIV class="article" id="article_6">
					Tout joueur doit �tre pr�sent aux entrainements et honorer les convocations aux matchs. En cas d'emp�chement, il doit avertir son entraineur le plus rapidement possible. Tout joueur absent ou en retard � l'entrainement sans raison valable donn�e � l'entraineur est passible d'une sanction.
				</DIV>

				<h4><a class="titreArticle" id="7" href="#">> Article 7</a></h4>
				<DIV class="article" id="article_7">
					Tout entraineur doit s'assurer que les joueurs mineurs sous sa responsabilit� au d�part du club voyagent � l'exterieur en toute s�curit�. En cas de doute, il a la possibilit� de retarder le d�part, voire d'annuler le d�placement.
				</DIV>

				<h4><a class="titreArticle" id="8" href="#">> Article 8</a></h4>
				<DIV class="article" id="article_8">
					Tout joueur se doit de s'informer de la suffisance des moyens de locomotion en cas de d�placement. Pour les joueurs mineurs, les parents ne doivent pas d�poser leur enfant sans savor avec qui et comment celui-ci va se rendre � l'ext�rieur du club.
				</DIV>

				<h4><a class="titreArticle" id="9" href="#">> Article 9</a></h4>
				<DIV class="article" id="article_9">
					Tout joueur de moins de 13 ans doit �tre accompagn� d'un parent ou tuteur jusqu'� sa prise en charge par un membre dirigeant ou un �ducateur. De m�me, tout joueur de moins de 13 ans ne peut quitter l'enceinte du club sans �tre accompagn� d'un parent, d'un tuteur, d'une personne mandat�e. Jusqu'� son d�part le joueur de moins de 13 ans reste sous la responsabilit� de son �ducateur.
				</DIV>

				<h4><a class="titreArticle" id="10" href="#">> Article 10</a></h4>
				<DIV class="article" id="article_10">
					Tout joueurde moins de 18 ans reste sous la responsabilit� de son �ducateur jusqu'� se sortie de I'enceinte du club. Il sera donc soumis � son autorit�.
				</DIV>

				<h4><a class="titreArticle" id="11" href="#">> Article 11</a></h4>
				<DIV class="article" id="article_11">
					Tout entra�neur et tout joueur s'engage � honorer les couleurs du club (Short et chaussettes aux couleurs du club �tant le minimum).
				</DIV>

				<h4><a class="titreArticle" id="12" href="#">> Article 12</a></h4>
				<DIV class="article" id="article_12">
					Le pr�sent r�glement est susceptible d'�tre modifi� par d�cision des membres du bureau et du pr�sident. En cas de modification, un avenant sera remis aux membres du club pour pri�e de connaissance et signature.
				</DIV>

				<h4><a class="titreArticle" id="13" href="#">> Article 13</a></h4>
				<DIV class="article" id="article_13">
					L'introduction et ou la consommation de substances class�es stup�fiantes sera suivie d'une sanction pouvant aller jusqu'� l'exclusion.
				</DIV>

				<h4><a class="titreArticle" id="14" href="#">> Article 14</a></h4>
				<DIV class="article" id="article_14">
					Tout manquement sera passible d'une convocation en conseil de discipline (dont le r�glement peut �tre consult� au secr�tariat du club). En cas d'amende, le membre responsable devra assumer les con��quences financi�res pour le club.
				</DIV>
-->
				</div>
			<div class="cl">&nbsp;</div>
		</div>
	</div>