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
<title>Actualité</title>
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
    <h6 class="heading">Actualité</h6>
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
<?php
    /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
    autorisé à un utilisateur connecté. */
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['role']!='A'){
    header("Location:session.php");
    }
    if ($_POST['titre'] && $_POST['contenu']){

        $titre=htmlspecialchars($_POST['titre']);
        $contenu=htmlspecialchars($_POST['contenu']);
        
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
        $mysqli->query("INSERT INTO T_ACTUALITE_ACT VALUES(NULL,'".$titre."','".$contenu."',CURRENT_TIME(),'".$_SESSION['login']."');");//ajout d'une actualité dans la base
        header('location:admin_actualite.php');
        
    }else{
        echo '<h6>Vous avez oublié un ou plusieurs champs dans le formulaire</h6>';
        echo '<a href="admin_actualite.php">retour à la page de gestion des actualités';
        exit();
    }
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
  </html>
