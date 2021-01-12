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
<?php if (empty($_POST["about"])) {?>
    <form action="#" id="insert" method="post">
        <input name="titre" type="text"/>
        <!-- Create the editor container -->
        <div class="row form-group">
            <div id="editor-container"></div>
        </div>
        <div class="row">
            <input type="submit" value="Sauvegarder">
        </div>
        <input name="about" type="hidden"/>
    </form>
    <!-- Initialize Quill editor -->
	<?php
}
echo "test";
if (!empty($_POST["about"])){
	echo "test";
	print_r($_POST);
	$pdo = new Mypdo();
	$sujetManager = new sujetManager($pdo);
	$sujet = new Sujet($_POST);
	print_r($sujet);
}
echo "test2";
?>
</body>
<script>
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    var form = document.querySelector('form');
    form.onsubmit = function() {
        // Populate hidden form on submit
        var about = document.querySelector('input[name=about]');

        about.value = JSON.stringify(quill.getContents());

        alert("about " + about.value);

        return false;
    };
</script>
</html>