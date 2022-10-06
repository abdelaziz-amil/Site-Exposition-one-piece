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
<title>Livre D'or</title>
<style>
  #comments {
  display: grid;
  grid: repeat(2, 60px) / auto-flow 500px;
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
  <?php include_once('header.php'); ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Livre D'or</h6>
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
      <center><h6 class="heading">COMMENTAIRE</h6></center>
</br>
</br>
    <?php

    $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
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
    $requete="SELECT * FROM T_COMMENTAIRE_CMT JOIN T_VISITEUR_VIS USING (VIS_NUMERO) where CMT_ETAT = 'V';";// recuperation des commentaires qui ont pour etat V(visible) pour les afficher dans un tableau
    $result = $mysqli->query($requete);
    echo"<table>";
    echo '<tr style ="background-color:grey;color:white;">';
        echo "<td>Nom Prénom</td>";
        echo "<td>Commentaire</td>";
        echo "<td>Date</td>";
        echo "</tr>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['VIS_NOM'] . " " .$row['VIS_PRENOM'] . "</td>";
        echo "<td>" . $row['CMT_TEXTE'] . "</td>";
        echo "<td>" . $row['CMT_DATEHEUREPUBLICATION'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
        
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>
</br>
  </br>
      <!-- ######################################AJOUT DANS LIVRE D'OR############################################# -->
    <div >
        <a title="Commentaire"><i><h1>AJOUTER UN COMMENTAIRE</h1>
        <div id="comments">
          <form action="action2.php" method="post">
              <p> Numéro de Visiteur : <input type="text" name="vis_id" required="required"/></p>
              <p> Mot de Passe : <input type = "password" name="vis_mdp" required="required"/></p>
              <p> Nom : <input type = "text" name="vis_nom" required="required"/></p>
              <p> Prénom : <input type = "text" name="vis_prenom" required="required"/></p>
              <p> E-mail : <input type = "text" name="vis_mail" required="required"/></p>
              <label for="commentaire">Votre commentaire : </label>
              <textarea name="commentaire" id="commentaire" cols="25" rows="10" required="required"></textarea>
              <p><input type="submit" value="Valider"></p>
          </form>
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