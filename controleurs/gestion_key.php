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

//On inclut la vue
include('vues/gestion_key.php');

?>
