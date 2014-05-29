
<?php include("vues/connexion.php") ?>

<div id="zone_de_texte">
    <?php include("vues/menu/menu.php"); ?>
    <br>
    <div class="titre_partie"><h1>Fiches des supports</h1></div>
    <div id="support-wrapper">
	    <?php

            // Gestion d'un système de page par page : 
            
            $nbPage = ceil(Support::nombreSupport() / 6);

    		if(!isset($_GET["page"]) || $_GET["page"] < 1 || $_GET["page"] > $nbPage){
    			Support::supportPage(0);
    		}
    		else{
                    Support::supportPage($_GET["page"] - 1);
    		}

    	?>

        <div class="nav-page">
            <a title="Première page" href="index.php?page0=consul_support&page=1"><<</a>
            
            <?php 
                if(!isset($_GET["page"]) || $_GET["page"] < 1 || $_GET["page"] > $nbPage){
                    
                    echo " " . 1 . " ";
                    
                    for ($i = 2; $i < 5; $i++) {
                        
                        echo '- <a title="Première page" href="index.php?page0=consul_support&page=' . $i . '">' . $i . '</a> ';
                        
                    }
                    
    		}
    		else{
                    
                    
                    for ($i = $_GET["page"] - 3; $i < $_GET["page"]; $i++) {

                        if($i < 1 ) continue;
                        
                        echo ' <a title="Première page" href="index.php?page0=consul_support&page=' . $i . '">' . $i . '</a> -';
                        
                    }
                    
                    
                    echo " " . $_GET["page"] . " ";
                    
                    
                    for ($i = $_GET["page"] + 1; $i < $_GET["page"] + 4 && $i <= $nbPage; $i++) {
                        
                        echo '- <a title="Première page" href="index.php?page0=consul_support&page=' . $i . '">' . $i . '</a> ';
                        
                    }
    		}
            
            ?>
            
            <a title="Dernière page" href="index.php?page0=consul_support&page=<?php echo $nbPage?>">>></a>
            

            <form  method="get" action="#" >
                <select name="page">
                    
                <?php 

                    for ($i=1; $i <= $nbPage; $i++) { 
                        if ($i == $_GET["page"]) {
                            echo "<option selected value=".$i.">".$i."</option>";
                        } 
                        else {
                            echo "<option value=".$i.">".$i."</option>";
                        }

                    }

                ?>

                </select>

                <input type="hidden" name="page0" value="consul_support">

                <input type="submit" value="Aller"/>

            </form>
        </div>

    </div>

</div>

