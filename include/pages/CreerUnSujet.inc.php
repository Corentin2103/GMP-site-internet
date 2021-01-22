<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Creer un Sujet</title>
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script type="text/javascript" src="classes/CreerUnSujet.class.js"></script>
    <!-- Include stylesheet -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
<?php
$pdo = new Mypdo();
$sujetManager = new sujetManager($pdo);
$listeSujets = $sujetManager->getAllSujets();
if (empty($_GET["id_sujet"])){
	if (!empty($_POST["nouv_titre"])){
		if ($sujetManager->titreDejaPresent($_POST["nouv_titre"])){
			$erreurTitre = true;
		}else {
			$erreurTitre = false;
			$sujet = new Sujet($_POST);
			$sujet->setTitre($_POST["nouv_titre"]);
			$sujetManager->add($sujet);
			$lastInsertId = $pdo->lastInsertId();
			header("Location : index.php?page=3");
		}
	} ?>
    <h1>Veuillez choisir un sujet</h1>
    <table>
		<?php
		foreach ($listeSujets as $sujet){
			?>
            <tr>
                <td><?php echo $sujet->getTitre(); ?></td>
                <td><a href="index.php?page=3&id_sujet=<?php echo $sujet->getIdSujet(); ?>" id="btn-choix">Choisir</a></td>
            </tr>
		<?php }
		?>
    </table>
	<?php if (isset($erreurTitre) && $erreurTitre){ ?>
        <div id="erreurTitre">
        <label>Le titre <?php echo $_POST["nouv_titre"]; ?> existe dejà. </label>
	<?php } ?>
    </div>
    <form action="#" method="post">
        <input type="text" name="nouv_titre">
        <input type="submit" value="Créer">
    </form>
<?php }else{ ?>
    <form id="insert" method="post">
        <input name="titre" type="text" value="<?php
		echo $sujetManager->getSujetById($_GET["id_sujet"])["titre"];
		?>" />
        <!-- Create the editor container -->
        <div class="row form-group">
            <div id="editor-container"></div>
        </div>
        <div class="row">
            <button onclick="transforme()">Sauvegarder</button>
        </div>
        <input name="sujet_file" type="hidden"/>
    </form>
<?php }
if (!empty($_POST["sujet_file"]) && !empty($_POST["titre"])){
	$sujet = new Sujet($_POST);
	$sujet->setTitre($_POST["titre"]);
	$sujet->setSujetFile($_POST["sujet_file"]);
	$sujet->setIdSujet($_GET["id_sujet"]);
	$sujetManager->save($sujet);
}
?>
</body>
<script>
    var QuillDeltaToHtmlConverter = require('quill-delta-to-html').QuillDeltaToHtmlConverter;

    function transforme(){
        var sujet_file = document.querySelector('input[name=sujet_file]');

        sujet_file.value = JSON.stringify(quill.getContents());

        return false;
    }
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });
</script>
</html>