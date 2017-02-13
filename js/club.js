$(document).ready(function() {
  /**
   * @return {undefined}
   */
  function init() {
    $.post("EnvoyerMessage.php", {
      origine : "organigramme",
      civilite : $("#civilite").val(),
      nom : $("#nom").val(),
      prenom : $("#prenom").val(),
      email : $("#email").val(),
      objet : $("#objet").val(),
      message : $("#contenu").val(),
      captcha : $("#captcha").val(),
      destinataire : $("#destinataire").val()
    }, function(error) {
      alert(error);
    });
    $("#emailDialog").dialog("close");
  }
  $("#presentation").toggle(true);
  $("#palmares").toggle(false);
  $("#reglement").toggle(false);
  $("#installations").toggle(false);
  $("#organigramme").toggle(false);
  $("#lienPresentation").addClass("active");
  $("#lienPalmares").removeClass("active");
  $("#lienReglement").removeClass("active");
  $("#lienInstallations").removeClass("active");
  $("#lienOrganigramme").removeClass("active");
  $("#lienPresentation").click(function(types) {
    types.preventDefault();
    $(".active").removeClass("active");
    $(this).addClass("active");
    $("#presentation").toggle(true);
    $("#palmares").toggle(false);
    $("#reglement").toggle(false);
    $("#installations").toggle(false);
    $("#organigramme").toggle(false);
  });
  $("#lienPalmares").click(function(types) {
    types.preventDefault();
    $(".active").removeClass("active");
    $(this).addClass("active");
    $("#presentation").toggle(false);
    $("#palmares").toggle(true);
    $("#reglement").toggle(false);
    $("#installations").toggle(false);
    $("#organigramme").toggle(false);
  });
  $("#lienReglement").click(function(types) {
    types.preventDefault();
    $(".active").removeClass("active");
    $(this).addClass("active");
    $("#presentation").toggle(false);
    $("#palmares").toggle(false);
    $("#reglement").toggle(true);
    $("#installations").toggle(false);
    $("#organigramme").toggle(false);
  });
  $("#lienInstallations").click(function(types) {
    types.preventDefault();
    $(".active").removeClass("active");
    $(this).addClass("active");
    $("#presentation").toggle(false);
    $("#palmares").toggle(false);
    $("#reglement").toggle(false);
    $("#installations").toggle(true);
    $("#organigramme").toggle(false);
  });
  $("#lienOrganigramme").click(function(types) {
    types.preventDefault();
    $(".active").removeClass("active");
    $(this).addClass("active");
    $("#presentation").toggle(false);
    $("#palmares").toggle(false);
    $("#reglement").toggle(false);
    $("#installations").toggle(false);
    $("#organigramme").toggle(true);
  });
  $("#emailDialog").dialog({
    autoOpen : false,
    height : 425,
    width : 705,
    modal : true,
    title : "Envoi d'un message",
    buttons : {
      /** @type {function (): undefined} */
      Envoyer : init,
      /**
       * @return {undefined}
       */
      Annuler : function() {
        $(this).dialog("close");
      }
    }
  });
  $("#videoDialog").dialog({
    autoOpen : false,
    height : 450,
    width : 600,
    modal : true,
    title : "Lecteur vid\u00c3\u00a9o",
    buttons : {
      /**
       * @return {undefined}
       */
      Fermer : function() {
        $(this).dialog("close");
      }
    }
  });
  $(".vignette").click(function() {
    $id = $(this).prop("id");
    $src = $(this).prop("src");
    $("#detailPhoto").prop("src", $src);
    $video = $("#video_" + $id).val();
    $typeVideo = $("#typeVideo_" + $id).val();
    if ("" != $video) {
      $("#imageLecteurVideo").css("display", "");
      $("#nomFichierVideo").val($video);
      $("#extensionFichierVideo").val($typeVideo);
    } else {
      $("#imageLecteurVideo").css("display", "none");
      $("#nomFichierVideo").val("");
      $("#extensionFichierVideo").val("");
    }
    $nom = $("#nom_" + $id).val();
    $prenom = $("#prenom_" + $id).val();
    $dateNaissance = $("#dateNaissance_" + $id).val();
    $fonction = $("#fonction_" + $id).val();
    $numLicence = $("#numLicence_" + $id).val();
    $email = $("#email_" + $id).val();
    $("#identiteDetail").html(null != $nom && (null != $prenom && "" != $nom) || "" != $prenom ? $nom + " " + $prenom : "");
    $("#ageDetail").html(null != $dateNaissance && "" != $dateNaissance ? $dateNaissance : "");
    $("#fonctionDetail").html(null != $fonction && "" != $fonction ? $fonction : "");
    $("#destinataire").val(null != $email && "" != $email ? $email : "");
  });
  $(".email").click(function() {
    $("#emailDialog").dialog("open");
  });
  $(".lecteurVideo").click(function() {
    alert("ouverture de la video");
    $("#lecteurVideoPopup>source").prop("src", $("#nomFichierVideo").val());
    $("#lecteurVideoPopup>source").prop("type", "video/" + $("#extensionFichierVideo").val());
    $("#lecteurVideoPopup").load();
    $("#videoDialog").dialog("open");
  });
});
