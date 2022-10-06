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
<title>Accueil&Profil</title>
<style>
    	.cercle { 
        border: 5px solid rgba(0, 0, 0, 1);
        justify-content : center;
        width : 50%;
      }
</style>
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
    <h6 class="heading">COMPTE UTILISATEUR</h6>
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
        $sql="SELECT * FROM T_COMPTE_COM JOIN T_PROFIL_PFL USING (COM_PSEUDO)";//recuperation de tout les profils pour les afficher dans un tableau
        $result = $mysqli -> query($sql);
        $nbcompte = $result->num_rows;
        echo'<p>Bienvenu '.$id.'</p>';
        echo'<p> il y a '.$nbcompte.' compte </p>';
        echo'<table>';
        echo '<tr style = "background-color : grey;">';
        echo "<td>PSEUDO</td>";
        echo "<td>NOM</td>";
        echo "<td>PRÉNOM</td>";
        echo "<td>MAIL</td>";
        echo "<td>PROFIL VALIDE</td>";
        echo "<td>RÔLE</td>";
        echo "<td>DATE DE CRÉATION</td>";
        echo "</tr>";
        while($row = $result->fetch_assoc()){
          echo '<tr>';
          echo "<td>" . $row['COM_PSEUDO'] . "</td>";
          echo "<td>". $row['PFL_NOM'] ."</td>";
          echo "<td>" . $row['PFL_PRENOM'] . "</td>";
          echo "<td>" . $row['PFL_MAIL'] . "</td>";
          echo "<td>" . $row['PFL_VALIDITEPROFIL'] . "</td>";
          echo "<td>" . $row['PFL_ROLE'] . "</td>";
          echo "<td>" . $row['PFL_DATECREATION'] . "</td>";
          echo "</tr>";
        }
        echo'</table>';
        echo'</br>';
        echo'</br>';
        echo'<h3>Activation/Désactivation Profil</h3>';
        echo '<form action="compte_action.php" method="post">';
        echo '<fieldset>';
        echo '<label for="pseudo">Pseudo:</label>';
        $sql="SELECT * FROM T_COMPTE_COM JOIN T_PROFIL_PFL USING (COM_PSEUDO)";//récuperation de tout les pseudos des comptes pour les inserer dans un menu déroulant
        $result = $mysqli -> query($sql);
        echo '';
        echo '<select name="pseudo" id="pseudo">';
        echo '<option value="">--Choisir un Pseudo--</option>';
        while($row = $result->fetch_assoc()){
          echo '<option value="'. $row['COM_PSEUDO'] .'" required="required">'. $row['COM_PSEUDO'] .'</option>';  
        }
        echo '</select>';
        echo '<p>Activer/Désactiver:';
        echo '<input type="text" name="AouD" placeholder="A/D" maxlength="1" required="required" />';
        echo '</p>';
        echo '<p><input type="submit" value="Valider"></p>';
        echo '</fieldset>';
        echo '</form>';
        echo'</br>';
        echo'</br>';
        ?>
    </div>

    <center>
      <a>
        <div class = "cercle" id="contenu" style = "background: rgb(255,113,0); background: linear-gradient(90deg, rgba(0,0,0,0.6937149859943977) 100%, rgba(0,0,0,1) 100%);">
        <h6 class="heading" style ="color : white; font-size : 40px">Modifier votre mot de passe</h6>
          <form action="modificationmdp.php" method="post">
            <fieldset>
              <legend>Modifier votre mot de passe</legend>
              <p>Nouveau Mot de Passe :
              <input type="password" name="mdp" placeholder="mot de passe" required="required" />
              </p>
              <p>Confirmation Mot de Passe :
              <input type="password" name="mdpv" placeholder="vérification" required="required" />
              </p>
              <p><input type="submit" value="Valider"></p>
            </fieldset>
          </form>
        </div>
      </a>
    <center>
<!-- JAVASCRIPTS -->
<script src="../layout/scripts/jquery.min.js"></script>
<script src="../layout/scripts/jquery.backtotop.js"></script>
<script src="../layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>