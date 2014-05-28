<?php

require_once 'user.class.php';

class Admin extends User{
    
    public function Admin($idU, $prenom, $nom, $date, $mail, $idC, $pass, $level) {
        parent::User($idU, $prenom, $nom, $date, $mail, $idC, $pass, $level);
    }
    
    
}

?>
