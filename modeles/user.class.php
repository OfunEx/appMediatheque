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

    public function __construct($idU,$prenom,$nom,$date,$mail,$idC,$pass,$level) {
        $this->id_user = $idU;
        $this->prenom_user = $prenom;
        $this->nom_user = $nom;
        $this->date_user = $date;
        $this->mail_user = $mail;
        $this->idconnex_user = $idC;
        $this->pass_user = $pass;
        $this->level_user = $level;
    }
    
    
}

?>
