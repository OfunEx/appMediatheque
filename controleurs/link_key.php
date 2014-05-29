<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/link.class.php');
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

if(!empty($_POST['submitLink'])){
    Link::ajouterLink($_POST['support'], $_POST['keys']);
}

if(!empty($_POST['submitUnlink'])){
    Link::ajouterLink($_POST['support'], $_POST['keys']);
}

//On inclut la vue
if($_GET['partie']==1){
    include('vues/link_key.php');
}
elseif($_GET['partie']==2){
    include('vues/link2_key.php');
}


?>
