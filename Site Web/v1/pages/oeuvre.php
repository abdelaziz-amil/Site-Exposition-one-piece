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
<?php $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
        if ($mysqli->connect_errno){
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            exit();
        }
        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
        if (!$mysqli->set_charset("utf8")) {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit(); 
     }
     $id=$_GET['id'] ;
          $requete_oeuvre="select * from T_OEUVRE_OEU join TJ_PRESENTE_PRE using (OEU_CODE) join T_EXPOSANT_EXP using (EXP_ID) WHERE OEU_CODE = ".$id.";";
          $resultat1 = $mysqli->query($requete_oeuvre);
          if($resultat1 == false){
            echo"erreur la requete a échoué";
            echo"Errno".$mysqli->errno."\n";
            echo"Error".$mysqli->error."\n";
            exit();
 
          }else{
          $oeuvre = $resultat1->fetch_assoc();
          echo '<link rel="icon" type="../image/png" sizes="16x16" href="../'. $oeuvre['OEU_FICHIER_IMG'] .'">';
          echo '<title>'.$oeuvre['OEU_INTITULE'].'</title>';
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
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
    <h6 class="heading">Gallery</h6>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="content"> 
      <!-- ################################################################################################ -->
      <div id="gallery">
        <figure>
        <ul class="nospace group grid-3">
        <?php $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
        if ($mysqli->connect_errno){
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            exit();
        }
        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
        if (!$mysqli->set_charset("utf8")) {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit(); 
     }
     $id=$_GET['id'] ;
          $requete_oeuvre="select * from T_OEUVRE_OEU join TJ_PRESENTE_PRE using (OEU_CODE) join T_EXPOSANT_EXP using (EXP_ID) WHERE OEU_CODE = ".$id.";";
          $resultat1 = $mysqli->query($requete_oeuvre);
          if($resultat1 == false){
            echo"erreur la requete a échoué";
            echo"Errno".$mysqli->errno."\n";
            echo"Error".$mysqli->error."\n";
            exit();
 
          }else{
          $oeuvre = $resultat1->fetch_assoc();
          echo '<img src="../' . $oeuvre['OEU_FICHIER_IMG'] .'">';
          echo '<h1>Nom : '.$oeuvre['OEU_INTITULE'].'</h1>';
          echo '<h1><a href = exposant.php?id='.$oeuvre['EXP_ID'].'>Exposant : '.$oeuvre['EXP_NOM'].'</a></h1>';
          echo '<h1>Description : '.$oeuvre['OEU_DESCRIPTION'].'</h1>';
          echo '<h1>Date De Commercialisation : '.$oeuvre['OEU_DATECREA'].'</h1>';
}
?>
          </ul>
        </figure>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->

<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>