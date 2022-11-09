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
<title>Gestion de la Configuration</title>
<style>
.config{
    justify-content : center;
    text-align : center;
    margin:auto;
    background-color : rgba(0,0,0,0.6);
    color : white;
    width : 30%;
    border : 5px solid black;
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
    <h6 class="heading">Gestion de la Configuration</h6>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div style ="background-color : wheat;" class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
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
    $requete="SELECT * FROM T_CONFIGURATION_CON;";//récuperation de toute les informations sur la configuration de l'exposition
    $resulte = $mysqli->query($requete);
    $result = $resulte->fetch_assoc();
    echo '<div class="config">';
    echo '<h3 style ="font-size : 30px; color : white;"> Configuration</h3>';
    echo '<p>Exposition : '.$result['CON_INTITULE'].'</p>';
    echo "<p> Date d'ouverture : ".$result['CON_DATEDEDEBUT']."</p>";
    echo '<p> Date de Fin : '.$result['CON_DATEFIN'].'</p>';
    echo '<p>Lieu de Presentation : '.$result['CON_LIEU'].'</p>';
    echo '<p>Date de Vernissage : '.$result['CON_DATEVERNISSAGE'].'</p>';
    echo '<p>Texte de Bienvenu : '.$result['CON_TEXTEBIENVENUE'].'</p>';
    echo '</li>';
    echo '</div>';
    
        
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>

</br>
  </br>
      <!-- ######################################AJOUT DANS ACTUALITÉ############################################# -->
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
