<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/link.class.php');

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
