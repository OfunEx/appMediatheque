<?php


class Link{


    private $id_support;
    private $id_key;


    public function __construct($idSup , $idKey){

            $this->id_support = $idSup;
            $this->$id_key = $idKey;

    }
    
    //recherche le support associer a la key en parametre
    public static function findSupportsByKey($key){
        //cherche tout les supports possédant le mot clé entré en paramètre
        $sql = "SELECT s.id_support , titre_support, type_support, type_format,type_contenu, date_publication, createur_support, type_createur, 
                                                                description_support, nbExemplaire, nbExemplaireDispo, nb_consultation, tps_emprunt_max 
                        FROM `key` INNER JOIN link ON key.id_key = link.id_key 
                                INNER JOIN support s ON link.id_support = s.id_support
                                WHERE terme = \"" .$key.  "\"";


        $bdd = connect();
        $requete = $bdd -> query($sql);
        
        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){
            echo "<div class=\"fiche_support\">"
            . "<div class=\"titre_fiche\">".$value['titre_support']."</div>"
            . "<p>Type du support : ".$value['type_support']." ; "
            . "Format : ".$value['type_format']." ; "
            . "Contenu : ".$value['type_contenu']." / "
            . "Date de publication : ".$value['date_publication']."<br>"
            . "".$value['type_createur']." : ".$value['createur_support']."<br>"        
            . "Nombre d'exemplaire disponible : ".$value['nbExemplaireDispo'].", "
            . "Temps d'emprunt maximum : ".$value['tps_emprunt_max']."</p>"
            . "<p>Description :<br>".$value['description_support']."</p></div>";
        }

    }
    
    private static function checkDouble($idS,$idK){
        $bdd = connect();
        
        $sql = "SELECT * FROM `link` WHERE id_support =\"".$idS."\" AND id_key =\"".$idK."\"";
        $requete = $bdd -> query($sql);
        $res = $requete->fetchAll();
        return $res;
    }

    //permet de lier un support a plusieurs mots cles
    public static function ajouterLink($idS,$keys){
        $bdd = connect();
        
        $idSupport = $bdd->quote($idS);
        
        $compteur = 0;
        while ($compteur < count($keys)) {
            
            $currentKey = $bdd->quote($keys[$compteur]);
            
            //verifie si il a des entree qui existe deja
            $retour = Link::checkDouble($idSupport, $currentKey);
            var_dump($retour);
            if(!$retour){
                $sql = "INSERT INTO `link`(`id_support`, `id_key`) VALUES ($idSupport,$currentKey)";
            
                $requete = $bdd -> query($sql);
            }
            
            $compteur++;
        }
    }
    
    //liste et formate l affichage des supports pour la partie link
    public static function listLinkSupports(){
        $sql = "SELECT * FROM `support` ORDER BY titre_support ASC";
        $bdd = connect();
        $desSupports = $bdd -> query($sql);
        
        foreach ($desSupports as $result){
            echo "<tr>
                    <td>
                    <input type=\"radio\" name=\"support\" value=\"".$result['id_support']."\">".$result['titre_support']."
                    </td>
                    
                    <td>
                    ".$result['type_createur']." :<br> ".$result['createur_support']."
                    </td>
                    
                    <td>
                    ".$result['date_publication']."
                    </td>
                    
                    <td>
                    ".$result['type_support']." ".$result['type_format']." ".$result['type_contenu']."
                    </td>
                </tr>";
        }
    }
    
    //liste et formate l affichage des keys pour la partie link
    public static function listLinkKeys(){
        $sql = "SELECT * FROM `key` ORDER BY terme ASC";
        $bdd = connect();
        $desKeys = $bdd -> query($sql);

        foreach ($desKeys as $result){
            echo "<tr>

                <td>
                    <input type=\"checkbox\" name=\"keys[]\" value=\"".$result['id_key']."\">".$result['terme']."
                </td>

                <td>
                    <p style=\"width:300px;height:70px;overflow:scroll;\">".$result['commentaire']."</p>
                </td>

                </tr>";
        }
    }
}