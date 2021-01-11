<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Creer un Sujet</title>
	<!-- Include the Quill library -->
	<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
	<script type="text/javascript" src="Classes/CreerUnSujet.class.js"></script>
	<!-- Include stylesheet -->
	<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
	<form action="index.php?page=3" method="post">
        <input name="title" type="text">
		<!-- Create the editor container -->
		<div class="row form-group">
			<div id="editor-container"></div>
		</div>
		<div class="row">
			<button class="btn btn-primary" type="submit">Sauvegarder</button>
		</div>
		<input name="about" type="hidden">
	</form>
<!-- Initialize Quill editor -->
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

        var data = about.value;

        return false;
    };
</script>
</body>
</html>