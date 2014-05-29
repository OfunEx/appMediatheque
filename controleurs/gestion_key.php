<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/key.class.php');
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

if(!empty($_POST['AjouterKey'])){
    Key::ajouterKey($_POST['terme'], $_POST['com']);
}

if(!empty($_POST['ModifierKey'])){
    Key::modifierKey($_POST['id'],$_POST['terme'],$_POST['com']);
}

if(!empty($_POST['SupprimerKey'])){
    Key::supprimerKey($_POST['keys']);
}

//On inclut la vue
if(!empty($_GET['redirecModif']) && !empty($_GET['id'])){
    include('vues/key_modif.php');
}
else{
    include('vues/gestion_key.php');
}

?>
