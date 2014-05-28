<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/link.class.php');

//On inclut la vue
if($_GET['partie']==1){
    include('vues/link_key.php');
}
elseif($_GET['partie']==2){
    include('vues/link2_key.php');
}


?>
