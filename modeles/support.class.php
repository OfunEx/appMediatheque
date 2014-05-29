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
    
    //liste tous les supports present dans la bdd
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

    //liste un support present dans la bdd
    public static function listASupport($id){
        $sql = "SELECT * FROM support WHERE id_support =".$id;
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
    
    //retourne toutes les clés lier a un support
    public static function getKeysSupport($idS){
        $sql = "SELECT terme FROM `key` INNER JOIN link ON key.id_key = link.id_key INNER JOIN support s ON link.id_support = s.id_support WHERE s.id_support = \"".$idS."\"";
        $bdd = connect();
        $desKeys = $bdd->query($sql);
        foreach ($desKeys as $result){
            echo "<tr>
                    <td>
                    <a href=\"index.php?page0=consul_key&redirecConsulKey=ok&terme=".$result['terme']."\" class=\"terme\">".$result['terme']."</a>
                    </td>
                </tr>";
        }
    }

        //permet de faire apparaitre les supports page par page
    public static function supportPage($numPage){
        
        $sql = "SELECT * from support LIMIT " . $numPage * 6 . ", 6";
        $bdd = connect();
        $requete = $bdd->query($sql);


        while($value = $requete -> fetch(PDO::FETCH_ASSOC)){
            echo "<div class=\"fiche_support\">"
            . "<a href=\"index.php?page0=consul_support&redirecConsulSupport=ok&id=".$value['id_support']."\" class=\"titre_fiche\">".$value['titre_support']."</a>"
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
    
    //permet d'ajouter un support
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
    
    //permet de modifier un support
    public static function modifierSupport($unId,$unTitre,$unTypeSup,$unTypeFormat,$unTypeContenu,$uneDate,
                                            $unCreateur,$unTypeCreat,$uneDescription,$unNbExamp,
                                            $unNbExampDispo,$unNbConsul,
                                            $unTpsEmpMax)
    {

        $bdd = connect();

        
        $unTitre = $bdd->quote($unTitre);
        $unTypeSup = $bdd->quote($unTypeSup);
        $unTypeFormat = $bdd->quote($unTypeFormat);
        $unTypeContenu = $bdd->quote($unTypeContenu);
        $uneDate = $bdd->quote($uneDate);
        $unCreateur = $bdd->quote($unCreateur);
        $unTypeCreat = $bdd->quote($unTypeCreat);
        $uneDescription = $bdd->quote($uneDescription);
        $unNbExamp = $bdd->quote($unNbExamp);
        $unNbExampDispo = $bdd->quote($unNbExampDispo);
        $unNbConsul = $bdd->quote($unNbConsul);
        $unTpsEmpMax = $bdd->quote($unTpsEmpMax);
        $unId = $bdd->quote($unId);



        
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
    
    //permet de supprimer un support
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

    //permet de supprimer plusieurs supports
        public static function supprimerSupports($supports){
        $bdd = connect();
        $compteur = 0;
        
        while ($compteur < count($supports)) {
            
            $currentKey = $bdd->quote($supports[$compteur]);
            
            $sql1 = "DELETE FROM `link` WHERE `id_support` = ".$currentKey.";";
            
            $sql2 = "DELETE FROM `support` WHERE `id_support` = ".$currentKey.";";
            
            $requete1 = $bdd -> query($sql1);
            $requete2 = $bdd -> query($sql2);
            
            $compteur++;
        }
        
    }
    
    //recupere le nombre de support
    public static function nombreSupport(){
        $sql = "SELECT COUNT(*) AS nbSupport FROM support";
        $bdd = connect();
        $requete = $bdd->query($sql);


       $value = $requete -> fetch(PDO::FETCH_ASSOC);
       
       return $value["nbSupport"];
        
    }
    
    //liste les supports pour l'affichage dans la partie modifier des supports
    public static function listAlterSupModif(){
        
        $sql = "SELECT * FROM `support` ORDER BY 'titre_support' ASC";
        $bdd = connect();
        $desSup = $bdd -> query($sql);
        
        foreach ($desSup  as $result){
            echo "<tr>
                    <td style=\"text-align:center;width:100px;\">
                        <a href=\"index.php?page2=gestion_support&redirecModif=ok&id=".$result['id_support']."\" >".$result['titre_support']."</a>
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
                        <p style=\"width:200px;height:100px;overflow:scroll;\">".$result['description_support']."</p>
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
                        <p>".$result['tps_emprunt_max']."</p>
                    </td>

                </tr>";
        }
    }
    
    //liste les supports pour l'affichage dans la partie supprimer des supports
    public static function listAlterSupSupp(){
        
        $sql = "SELECT * FROM `support` ORDER BY 'titre_support' ASC";
        $bdd = connect();
        $desSup = $bdd -> query($sql);
        
        foreach ($desSup  as $result){
            echo "<tr>

                    <td style=\"text-align:center;width:100px;\">
                        <input type=\"checkbox\" name=\"supports[]\" value=\"".$result['id_support']."\">".$result['titre_support']."
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
                        <p style=\"width:200px;height:100px;overflow:scroll;\">".$result['description_support']."</p>
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
                        <p>".$result['tps_emprunt_max']."</p>
                    </td>

                </tr>";
        }
        
    }
    
    //recupere un support par rapport a son identifiant
    public static function recup_support_id($id){
        $sql = "SELECT * FROM `support` WHERE `id_support` =".$id.";";
        $bdd = connect();
        $uneKey = $bdd -> query($sql);
        $value = $uneKey -> fetch(PDO::FETCH_ASSOC);


        echo "<input type=\"hidden\" name=\"id_support\" value=\"" . $value["id_support"] . "\"><br>" ;
        echo "Titre : <input required type=\"text\" name=\"titre_support\" value=\"" .  $value["titre_support"] . "\"><br>" ;
        echo "Type support :  <input type=\"text\" name=\"type_support\" value=\"" .  $value["type_support"] . "\"><br>" ;
        echo "Type format : <input type=\"text\" name=\"type_format\" value=\"" .  $value["type_format"] . "\"><br>";
        echo "Type contenu : <input type=\"text\" name=\"type_contenu\" value=\"" .  $value["type_contenu"] ."\"><br>";
        echo "Date de publication : <input required type=\"text\" id=\"dateP\" name=\"date_publication\" value=\"" .  $value["date_publication"] . "\"><br>";
        echo "Description : <input type=\"text\" name=\"createur_support\" value=\"" .  $value["createur_support"] . "\"><br>";
        echo "Créateur : <input type=\"text\" name=\"type_createur\" value=\"" .  $value["type_createur"] . "\"><br>" ;
        echo "Type créateur : <input type=\"text\" name=\"description_support\" value=\"" .  $value["description_support"] . "\"><br>";
        echo "Nombre examplaire : <input type=\"text\" name=\"nbExemplaire\" value=\"" .  $value["nbExemplaire"] . "\"><br>";
        echo "Examplaire disponible : <input type=\"text\" name=\"nbExemplaireDispo\" value=\"" .  $value["nbExemplaireDispo"] . "\"><br>";
        echo "Nombre consultation : <input type=\"text\" name=\"nb_consultation\" value=\"" .  $value["nb_consultation"] . "\"><br>";
        echo "Temps d'emprunt maximum : <input type=\"text\" name=\"tps_emprunt_max\" value=\"" .  $value["tps_emprunt_max"] ."\"><br>";


        echo "<input id='submitModifier' type=\"submit\" name=\"ModifierSupport\" value=\"Valider\" style=\"margin-bottom: 30px;margin-left: 20px;\"/>";

    }



}

?>