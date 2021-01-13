<?php
$_SESSION["mail"] = null;
$_SESSION["mot_de_passe"] = null;
$_SESSION["mail_connexion"] = null;

if (empty($_POST["mail"]) && empty($_POST["mot_de_passe"]) && empty($_SESSION["mail_connexion"])
    && empty($_SESSION["mail"]) && empty($_SESSION["mot_de_passe"])) {?>

    <form id="page_connexion" action="#" method="POST">
        <div class="login">
            <h1>Connexion</h1>
            <form method="post" action="">
                <p><input type="email" id="mail" name="mail" value="" placeholder="Email"></p><br>
                <p><input type="password" id="mot_de_passe" name="mot_de_passe" value="" placeholder="Mot de passe"></p><br>
                <p class="remember_me">
                    <label>
                        <input type="checkbox" name="remember_me" id="remember_me">
                        Se souvenir de moi
                    </label>
                </p>
                <p class="submit"><input type="submit" name="commit" value="Se connecter"></p>
            </form>
        </div>

        <div class="login-help">
            <p>Mot de passe oublié? <a href="#">Appuyer ici pour le modifier</a>.</p>
        </div>
    </form>

<?php } if ((empty($_SESSION["mail"]) && empty($_SESSION["mot_de_passe"])) && (!empty($_POST["mail"]) && !empty($_POST["mot_de_passe"]))) {
    $_SESSION["mail"] = $_POST["mail"];
    $_SESSION["mot_de_passe"] = $_POST["mot_de_passe"];
} if (!empty($_SESSION["mail"]) && !empty($_SESSION["mot_de_passe"])) {
    $pdo = new Mypdo();
	$personneManager = new PersonneManager($pdo);
	$sql = " SELECT count(*) FROM personne	where email = '".$_SESSION["mail"]."' and mot_de_passe = '".$_SESSION["mot_de_passe"]."' " ;

	$requete = $pdo->prepare($sql);
	$exec_requete = $requete->execute();

	/*print_r($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"]);*/

	if ($exec_requete != 0) {
		$_SESSION["id"] = $personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"];
		if($personneManager->estEtudiant($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"]))	{
		    header("Location: index.php?page=2");
		    $_SESSION["mail_connexion"] = $_SESSION["mail"];
			}

		if($personneManager->estProfesseur($personneManager->getIdPersonne($_SESSION["mail"], $_SESSION["mot_de_passe"])["id_personne"])) {
		    header("Location: index.php?page=1");
		    $_SESSION["mail_connexion"] = $_SESSION["mail"];
		}
	}
} ?>
