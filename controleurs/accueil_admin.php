<?php

/*
 * Controleurs
 */
require_once 'modeles/user.class.php';

if(empty($_SESSION['user'])){
    
    
    header('Location: index.php');
}
elseif(!empty($_SESSION['user'])){
    $uti = $_SESSION['user'];
    $user = unserialize($uti);
    
    if($user->getLevel() !=2){
        header('Location: index.php');
    }
}

//On inclut le modele
include('modeles/accueil_admin.php');
//On inclut la vue
include('vues/accueil_admin.php');

?>
