<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/support.class.php');

//On inclut la vue
if(!empty($_GET['redirecConsulSupport'])){
    include('vues/consul_support_search.php');
}
else{
    include('vues/consul_support.php');
}


?>
