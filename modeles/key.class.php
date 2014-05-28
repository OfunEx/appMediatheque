<?php

class Key{

    private $id_key;
    private $terme;
    private $commentaire;

    public function __construct($idK,$termeK,$comK) {
        $this->id_key = $idK;
        $this->terme = $termeK;
        $this->commentaire = $comK;
    }

    public static function listAllKeys(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $requete = $bdd -> query($sql);

        $compteur = 0;
        $save = null;
        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){

            $index = substr($value['terme'], 0,1);

            if(isset($save)){

                switch ($index) {
                case $index == $save:

                    break;
                default:
                    echo "</div><div class=\"index_block\" id=\"tabs-".$compteur."\"><div class=\"titre_index\">".$index."</div>";
                    break;
                }
            }
            else{
                echo "<div class=\"index_block\" id=\"tabs-".$compteur."\"><div class=\"titre_index\">".$index."</div>";
            }

            $save = $index;

            echo "<div class=\"contenu_index\">"
            . "<a style=\"font-size:10px;\" class=\"btn_key\" value=\"".$compteur."\">fermer</a>&nbsp&nbsp"
            . "<a class=\"terme\" title=\"Commentaire : ".$value['commentaire']."\">".$value['terme']."</a>"
            . "<div class=\"com\" id=\"com".$compteur."\">Commentaire :<br>".$value['commentaire']."</div></div>";

            $compteur++;
        }
    }

    public static function createListKeys(){

        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $requete = $bdd -> query($sql);

        $compteur = 0;
        $save = null;
        echo '<div>';
        echo '<ul>';
        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){

            $index = substr($value['terme'], 0,1);

            if(isset($save)){

                switch ($index) {
                case $index == $save:

                    break;
                default:
                    echo "<li><a href=\"#tabs-".$compteur."\">".$index."</a></li>";
                    break;
                }
            }
            else{
                echo "<li><a href=\"#tabs-".$compteur."\">".$index."</a></li>";
            }

            $save = $index;

            $compteur++;
        }
        echo '</ul>';
        echo '</div>';
    }
    
    public static function ajouterKey($terme,$com){
        $bdd = connect();

        $requete = $bdd->exec("INSERT INTO `key`(`id_key`, `terme`, `commentaire`) "
                . "VALUES ('','$terme','$com')");

        if($requete){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
//    public static function modifierKey(){
//        
//    }
//    
//    public static function supprimerKey(){
//        
//    }
}

?>
