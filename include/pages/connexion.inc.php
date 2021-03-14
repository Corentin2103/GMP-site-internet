<?php if(!$_SESSION["estConnecte"]){

$_SESSION["per_num"] = "";
$_SESSION["Login"]="";
$db = new Mypdo;
$personneManager = new PersonneManager($db);

if(!empty($_POST["per_mail"]) && !empty($_POST["per_mdp"])
    && $personneManager->EstPresent($_POST["per_mail"],$_POST["per_mdp"])){
  $_SESSION["estConnecte"]= true;
  $_SESSION["Login"] = $_POST["per_mail"];
  $_SESSION["per_num"] = $personneManager->RecupPersNum($_SESSION["Login"])["per_num"];
  header("Location: index.php");
}
if(!empty($_POST["per_mail"]) && !empty($_POST["per_mdp"])
     && !$personneManager->EstPresent($_POST["per_mail"],$_POST["per_mdp"])){ ?>
      <label>Mot de passe ou login incorrect</label>
<?php }

//AFFICHAGE SE CONNECTER
if (empty($_POST["per_mail"]) && empty($_POST["per_mdp"])){ ?>
<link rel="stylesheet" type="text/css" href="css/style_css.css" />
<form id="page_connexion" action="#" method="POST">
  <div class="login">
      <h1>Connexion</h1>
      <form method="post" action="">
          <p><input type="email" id="per_mail" name="per_mail" value="" placeholder="Email"></p><br>
          <p><input type="password" id="per_mdp" name="per_mdp" value="" placeholder="Mot de passe"></p><br>
          <p class="remember_me">
              <label>
                  <!--<input type="checkbox" name="remember_me" id="remember_me">
                  Se souvenir de moi -->
              </label>
          </p>
          <p class="submit"><input type="submit" name="commit" value="Se connecter"></p>
      </form>
  </div>

  
</form>

<?php }
} ?>
