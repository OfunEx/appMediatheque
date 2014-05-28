<?php
//controleurs
//
    // On inclut le modèle
    include('modeles/connexion.php');
    require_once 'modeles/user.class.php';
    require_once 'modeles/admin.class.php';

    // On récupère les identifiants de connexion de l'utilisateur pour ensuite
    // les comparer à ceux de la base de données :
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])){
        extract($_POST);
    }
    // On récupère le password de la table qui correspond au login de l'utilisateur.
    $mdp = recup_mdp($_POST['login']);
    
//    var_dump($_POST,$mdp);exit;
    $pass_sha1 = SHA1($_POST['pass']);
    if ($mdp['pass_user'] == $pass_sha1){
        
        $niveau = recup_niveau($_POST['login']);
        echo 'je suis passer';
        if($niveau['level_user'] == 1){

            $requete_donnees = recup_donnees_user($_POST['login'],$pass_sha1);

            while ($desDonnees = $requete_donnees -> fetch(PDO::FETCH_ASSOC)) {
            $user = new User($desDonnees);
            }

            header('Location: index.php?page1=accueil_user');
        }
        elseif ($niveau['level_user'] == 2){

            $requete_donnees = recup_donnees_user($_POST['login']);

            while ($desDonnees = $requete_donnees -> fetch(PDO::FETCH_ASSOC)) {
            $user = new Admin($desDonnees);
            }

            header('Location: index.php?page2=accueil_admin');
        }
         else{

            header('Location: index.php');
        }
    }
    else{
            header('Location: index.php');
        }

?>
