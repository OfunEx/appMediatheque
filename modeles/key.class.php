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
    
    //permet de lister toutes les key de la bdd de facon a representer un index ordonner par ordre alphabetique
    public static function listAllKeys(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $requete = $bdd -> query($sql);

        $compteur = 0;
        $save = null;
        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){
            //cette partie sert a formater un index ordonner par ordre alphabetique
            //on recupere la premiere valeur
            $index = substr($value['terme'], 0,1);

            if(isset($save)){

                switch ($index) {
                case $index == $save:
                    //si la premiere lettre est egale a la precedante on break
                    break;
                default:
                    //sinn on crée une nouvelles liste
                    echo "</div><div class=\"index_block\" id=\"tabs-".$compteur."\"><div class=\"titre_index\">".$index."</div>";
                    break;
                }
            }
            else{
                //cette partie gere le premier cas que la boucle va traitrer
                //on crée une nouvelles liste
                echo "<div class=\"index_block\" id=\"tabs-".$compteur."\"><div class=\"titre_index\">".$index."</div>";
            }
            //on sauvegarde la premiere lettre pour la comparer a chaque boucle
            $save = $index;

            echo "<div class=\"contenu_index\">"
            . "<a style=\"font-size:10px;\" class=\"btn_key\" value=\"".$compteur."\">fermer</a>&nbsp&nbsp"
            . "<a href=\"index.php?page0=consul_key&redirecConsulKey=ok&terme=".$value['terme']."\" class=\"terme\">".$value['terme']."</a>"
            . "<div class=\"com\" id=\"com".$compteur."\">Commentaire :<br>".$value['commentaire']."</div></div>";

            $compteur++;
        }
    }
    
    //cette partie est utilise pour formater le html pour utiliser la fonction tabs du plug in jquery ui
    //tabs() necessite d avoir une liste contenant des ancres pour fonctionner
    public static function createListKeys(){

        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $requete = $bdd -> query($sql);

        $compteur = 0;
        $save = null;
        echo '<div>';
        echo '<ul>';
        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){
            //cette partie sert a formater un index ordonner par ordre alphabetique
            //on recupere la premiere valeur
            $index = substr($value['terme'], 0,1);
            
            
            if(isset($save)){

                switch ($index) {
                case $index == $save:
                    //si la premiere lettre est egale a la precedante on break
                    break;
                default:
                    //sinn on crée une nouvelles liste
                    echo "<li><a href=\"#tabs-".$compteur."\">".$index."</a></li>";
                    break;
                }
            }
            else{
                //cette partie gere le premier cas que la boucle va traitrer
                //on crée une nouvelles liste
                echo "<li><a href=\"#tabs-".$compteur."\">".$index."</a></li>";
            }
            //on sauvegarde la premiere lettre pour la comparer a chaque boucle
            $save = $index;

            $compteur++;
        }
        echo '</ul>';
        echo '</div>';
    }
    
    //permet d ajouter une key dans la base de donner        
    public static function ajouterKey($unTerme,$unCom){
        $bdd = connect();
        
        //ucfirst met la premiere du terme en maj si elle ne l est pas deja
        $terme = $bdd->quote(ucfirst($unTerme));
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
    
    //permet de modifier une les valeurs d une key
    public static function modifierKey($unId,$unTerme,$unCom){
        $bdd = connect();
        
        //on formalise les valeurs pour la bdd
        $id = $bdd->quote($unId);
        $terme = $bdd->quote($unTerme);
        $com = $bdd->quote($unCom);
        
        $sql = "UPDATE `key` SET id_key = ".$id.", `terme` = ".$terme.", `commentaire` = ".$com." WHERE `id_key` = ".$unId.";";
        
        $requete = $bdd -> query($sql);
        
    }
    
    //permet de supprimer une key ou un ensemble de keys choisi par l utilisateur
    public static function supprimerKey($keys){
        $bdd = connect();
        $compteur = 0;
        
        //on va recupere chaque key du tableau keys[] et faire les traitements de suppression
        //dans la table link puis dans la table key
        while ($compteur < count($keys)) {
            
            $currentKey = $bdd->quote($keys[$compteur]);
            
            $sql1 = "DELETE FROM `link` WHERE `id_key` = ".$currentKey.";";
            
            $sql2 = "DELETE FROM `key` WHERE `id_key` = ".$currentKey.";";
            
            $requete1 = $bdd -> query($sql1);
            $requete2 = $bdd -> query($sql2);
            
            $compteur++;
        }
        
    }
    
    //recupere les donnees d une key par rapport a son id
    public static function recup_key_id($id){
        $sql = "SELECT * FROM `key` WHERE `id_key` =".$id.";";
        $bdd = connect();
        $uneKey = $bdd -> query($sql);
        $value = $uneKey -> fetch(PDO::FETCH_ASSOC);
        
        //formate le formulaire de la page key_modif.php et pre rempli les champ pour l utilisateur
        echo "<form method=\"POST\" action=\"index.php?page2=gestion_key\" style=\"height:300px;\">
                <div class='form_ajouter_key'>
                    <input name=\"id\" type=\"hidden\" value=\"".$value['id_key']."\"/>
                    <div style=\"float:left;margin-right:20px;margin-left:20px;\">Terme :&nbsp;<input id=\"terme\" name=\"terme\" type=text style=\"text-align: left;\" value=\"".$value['terme']."\"/></div>

                    <div style=\"float:left;\">Commentaire :&nbsp;</div><div style=\"float:left;\"><textarea id=\"com\" name=\"com\" type=text rows=2 COLS=20 maxWidth=\"200\" style=\"text-align: left;width:500px;height:200px;\">".$value['commentaire']."</textarea></div>

                <div style=\"float:left;\"><input id='submitModifier' type=\"submit\" name=\"ModifierKey\" value=\"Valider\" style=\"margin-bottom: 30px;margin-left: 20px;\"/></div>
                </div>
            </form>";
        
    }
    
    //cree et rempli dynamiquement le tableau d affichage de la partie modif de gestion_key.php
    public static function listAlterKeysModif(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $desKeys = $bdd -> query($sql);
        
        //le href revoi des parametres get pour changer la vue et afficher le formulaire de modif par rapport a l id
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
    
    //cree et rempli dynamiquement le tableau d affichage de la partie supp de gestion_key.php
    public static function listAlterKeysSupp(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $desKeys = $bdd -> query($sql);
        
        //l'utilisateur pourra ckeck plusieurs checkbox et elles seront renvoyer sous la forme d un tableau keys[]
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
    
    //permet de recup un key par rapport au resultat d une autre requete
    public static function findKey($query){

        $sql = "SELECT terme FROM `key` WHERE terme='" . $query . "'";
        $bdd = connect();
        $requete = $bdd -> query($sql);
        $value = $requete -> fetch(PDO::FETCH_ASSOC);
        return $value["terme"];

    }
    
    //permet de retrouver une key existante par rapport a une key approximative entree par l utilisateur
    //une suggestion est alors envoyer a l utilisateur via la vue
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
