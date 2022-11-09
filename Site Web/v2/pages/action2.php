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
<?php
    if ($_POST['vis_id'] && $_POST['vis_mdp'] && $_POST['vis_nom'] && $_POST['vis_prenom'] && $_POST['vis_mail'] && $_POST['commentaire']){
        $id=htmlspecialchars($_POST['vis_id']); 
        $mdp=htmlspecialchars($_POST['vis_mdp']);
        $nom=htmlspecialchars($_POST['vis_nom']);
        $prenom=htmlspecialchars($_POST['vis_prenom']);
        $mail=htmlspecialchars($_POST['vis_mail']);
        $com=htmlspecialchars(addslashes($_POST['commentaire']));
        $mysqli = new mysqli('localhost','zamilab00','XXXXX','zfl2-zamilab00');
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
            $sql="select VIS_NUMERO from T_VISITEUR_VIS
            where VIS_DATEHEUREVISITE <= NOW()
            AND NOW()<= timestampadd(hour,3,VIS_DATEHEUREVISITE)
            AND VIS_NUMERO = ".$id."
            AND VIS_MOTDEPASSE = MD5('".$mdp."');";//verif si le visiteur a été créer il y a moins de 3 heures
            $result = $mysqli->query($sql);
            if ($result == false) //Erreur lors de l’exécution de la requête
            {
                // La requête a echoué
                echo "Error: Le Commentaire ne peut être ajouté  \n";
                echo "Query: " . $sql . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }
            else //Requête réussie
            {
                $requetetest = "SELECT VIS_NUMERO FROM T_COMMENTAIRE_CMT WHERE VIS_NUMERO = ".$id."";//verif si le visiteur a entrer un commentaire
                $result1 = $mysqli ->query($requetetest);
                $ligne = $result1->num_rows;
                if ($ligne ==0){
                  $requete1="UPDATE T_VISITEUR_VIS SET VIS_NOM = '".$nom."', VIS_PRENOM = '".$prenom."', VIS_EMAIL = '".$mail."' WHERE T_VISITEUR_VIS.VIS_NUMERO = ".$id.";";//ajout/changement du nom prenom mail du visiteur dans la base
                  $result1 = $mysqli->query($requete1);
                  $requete2 = "INSERT INTO T_COMMENTAIRE_CMT VALUES(NULL,CURRENT_TIME(),'".$com."','".$id."','C');";//ajout du commentaire dans la base
                  $result2 = $mysqli->query($requete2);
                  echo '<h6>le commentaire a bien été ajouté il sera bientôt visible après vérification par un administrateur</h6>';
                  echo '<a href="index.php">retour à la page d\'accueil';
                }else{
                  echo "<h6>votre ticket a été créer il y a plus de 3 heures</h6>";
                  echo '<a href="index.php">retour à la page d\'accueil';
                }
            }
        }else{
            echo '<h6>Vous avez oublié un ou plusieurs champs dans le formulaire</h6>';
            echo '<a href="index.php">retour à la page d\'accueil';
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
