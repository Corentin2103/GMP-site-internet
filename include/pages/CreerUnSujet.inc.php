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
if (empty($_GET["id_sujet"])){ //Choix du sujet
	if (!empty($_POST["nouv_titre"])){
		if ($sujetManager->titreDejaPresent($_POST["nouv_titre"])){
			$erreurTitre = true;
		}else {
			$erreurTitre = false;
			$sujet = new Sujet($_POST);
			$sujet->setTitre($_POST["nouv_titre"]);
			$sujetManager->add($sujet);
			$lastInsertId = $pdo->lastInsertId();
		}
	} ?>
    <h1>Veuillez choisir un sujet</h1>
    <table>
		<?php
		$listeSujets = $sujetManager->getAllSujets();
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
        <label>Le titre <?php echo $_POST["nouv_titre"]; ?> existe dejà.</label>
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
        <!-- Create the editor container
		Problème avec le css, on ne voit pas les enrichissements de texte-->
        <div class="row form-group">
            <div id="editor-container"></div>
        </div>

        <input name="sujet_file" type="hidden"/>
        <input name="sujet_file_html" type="hidden"/>
        <div class="row">
            <button onclick="transforme()">Sauvegarder</button>
        </div>
    </form>
<?php }
if (!empty($_POST["sujet_file"]) && !empty($_POST["sujet_file_html"]) && !empty($_POST["titre"])){
	$sujet = new Sujet($_POST);
	$sujet->setIdSujet($_GET["id_sujet"]);
	$sujetManager->save($sujet);
	$formuleManager = new FormuleManager($pdo);
	$formules = $formuleManager->getAllForm();

	$texte_brut = strip_tags($_POST["sujet_file_html"]);
	$nb_iter_debut = substr_count($texte_brut,"{{");
	$nb_iter_fin = substr_count($texte_brut,"}}");
	$nb_iter = min($nb_iter_debut,$nb_iter_fin);
	for ($i = 0; $i < $nb_iter; $i++) {
		$pos = strpos($texte_brut, "{{");
		$new_texte_brut = substr($texte_brut, $pos + 2);
		$pos_fin = strpos($new_texte_brut, "}}");
		$variable = substr($new_texte_brut, 0, $pos_fin);
		$texte_brut=substr($new_texte_brut,2);
		$tab_variable[$i] = $variable;
	}?>
    <table><?php
		if(isset($tab_variable)){
			foreach ($tab_variable as $variable){ ?>
                <tr>
                    <td><?php echo $variable; ?></td>
                    <td><select name="var_remplacement">
                            <option value="variable1">var1</option>
                            <option value="variable2">var2</option>
                            <option value="variable3">var3</option>
                            <option value="variable4">var4</option>
                            <option value="variable5">var5</option>
                            <option value="variable6">var6</option>
                            <option value="variable7">var7</option>
                            <option value="variable8">var8</option>
                            <option value="variable9">var9</option>
							<?php
							foreach($formules as $formule){
								?><option value="<?php echo $formule->getNumEq(); ?>"><?php echo $formule->getLibEq(); ?></option>
								<?php
							}
							?>
                        </select>
                    </td>
                </tr>
			<?php }
		}else{
			?> <p>Aucune champ variable détecté</p>
		<?php } ?>
    </table>

	<?php
}
?>
</body>
<script>
    var quill = new Quill('#editor-container', {
        modules: {
            toolbar: toolbarOptions
        },
        theme: 'snow'
    });

    function transforme(){
        var sujet_file = document.querySelector('input[name=sujet_file]');
        var sujet_file_html = document.querySelector('input[name=sujet_file_html]');

        sujet_file.value = JSON.stringify(quill.getContents());
        sujet_file_html.value = quill.root.innerHTML;

        return false;
    }
</script>
</html>