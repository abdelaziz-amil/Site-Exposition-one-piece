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
<link rel="icon" type="../image/png" sizes="16x16" href="oda.jpg">
<title>NET'Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" style = "background-color:#f4f4f4;">
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
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <section>
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
        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
        if (!$mysqli->set_charset("utf8")) {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit(); 
        }
        // Visualisation du contenu d'une table (actu)

        $requete="SELECT * FROM T_CONFIGURATION_CON;";

        $resultat1 = $mysqli->query($requete);

        if($resultat1 == false){
            echo"erreur la requete a échoué";
            echo"Errno".$mysqli->errno."\n";
            echo"Error".$mysqli->error."\n";
            exit();
        }else{
            $config = $resultat1->fetch_assoc();
            echo ('<center>');
            echo ('<h3 class="heading">'.$config['CON_INTITULE'] .'</h3>');
            echo ('<p>'."Date Debut : ".  $config['CON_DATEDEDEBUT'] .'</p>');
            echo ('<p>'. "Lieu : ". $config['CON_LIEU'] .'</p>');
            echo ('<p>'."Date Vernissage : ".  $config['CON_DATEVERNISSAGE'] .'</p>');
            echo ('<p>'. $config['CON_PRESENTATION'] .'</p>');
            echo ('</center>');
        }
        ?>
          </section>
      <footer>
        <ul class="nospace inline pushright">
          <li><a class="btn" href="galerie.php">Oeuvre</a></li>
        </ul>
      </footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3" style = "background-color:#f4f4f4;">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <section id="introblocks">
      <ul class="nospace group grid-3">
        <li class="one_third">
          <figure><a class="imgover" href="#"><img class="imgover" src="../images/demo/luffy.png" alt=""></a>
            <figcaption><a href="#">Monkey D. Luffy</a></figcaption>
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#"><img class="imgover" src="../images/demo/tanjiro.png" alt=""></a>
            <figcaption><a href="#">Kamado Tanjiro</a></figcaption>
          </figure>
        </li>
        <li class="one_third">
          <figure><a class="imgover" href="#"><img class="imgover" src="../images/demo/jojo.png" alt=""></a>
            <figcaption><a href="#">Joestar Jotaro</a></figcaption>
          </figure>
        </li>
      </ul>
    </section>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
  </section>
      </div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- #########################################ACTUALITÉS######################################## -->
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs"></p>
      <h6 class="heading">ACTUALITÉS</h6>
    </div>
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
    $requete="SELECT * FROM T_ACTUALITE_ACT;";
    $result = $mysqli->query($requete);
    echo"<table>";
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>" . $row['ACT_TITRE'] . "</td>";
        echo "<td>" . $row['ACT_TEXTE'] . "</td>";
        echo "<td>" . $row['ACT_DATEDEPUBLICATION'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //On insère une ligne dans la table gérant les comptes des utilisateurs
        
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>
</section>
</div>
<!-- ############################################################################# -->
<!-- JAVASCRIPTS -->
<script class="imgover" src="../layout/scripts/jquery.min.js"></script>
<script class="imgover" src="../layout/scripts/jquery.backtotop.js"></script>
<script class="imgover" src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>