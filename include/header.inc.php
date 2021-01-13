<?php session_start();

if(empty($_SESSION["estConnecte"])){
	$_SESSION["estConnecte"]= false;
}
?>
<!doctype html>
<html lang="fr">

<head>

    <meta charset="utf-8"> 

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
    <div id="connect">
        <a href="index.php?page=3">Créer un sujet</a>
    </div>

</div>
