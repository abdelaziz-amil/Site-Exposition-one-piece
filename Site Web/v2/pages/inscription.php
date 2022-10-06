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
<style>
    	.carre { 
        border: 5px solid rgba(0, 0, 0, 1);
        justify-content : center;
        width : 30%;
      }
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top" style = "background: wheat;">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->
<div> 
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <?php include_once('header.php'); ?>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div id="breadcrumb" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<center>
    <a title="Inscription">
      <div class = "carre" id="contenu" style = "background: rgb(255,113,0); background: linear-gradient(90deg, rgba(0,0,0,0.6937149859943977) 100%, rgba(0,0,0,1) 100%);">
        <h6 class="heading" style = "font-size : 40px; color : white;">Inscription</h6>
        <form action="action.php" method="post">
          <p>Votre pseudo : <input type="text" name="id" required="required"/></p>
          <p>Votre mot de passe : <input type="password" name="mdp" required="required"/></p>
          <p> Confirmer votre mot de passe: <input type = "password" name="v" required="required"/></p>
          <p>Votre NOM : <input type="text" name="nom" required="required"/></p>
          <p>Votre Prenom : <input type="text" name="prenom" required="required"/></p>
          <p>Votre E-mail : <input type="text" name="mail" required="required"/></p>
          <p><input type="submit" value="Valider"></p>
        </form>
      </div>
    </a>
</center>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
