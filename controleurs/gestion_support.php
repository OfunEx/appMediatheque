<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/support.class.php');

if(!empty($_POST['AjouterSupport'])){
    $titreS = $_POST['titreS'];
    $typeS = $_POST['typeS'];
    $typeF = $_POST['typeF'];
    $typeC = $_POST['typeC'];
    $dateP = $_POST['dateP'];
    $auteurS = $_POST['auteurS'];
    $typeA = $_POST['typeA'];
    $descri = $_POST['descri'];
    $nbEx = $_POST['nbEx'];
    $tps = $_POST['tpsEmprunt'];

    Support::ajouterSupport($titreS, $typeS, $typeF, $typeC, $dateP, $auteurS, $typeA, $descri, $nbEx, $tps);
}

//On inclut la vue
include('vues/gestion_support.php');

?>
