<?php
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['role']  != 'A') //A COMPLETER pour tester aussi le rôle...
    {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
    }
    if ($_POST['visnum']){
        $visnum = htmlspecialchars($_POST['visnum']);
        
        $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
        if ($mysqli->connect_errno) {
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
        $requete1 = "SELECT * FROM T_VISITEUR_VIS where VIS_NUMERO= '" . $visnum . "';";//verification de l'existance du visiteur
        $resultat1 = $mysqli->query($requete1);
        if ($resultat1->num_rows == 1) {
            $requete2 = "DELETE FROM `T_COMMENTAIRE_CMT` WHERE VIS_NUMERO = ".$visnum.";";//suppression des données liée au visiteur dans la base (ligne dans commentaire et ligne dans visiteur)
            $requete3 = "DELETE FROM `T_VISITEUR_VIS` WHERE VIS_NUMERO = ".$visnum.";";
            $resultat2 = $mysqli->query($requete2);
            $resultat3 = $mysqli->query($requete3);
            header("Location:admin_tickets.php");
        } else {
            header("Location:admin_tickets.php");
        }
    }else{
        header("Location:admin_tickets.php");
    }
    ?>