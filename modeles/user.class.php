<?php

class User{
    
    protected $id_user;
    protected $prenom_user;
    protected $nom_user;
    protected $date_user;
    protected $mail_user;
    protected $idconnex_user;
    protected $pass_user;
    protected $level_user;

    public function User($idU,$prenom,$nom,$date,$mail,$idC,$pass,$level) {
        $this->id_user = $idU;
        $this->prenom_user = $prenom;
        $this->nom_user = $nom;
        $this->date_user = $date;
        $this->mail_user = $mail;
        $this->idconnex_user = $idC;
        $this->pass_user = $pass;
        $this->level_user = $level;
    }


    public static function emailExist($unEmail){
        //vérifie si un email existe déjà dans la base de donnée


    }

    public static function idCExist(){
        //vérifie si un identifiant existe déjà dans la base de donnée



    }

    public static function addUser($prenom,$nom,$date,$mail,$idC,$pass,$level){
        //ajoute un utilisateur

        
        $sql = "INSERT INTO `media`.`user` (`id_user`, `prenom_user`, `nom_user`, `date_user`, 
                                            `mail_user`, `idconnex_user`, `pass_user`, `level_user`) 
                VALUES (NULL, '".$prenom."', '".$nom."', '".$date."', '".$mail."', '".$idC."', '".$pass."', '".$level."');";
        $bdd = connect();
        $requete = $bdd -> query($sql);

    }

    
}

?>
