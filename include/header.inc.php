<?php session_start();
if(empty($_SESSION["estConnecte"])){
$_SESSION["estConnecte"] = false;
}
if($_SESSION["estConnecte"]){
  require_once("classes/Etudiant.class.php");
  require_once("classes/EtudiantManager.class.php");
 ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_css.css" />
</head>

<?php
$pdo = new Mypdo();
$etudiantManager = new EtudiantManager($pdo);
$professeurManager = new ProfesseurManager($pdo);
if($etudiantManager->estPresent($_SESSION["per_num"])){
 ?>

<!-- menu élève -->
    <body>
        <nav role="navigation" class="primary-navigation">
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Questions &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="#">Question 1</a></li>
                        <li><a href="#">Question 2</a></li>
                    </ul>
                </li>
                <li><a href="#">Informations</a></li>
            </ul>
        </nav>
    </body>

<?php
}
if($professeurManager->estPresent($_SESSION["per_num"])){  ?>
<!-- menu professeur -->
    <body>
        <nav role="navigation" class="primary-navigation">
            <ul>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Formules &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="#">Créer une formule</a></li>
                        <li><a href="#">Voir les formules</a></li>
                    </ul>
                </li>
                <li><a href="#">Sujets &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="#">Créer un sujet</a></li>
                        <li><a href="#">Importer des images</a></li>
                    </ul>
                </li>
                <li><a href="#">Informations</a></li>
            </ul>
        </nav>
    </body>

<?php
}  ?>
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
<?php }
 ?>
