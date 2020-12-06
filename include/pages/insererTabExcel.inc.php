<h1>Ajouter des variables</h1>
<?php
require_once("classes/variable.class.php");
require_once("classes/variableManager.class.php");
?>

<form action ="#" method = "post" enctype="multipart/form-data" id = "insererTabExcell">
  <input type="file" name="upload_file"></br>
  <input type="submit" name="Valider" value="Valider">

</form>
<?php
function lire_csv($nom_fichier){

  $result = array();
  $fichier = fopen($nom_fichier,'r');
  $compteur = 1;
  $i = "variable".$compteur;
  $taille=filesize($nom_fichier)+1;

  while($compteur < 10){
    $donnee = fgetc($fichier);
    if($donnee != ';'){
    $result[$i]=$donnee;
    $compteur++;
    $i = "variable".$compteur;
  }
  }
  fclose($fichier);
  return $result;
}

$fileName = $_FILES["upload_file"]["name"];
$fileExt = ".". strtolower(substr(strrchr($fileName,'.'), 1));
$tmpName = $_FILES["upload_file"]["tmp_name"];
$uniqueName = md5(uniqid(rand(), true));
$fileName = "Excel/".$uniqueName.$fileExt;
$result = move_uploaded_file($tmpName, $fileName);


if (isset($_POST["submit"])){
  $maxSize = 50000;
  $validExt=array('.xls');
  if($_FILES['uploaded_file']['error']>0){
    echo "Une erreur est survenue";
    die;
  }

  $fileSize = $_FILES['uploaded_file']['size'];

  if ($fileSize>$maxSize){
    echo "Le fichier est trop gros";
    die;
  }

  $fileName=$_FILES['uploaded_file']['name'];
  $fileExt='.'.strolower(substr(strrchr($fileName,'.'),1));

  if (!in-array($fileExt,$validExt)){
    echo "Le fichier n'est pas un tableau Excel";
    die;
  }

  $tmpName=$_FILES['uploaded_file']['tmp_name'];
  $fileName="Excel/".$fileName.$fileExt;
  $resultat=move_uploaded_file($tmpName,$fileName);
  if($resultat){
    echo "Transfert terminé";
  }
} ?>

<table>
  <tr>
    <?php
    $donnees = lire_csv('Excel/'.$uniqueName.$fileExt);
    print_r($donnees);
    $db =new PDO("mysql:host=localhost; dbname=pt_gmp","root","");
    $variable = new Variable();
    $variable->setVar1($donnees["variable1"]);
    print_r($variable);
    $variableManager = new VariableManager($db);
    $result =$variableManager->add($variable);

  ?>
</tr>
</table>
