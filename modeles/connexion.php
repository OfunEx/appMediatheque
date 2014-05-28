<?php

include('modeles/dbconnexion.php');


function recup_mdp($login)
{
    $sql = "SELECT pass_user
            FROM user
            WHERE idconnex_user = '".$login."'
            ";
    $bdd = connect();
    $requete = $bdd -> query($sql);
    $unMdp = $requete -> fetch(PDO::FETCH_ASSOC);
    return $unMdp;
}

function recup_donnees_user($login,$pass)
{
    $sql = "SELECT *
            FROM user
            WHERE idconnex_user = '".$login."' AND pass_user = '".$pass."'
            ";
    $bdd = connect();
    $requete = $bdd -> query($sql);
    $desDonnees = $requete -> fetch(PDO::FETCH_ASSOC);
    return $desDonnees;
}

function recup_niveau($login){
    $sql = "SELECT level_user
            FROM user
            WHERE idconnex_user = '".$login."'
            ";
    $bdd = connect();
    $requete = $bdd -> query($sql);
    $unNiveau = $requete -> fetch(PDO::FETCH_ASSOC);
    return $unNiveau;
}

?>

