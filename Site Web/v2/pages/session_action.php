<?php
session_start();
/*Affectation dans des variables du pseudo/mot de passe s'ils existent, affichage d'un message sinon*/
if ($_POST["pseudo"] && $_POST["mdp"]){
    $id=htmlspecialchars($_POST["pseudo"]);
    $motdepasse=htmlsPEcialchars($_POST["mdp"]);
    // Connexion à la base MariaDB
    $mysqli = new mysqli('localhost','zamilab00','rj5qlcwn','zfl2-zamilab00');
    if ($mysqli->connect_errno) {
        // Affichage d'un message d'erreur
        echo "Error: Problème de connexion à la BDD \n";
        // Arrêt du chargement de la page
        exit();
    }

    $sql="SELECT * FROM T_COMPTE_COM JOIN T_PROFIL_PFL USING (COM_PSEUDO) WHERE COM_PSEUDO='" . $id . "' AND COM_MDP=MD5('" . $motdepasse . "') AND PFL_VALIDITEPROFIL='A';";
    /* Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe et s'il est actif!*/
    $resultat = $mysqli->query($sql);
    if ($resultat==false) {
        // La requête a echoué
        echo "Error: Problème d'accès à la base  \n";
        exit();
    } else {
        $ligne=$resultat->fetch_assoc();
        if($resultat->num_rows == 1){
                        $_SESSION['login']=$id;
                        $_SESSION['role']= $ligne['PFL_ROLE'];

            /* Redirection vers la page autorisée à cet utilisateur ATTENTION !! Ne pas mettre d'appel d'echo() / de balise HTML au-dessus de header() dans cette condition */
                        header("Location:admin_accueil.php");
        } else{
            echo"ca marche pas";
        }
    //Fermeture de la communication avec la base MariaDB
    $mysqli->close();
    }
} 
?>
