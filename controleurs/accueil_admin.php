<?php

/*
 * Controleurs
 */
//require_once 'modeles/user.class.php';
//if(empty($_SESSION['user']) || $_SESSION['user']->getLevel() !=2){
//    header('Location: index.php');
//}

//On inclut le modele
include('modeles/accueil_admin.php');
var_dump($_SESSION);
//On inclut la vue
include('vues/accueil_admin.php');

?>
