<?php
require_once("classes/Formule.class.php");
require_once("classes/FormuleManager.class.php");
$db =new PDO("mysql:host=localhost; dbname=pt_gmp","root","");
$formuleManager = new FormuleManager($db);
if(!empty($_POST["LibEq"]) && !empty($_POST["Equation"])){
/*Faire le controle au niveau du nom*/
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
        </tr>
        <?php

        $listeFormule = $formuleManager->getAllForm();

        foreach($listeFormule as $formule){
          $equation = $formule->getEquation();
          ?>
          <tr>
            <td><?php echo $formule->getNumEq() ?></td>
            <td><?php echo $formule->getLibEq() ?></td>
            <td><?php echo $formule->getEquation() ?></td>
            <td>

              <button onclick="document.getElementById('id01').style.display='block'">Supprimer</button>
              <div id="id01" class="modal">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <form class="modal-content" action="">
                  <div class="container">
                    <h1>Suprimer l'équation :</h1>
                    <div class="clearfix">
                      <a href="index.php?page=2" ><button type="button" class="cancelbtn">Annuler</button></a>
                      <a href="index.php?page=2&SuppNum_eq=<?php echo $formule->getNumEq() ?>" ><button type="button" class="deletebtn">Supprimer</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </td>
            <td><a href="index.php?page=2&ModifNum_eq=<?php echo $formule->getNumEq() ?>"><button type="" class="">Modifier</button></a></td>
          </tr>
        <?php
        }
        ?>
      </table>

      <?php
    }

  if(!empty($_GET["SuppNum_eq"])){
      echo "Bonsoir";
    }

    if(!empty($_GET["ModifNum_eq"])){
      echo "bonjour";
    }

     ?>
   </body>
</html>
