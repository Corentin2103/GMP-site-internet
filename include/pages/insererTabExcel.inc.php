<div class = "header">

<h1>Ajouter des variables</h1>

<?php

require_once("classes/variable.class.php");
require_once("classes/variableManager.class.php");
if(empty($_POST["Nom"])){
  ?>

  <form action ="#" method = "post" enctype="multipart/form-data" id = "insererTabExcell">
    Nom du fichier :<input type="text" name="Nom"></br>
    <input type="file" name="upload_file"></br>
    <input type="submit" name="Valider" value="Valider">
  </form>
  <?php
}

        function lire_csv($nom_fichier){

          $ligne = array();
          $fichier = fopen($nom_fichier,'r');
          $compteur = 1;

          $i = 'ligne'.$compteur;
          $taille=filesize($nom_fichier)+1;



          while(!feof($fichier)){

            $donnee = fgets($fichier);
            if(!feof($fichier)){
              $ligne[$i]=explode(";",$donnee);

              $compteur++;
              $i = 'ligne'.$compteur;
            }
          }

        fclose($fichier);
        return $ligne;
      }
if(!empty($_POST["Nom"])){
  echo "bonjour";
  $fileName = $_FILES["upload_file"]["name"];
  $fileExt = ".". strtolower(substr(strrchr($fileName,'.'), 1));
  $tmpName = $_FILES["upload_file"]["tmp_name"];
  $uniqueName = $_POST["Nom"];
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
      $db = new MyPdo();

      $donnees = lire_csv('Excel/'.$uniqueName.$fileExt);

      $k = 0;

      $j = "variable".($k + 1);

      $variableManager = new VariableManager($db);
      foreach ($donnees as $value){

        while($k < 9){
          $tab[$j]= $value[$k];
          $k++;
          $j = "variable".($k + 1);
        }

        $variable = new Variable($tab);
        $result =$variableManager->add($variable);

        $k = 0;
        $j = "variable".($k + 1);
      }
      /*
      $variable = new Variable();
      $result =$variableManager->add($variable);

      */

      ?>

    </tr>
  </table>
  <?php
}
?>
</div>
