<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page élève</title>
    <link rel="stylesheet" type="text/css" href="../../css/style_css.css" />
    <script type="text/javascript" src="../../javascript/script.js"></script>
</head>
<body>
<!-- A U C U N   P H P   P O U R   L E   M O M E N T -->
<!-- Quesiton 1 -->
<div class="question">
    <h1>Question 1</h1>
    
    <div class="rap">
        <h2>Rappel du sujet</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere felis a auctor faucibus. Suspendisse accumsan, urna sed lobortis finibus, urna urna aliquet quam, pulvinar pellentesque orci mauris sed tortor. Donec molestie ligula sed urna volutpat faucibus non eget urna. Nam rhoncus ullamcorper neque, eu luctus ex malesuada in. Mauris porta dictum turpis at molestie.</p>
    </div>

    <div class="sous-question">
        <input type="number" id="answer1" name="answer" placeholder="Votre réponse">
        <select name=unite" id="unite-select1">
            <option value="">  Choisir l'unité  </option>
            <option value="metre">m</option>
            <option value="newton">N</option>
            <option value="newtion_par_metre">N.m²</option>
        </select>
    </div>
    <!-- bouton enregistrer -->
    <div class="buttons">
        <div class="container">
            <button class="btn effect01" target="_blank"><span>Enregistrer</span></button>
        </div>
    </div>
</div>

    <!-- Quesiton 2 -->
    <div class="question">
        <h1>Question 2</h1>
        <div class="sous-question">
            <input type="number" id="answer2" name="answer" placeholder="Votre réponse">
            <select name=unite" id="unite-select2">
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
