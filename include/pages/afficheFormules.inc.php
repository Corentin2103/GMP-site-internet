<?php
require_once("classes/Formule.class.php");
require_once("classes/FormuleManager.class.php");
$db =new MyPdo();
$formuleManager = new FormuleManager($db);
if(!empty($_POST["LibEq"]) && !empty($_POST["Equation"]) && !empty($_POST["marge"])){
  /*Faire le controle au niveau du nom*/
  $formule = new Formule($_POST);

  $ajout = $formuleManager->add($formule);

}

?>
<div class="header">
<div class="tableau calculatrice">
<table>
  <tr>
    <th>
      Numéro équation
    </th>
    <th>
      Libellé équation
    </th>
    <th>
      équation
    </th>
    <th>
      équation avec remplacement
    </th>
  </tr>
  <?php

  $listeFormule = $formuleManager->getAllForm();
  $listeLib = $formuleManager->getAllLib();
  foreach($listeFormule as $formule){
    $replace = $formule->getEquation();
    foreach($listeLib as $libelle){

      $var = strpos($formule->getEquation(), $libelle["libEq"]);
      if($var != null){
        $replace = str_replace($libelle["libEq"], $formuleManager->getEqByLib($libelle["libEq"])["equation"],$formule->getEquation());

      }
    }

    ?>
    <tr>
      <td><?php echo $formule->getNumEq() ?></td>
      <td><?php echo $formule->getLibEq() ?></td>
      <td><?php echo $formule->getEquation() ?></td>
      <td><?php echo $replace ?></td>
      <td><a href="index.php?page=2&SuppNum_eq=<?php echo $formule->getNumEq() ?>"><button type="" class="">Supprimer</button></a></td>
      <td><a href="index.php?page=2&ModifNum_eq=<?php echo $formule->getNumEq() ?>"><button type="" class="">Modifier</button></a></td>
    </tr>
    <?php
  }
  ?>
</table>
</div></div>
