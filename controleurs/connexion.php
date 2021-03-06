<?php
//controleurs
//
    // On inclut le modèle
    include('modeles/connexion.php');
    require_once 'modeles/user.class.php';

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
        
        $desDonnees = recup_donnees_user($_POST['login'],$pass_sha1);
        $idU = $desDonnees['id_user'];
        $prenom = $desDonnees['prenom_user'];
        $nom = $desDonnees['nom_user'];
        $date = $desDonnees['date_user'];
        $mail = $desDonnees['mail_user'];
        $idC = $desDonnees['idconnex_user'];
        $pass = $desDonnees['pass_user'];
        $level = $desDonnees['level_user'];
        //on instancie un objet user
        $uti = new User($idU, $prenom, $nom, $date, $mail, $idC, $pass, $level);
        
        if($uti->getLevel() == 1){
            //et on le stock dans une variable de session
            $user = serialize($uti);
            $_SESSION['user'] = $user;
            header('Location: index.php?page1=accueil_user');
        }
        elseif ($uti->getLevel() == 2){
            //et on le stock dans une variable de session
            $user = serialize($uti);
            $_SESSION['user'] = $user;
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
