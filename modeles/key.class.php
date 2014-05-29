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
        
    public static function ajouterKey($unTerme,$unCom){
        $bdd = connect();
        
        $terme = $bdd->quote($unTerme);
        $com = $bdd->quote($unCom);
        
        $requete = $bdd->exec("INSERT INTO `key`(`id_key`, `terme`, `commentaire`) "
                . "VALUES ('',$terme,$com)");

        if($requete){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public static function modifierKey($unId,$unTerme,$unCom){
        $bdd = connect();
        
        $id = $bdd->quote($unId);
        $terme = $bdd->quote($unTerme);
        $com = $bdd->quote($unCom);
        
        $sql = "UPDATE `key` SET id_key = ".$id.", `terme` = ".$terme.", `commentaire` = ".$com." WHERE `id_key` = ".$unId.";";
        
        $requete = $bdd -> query($sql);
        
    }
    
    public static function supprimerKey($keys){
        $bdd = connect();
        $compteur = 0;
        
        while ($compteur < count($keys)) {
            
            $currentKey = $bdd->quote($keys[$compteur]);
            
            $sql1 = "DELETE FROM `link` WHERE `id_key` = ".$currentKey.";";
            
            $sql2 = "DELETE FROM `key` WHERE `id_key` = ".$currentKey.";";
            
            $requete1 = $bdd -> query($sql1);
            $requete2 = $bdd -> query($sql2);
            
            $compteur++;
        }
        
    }
    
    public static function recup_key_id($id){
        $sql = "SELECT * FROM `key` WHERE `id_key` =".$id.";";
        $bdd = connect();
        $uneKey = $bdd -> query($sql);
        $value = $uneKey -> fetch(PDO::FETCH_ASSOC);
        
        echo "<form method=\"POST\" action=\"index.php?page2=gestion_key\" style=\"height:300px;\">
                <div class='form_ajouter_key'>
                    <input name=\"id\" type=\"hidden\" value=\"".$value['id_key']."\"/>
                    <div style=\"float:left;margin-right:20px;margin-left:20px;\">Terme :&nbsp;<input id=\"terme\" name=\"terme\" type=text style=\"text-align: left;\" value=\"".$value['terme']."\"/></div>

                    <div style=\"float:left;\">Commentaire :&nbsp;</div><div style=\"float:left;\"><textarea id=\"com\" name=\"com\" type=text rows=2 COLS=20 maxWidth=\"200\" style=\"text-align: left;width:500px;height:200px;\">".$value['commentaire']."</textarea></div>

                <div style=\"float:left;\"><input id='submitModifier' type=\"submit\" name=\"ModifierKey\" value=\"Valider\" style=\"margin-bottom: 30px;margin-left: 20px;\"/></div>
                </div>
            </form>";
        
    }
    
    public static function listAlterKeysModif(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $desKeys = $bdd -> query($sql);
        
        foreach ($desKeys as $result){
            echo "<tr>
                    <td style=\"text-align:center;\">
                    <a href=\"index.php?page2=gestion_key&redirecModif=ok&id=".$result['id_key']."\">".$result['terme']."</a>
                    </td>
                    
                    <td>
                    <p style=\"height:100px;overflow:scroll;\">".$result['commentaire']."</p>
                    </td>
                </tr>";
        }
    }
    
    public static function listAlterKeysSupp(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $desKeys = $bdd -> query($sql);
        
        foreach ($desKeys as $result){
            echo "<tr>
                    <td style=\"text-align:center;\">
                    <input type=\"checkbox\" name=\"keys[]\" value=\"".$result['id_key']."\">".$result['terme']."
                    </td>
                    
                    <td>
                    <p style=\"height:70px;overflow:scroll;\">".$result['commentaire']."</p>
                    </td>
                </tr>";
        }
    }

    public static function findKey($query){

        $sql = "SELECT terme FROM `key` WHERE terme='" . $query . "'";
        $bdd = connect();
        $requete = $bdd -> query($sql);
        $value = $requete -> fetch(PDO::FETCH_ASSOC);
        return $value["terme"];

    }

    public static function findSuggestedKey($query){

        $sql = "SELECT terme FROM `key` WHERE terme LIKE '%" . $query . "%'";
        $bdd = connect();
        $requete = $bdd -> query($sql);

        $res = null;
        $i = 0;


        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){

            $res[$i] = $value["terme"];
            $i++;

        }
        
        return $res;

    }

}

?>
