<div id="texte">
	<?php
	if (!empty($_GET["page"])){
		$page=$_GET["page"];}
	else
	{
		$page=0;

	}
	switch ($page) {
//
// Personnes
//
<<<<<<< HEAD
case 0:
$pdo = new Mypdo();
$etudiantManager = new EtudiantManager($pdo);
$professeurManager = new ProfesseurManager($pdo);

if($etudiantManager->estPresent($_SESSION["per_num"])){
	include_once('pages/accueil_eleve.inc.php');
}else{
	include_once('pages/connexion.inc.php');
}
	break;
=======
		case 0:
			// inclure ici la page accueil photo
			include_once('pages/connexion.inc.php');
			break;
>>>>>>> 5bf8563a61850c6a38e370077f451800a655a437
		case 1:

			include_once('pages/insererTabExcel.inc.php');
			break;
		// page insertion nouveau client
		case 2:
			// inclure ici la page insertion nouvelle personne
			include("pages/SaisiFormules.inc.php");
			break;
		case 3:
			// inclure ici la page insertion nouvelle personne
			include("pages/CreerUnSujet.inc.php");
			break;

		case 4:
			include("pages/connexion.inc.php");
			break;

		case 5:
			include("pages/page_eleve.inc.php");
			break;

		case 6:
			include("pages/page_prof.inc.php");
			break;
<<<<<<< HEAD
			case 7:
				include("pages/deconnexion.inc.php");
				break;
				case 8:
					include("header.inc.php");
					break;
					case 9:
						include("pages/accueil_eleve.inc.php");
						break;
=======
		case 7:
			include("pages/deconnexion.inc.php");
			break;
		case 8:
			include("pages/SupprimerSujet.inc.php");
			break;
		case 9:
			include("pages/creerUneCorrection.inc.php");
			break;
>>>>>>> 5bf8563a61850c6a38e370077f451800a655a437


		default : 	include_once('connexion.inc.php');
	}

	?>
</div>
