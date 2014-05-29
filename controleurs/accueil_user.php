<?php

/*
 * Controleurs
 */

//On inclut le modele
require_once 'modeles/user.class.php';
include('modeles/accueil_user.php');

if(empty($_SESSION['user'])){
    
    
    header('Location: index.php');
}
elseif(!empty($_SESSION['user'])){
    $uti = $_SESSION['user'];
    $user = unserialize($uti);
    
    if($user->getLevel() !=1){
        header('Location: index.php');
    }
}

//On inclut la vue
include('vues/accueil_user.php');

?>
