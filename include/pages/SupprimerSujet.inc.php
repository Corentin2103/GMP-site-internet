<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Supprimer un Sujet</title>
</head>
<body>
<h1>Supprimer un sujet</h1>
<?php
$pdo = new Mypdo();
$sujetManager = new sujetManager($pdo);
$sujets = $sujetManager->getAllSujets();
if (empty($_GET["id_sujet"])){
    if (!empty($sujets)){
?>
<table>
	<tr>
		<th>Nom du sujet</th>
		<th></th>
	</tr>
	<?php
	foreach ($sujets as $sujet) { ?>
		<tr>
			<td><?php echo $sujet->getTitre(); ?></td>
			<td><a href="index.php?page=8&id_sujet=<?php echo $sujet->getIDSujet() ?>">Supprimer</a></td>
		</tr>
	<?php }
    } else { ?>
        <p>Aucun sujet sauvegardé</p>
    <?php }
    ?>
</table>
<?php } else{
	$sujetManager->supprimerSujet($_GET["id_sujet"]);
	header("Location: index.php?page=8");
}