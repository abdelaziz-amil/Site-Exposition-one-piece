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
<title>Inscription</title>
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
    <h6 class="heading">Inscription</h6>
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
   if ($_POST['id'] && $_POST['mdp'] && $_POST['v'] && $_POST['nom'] && $_POST['prenom'] && $_POST['mail']){
        $id=htmlspecialchars(addslashes($_POST['id'])); 
        $mdp=htmlspecialchars(addslashes($_POST['mdp']));
        $vmdp=htmlspecialchars(addslashes($_POST['v']));
        $nom=htmlspecialchars(addslashes($_POST['nom']));
        $prenom=htmlspecialchars(addslashes($_POST['prenom']));
        $mail=htmlspecialchars(addslashes($_POST['mail']));
        $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
        if ($mysqli->connect_errno)
        {
            // Affichage d'un message d'erreur
            echo "Error: Problème de connexion à la BDD \n";
            echo "Errno: " . $mysqli->connect_errno . "\n";
            echo "Error: " . $mysqli->connect_error . "\n";
            // Arrêt du chargement de la page
            exit();
        }
        // Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
        if (!$mysqli->set_charset("utf8")) {
            printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
            exit(); }
            //Préparation de la requête à partir des chaînes saisies => 
            //concaténation (avec le point) des différents éléments composant la 
            //requête
            $sql1="INSERT INTO T_COMPTE_COM VALUES('" .$id. "','" .md5($mdp). "');"; //ajout du compte dans la base
            $sql2="INSERT INTO T_PROFIL_PFL VALUES('".$nom. "','".$prenom."','".$mail."','D','O',CURRENT_DATE,'".$id."');"; //ajout du profil dans la base
            $sql3="delete from T_PROFIL_PFL WHERE COM_PSEUDO = '".$id."';"; //suppression d'un profil dans la base
            $sql4="delete from T_COMPTE_COM WHERE COM_PSEUDO = '".$id."';"; //suppression d'un compte dans la base
            //Exécution de la requête d'ajout d'un compte et d'un profil dans la base
            $result1 = $mysqli->query($sql1);
            $result2 = $mysqli->query($sql2);
            if ($result1 == false || $result2==false) //Erreur lors de l’exécution de la/les requête(s)
            {
                // La requête a echoué
                echo "Error: La requête a échoué  \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                $result3 = $mysqli->query($sql3);
                $result4 = $mysqli->query($sql4);
                exit;
            }
            else if (strcmp($mdp,$vmdp)==0)//verification des deux mots de passes
            {
                echo "<br />";
                echo "<h6>Inscription réussie !</h6>" . "\n";
                
            }else{//les deux mots de passes sont differents
                echo'<h6>les deux mots de passes sont differents</h6>';
                echo '<a href="admin_actualite.php">retour à la page de gestion des actualités';
                $result3 = $mysqli->query($sql3);
                $result4 = $mysqli->query($sql4);
            }
            }else{
            echo '<h6>Vous avez oublié un ou plusieurs champs dans le formulaire</h6>';
            echo '<a href="admin_actualite.php">retour à la page de gestion des actualités';
            exit();
        }
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