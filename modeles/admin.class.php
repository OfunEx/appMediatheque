<?php

require_once 'user.class.php';

class Admin extends User{
    
    public function __construct() {
        parent::__construct($idU, $prenom, $nom, $date, $mail, $idC, $pass, $level);
    }
    
    
}

?>
