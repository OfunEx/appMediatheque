<?php

class Support{

    private $_id_support;
    private $titre;
    private $type_support;
    private $type_format;
    private $type_contenu;
    private $date_publication;
    private $createur_support;
    private $type_createur;
    private $description;
    private $nbExemplaire;
    private $nbExemplaireDispo;
    private $nb_consultation;
    private $tps_emprunt_max;

    public function Support(){

    }

    public static function listAllSupports(){
        $sql = "SELECT * FROM support";
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

    public static function supportPage($numPage){
        
        $sql = "SELECT * from support LIMIT " . $numPage * 6 . ", 6";
        $bdd = connect();
        $requete = $bdd->query($sql);


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

    public static function ajouterSupport($titreS,$typeS,$typeF,$typeC,$dateP,$auteurS,$typeA,$descri,$nbEx,$tps){
        $bdd = connect();

        $requete = $bdd->exec("INSERT INTO `support`(`id_support`, `titre_support`, `type_support`, `type_format`, `type_contenu`, `date_publication`, `createur_support`, `type_createur`, `description_support`, `nbExemplaire`, `nbExemplaireDispo`, `nb_consultation`, `tps_emprunt_max`) "
                . "VALUES ('','$titreS','$typeS','$typeF','$typeC','$dateP','$auteurS','$typeA','$descri','$nbEx','','','$tps')");

        if($requete){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public static function modifierSupport($unId,$unTitre,$unTypeSup,$unTypeFormat,$unTypeContenu,$uneDate,
                                            $unCreateur,$unTypeCreat,$uneDescription,$unNbExamp,
                                            $unNbExampDispo,$unNbConsul,
                                            $unTpsEmpMax)
    {

        $bdd = connect();
        
        $id = $bdd->quote($unId);
        $terme = $bdd->quote($unTerme);
        $com = $bdd->quote($unCom);
        
        $sql = "UPDATE `support` SET
                    `titre_support` = '".$unTitre."',
                     `type_support` = '".$unTypeSup."',
                     `type_format` = '".$unTypeFormat."',
                     `type_contenu` = '".$unTypeContenu."',
                     `date_publication` = '".$uneDate."',
                     `createur_support` = '".$unCreateur."',
                     `type_createur` = '".$unTypeCreat."',
                     `description_support` = '".$uneDescription."',
                     `nbExemplaire` = '".$unNbExamp."',
                     `nbExemplaireDispo` = '".$unNbExampDispo."',
                     `nb_consultation` = '".$unNbConsul."',
                     `tps_emprunt_max` = '".$unTpsEmpMax."' WHERE `id_support` = ".$unId.";";
        
        $requete = $bdd -> query($sql);

    }
    
    public static function supprimerSupport($unIdSup){

        $bdd = connect();
        
        $id = $bdd->quote($unId);
        $terme = $bdd->quote($unTerme);
        $com = $bdd->quote($unCom);

        $sql = "DELETE FROM `link` WHERE `id_support` = " . $unIdSup;

        $requete = $bdd->query($sql);

        $sql = "DELETE FROM `support` WHERE `id_support` = " . $unIdSup;

        $requete = $bdd->query($sql);

        
    }

    public static function nombreSupport(){
        $sql = "SELECT COUNT(*) AS nbSupport FROM support";
        $bdd = connect();
        $requete = $bdd->query($sql);


       $value = $requete -> fetch(PDO::FETCH_ASSOC);
       
       return $value["nbSupport"];
        
    }

    
}

?>