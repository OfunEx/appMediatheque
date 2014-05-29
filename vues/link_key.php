<script>

$(function() {
    $('.tab_link_support').dataTable({
        "bJQueryUI": true,
        'iDisplayLength': 5,
        bAutoWidth: true
    });
    
    $('.tab_link_key').dataTable({
        "bJQueryUI": true,
        'iDisplayLength': 3,
        bAutoWidth: true
    });
    
    $("#submitLink").button();
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php");?>
    <br>
    <div class="titre_partie"><h1>Gestion des liens entre mots clés et supports</h1></div>
    
    <div id="lier">
        <form method="POST" action="index.php?page2=link_key&partie=1">
            <div style="width: 500px;display: inline-block;margin-right: 20px;">
                <table class="tab_link_support">
                    <thead>
                            <tr>
                                <th> Supports</th>
                                <th> Auteurs</th>
                                <th> Date</th>
                                <th> Information</th>
                            </tr>
                    </thead>
                    <?php Link::listLinkSupports() ?>
                </table>
            </div>
            <div style="width: 500px;display: inline-block;margin-right: 20px;">
                <table class="tab_link_key">
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
                <input id='submitLink' type="submit" name="submitLink" value="Valider" style="margin-bottom: 30px;margin-left: 20px;"/>
            </div>
        </form>
    </div>
    
    <div id="delier">
        
    </div>
    
</div>