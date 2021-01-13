<?php
require_once("classes/Formule.class.php");
require_once("classes/FormuleManager.class.php");
$db =new MyPdo();
$formuleManager = new FormuleManager($db);
if(!empty($_POST["LibEq"]) && !empty($_POST["Equation"])){
/*Faire le controle au niveau du nom*/
  $formule = new Formule($_POST);

  $ajout = $formuleManager->add($formule);

}

 ?>
<html>
   <head>

     <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css" />
      <script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
      </script>
      <style>
        td button{width:100%}
        <style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Set a style for all buttons */
button {


  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Float cancel and delete buttons and add an equal width */
.cancelbtn, .deletebtn {
  float: left;
  width: 50%;
}

/* Add a color to the cancel button */
.cancelbtn {
  background-color: #ccc;
  color: black;
}

/* Add a color to the delete button */
.deletebtn {
  background-color: #f44336;
}

/* Add padding and center-align text to the container */
.container {
  padding: 16px;
  text-align: center;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* The Modal Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and delete button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .deletebtn {
     width: 100%;
  }
}
</style>
      </style>
   </head>
   <body id="body">
     <?php
     if(empty($_GET["SuppNum_eq"])&&empty($_GET["ModifNum_eq"])){
       ?>

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
           <td><button onclick="afficher('|x|')">| |</button></td>
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
      <div style="display:none;" id="main">
        <form method="post" action="#">

            <p>Libelle</p>
            <input id="LibEq" name="LibEq"/>
            <input id="Equation"  name="Equation"/>
          <input type="submit" value="Valider">
      </form>

      </div>
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
          <input type="text" id="ModifLib" name="ModifLib" value="<?php echo $formuleManager->getLibEq($_GET["ModifNum_eq"])["libEq"] ?>"/>
          <input type="text" id="ModifEq"  name="ModifEq" value="<?php echo $formuleManager->getEq($_GET["ModifNum_eq"])["equation"] ?>"/>
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
   </body>
</html>
