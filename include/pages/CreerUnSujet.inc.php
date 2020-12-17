<?php
  function boutons(){
      $boutons = array('G','I','S','Taille','Couleur');

      foreach ($boutons as $bouton){
          if ($bouton != 'Taille'){
			  echo '<input type="button" id="bouton_' . $bouton . '" onClick="formatText(\'' . $bouton . '\')" value="' . $bouton . '" />';
		  }else{
              ?>
              <FORM NAME="taillePolice">
                  <SELECT NAME="taille" onChange="formatText('Taille')">
                      <OPTION VALUE="8">8px
                      <OPTION VALUE="12">12px
                      <OPTION VALUE="14">14px
                      <OPTION VALUE="16">16px
                  </SELECT>
              </FORM>
              <?php
          }
      }
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Creer un Sujet</title>
	<script src="CreerUnSujet.js" ></script>
    <style type="text/css">
        textarea {display : none}
    </style>
</head>
<body onload="loadiframe()">
<h1>Creer un sujet</h1>
<form name="editeur" id="editeur" method="post" action="">
	<div>
		<label>Zone de texte</label><br>
		<?php echo boutons(); ?>
        <br>
        <textarea type="text" name="zoneTexte" id="zoneTexte" cols="45" rows="20"></textarea>
        <iframe name="frm" id="frm" ></iframe>
	</div>
</form>
</body>
</html>