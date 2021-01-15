<?php session_start();

if(empty($_SESSION["estConnecte"])){
	$_SESSION["estConnecte"]= false;
} ?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_css.css" />
</head>

<?php $pdo = new Mypdo();
$personneManager = new PersonneManager($pdo);
if ($personneManager->estEtudiant($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"])) { ?>
<!-- menu élève -->
    <body>
        <nav role="navigation" class="primary-navigation">
            <ul>
                <li><a href="pages/page_eleve.inc.php">Accueil</a></li>
                <li><a href="#">Questions &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="#">Question 1</a></li> <!-- ajout d'ancres -->
                        <li><a href="#">Question 2</a></li>
                    </ul>
                </li>
                <li><a href="#">Informations</a></li>
            </ul>
        </nav>
    </body>

<?php } if ($personneManager->estProfesseur($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"])) { ?>
<!-- menu professeur -->
    <body>
        <nav role="navigation" class="primary-navigation">
            <ul>
                <li><a href="pages/page_prof.inc.php">Accueil</a></li>
                <li><a href="#">Formules &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="pages/SaisiFormules.inc.php">Créer une formule</a></li>
                        <li><a href="#">Voir les formules</a></li>
                    </ul>
                </li>
                <li><a href="#">Sujets &dtrif;</a>
                    <ul class="dropdown">
                        <li><a href="pages/CreerUnSujet.inc.php">Créer un sujet</a></li>
                        <li><a href="#">Importer des images</a></li>
                    </ul>
                </li>
                <li><a href="#">Informations</a></li>
            </ul>
        </nav>
    </body>

<?php } else { ?>
<!-- menu temporaire -->
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
