<div id="texte">
<?php
if (!empty($_GET["page"])){
	$page=$_GET["page"];}
	else
	{
    $page=1;
	}
switch ($page) {
//
// Personnes
//

case 1:
	// inclure ici la page accueil photo
	include_once('pages/insererTabExcel.inc.php');
	break;
	// page insertion nouveau client
case 2:
	// inclure ici la page insertion nouvelle personne
	include("pages/SaisiFormules.inc.php");
    break;



default : 	include_once('header.inc.php');
}

?>
</div>
