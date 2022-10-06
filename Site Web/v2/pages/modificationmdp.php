<?php
    /* Vérification ci-dessous à faire sur toutes les pages dont l'accès est
    autorisé à un utilisateur connecté. */
    session_start();
    if(!isset($_SESSION['login']) || $_SESSION['role']!='A'){
    header("Location:session.php");
    }

    $mdp=htmlspecialchars($_POST['mdp']);
    $mdpv=htmlspecialchars($_POST['mdpv']);

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
    if ($mdp == $mdpv){
        $mysqli->query("UPDATE T_COMPTE_COM SET COM_MDP = MD5('".$mdp."') WHERE COM_PSEUDO = '".$_SESSION['login']."';");//modification du mot de passe de l'utilisateur connecté à sa session
        header('location:admin_accueil.php');
    }else{
        header('location:admin_accueil.php');
    }


    //On insère une ligne dans la table gérant les comptes des utilisateurs
        
    //Ferme la connexion avec la base MariaDB
    $mysqli->close();
?>