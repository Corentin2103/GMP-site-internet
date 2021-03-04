<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Creer une Correction</title>
</head>
<body>
<?php
$pdo = new Mypdo();
$sujetManager = new sujetManager($pdo);
$listeSujets = $sujetManager->getAllSujets();
if (empty($_GET["id_sujet"])){
?> <table> <?php
	foreach($listeSujets as $sujet){
		?>
		<tr>
			<td><?php echo $sujet->getTitre(); ?></td>
			<td><a href="index.php?page=9&id_sujet=<?php echo $sujet->getIdSujet(); ?>" id="btn-choix">Choisir</a></td>
		</tr>
		<?php
	} ?>
</table>
<?php
}