<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/key.class.php');

if(!empty($_POST['AjouterKey'])){
    Key::ajouterKey($_POST['terme'], $_POST['com']);
}

if(!empty($_POST['ModifierKey'])){
    Key::modifierKey($_POST['id'],$_POST['terme'],$_POST['com']);
}

if(!empty($_POST['SupprimerKey'])){
    Key::supprimerKey($id);
}

//On inclut la vue
if(!empty($_GET['redirecModif']) && !empty($_GET['id'])){
    include('vues/key_modif.php');
}
else{
    include('vues/gestion_key.php');
}

?>
