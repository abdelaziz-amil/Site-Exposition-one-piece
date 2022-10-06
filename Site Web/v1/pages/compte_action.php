<?php
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['role']  != 'A') //A COMPLETER pour tester aussi le rôle...
    {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
    }
    if($_POST['pseudo'] && $_POST['AouD']){

        $id = htmlspecialchars($_POST['pseudo']);
        $etat = htmlspecialchars(strtoupper($_POST['AouD']));
        
        
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
        //teste que le profile existe
        $requete1 = "SELECT * FROM T_PROFIL_PFL where COM_PSEUDO= '" . $id . "';";
        $resultat1 = $mysqli->query($requete1);
        if($etat == 'A' || $etat == 'D'){
            if ($resultat1->num_rows == 1) {
                $requete2 = "UPDATE `T_PROFIL_PFL` SET `PFL_VALIDITEPROFIL` = '" . $etat . "' where `T_PROFIL_PFL`.`COM_PSEUDO` = '" . $id . "';";
                $resultat2 = $mysqli->query($requete2);
                header("Location:admin_accueil.php");
            } else {
                header("Location:admin_accueil.php");
            }
        }else{
            header("location:admin_accueil.php");
            echo('entrée A ou D');
        }
    }else{
        header("location:admin_accueil.php");
    }
?>