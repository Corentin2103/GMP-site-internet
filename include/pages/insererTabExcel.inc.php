<h1>Ajouter des variables</h1>


<form action ="#" method = "post" enctype="multipart/form-data" id = "insererTabExcell">
  <input type="file" name="upload_file"></br>
  <input type="submit" name="Valider" value="Valider">

</form>
<?php
function lire_csv($nom_fichier,$separateur){
  $donnee = array();
  $result = array();
  $fichier = fopen($nom_fichier,'r');
  $i = 1;
  $taille=filesize($nom_fichier)+1;

  while($donnee = fgetcsv($fichier,$taille,$separateur)){
    $result[$i]=$donnee;
    $i++;
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
    $fichier = fopen('Excel/'.$uniqueName.$fileExt,'r');
    $i = 1;

    $donnees = lire_csv('Excel/'.$uniqueName.$fileExt,";");
    while($i <= 20){
    $ligne = fgetc($fichier);

    if($ligne != ';'){
      echo $ligne."<br/>";
      print_r($donnees);

      /*Ajout a la bdd*/


    }else{
      echo " ";
  }
    $i++;
}
  fclose($fichier);
  ?>
</tr>
</table>
