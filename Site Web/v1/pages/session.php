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
<title>Connexion</title>
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
<body id="top" style="background : #ffeeee;">
<!-- Top Background Image Wrapper -->
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

    <!-- ################################################################################################ -->
    <!-- / main body -->
<center>
  <a>
    <div class = "cercle" id="contenu" style = "background: rgb(255,113,0); background: linear-gradient(90deg, rgba(0,0,0,0.6937149859943977) 100%, rgba(0,0,0,1) 100%);">
    <h6 class="heading" style ="color : white; font-size : 40px">Connexion</h6>
      <form action="session_action.php" method="post">
        <fieldset>
          <legend>Veuillez saisir votre pseudo et votre mot de passe :</legend>
          <p>Votre pseudo :
          <input type="text" name="pseudo" placeholder="pseudo" required="required" />
          </p>
          <p>Votre mot de passe :
          <input type="password" name="mdp" placeholder="mot de passe" required="required" />
          </p>
          <p><input type="submit" value="Valider"></p>
        </fieldset>
      </form>
    </div>
  </a>
<center>


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Bottom Background Image Wrapper -->
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