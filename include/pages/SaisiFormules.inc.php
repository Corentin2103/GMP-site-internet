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


  <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css" />
  <script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  //fonction qui évalue le chiffre et renvoie la sortie
  function calculer()
  {
    let a = document.getElementById("output").value
    let b = eval(a)
    document.getElementById("output").value = b
  }
  //fonction qui affiche la valeur
  function afficher(val)
  {
    document.getElementById("output").value+=val
  }
  //fonction qui efface l'écran
  function effacer()
  {
    document.getElementById("output").value = ""
  }
  function Rentrer(){
    let Equation = document.getElementById("output").value
    document.getElementById("Dispawn").style.display = "none";
    document.getElementById("main").style.display = "block";
    document.getElementById('Equation').value = Equation;


  }
  function modifier(){

    afficher()

  }
  </script>






  <?php
  if(empty($_GET["SuppNum_eq"])&&empty($_GET["ModifNum_eq"])){
    ?>
    <div class="calculatrice">
    <table id="Dispawn" border="1">
      <tr>

        <td colspan="5"><input id="output"/></td>
        <td><button onclick="effacer()">c</button></td>
      </tr>
      <tr>
        <td><button onclick="afficher('^')">^</button></td>
        <td><button onclick="afficher('sqrt()')">sqrt()</button></td>
        <td><button onclick="afficher('1')">1</button></td>
        <td><button onclick="afficher('2')">2</button></td>
        <td><button onclick="afficher('3')">3</button></td>
        <td><button onclick="afficher('+')">+</button></td>
      </tr>
      <tr>
        <td><button onclick="afficher('log()')">log()</button></td>
        <td><button onclick="afficher('cos()')">cos()</button></td>
        <td><button onclick="afficher('4')">4</button></td>
        <td><button onclick="afficher('5')">5</button></td>
        <td><button onclick="afficher('6')">6</button></td>
        <td><button onclick="afficher('-')">-</button></td>
      </tr>
      <tr>
        <td><button onclick="afficher('abs()')">abs()</button></td>
        <td><button onclick="afficher('sin()')">sin()</button></td>
        <td><button onclick="afficher('7')">7</button></td>
        <td><button onclick="afficher('8')">8</button></td>
        <td><button onclick="afficher('9')">9</button></td>
        <td><button onclick="afficher('*')">*</button></td>
      </tr>
      <tr>
        <td><button onclick="afficher('²')">²</button></td>
        <td><button onclick="afficher('ln()')">ln()</button></td>
        <td><button onclick="afficher('.')">.</button></td>
        <td><button onclick="afficher('0')">0</button></td>
        <td><button onclick="Rentrer(),effacer()">=</button></td>
        <td><button onclick="afficher('/')">/</button></td>
      </tr>
    </table>
  </div>
    <div style="display:none;" id="main">
      <form method="post" action="#">


        Libellé : <input id="LibEq" name="LibEq"/>
        Equation : <input id="Equation"  name="Equation"/>
        +/- <input id="marge" name="marge"/>
        <input type="submit" value="Valider">
      </form>

    </div>
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
  </div>
  <div class="tableau">
    <table>
      <tr>
        <th>
          'Arbre 1\yA' (mm)
        </th><th>
          'Arbre 1\yB' (mm)
        </th><th>
          'Arbre 1\yC' (mm)
        </th><th>
          'Arbre 1\yroue' (mm)
        </th><th>
          'Roue 2\angleD' (deg)
        </th><th>
          'anglepivotE' (deg)
        </th><th>
          'Arbre 1\angleH' (deg)
        </th><th>
          'Roue 2\angleI' (deg)
        </th><th>
          'Arbre 1\yJ' (mm)
        </th>
      </tr>
      <td>
        variable 1
      </td>
      <td>
        variable 2
      </td>
      <td>
        variable 3
      </td>
      <td>
        variable 4
      </td>
      <td>
        variable 5
      </td>
      <td>
        variable 6
      </td>
      <td>
        variable 7
      </td>
      <td>
        variable 8
      </td>
      <td>
        variable 9
      </td>

      <tr>

      </tr>
    </table>
  </div>
    <?php
  }

  if(!empty($_GET["SuppNum_eq"])){
    $formuleManager->suppEq($_GET["SuppNum_eq"]);
    echo "Equation supprimée";
  }

  if(!empty($_GET["ModifNum_eq"]) && empty($_POST["ModifLib"])&& empty($_POST["ModifEq"])){
    $LibEq = $formuleManager->getLibEq($_GET["ModifNum_eq"]);
    $Equation = $formuleManager->getEq($_GET["ModifNum_eq"]);

    ?>

    <form method="post" action="#">

      <p>Modification</p>
      Libellé<input type="text" id="ModifLib" name="ModifLib" value="<?php echo $formuleManager->getLibEq($_GET["ModifNum_eq"])["libEq"] ?>"/>
      Equation<input type="text" id="ModifEq"  name="ModifEq" value="<?php echo $formuleManager->getEq($_GET["ModifNum_eq"])["equation"] ?>"/>
      +/- <input id="marge" name="marge" value="<?php echo $formuleManager->getMarge($_GET["ModifNum_eq"])["marge"] ?>"/>
      <input type="submit" value="Valider">
    </form>
    <?php

  }
  if(!empty($_POST["ModifLib"])&& !empty($_POST["ModifEq"])){
    $nouvelleFormule = new Formule($_POST);
    $nouvelleFormule->setNumEq($_GET["ModifNum_eq"]);
    $nouvelleFormule->setLibEq($_POST["ModifLib"]);
    $nouvelleFormule->setEquation($_POST["ModifEq"]);
    $formuleManager->updateFormule($nouvelleFormule);
    echo "Formulle modifiée";
  }

  ?>

</div>
