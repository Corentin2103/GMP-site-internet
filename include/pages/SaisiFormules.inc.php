<?php
require_once("../../classes/Formule.class.php");
require_once("../../classes/FormuleManager.class.php");
$db =new PDO("mysql:host=localhost; dbname=pt_gmp","root","");
$formuleManager = new FormuleManager($db);
if(!empty($_POST["LibEq"]) && !empty($_POST["Equation"])){

  $formule = new Formule($_POST);

  $ajout = $formuleManager->add($formule);
echo $_POST["LibEq"];
echo $_POST["Equation"];
}

 ?>
<html>
   <head>

     <link rel="stylesheet" type="text/css" href="../../css/stylesheet.css" />
      <script>

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
            window.open("insererTabExcel.inc.php", "", "width=200,height=100");

         }
         function modifier(){

          afficher()

         }
      </script>
      <style>
        td button{width:100%}
      </style>
   </head>
   <body id="body">
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
        </tr>
        <?php

        $listeFormule = $formuleManager->getAllForm();
        
        foreach($listeFormule as $formule){ ?>
          <tr>
            <td><?php echo $formule->getNumEq() ?></td>
            <td><?php echo $formule->getLibEq() ?></td>
            <td><?php echo $formule->getEquation() ?></td>
          </tr>
        <?php
        }
        ?>
      </table>

   </body>
</html>
