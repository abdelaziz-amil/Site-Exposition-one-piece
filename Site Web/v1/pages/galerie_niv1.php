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
<title>Spourmo | Pages | Gallery</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<style>
  a.tip {
    border-bottom: 1px dashed;
    text-decoration: none
}
a.tip:hover {
    cursor: help;
    position: relative
}
a.tip span {
    display: none
}
a.tip:hover span {
    border: #c0c0c0 1px dotted;

    display: block;

    background: url(../images/status-info.png) #f0f0f0 no-repeat 100% 5%;

    margin-top: -50px;
    width: 250px;
    position: absolute;

    text-decoration: none
}
</style>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="fl_left">
      <ul class="nospace">
        <li><i class="fas fa-mobile-alt rgtspace-5"></i> +00 (123) 456 7890</li>
        <li><i class="far fa-envelope rgtspace-5"></i> info@domain.com</li>
      </ul>
    </div>
    <div class="fl_right">
      <ul class="nospace">
        <li><a href="#"><i class="fas fa-home"></i></a></li>
        <li><a href="#" title="Help Centre"><i class="far fa-life-ring"></i></a></li>
        <li><a href="#" title="Login"><i class="fas fa-sign-in-alt"></i></a></li>
        <li><a href="#" title="Sign Up"><i class="fas fa-edit"></i></a></li>
        <li id="searchform">
          <div>
            <form action="#" method="post">
              <fieldset>
                <legend>Quick Search:</legend>
                <input type="text" placeholder="Enter search term&hellip;">
                <button type="submit"><i class="fas fa-search"></i></button>
              </fieldset>
            </form>
          </div>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <section id="ctdetails" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <ul class="nospace clear">
      <li class="one_quarter first">
        <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Give us a call:</strong> +00 (123) 456 7890</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Send us a mail:</strong> support@domain.com</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Mon. - Sat.:</strong> 08.00am - 18.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="#"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Come visit us:</strong> Directions to <a href="#">our location</a></span></div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
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
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Lorem</a></li>
      <li><a href="#">Ipsum</a></li>
      <li><a href="#">Dolor</a></li>
    </ul>
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
    <div class="content"> 
      <!-- ################################################################################################ -->
      <?php
      if(isset($_GET['id'])){ echo ("Valeur de id : "); echo ($_GET['id']);
        //Et récupérer dans une variable la valeur passée en paramètre dans l’URL !
        $oeuvre_id = $_GET['id'];
        
        } else {
          echo ("Vous avez oublié le paramètre !");
        exit(); }
      ?>
<div class="wrapper row2">
  <section class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p id ="galerie" class="nospace font-xs">Galeries</p>
      <h6 class="heading">Figurines De Personnage De Fiction</h6>
    </div>
    <figure>
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
      $requete="SELECT * FROM T_OEUVRE_OEU;";
      $result = $mysqli->query($requete);
      $ID = 1;
      echo"<table>";
      while($row = $result->fetch_assoc()){
          echo "<tr>";
          echo "<td>" . $row['OEU_INTITULE'] . "</td>";
          echo '<td><a href="https:/obiwan2.univ-brest.fr/licence/licx/v1/oeuvre' . $ID . '.php">lien oeuvre</a></td>';
          echo "<td>" . $row['OEU_DATECREA'] . "</td>";
          echo "</tr>";
          $ID++;
      }
      echo "</table>";
      //On insère une ligne dans la table gérant les comptes des utilisateurs
          
      //Ferme la connexion avec la base MariaDB
      $mysqli->close();
    ?>
    </figure>
    <!-- ################################################################################################ -->
  </section>
</div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <nav class="pagination">
        <ul>
          <li><a href="#">&laquo; Previous</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">6</a></li>
          <li class="current"><strong>7</strong></li>
          <li><a href="#">8</a></li>
          <li><a href="#">9</a></li>
          <li><strong>&hellip;</strong></li>
          <li><a href="#">14</a></li>
          <li><a href="#">15</a></li>
          <li><a href="#">Next &raquo;</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Bottom Background Image Wrapper -->
<div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/01.png');"> 
  <!-- ################################################################################################ -->
  <div class="wrapper row4">
    <footer id="footer" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-50">
        <div class="one_quarter first">
          <h6 class="heading">Lorem proin volutpat</h6>
          <p>Ligula quis sapien nam molestie massa quis pede maecenas quis lacus nunc sed lectus quis lectus tristique tincidunt sed varius nisl tincidunt lectus pellentesque sagittis mauris ut leo ullamcorper tortor morbi accumsan [<a href="#">&hellip;</a>]</p>
          <ul class="faico clear">
            <li><a class="faicon-facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="faicon-google-plus" href="#"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a class="faicon-linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>
            <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Nascetur ridiculus mus</h6>
          <ul class="nospace linklist">
            <li><a href="#">Aliquam eget leo praesent</a></li>
            <li><a href="#">Vel urna nunc ultricies</a></li>
            <li><a href="#">Faucibus nunc cum sociis</a></li>
            <li><a href="#">Natoque penatibus et magnis</a></li>
            <li><a href="#">Dis parturient montes</a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Vestibulum sed quam</h6>
          <p class="nospace btmspace-15">Ante dapibus luctus sed quis diam vitae ipsum ultrices vehicula.</p>
          <form action="#" method="post">
            <fieldset>
              <legend>Newsletter:</legend>
              <input class="btmspace-15" type="text" value="" placeholder="Name">
              <input class="btmspace-15" type="text" value="" placeholder="Email">
              <button class="btn" type="submit" value="submit">Submit</button>
            </fieldset>
          </form>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Aenean diam euismod</h6>
          <ul class="nospace clear latestimg">
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
            <li><a class="imgover" href="#"><img src="../images/demo/100x100.png" alt=""></a></li>
          </ul>
        </div>
      </div>
      <!-- ################################################################################################ -->
      <hr class="btmspace-50">
      <!-- ################################################################################################ -->
      <nav>
        <ul class="nospace">
          <li><a href="../index.html"><i class="fas fa-lg fa-home"></i></a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Terms</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Cookies</a></li>
          <li><a href="#">Disclaimer</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear"> 
      <!-- ################################################################################################ -->
      <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
      <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Bottom Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>