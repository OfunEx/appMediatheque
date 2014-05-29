<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once ('modeles/link.class.php');
require_once('modeles/key.class.php');

//On inclut la vue
if(!empty($_GET['redirecConsulKey'])){
    include('vues/consul_key_search.php');
}
else{
    include('vues/consul_key.php');
}

?>
