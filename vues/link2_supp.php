<script>

$(function() {
    
    $('.tab_link').dataTable({
        "bJQueryUI": true,
        'iDisplayLength': 10,
        bAutoWidth: true
    });

});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php");?>
    <br>
    <div class="titre_partie">
        <h1>Suppression des liens entre mots clés et supports</h1>
        <h2>Suppression de : </h2>
    </div>

        <?php 
            Support::listASupport($_GET["id"]);
         ?>

    	<form method="POST" action="index.php?page2=link_key&partie=2">
            <div style="width: 500px;display: inline-block;margin-right: 20px;">
                <table class="tab_link">
                    <thead>
                            <tr>
                                <th> Termes</th>
                                <th> Commentaires</th>
                            </tr>
                    </thead>
                    <?php Link::listLinkKeys() ?>
                </table>
            </div>
            <div style="display: inline-block;">
                <?php echo "<input type=\"hidden\" name=\"idKey\" value=\"" .$_GET["id"]. ">\""; ?>
                <input id='submitSupp' type="submit" name="submitSupp" value="Valider" style="margin-bottom: 30px;margin-left: 20px;"/>
            </div>


			</div>

    	</form>
    
    
    <div id="delier">
        
    </div>
    
</div>