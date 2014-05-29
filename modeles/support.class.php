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

    public static function listAlterSupModif(){
        
        $sql = "SELECT * FROM `support` ORDER BY 'titre_support' ASC";
        $bdd = connect();
        $desSup = $bdd -> query($sql);
        
        foreach ($desSup  as $result){
            echo "<tr>
                    <td style=\"text-align:center;\">
                        <a href=\"index.php?page2=gestion_support&redirecModif=ok&id=".$result['id_support']."\">".$result['titre_support']."</a>
                    </td>
                    
                    <td style=\"text-align:center;\">
                        <p>".$result['type_support']."</p>
                    </td>

                    <td>
                        <p>".$result['type_format']."</p>
                    </td>

                    <td>
                        <p>".$result['type_contenu']."</p>
                    </td>

                    <td>
                        <p>".$result['date_publication']."</p>
                    </td>

                    <td>
                        <p>".$result['description_support']."</p>
                    </td>

                    <td>
                        <p>".$result['createur_support']."</p>
                    </td>

                    <td>
                        <p>".$result['type_createur']."</p>
                    </td>


                    <td>
                        <p>".$result['nbExemplaire']."</p>
                    </td>

                    <td>
                        <p>".$result['nbExemplaireDispo']."</p>
                    </td>

                    <td>
                        <p>".$result['nb_consultation']."</p>
                    </td>

                    <td>
                        <p>".$result['tps_emprunt_max']."</p>
                    </td>

                </tr>";
        }
        
    }

    public static function recup_support_id($id){
        $sql = "SELECT * FROM `support` WHERE `id_support` =".$id.";";
        $bdd = connect();
        $uneKey = $bdd -> query($sql);
        $value = $uneKey -> fetch(PDO::FETCH_ASSOC);


        echo "<input type=\"hidden\" name=\"id_support\" value=\"" . $value["id_support"] . "><br>" ;
        echo "<input type=\"text\" name=\"titre_support\" value=\"" .  $value["titre_support"] . "><br>" ;
        echo "<input type=\"text\" name=\"type_support\" value=\"" .  $value["type_support"] . "><br>" ;
        echo "<input type=\"text\" name=\"type_format\" value=\"" .  $value["type_format"] . "><br>";
        echo "<input type=\"text\" name=\"type_contenu\" value=\"" .  $value["type_contenu"] ."><br>";
        echo "<input type=\"text\" id=\"dateP\" name=\"date_publication\" value=\"" .  $value["date_publication"] . "><br>";
        echo "<input type=\"text\" name=\"createur_support\" value=\"" .  $value["createur_support"] . "><br>";
        echo "<input type=\"text\" name=\"type_createur\" value=\"" .  $value["type_createur"] . "><br>" ;
        echo "<input type=\"text\" name=\"description_support\" value=\"" .  $value["description_support"] . "><br>";
        echo "<input type=\"text\" name=\"nbExemplaire\" value=\"" .  $value["nbExemplaire"] . "><br>";
        echo "<input type=\"text\" name=\"nbExemplaireDispo\" value=\"" .  $value["nbExemplaireDispo"] . "><br>";
        echo "<input type=\"text\" name=\"nb_consultation\" value=\"" .  $value["nb_consultation"] . "><br>";
        echo "<input type=\"text\" name=\"tps_emprunt_max\" value=\"" .  $value["tps_emprunt_max"] ."><br>";


        echo "<input id='submitModifier' type=\"submit\" name=\"ModifierSupport \" value=\"Valider\" style=\"margin-bottom: 30px;margin-left: 20px;\"/>";

        var_dump($value);

    }
    
    
}

?>