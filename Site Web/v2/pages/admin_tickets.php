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
        $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
        $id = $_SESSION['login'];
        $sql="SELECT * FROM T_VISITEUR_VIS LEFT OUTER JOIN T_COMMENTAIRE_CMT USING (VIS_NUMERO);";//récuperation de tout les visiteurs et de leurs commentaires si ils en ont mis 1 
        $result = $mysqli -> query($sql);
        $nbcompte = $result->num_rows;
        echo'<p> il y a '.$nbcompte.' visiteurs </p>';
        echo'<table>';
        echo '<tr style = "background-color : grey;">';
        echo "<td>Numéro Visiteur</td>";
        echo "<td>NOM du Visiteur</td>";
        echo "<td>PRÉNOM du Visiteur</td>";
        echo "<td>Date D'entrée</td>";
        echo "<td>Commentaire</td>";
        echo "<td>Caché ou Visible </td>";
        echo "<td>Mail du Visiteur</td>";
        echo "<td>Invitée par</td>";
        echo "</tr>";
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo "<td>". $row['VIS_NUMERO'] ."</td>";
          echo "<td>" . $row['VIS_NOM'] . "</td>";
          echo "<td>" . $row['VIS_PRENOM'] . "</td>";
          echo "<td>" . $row['VIS_DATEHEUREVISITE'] . "</td>";
          echo "<td>". $row['CMT_TEXTE'] ."</td>";
          echo "<td>" . $row['CMT_ETAT'] . "</td>";
          echo "<td>" . $row['VIS_EMAIL'] . "</td>";
          echo "<td>" . $row['COM_PSEUDO'] . "</td>";
          echo "</tr>";
        }
        echo'</table>';
        echo'</br>';
        echo'</br>';

        echo'<h3>Commentaire Visible/Caché</h3>';
        echo '<form action="commentaire_action.php" method="post">';
        echo '<fieldset>';
        echo '<label for="pseudo">Numéro :</label>';
        echo '';
        echo '<input type="text" name="visnum" placeholder="Numéro Visiteur" required="required" />';
        echo '<input type="text" maxlength="1" name="VouC" placeholder="V/C" required="required" />';
        echo '<p><input type="submit" value="Valider"></p>';
        echo '</fieldset>';
        echo '</form>';
        echo'</br>';
        echo'</br>';

        echo'<h3>Ajouter Un Nouveau Visiteur</h3>';
        echo '<form action="visiteur_action.php" method="post">';
        echo '<fieldset>';
        echo '';
        echo '<p><input type="submit" value="Nouveau Visiteur"></p>';
        echo '</fieldset>';
        echo '</form>';
        echo'</br>';
        echo'</br>';

        echo'<h3>Suppression Visiteur</h3>';
        echo '<form action="ticket_action.php" method="post">';
        echo '<fieldset>';
        echo '<label for="pseudo">Numéro :</label>';
        echo '';
        echo '<input type="text" name="visnum" placeholder="Numéro Visiteur" required="required" />';
        echo '<p><input type="submit" value="Valider"></p>';
        echo '</fieldset>';
        echo '</form>';
        ?>
    </div>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>