<?php
  /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
  autorisé à un utilisateur connecté. */
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['role']!='A'){
    header("Location:session.php");
  }


?>
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
<title>Tickets Visiteurs</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" style = "background-color : wheat;">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div class="bgded overlay padtop" style="background-image:url('../images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
<?php include_once('admin_header.php');?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <h6 class="heading">Tickets Visiteurs</h6>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
    <center><div style ="background-color : #212121;"><h1 style = "color : white;">ESPACE ADMINISTRATION</h1></div><center>
    <div> 
<?php
    $mysqli = new mysqli('localhost','zamilab00','XXXXX','zfl2-zamilab00');
    if ($mysqli->connect_errno) {
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
    $code = rand(111111111111111, 999999999999999);//création d'un nombre aléatoire à 15 caractères qui sera le mot de passe
    $mysqli->query("INSERT INTO T_VISITEUR_VIS VALUES (NULL,MD5('".$code."'),CURRENT_TIME(),NULL,NULL,NULL,'".$_SESSION['login']."');");//insertion du visiteur dans la base
    $result=$mysqli->query("SELECT VIS_NUMERO FROM T_VISITEUR_VIS WHERE VIS_MOTDEPASSE = MD5('".$code."')");//récuperation du numéro visiteur lié au mot de passe ajouter
    $row=$result->fetch_assoc();
    echo '<h6>Votre pseudo : '.$row['VIS_NUMERO'].'</br> Votre mot de passe : '.$code.'</h6>';
?>
</div>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
