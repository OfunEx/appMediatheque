<?php

/*
 * Controleurs
 */

include('modeles/dbconnexion.php');

//On inclut le modele
require_once('modeles/support.class.php');
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

if(!empty($_POST['AjouterSupport'])){
    $titreS = $_POST['titreS'];
    $typeS = $_POST['typeS'];
    $typeF = $_POST['typeF'];
    $typeC = $_POST['typeC'];
    $dateP = $_POST['dateP'];
    $auteurS = $_POST['auteurS'];
    $typeA = $_POST['typeA'];
    $descri = $_POST['descri'];
    $nbEx = $_POST['nbEx'];
    $tps = $_POST['tpsEmprunt'];

    Support::ajouterSupport($titreS, $typeS, $typeF, $typeC, $dateP, $auteurS, $typeA, $descri, $nbEx, $tps);
}

if(!empty($_POST['ModifierSupport'])){

    Support::modifierSupport($_POST["id_support"],$_POST["titre_support"],$_POST["type_support"],$_POST["type_format"],$_POST["type_contenu"],$_POST["date_publication"],
                                            $_POST["createur_support"],$_POST["type_createur"],$_POST["description_support"],$_POST["nbExemplaire"],
                                            $_POST["nbExemplaireDispo"],$_POST["nb_consultation"],
                                            $_POST["tps_emprunt_max"]);

}


if(!empty($_POST['SupprimerSupports'])){
    Support::supprimerSupports($_POST['supports']);
}



//On inclut la vue
if(!empty($_GET['redirecModif']) && !empty($_GET['id'])){
    include('vues/support_modif.php');
}
else{
    include('vues/gestion_support.php');
}

?>
