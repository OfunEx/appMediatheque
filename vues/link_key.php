<script>

$(function() {
    $('.tab_link').dataTable({
        "bJQueryUI": true,
        bLengthChange: false,
        bAutoWidth: true,
        "aaSorting": [[ 1, "asc" ]]
    });
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php");?>
    <br>
    <div class="titre_partie"><h1>Gestion des liens entre mots clés et supports</h1></div>
    
    <div id="lier">
        <form method="POST" action="index.php?link_key">
            <div style="width: 600px;display: inline-block;float: left;margin-right: 20px;">
                <table class="tab_link">
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
            <div style="width: 600px;display: inline-block;float: left;">
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
        </form>
    </div>
    
    <div id="delier">
        
    </div>
    
</div>