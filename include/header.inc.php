<?php session_start();

if(empty($_SESSION["estConnecte"])){
  $_SESSION["estConnecte"]= false;
}
 ?>
<!doctype html>
<html lang="fr">

<head>

  <meta charset="utf-8">

<?php
		$title = "Bienvenue sur le site de covoiturage de l'IUT.";?>
		<title>
		<?php echo $title ?>
		</title>

<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
</head>
	<body>
	<div id="header">
		<div id="entete">
			
		</div>
    <div id="connect">
      <a href="index.php?page=1">inserer Tableau excel</a>
    </div>
    <div id="connect">
      <a href="index.php?page=2">Saisi formules</a>
    </div>

	</div>
