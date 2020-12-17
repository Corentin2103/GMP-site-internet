<?php
echo $_POST["libelle"];
echo $_POST["formule"];
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
            let formule = document.getElementById("output").value
            document.getElementById("Dispawn").style.display = "none";
            document.getElementById("main").style.display = "block";
            document.getElementById('fonction').value = formule;
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
            <input id="libelle" name="libelle"/>
            <input id="fonction"  name="formule"/>
          <input type="submit" value="Valider">
      </form>

      </div>

   </body>
</html>
