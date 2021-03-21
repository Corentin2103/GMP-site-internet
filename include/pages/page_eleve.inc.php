<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page élève</title>
    <link rel="stylesheet" type="text/css" href="../../css/style_css.css" />
    <script type="text/javascript" src="../../javascript/script.js"></script>
</head>
<body>

<?php $pdo = new Mypdo();
$manager = new ReponseManager($pdo);
$uniteManager = new UniteManager($pdo);
$listeUnite = $uniteManager->getLIst();?>

<!-- Quesiton 1 -->



<?php if(empty($_POST['answer1']) && empty($_POST['unite1'])) { //premier appel ?>
<div class="question1">

    <h1>Question 1</h1>

    <div class="rap">
        <h2>Rappel du sujet</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere felis a auctor faucibus. Suspendisse accumsan, urna sed lobortis finibus, urna urna aliquet quam, pulvinar pellentesque orci mauris sed tortor. Donec molestie ligula sed urna volutpat faucibus non eget urna. Nam rhoncus ullamcorper neque, eu luctus ex malesuada in. Mauris porta dictum turpis at molestie.</p>
    </div>

    <div class="sous-question">
        <input type="number" id="answer1" name="answer" placeholder="Votre réponse">

        <select name="unite" id="unite1">
            <?php
                foreach ($listeUnite as $unite) {?>
                    <option value="<?php echo $unite->getUniteNom(); ?>"><?php echo $unite-getUniteNom();?>></option>
                <?php } ?>>
        </select>
    </div>

    <!-- bouton enregistrer -->
    <div class="buttons">
        <div class="container">
            <button typ="submit" class="btn effect01" target="_blank"><span>Enregistrer</span></button>
        </div>
    </div>
</div>

<?php } else { //ajout dans la base de données}

    $reponse = new Reponse($_POST);
    $retour = $manager->add($reponse);
    echo 'Réponse enregistrée';

    echo 'La réponse a été ajoutée';
} ?>
















    <!-- Quesiton 2 -->
    <div class="question2">
        <h1>Question 2</h1>
        <div class="rap">
            <h2>Rappel du sujet</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere felis a auctor faucibus. Suspendisse accumsan, urna sed lobortis finibus, urna urna aliquet quam, pulvinar pellentesque orci mauris sed tortor. Donec molestie ligula sed urna volutpat faucibus non eget urna. Nam rhoncus ullamcorper neque, eu luctus ex malesuada in. Mauris porta dictum turpis at molestie.</p>
        </div>
        <div class="sous-question">
            <input type="number" id="answer2" name="answer" placeholder="Votre réponse">
            <select name="unite" id="unite-select2">
                <option value="">  Choisir l'unité  </option>
                <option value="metre">m</option>
                <option value="newton">N</option>
                <option value="newtion_par_metre">N.m²</option>
            </select>
        </div>
        <div class="buttons">
            <div class="container">
                <button class="btn effect01" target="_blank"><span>Enregistrer</span></button>
            </div>
        </div>
    </div>
</body>
