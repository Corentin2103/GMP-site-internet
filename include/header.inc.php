<?php session_start();

if(empty($_SESSION["estConnecte"])){
	$_SESSION["estConnecte"]= false;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_css.css" />
</head>
<?php
$pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
if ($personneManager->estEtudiant($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"])) { ?>
<body>
	<main id="exercice">
		<div id="header" class="botbor">
			<h1> Réponses au sujet </h1>
			<p>Connecté en tant que : eleve@etu.unilim.fr <br>
			<form action="#" >
				<button class="deco" type ="submit" name="deconnexion"> Deconnexion </button>
			</form>
			<div>
				<label for="avancement">Avancement :</label>
			</div>
		</div>
<?php }
if ($personneManager->estProfesseur($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"])) {
	echo "Professeur";
} else { ?>
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
		    <div id="connect">
		        <a href="index.php?page=3">Créer un sujet</a>
		    </div>
				<div id="connect">
		        <a href="index.php?page=4">Connexion</a>
		    </div>
				<div id="connect">
		        <a href="index.php?page=5">page_eleve</a>
		    </div>
				<div id="connect">
		        <a href="index.php?page=6">page_prof</a>
		    </div>
		</div>
<?php } ?>
