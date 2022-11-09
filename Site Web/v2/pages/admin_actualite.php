<!DOCTYPE html>
<!--
Template Name: Spourmo
Author: <a href="https://www.os-templates.com/">OS Templates</a>
Author URI: https://www.os-templates.com/
Copyright: OS-Templates.com
Licence: Free to use under our free template licence terms
Licence URI: https://www.os-templates.com/template-terms
-->
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Gestion des Actualités</title>
<style>
  #comments {
  display: grid;
  grid: repeat(1, 60px) / auto-flow 500px;
}

</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" style = "background-color : white;">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay padtop" style="background-image:url('../images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <?php include_once('admin_header.php'); ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Gestion des Actualités</h6>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <center><h6 class="heading">ACTUALIÉS</h6></center>
</br>
</br>
    <?php

    $mysqli = new mysqli('localhost','zamilab00','XXXXX','zfl2-zamilab00');
    if ($mysqli->connect_errno){
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        echo "Errno: " . $mysqli->connect_errno . "\n";
        echo "Error: " . $mysqli->connect_error . "\n";
        // Arrêt du chargement de la page
        exit();
    }
    if (!$mysqli->set_charset("utf8")) {
        printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
        exit(); 
    }
    $requete="SELECT * FROM T_ACTUALITE_ACT;";//recuperation de toutes les actualités de la base pour les afficher dans un tableau
    $result = $mysqli->query($requete);
    echo"<table>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['ACT_TITRE'] . "</td>";
        echo "<td>" . $row['ACT_TEXTE'] . "</td>";
        echo "<td>" . $row['ACT_DATEDEPUBLICATION'] . "</td>";
        echo'<td ><a href="suppr_actu.php?id='.$row['ACT_NUMERO'].'">supprimer</a></td>';
        echo "</tr>";
    }
    echo "</table>";

        
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>
</br>
  </br>
      <!-- ######################################AJOUT DANS ACTUALITÉ############################################# -->
    <div>
        <a title="Actualité"><i><h1>AJOUTER UNE ACTUALITÉ</h1>
        <div id="comments">
          <form action="actu_action.php" method="post">
              <p> Titre : <input type = "text" name="titre" required="required"/></p>
              <label for="contenu">Contenu : </label>
              <textarea name="contenu" id="contenu" cols="25" rows="10" required="required"></textarea>
              <p><input type="submit" value="Valider"></p>
          </form>
</br>
</br>
        </div></i></a>
    </div>
  </main>

    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
  </html>
