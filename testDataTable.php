<?php
ob_start();
function chargerClasse($classe) {
	require $classe . '.class.php'; // On inclut la classe correspondante au param�tre pass�.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appel�e d�s qu'on instanciera une classe non d�clar�e.

$logger = new Logger('logs/');
require_once("config/config.php");

session_start();


$user = null;
if (isset($_SESSION['session_started'])) {
	$user = $_SESSION['user'];
	if (!empty($user)) {
		/* Navigation Haut */
		include("menuAdmin.php");
		/* End Navigation */
	} else {
		//header("Location: ActionAccueil.php");
		header("Location: Deconnexion.php");
	}
} else {
	//header("Location: ActionAccueil.php");
	header("Location: Deconnexion.php");
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>

	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/style.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/slick.min.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="screen"/>
	<link rel="stylesheet" href="css/filtre.min.css" type="text/css" media="screen" />
	
	
	<link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
	
	
	
	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<script type="text/javascript" src="js/scripts.min.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function() {
	    $('#tableATrier').dataTable();
	} );
	</script>	
	
	
    
</head>


<body>
<!-- Header -->
	<?php
	  include("head.php");
	?>
	<!-- End Header -->

	<!-- Navigation Haut-->
	<?php

	
	
	$listeJoueurs = $_SESSION['listeJoueurs'];
	$listeStaffs = $_SESSION['listeStaffs'];
	$listeCategories = $_SESSION['listeCategories'];
	$listeFonctions = $_SESSION['listeFonctions'];
	$listePostes = $_SESSION['listePostes'];
	?>
	<!-- End Navigation -->
<!-- Heading -->
	<div id="heading">
		<div class="shell">
			<div id="heading-cnt">
			
			<!-- Sub nav -->
				<div id="side-nav">
					<ul>
						<li><div>
						<form id="filtre" name="filtre" action="ActionMembre.php" method="post">
						<input type="hidden" name="methode" id="methode" value="filtre"/>
						<fieldset><legend>Affiner la recherche</legend>
						<p class="first" id="zoneFiltreCategorie" >
							<label for="filtreCategorie">Cat�gorie</label>
							<select name="filtreCategorie" id="filtreCategorie">
							<option label="" value="-1"  <?php echo ($_SESSION['filtreCategorie'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeCategories as $categorie) {?>
							<option label="" value="<?php echo $categorie->getId();?>" <?php echo ($_SESSION['filtreCategorie'] == $categorie->getId() ? "selected" : "") ;?>><?php echo $categorie->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>
						
						<p id="zoneFiltreFonction" >
							<label for="filtreFonction">Fonction</label>
							<select name="filtreFonction" id="filtreFonction">
							<option label="Toutes" value="-1"  <?php echo ($_SESSION['filtreFonction'] == -1 ? "selected" : "") ;?>>Toutes</option>
							<?php foreach($listeFonctions as $fonction) {?>
							<option label="" value="<?php echo $fonction->getId();?>" <?php echo ($_SESSION['filtreFonction'] == $fonction->getId() ? "selected" : "") ;?>><?php echo $fonction->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>
						
						<p id="zoneFiltrePoste" >
							<label id="labelPoste" for="filtrePoste">Poste</label>
							<select name="filtrePoste" id="filtrePoste">
							<option label="Tous" value="-1"  <?php echo ($_SESSION['filtrePoste'] == -1 ? "selected" : "") ;?>>Tous</option>
							<?php foreach($listePostes as $poste) {?>
							<option label="" value="<?php echo $poste->getId();?>" <?php echo ($_SESSION['filtrePoste'] == $poste->getId() ? "selected" : "") ;?>><?php echo $poste->getLibelle(); ?></option>
							<?php } ?>
							</select>
						</p>
						
						<p id="zoneFiltreNom" >
							<label for="filtreNom">Nom/Pr�nom</label>
							<input type="text" name="filtreNom" id="filtreNom" value="<?php echo $_SESSION['filtreNom'] ;?>"/>
						</p>
						
						<p class="submit"><button type="submit"  class="bouton">Rechercher</button></p>
						</fieldset>

						</form>
						</div></li>
					</ul>
				</div>
				<!-- End Sub nav -->
			
				<div id="heading-box">
				  <div id="heading-box-cnt">
					<div class="cl">&nbsp;</div>
					  <!-- Main Slide Item -->
					  <div class="featured-main-joueur" id="tableau" >
						<div class="CSSTableGenerator " style="text-align: center; max-height: 240px; overflow: auto;">
							<table id="tableATrier" class="display" cellspacing="0" width="100%">
							        <thead>
							            <tr>
							            	<th>
												<input type="checkbox" class="noprint" id="check_all" name="check_all" title="Tout cocher/d�cocher"/>
												<img id="impression" class="noprint" src="images/print.gif" style="cursor: pointer; width: 20px; height: 20px; vertical-align: bottom;" title="Imprimer la s�lection"/> 
											</th>
											<th>Nom</th>
											<th>Pr�nom</th>
											<th>Cat�gorie</th>
											<th>Poste/Fonction</th>
											<th>Liens</th>
																	
							                <!-- <th>Name</th>
							                <th>Position</th>
							                <th>Office</th>
							                <th>Age</th>
							                <th>Start date</th>
							                <th>Salary</th>-->
							            </tr>
							        </thead>
							 
							        <tbody>
							        	<?php foreach($listeJoueurs as $joueur) { ?>
										<tr class="centre">
											<td><input type="checkbox" class="noprint" id="check_<?php echo $joueur->getId();?>" name="check_<?php echo $joueur->getId();?>"/> </td>
											<td><?php echo $joueur->getNom();?></td>
											<td><?php echo $joueur->getPrenom();?></td>
											<td><?php echo $joueur->getLibelleCategorie();?></td>
											<td><?php echo $joueur->getLibellePoste();?></td>
											<td>
												<img class="fiche" id="fiche_<?php echo $joueur->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
												<img class="suppression" id="suppr_<?php echo $joueur->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
											</td>
										</tr>
										<?php } ?>
										<?php foreach($listeStaffs as $staff) { ?>
										<tr class="centre">
											<td><input type="checkbox" class="noprint" id="check_<?php echo $staff->getId();?>" name="check_<?php echo $staff->getId();?>"/> </td>
											<td><?php echo $staff->getNom();?></td>
											<td><?php echo $staff->getPrenom();?></td>
											<td><?php echo $staff->getLibelleCategorie();?></td>
											<td><?php echo $staff->getLibelleFonction();?></td>
											<td>
												<img class="fiche noprint" id="fiche_<?php echo $staff->getId();?>" src="images/modify16.png" style="border: 0;cursor: pointer;"/>
												<img class="suppression noprint" id="suppr_<?php echo $staff->getId();?>" src="images/trash16.png" style="border: 0;cursor: pointer;"/>
											</td>
										</tr>
										<?php } ?>
							        
							        	<!-- 
							            <tr>
							                <td>Tiger Nixon</td>
							                <td>System Architect</td>
							                <td>Edinburgh</td>
							                <td>61</td>
							                <td>2011/04/25</td>
							                <td>$320,800</td>
							            </tr>
							            <tr>
							                <td>Garrett Winters</td>
							                <td>Accountant</td>
							                <td>Tokyo</td>
							                <td>63</td>
							                <td>2011/07/25</td>
							                <td>$170,750</td>
							            </tr>
							            <tr>
							                <td>Ashton Cox</td>
							                <td>Junior Technical Author</td>
							                <td>San Francisco</td>
							                <td>66</td>
							                <td>2009/01/12</td>
							                <td>$86,000</td>
							            </tr>
							            <tr>
							                <td>Cedric Kelly</td>
							                <td>Senior Javascript Developer</td>
							                <td>Edinburgh</td>
							                <td>22</td>
							                <td>2012/03/29</td>
							                <td>$433,060</td>
							            </tr>
							            <tr>
							                <td>Airi Satou</td>
							                <td>Accountant</td>
							                <td>Tokyo</td>
							                <td>33</td>
							                <td>2008/11/28</td>
							                <td>$162,700</td>
							            </tr>
							            <tr>
							                <td>Brielle Williamson</td>
							                <td>Integration Specialist</td>
							                <td>New York</td>
							                <td>61</td>
							                <td>2012/12/02</td>
							                <td>$372,000</td>
							            </tr>
							            <tr>
							                <td>Herrod Chandler</td>
							                <td>Sales Assistant</td>
							                <td>San Francisco</td>
							                <td>59</td>
							                <td>2012/08/06</td>
							                <td>$137,500</td>
							            </tr>
							            <tr>
							                <td>Rhona Davidson</td>
							                <td>Integration Specialist</td>
							                <td>Tokyo</td>
							                <td>55</td>
							                <td>2010/10/14</td>
							                <td>$327,900</td>
							            </tr>
							            <tr>
							                <td>Colleen Hurst</td>
							                <td>Javascript Developer</td>
							                <td>San Francisco</td>
							                <td>39</td>
							                <td>2009/09/15</td>
							                <td>$205,500</td>
							            </tr>
							            <tr>
							                <td>Sonya Frost</td>
							                <td>Software Engineer</td>
							                <td>Edinburgh</td>
							                <td>23</td>
							                <td>2008/12/13</td>
							                <td>$103,600</td>
							            </tr>
							            <tr>
							                <td>Jena Gaines</td>
							                <td>Office Manager</td>
							                <td>London</td>
							                <td>30</td>
							                <td>2008/12/19</td>
							                <td>$90,560</td>
							            </tr>
							            <tr>
							                <td>Quinn Flynn</td>
							                <td>Support Lead</td>
							                <td>Edinburgh</td>
							                <td>22</td>
							                <td>2013/03/03</td>
							                <td>$342,000</td>
							            </tr>
							            <tr>
							                <td>Charde Marshall</td>
							                <td>Regional Director</td>
							                <td>San Francisco</td>
							                <td>36</td>
							                <td>2008/10/16</td>
							                <td>$470,600</td>
							            </tr>
							            <tr>
							                <td>Haley Kennedy</td>
							                <td>Senior Marketing Designer</td>
							                <td>London</td>
							                <td>43</td>
							                <td>2012/12/18</td>
							                <td>$313,500</td>
							            </tr>
							            <tr>
							                <td>Tatyana Fitzpatrick</td>
							                <td>Regional Director</td>
							                <td>London</td>
							                <td>19</td>
							                <td>2010/03/17</td>
							                <td>$385,750</td>
							            </tr>
							            <tr>
							                <td>Michael Silva</td>
							                <td>Marketing Designer</td>
							                <td>London</td>
							                <td>66</td>
							                <td>2012/11/27</td>
							                <td>$198,500</td>
							            </tr>
							            <tr>
							                <td>Paul Byrd</td>
							                <td>Chief Financial Officer (CFO)</td>
							                <td>New York</td>
							                <td>64</td>
							                <td>2010/06/09</td>
							                <td>$725,000</td>
							            </tr>
							            <tr>
							                <td>Gloria Little</td>
							                <td>Systems Administrator</td>
							                <td>New York</td>
							                <td>59</td>
							                <td>2009/04/10</td>
							                <td>$237,500</td>
							            </tr>
							            <tr>
							                <td>Bradley Greer</td>
							                <td>Software Engineer</td>
							                <td>London</td>
							                <td>41</td>
							                <td>2012/10/13</td>
							                <td>$132,000</td>
							            </tr>
							            <tr>
							                <td>Dai Rios</td>
							                <td>Personnel Lead</td>
							                <td>Edinburgh</td>
							                <td>35</td>
							                <td>2012/09/26</td>
							                <td>$217,500</td>
							            </tr>
							            <tr>
							                <td>Jenette Caldwell</td>
							                <td>Development Lead</td>
							                <td>New York</td>
							                <td>30</td>
							                <td>2011/09/03</td>
							                <td>$345,000</td>
							            </tr>
							            <tr>
							                <td>Yuri Berry</td>
							                <td>Chief Marketing Officer (CMO)</td>
							                <td>New York</td>
							                <td>40</td>
							                <td>2009/06/25</td>
							                <td>$675,000</td>
							            </tr>
							            <tr>
							                <td>Caesar Vance</td>
							                <td>Pre-Sales Support</td>
							                <td>New York</td>
							                <td>21</td>
							                <td>2011/12/12</td>
							                <td>$106,450</td>
							            </tr>
							            <tr>
							                <td>Doris Wilder</td>
							                <td>Sales Assistant</td>
							                <td>Sidney</td>
							                <td>23</td>
							                <td>2010/09/20</td>
							                <td>$85,600</td>
							            </tr>
							            <tr>
							                <td>Angelica Ramos</td>
							                <td>Chief Executive Officer (CEO)</td>
							                <td>London</td>
							                <td>47</td>
							                <td>2009/10/09</td>
							                <td>$1,200,000</td>
							            </tr>
							            <tr>
							                <td>Gavin Joyce</td>
							                <td>Developer</td>
							                <td>Edinburgh</td>
							                <td>42</td>
							                <td>2010/12/22</td>
							                <td>$92,575</td>
							            </tr>
							            <tr>
							                <td>Jennifer Chang</td>
							                <td>Regional Director</td>
							                <td>Singapore</td>
							                <td>28</td>
							                <td>2010/11/14</td>
							                <td>$357,650</td>
							            </tr>
							            <tr>
							                <td>Brenden Wagner</td>
							                <td>Software Engineer</td>
							                <td>San Francisco</td>
							                <td>28</td>
							                <td>2011/06/07</td>
							                <td>$206,850</td>
							            </tr>
							            <tr>
							                <td>Fiona Green</td>
							                <td>Chief Operating Officer (COO)</td>
							                <td>San Francisco</td>
							                <td>48</td>
							                <td>2010/03/11</td>
							                <td>$850,000</td>
							            </tr>
							            <tr>
							                <td>Shou Itou</td>
							                <td>Regional Marketing</td>
							                <td>Tokyo</td>
							                <td>20</td>
							                <td>2011/08/14</td>
							                <td>$163,000</td>
							            </tr>
							            <tr>
							                <td>Michelle House</td>
							                <td>Integration Specialist</td>
							                <td>Sidney</td>
							                <td>37</td>
							                <td>2011/06/02</td>
							                <td>$95,400</td>
							            </tr>
							            <tr>
							                <td>Suki Burks</td>
							                <td>Developer</td>
							                <td>London</td>
							                <td>53</td>
							                <td>2009/10/22</td>
							                <td>$114,500</td>
							            </tr>
							            <tr>
							                <td>Prescott Bartlett</td>
							                <td>Technical Author</td>
							                <td>London</td>
							                <td>27</td>
							                <td>2011/05/07</td>
							                <td>$145,000</td>
							            </tr>
							            <tr>
							                <td>Gavin Cortez</td>
							                <td>Team Leader</td>
							                <td>San Francisco</td>
							                <td>22</td>
							                <td>2008/10/26</td>
							                <td>$235,500</td>
							            </tr>
							            <tr>
							                <td>Martena Mccray</td>
							                <td>Post-Sales support</td>
							                <td>Edinburgh</td>
							                <td>46</td>
							                <td>2011/03/09</td>
							                <td>$324,050</td>
							            </tr>
							            <tr>
							                <td>Unity Butler</td>
							                <td>Marketing Designer</td>
							                <td>San Francisco</td>
							                <td>47</td>
							                <td>2009/12/09</td>
							                <td>$85,675</td>
							            </tr>
							            <tr>
							                <td>Howard Hatfield</td>
							                <td>Office Manager</td>
							                <td>San Francisco</td>
							                <td>51</td>
							                <td>2008/12/16</td>
							                <td>$164,500</td>
							            </tr>
							            <tr>
							                <td>Hope Fuentes</td>
							                <td>Secretary</td>
							                <td>San Francisco</td>
							                <td>41</td>
							                <td>2010/02/12</td>
							                <td>$109,850</td>
							            </tr>
							            <tr>
							                <td>Vivian Harrell</td>
							                <td>Financial Controller</td>
							                <td>San Francisco</td>
							                <td>62</td>
							                <td>2009/02/14</td>
							                <td>$452,500</td>
							            </tr>
							            <tr>
							                <td>Timothy Mooney</td>
							                <td>Office Manager</td>
							                <td>London</td>
							                <td>37</td>
							                <td>2008/12/11</td>
							                <td>$136,200</td>
							            </tr>
							            <tr>
							                <td>Jackson Bradshaw</td>
							                <td>Director</td>
							                <td>New York</td>
							                <td>65</td>
							                <td>2008/09/26</td>
							                <td>$645,750</td>
							            </tr>
							            <tr>
							                <td>Olivia Liang</td>
							                <td>Support Engineer</td>
							                <td>Singapore</td>
							                <td>64</td>
							                <td>2011/02/03</td>
							                <td>$234,500</td>
							            </tr>
							            <tr>
							                <td>Bruno Nash</td>
							                <td>Software Engineer</td>
							                <td>London</td>
							                <td>38</td>
							                <td>2011/05/03</td>
							                <td>$163,500</td>
							            </tr>
							            <tr>
							                <td>Sakura Yamamoto</td>
							                <td>Support Engineer</td>
							                <td>Tokyo</td>
							                <td>37</td>
							                <td>2009/08/19</td>
							                <td>$139,575</td>
							            </tr>
							            <tr>
							                <td>Thor Walton</td>
							                <td>Developer</td>
							                <td>New York</td>
							                <td>61</td>
							                <td>2013/08/11</td>
							                <td>$98,540</td>
							            </tr>
							            <tr>
							                <td>Finn Camacho</td>
							                <td>Support Engineer</td>
							                <td>San Francisco</td>
							                <td>47</td>
							                <td>2009/07/07</td>
							                <td>$87,500</td>
							            </tr>
							            <tr>
							                <td>Serge Baldwin</td>
							                <td>Data Coordinator</td>
							                <td>Singapore</td>
							                <td>64</td>
							                <td>2012/04/09</td>
							                <td>$138,575</td>
							            </tr>
							            <tr>
							                <td>Zenaida Frank</td>
							                <td>Software Engineer</td>
							                <td>New York</td>
							                <td>63</td>
							                <td>2010/01/04</td>
							                <td>$125,250</td>
							            </tr>
							            <tr>
							                <td>Zorita Serrano</td>
							                <td>Software Engineer</td>
							                <td>San Francisco</td>
							                <td>56</td>
							                <td>2012/06/01</td>
							                <td>$115,000</td>
							            </tr>
							            <tr>
							                <td>Jennifer Acosta</td>
							                <td>Junior Javascript Developer</td>
							                <td>Edinburgh</td>
							                <td>43</td>
							                <td>2013/02/01</td>
							                <td>$75,650</td>
							            </tr>
							            <tr>
							                <td>Cara Stevens</td>
							                <td>Sales Assistant</td>
							                <td>New York</td>
							                <td>46</td>
							                <td>2011/12/06</td>
							                <td>$145,600</td>
							            </tr>
							            <tr>
							                <td>Hermione Butler</td>
							                <td>Regional Director</td>
							                <td>London</td>
							                <td>47</td>
							                <td>2011/03/21</td>
							                <td>$356,250</td>
							            </tr>
							            <tr>
							                <td>Lael Greer</td>
							                <td>Systems Administrator</td>
							                <td>London</td>
							                <td>21</td>
							                <td>2009/02/27</td>
							                <td>$103,500</td>
							            </tr>
							            <tr>
							                <td>Jonas Alexander</td>
							                <td>Developer</td>
							                <td>San Francisco</td>
							                <td>30</td>
							                <td>2010/07/14</td>
							                <td>$86,500</td>
							            </tr>
							            <tr>
							                <td>Shad Decker</td>
							                <td>Regional Director</td>
							                <td>Edinburgh</td>
							                <td>51</td>
							                <td>2008/11/13</td>
							                <td>$183,000</td>
							            </tr>
							            <tr>
							                <td>Michael Bruce</td>
							                <td>Javascript Developer</td>
							                <td>Singapore</td>
							                <td>29</td>
							                <td>2011/06/27</td>
							                <td>$183,000</td>
							            </tr>
							            <tr>
							                <td>Donna Snider</td>
							                <td>Customer Support</td>
							                <td>New York</td>
							                <td>27</td>
							                <td>2011/01/25</td>
							                <td>$112,000</td>
							            </tr> -->
							        </tbody>
							    </table>
							</div>
						</div>
						<div class="featured-main-joueur-bas" style="padding-top: 4px;text-align: center;width: 100%; height: 280px;">
							<input type="text" id="ajoutMembre" class="bouton" value="Ajouter un membre"/>
							<!--<input type="text" id="export" class="bouton" value="Imprimer la liste"/>-->
						</div>
						<!-- End Main Slide Item -->

						<div class="cl">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main -->
	<div id="main">
		<div class="shell">
			<div id="sidebar">

			</div>
			<div id="content">

			</div>
		</div>
	</div>
	<!-- End Main -->

	<!-- Bandeau sponsors -->
	<?php
	  include("bandeau_sponsors.php");
	?>
	<!-- End bandeau sponsors -->

	<!-- Footer -->
	<?php
	  include("footer.php");
	?>
	<!-- End Footer -->

	<div class="apercuImpression" id="apercuImpression" style="display: none;"></div>
</body>
</html>