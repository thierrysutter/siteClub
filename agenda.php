<?php
ob_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
	  include("tac.php");
	?>
	<meta charset="windows-1252">
	<meta http-equiv="Cache-Control" content="max-age=600" />
	<meta http-equiv="Expires" content="Thu, 31 Dec 2015 23:59:59 GMT" />
	<meta name=viewport content="width=device-width, initial-scale=1">
	<meta name="keywords" content="mots-cl�s" />
    <meta name="description" content="description" />
    <meta name="author" content="auteur">
	<title>AS SAINT JULIEN LES METZ</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/slick.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/table-sorting.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/tableau.css" type="text/css" media="all"/>
	<link rel="stylesheet" href="css/filtre.css" type="text/css" media="all" />
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">-->
	<link rel="stylesheet" href="css/bootstrap4.css" type="text/css">

	<script type="text/javascript" src="js/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery.ui.datepicker-fr.min.js"></script>
	<script type="text/javascript" src="js/slick.js"></script>
	<!-- <script type="text/javascript" src="js/scripts.js"></script> -->
	
	<script type="text/javascript">
		$(document).ready(function(){
			/* m�thode tri pour les colonnes contenant des dates */
			jQuery.fn.dataTableExt.oSort['date-asc']  = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? -1 : ((x > y) ?  1 : 0));
			    */
			    return ((a<b) ? -1 : ((a>b) ? 1 : 0));
			};

			jQuery.fn.dataTableExt.oSort['date-desc'] = function(a,b) {
			    /*
			    var datea = a.split('/');
			    var dateb = b.split('/');

			    var x = (datea[2] + datea[1] + datea[0]) * 1;
			    var y = (dateb[2] + dateb[1] + dateb[0]) * 1;

			    return ((x < y) ? 1 : ((x > y) ?  -1 : 0));
				*/
				return ((a<b) ? 1 : ((a>b) ? -1 : 0));
			};

			jQuery.extend( jQuery.fn.dataTableExt.oSort, {
			    "date-dmy-pre": function ( a ) {
			        if (a == null || a == "") {
			            return 0;
			        }
			        var date = a.split('/');
			        return (date[2] + date[1] + date[0]) * 1;
			    },

			    "date-dmy-asc": function ( a, b ) {
			        return ((a < b) ? -1 : ((a > b) ? 1 : 0));
			    },

			    "date-dmy-desc": function ( a, b ) {
			        return ((a < b) ? 1 : ((a > b) ? -1 : 0));
			    }
			} );

			$('#tableATrier').dataTable({
				"bPaging":   false,
				"bLengthChange": false,
				"bInfo":     false,
		        "bFilter":     false,
		        "bPaginate":   false,
		        "bAutoWidth": false,
		        "bSort": false,
		        "oLanguage": {
					"sSearch": "Filtrer ",
					"sZeroRecords": "Aucun enregistrement disponible."
				},
				"aaSorting": [ [0,'asc'] ],
		        "aoColumns": [ { "sType": "date-dmy-asc", "aTargets": [ 0 ]  }, null, null, null, null,null,{ "sSortable": false },{ "sSortable": false }]
			});

			$( ".datepicker" ).datepicker( {
				showOn: "button",
			    buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
			    buttonImageOnly: true,
				dateFormat: "dd/mm/yy",
				setDate: new Date()
			});

			$(".ui-datepicker-trigger").css({
                position: "absolute",
                marginLeft: "370px",
                marginTop: "-25px",
            });
        
			$(".ui-datepicker-trigger").each(function() {
	  			$(this).attr("alt","Calendrier");
	  			$(this).attr("title","Calendrier");
	  		});

	  		$("img.ui-datepicker-trigger").click(
  				function(){
  					$(this).parent().find(".datepicker").blur();
  				}
	  		);

			$("#lienAgenda").addClass("active");
			$("#lienClassements").removeClass("active");
			$("#lienCompteRendu").removeClass("active");
			$("#lienLiens").removeClass("active");

			$("#lienAgenda").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienClassements").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienCompteRendu").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
			$("#lienLiens").click(function(e) {
				e.preventDefault();
				$(".active").removeClass("active");
				$(this).addClass("active");
			});
		});
	</script>
</head>
<body class="w-75 mx-auto bg-light">
	<!-- Navigation Haut-->
	<?php
	  include("menuHaut.php");
	?>
	<!-- End Navigation -->
	<!-- Header -->
	<?php
	  include("head.php");
	?>
  	
	<?php	
	session_start();
	$debut = $_SESSION['debut'];
	$fin = $_SESSION['fin'];
	$categorie = $_SESSION['categorieSelectionnee'];
	$equipe = $_SESSION['equipeSelectionnee'];
	
	$listeCategories = $_SESSION['listeCategories'];
	$listeEquipes = $_SESSION['listeEquipes'];
	$listeRencontres = $_SESSION['listeRencontres'];
	?>

	<div class="my-3">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12 col-12 col-sm-12 col-lg-12 col-xl-12">
	          <form action="ActionAgenda.php" method="post" name="filtre">
	          	<input type="hidden" name="methode" id="methode" value="filtre"/>
	            <h3 class="mx-5 pb-3">Agenda</h3>
	            <div class="form-group row mx-5"> <label for="inputCategorie" class="col-sm-1 col-form-label">Cat�gorie</label>
	              <div class="col-sm-5">
		              <select class="form-control w-100 form-control-md" id="inputCategorie" name="categorie">
			              <option selected="selected" value="-1">Toutes les cat�gories</option>
			              <option value="9" <?php echo ($categorie == 9 ? "selected='selected'" : "");?>>S�niors</option>
			              <option value="6" <?php echo ($categorie == 6 ? "selected='selected'" : "");?>>U17</option>
			              <option value="5" <?php echo ($categorie == 5 ? "selected='selected'" : "");?>>U15</option>
			              <option value="4" <?php echo ($categorie == 4 ? "selected='selected'" : "");?>>U13</option>
			              <option value="3" <?php echo ($categorie == 3 ? "selected='selected'" : "");?>>U11</option>
			              <option value="2" <?php echo ($categorie == 2 ? "selected='selected'" : "");?>>U9</option>
			              <option value="1" <?php echo ($categorie == 1 ? "selected='selected'" : "");?>>U7</option>
		              </select>
	              </div> <label for="inputEquipe" class="col-sm-1 col-form-label">Equipe</label>
	              <div class="col-sm-5">
		              <select class="form-control w-100 form-control-md" id="inputEquipe" name="equipe">
			              <option selected="selected" value="-1">Toutes les �quipes</option>
			              <option value="1" <?php echo ($equipe == 1 ? "selected='selected'" : "");?>>S�niors A</option>
			              <option value="2" <?php echo ($equipe== 2 ? "selected='selected'" : "");?>>S�niors B</option>
			              <option value="19" <?php echo ($equipe== 19 ? "selected='selected'" : "");?>>S�niors C</option>
			              <option value="20" <?php echo ($equipe== 20 ? "selected='selected'" : "");?>>U17</option>
			              <option value="3" <?php echo ($equipe== 3 ? "selected='selected'" : "");?>>U15</option>
			              <option value="4" <?php echo ($equipe== 4 ? "selected='selected'" : "");?>>U13</option>
			              <option value="14" <?php echo ($equipe== 14 ? "selected='selected'" : "");?>>U11</option>
			              <option value="18" <?php echo ($equipe== 18 ? "selected='selected'" : "");?>>U9</option>
			              <option value="10" <?php echo ($equipe== 10 ? "selected='selected'" : "");?>>U7</option>
		              </select>
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <label class="col-form-label col-sm-1" for="inputDate1">Du</label>
	              <div class="col-sm-5">
	                <input type="text" id="debut" class="datepicker form-control w-100 form-control-md" id="inputDate1" name="debut" value="<?php echo $debut; ?>">
	              </div>
	              <label class="col-form-label col-sm-1" for="inputDate2">Au</label>
	              <div class="col-sm-5">
	                <input type="text" id="fin" class="datepicker form-control w-100 form-control-md" id="inputDate2" name="fin" value="<?php echo $fin; ?>">
	              </div>
	            </div>
	            <div class="form-group row mx-5">
	              <div class="col-sm-12 text-right">
	                <button type="submit" class="btn btn-primary btn-lg active" data-toggle="">Rechercher</button>
	              </div>
	            </div>
	          </form>
	        </div>
	      </div>
	    </div>
	</div>

	<div class="my-3">
	    <div class="container">
	      <!--
	      <div class="row">
	        <div class="p-0 mx-auto col-md-4">
	          <div class="card my-1 card-primary">
	            <div class="card-block p-5 card-primary">
	              <h1 class="text-center">24 Sept. 2017</h1>
	              <h3>&nbsp;</h3>
	              <hr>
	              <p><i class="fa d-inline fa-clock-o"></i>&nbsp;SENIOR C - Coupe des r�serves
	                <br> <b>AUGNY C - ST JULIEN : 3 - 10</b></p>
	            </div>
	          </div>
	        </div>
	        <div class="p-1 mx-auto col-md-4">
	          <div class="card my-1 card-primary">
	            <div class="card-block p-5 card-primary">
	              <h1 class="text-center">30 Sept. 2017</h1>
	              <h3>&nbsp;</h3>
	              <hr>
	              <p><i class="fa d-inline fa-clock-o"></i>&nbsp;SENIOR A - R�gional 4 Groupe A
	                <br> <b>ST JULIEN - ES VILLERUPT THIL B</b></p>
	              <hr>
	              <p><i class="fa d-inline fa-clock-o"></i>&nbsp;U17 - Moselle Groupe E
	                <br> <b>ES LIXING LANING - ST JULIEN</b></p>
	              <hr>
	              <p><i class="fa d-inline fa-clock-o"></i>&nbsp;U13 - Promotion Groupe F
	                <br> <b>ST JULIEN - FC WOIPPY</b></p>
	              <hr>
	              <p><i class="fa d-inline fa-clock-o"></i>&nbsp;U15 - Moselle Groupe F
	                <br> <b>ST JULIEN - FC METZ FEMININES</b></p>
	            </div>
	          </div>
	        </div>
	        <div class="p-0 mx-auto col-md-4">
	          <div class="card my-1 card-primary">
	            <div class="card-block p-5 text-center card-primary">
	              <h1>01 Oct. 2017</h1>
	              <h3>&nbsp;</h3>
	              <hr>
	              <p><i class="mx-auto fa d-inline fa-clock-o"></i>&nbsp;SENIOR B - 2D Groupe D
	                <br> <b>ST JULIEN - ES MAIZIERES</b></p>
	              <hr>
	              <p><i class="mx-auto fa d-inline fa-clock-o"></i>&nbsp;SENIOR C - 3D Groupe I
	                <br> <b>AUGNY B - ST JULIEN</b></p>
	            </div>
	          </div>
	        </div>
	      </div>
	      -->
	      <div class="col-md-12">
	        <table class="table table-bordered table-striped table-hover table-responsive">
	          <thead class="thead-inverse">
	            <tr>
	              <th>#</th>
	              <th>Date</th>
	              <th>Cat�gorie</th>
	              <th>Equipe</th>
	              <th>Comp�tition</th>
	              <th>Adversaire</th>
	              <th>Lieu</th>
	              <th>Score</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	<?php foreach($listeRencontres as $rencontre) { ?>
	            <tr>
	              <th scope="row">&nbsp;</th>
	              <td><?php echo date_format(new DateTime($rencontre->getJour()), 'd/m/Y');?></td>
	              <td><?php echo $rencontre->getLibelleCategorie();?></td>
				  <td><?php echo $rencontre->getLibelleEquipe();?></td>
				  <td><?php echo $rencontre->getLibelleCompetition();?></td>
				  <td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? $rencontre->getEquipeExt() : $rencontre->getEquipeDom());?></td>
				  <td><?php echo ($rencontre->getEquipeDom() == "ST JULIEN" ? "Domicile" : "Ext�rieur");?></td>
				  <td><?php echo $rencontre->getStatut()>0 ? $rencontre->getScoreDom()." - ".$rencontre->getScoreExt() : "";?></td>
				  <td>
					<?php if ($rencontre->getStatut()>0) { ?>
					<img class="cr" id="cr_<?php echo $rencontre->getId();?>" src="images/compteRendu16.png" style="border: 0;cursor: pointer;" title="Compte rendu"/>
					<?php } ?>
				  </td>
	            </tr>
	            <?php } ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	</div>

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

</body>
</html>
<?php
ob_end_flush();
?>