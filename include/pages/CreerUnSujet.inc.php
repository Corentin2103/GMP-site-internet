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

<form action="#" id="insert" method="post">
    <input name="titre" type="text"/>
    <!-- Create the editor container -->
    <div class="row form-group">
        <div id="editor-container"></div>
    </div>
    <div class="row">
        <button onclick="transforme()">Sauvegarder</button>
    </div>
    <input name="sujet_file" type="hidden"/>
</form>
<?php
if (!empty($_POST["sujet_file"])){
	$pdo = new Mypdo();
	$sujetManager = new sujetManager($pdo);
	$sujet = new Sujet($_POST);
	print_r($_POST);
	print_r($sujet);
	$sujetManager->add($sujet);
}
?>
</body>
<script>
    function transforme(){
        var form = document.querySelector('form');
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
