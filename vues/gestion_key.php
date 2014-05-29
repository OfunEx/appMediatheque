<script>
$(function() {
    $("#accordionAjout").accordion({
        heightStyle: "content"
    });
    
    $("#submitSupprimer").button();
    
    $("#tabs").tabs();
    $("#dateP").datepicker();
    $("#submitAjouter").button();
    
    $('.tab_keys').dataTable({
        "bJQueryUI": true,
        bAutoWidth: true
    });
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php");?>
    <br>
    <div class="titre_partie"><h1>Gestion des mots clés</h1></div>
    
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Consulter</a></li>
            <li><a href="#tabs-2">Ajouter</a></li>
            <li><a href="#tabs-3">Modifier</a></li>
            <li><a href="#tabs-4">Supprimer</a></li>
        </ul>
        <div id="tabs-1">

        </div>
        <div id="tabs-2">
            <p>Ajouter</p>
            <div id="accordionAjout">
                <h3>Ajouter</h3>
                <div>
                    <form method="POST" action="index.php?page2=gestion_key">
                        <div class='form_ajouter_key'>
                            
                            <div style="float:left;margin-right:20px;margin-left:20px;">Terme :&nbsp;<input id="terme" name="terme" type=text style="text-align: left;"/></div>

                            <div style="float:left;">Commentaire :&nbsp;</div><div style="float:left;"><textarea id="com" name="com" type=text rows=2 COLS=20 maxWidth="200" style="text-align: left;width:500px;height:200px;"></textarea></div>

                            <div style="float:left;"><input id='submitAjouter' type="submit" name="AjouterKey" value="Valider" style="margin-bottom: 30px;margin-left: 20px;"/></div>
                        </div>
                    </form>
                </div>
                <h3>Ajouter depuis un fichier CSV</h3>
                <div>
                    
                </div>
            </div>
        </div>
        <div id="tabs-3">
            <p>Modifier</p>
            
            <table class="tab_keys">
                <thead>
                        <tr>
                            <th> Termes</th>
                            <th> Commentaires</th>
                        </tr>
                </thead>
                <?php Key::listAlterKeysModif() ?>
            </table>
        </div>
        <div id="tabs-4">
            <p>Supprimer</p>
            
            <form method="POST" action="">
                <p>Pour supprimer la sélection : <input id='submitSupprimer' type="submit" name="ModifierKey" value="Cliquez ici" style="margin-bottom: 30px;margin-left: 20px;"/></p>
                <table class="tab_keys">
                    <thead>
                            <tr>
                                <th> Termes</th>
                                <th> Commentaires</th>
                            </tr>
                    </thead>
                    <?php Key::listAlterKeysSupp() ?>
                </table>
            </form>
        </div>
    </div>
</div>

