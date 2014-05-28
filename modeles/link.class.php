<?php


class Link{


	private $id_support;
	private $id_key;


	public function __construct($idSup , $idKey){

		$this->id_support = $idSup;
		$this->$id_key = $idKey;

	}



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



}