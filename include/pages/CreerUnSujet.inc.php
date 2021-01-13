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
<form id="insert" method="post">
    <input name="titre" type="text" value="<?php
	if (!empty($_POST["titre"])){
		echo $_POST["titre"];
	} ?>" />
    <!-- Create the editor container -->
    <div class="row form-group">
        <div id="editor-container"><?php
			if (!empty($_POST["old_text"])){
				echo $_POST["old_text"];
			}
			?></div>
    </div>
    <div class="row">
        <button onclick="transforme()">Sauvegarder</button>
    </div>
    <input name="sujet_file" type="hidden"/>
    <input name="old_text" type="hidden"/>
</form>
<?php
if (!empty($_POST["sujet_file"]) && !empty($_POST["titre"])){
	$pdo = new Mypdo();
	$sujetManager = new sujetManager($pdo);
	$sujet = new Sujet($_POST);
	$sujet->setTitre($_POST["titre"]);
	$sujet->setSujet_File($_POST["sujet_file"]);
	$sujetManager->add($sujet);
}
?>
</body>
<script>
    function transforme(){
        var sujet_file = document.querySelector('input[name=sujet_file]');
        var old_text = document.querySelector('input[name=old_text]');

        sujet_file.value = JSON.stringify(quill.getContents());
        old_text.value=quill.getText(0, quill.getLength());

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
