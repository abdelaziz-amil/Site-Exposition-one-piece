<?php
  /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
  autorisé à un utilisateur connecté. */
  session_start();
  if(!isset($_SESSION['login']) || $_SESSION['role']!='A'){
    header("Location:session.php");
  }

$mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
if(isset($_GET['id'])){

  $id=$_GET['id'];
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
  $mysqli->query("DELETE FROM T_ACTUALITE_ACT WHERE ACT_NUMERO =".$id.";");//suppression de l'actualité qui a pour numéro $id
  header('location:admin_actualite.php');
}else{
  echo "vous avez oublié le paramètre";
}

    
//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>