<?php
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['role']  != 'A') //A COMPLETER pour tester aussi le rôle...
    {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
    }
     $visnum = htmlspecialchars($_POST['visnum']);
     $VouC = htmlspecialchars(strtoupper($_POST['VouC']));

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
    if ($VouC == 'V'){
        $requete1 = "SELECT * FROM T_VISITEUR_VIS where VIS_NUMERO= '" . $visnum . "';";
        $resultat1 = $mysqli->query($requete1);
        if ($resultat1->num_rows == 1) {
            $requete2 = "UPDATE `T_COMMENTAIRE_CMT` SET CMT_ETAT = 'V' WHERE T_COMMENTAIRE_CMT.VIS_NUMERO = ".$visnum.";";
            $resultat2 = $mysqli->query($requete2);
            header("Location:admin_tickets.php");
        } else {
            header("Location:admin_tickets.php");
        }
    }else{
        $requete1 = "SELECT * FROM T_VISITEUR_VIS where VIS_NUMERO= '" . $visnum . "';";
        $resultat1 = $mysqli->query($requete1);
        if ($resultat1->num_rows == 1) {
            $requete2 = "UPDATE `T_COMMENTAIRE_CMT` SET CMT_ETAT = 'C' WHERE T_COMMENTAIRE_CMT.VIS_NUMERO = ".$visnum.";";
            $resultat2 = $mysqli->query($requete2);
            header("Location:admin_tickets.php");
        } else {
            header("Location:admin_tickets.php");
        }
    }
    ?>