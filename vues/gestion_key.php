<script>
$(function() {
    $("#accordionAjout").accordion({
        heightStyle: "content"
    });
    
    $("#tabs").tabs();
    $("#dateP").datepicker();
    $("#submitAjouter").button();
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php");?>
    <br>
    <h1>Ajouter un mot clé</h1>
    
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
                            
                            <div>Terme :&nbsp;<input id="terme" name="terme" type=text style="text-align: left;"/></div>
                            
                            <div>Commentaire :&nbsp;<textarea id="com" name="com" type=text rows=2 COLS=20 maxWidth="200" style="text-align: left;"></textarea></div>
                            
                        <input id='submitAjouter' type="submit" name="AjouterKey" value="Valider" style="margin-bottom: 30px;margin-left: 20px;"/>
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
            <form method="POST" action="">

            </form>
        </div>
        <div id="tabs-4">
            <p>Supprimer</p>
            <form method="POST" action="">

            </form>
        </div>
    </div>
</div>

