<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php"); ?>
    <br>
    <div class="titre_partie"><h1>Gestion des supports</h1></div>
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
                    <form method="POST" action="index.php?page2=gestion_support">
                        <div class='form_ajouter'>
                            <div>Titre :<br><input id="titreS" name="titreS" type=text style="text-align: left;"/></div>
                            <div>Type du support :&nbsp;<input id="typeS" name="typeS" type=text style="text-align: left;"/></div>
                            <div>Type du format :<br>
                                <select id="typeF" name="typeF" type=text style="text-align: left;">
                                    <option value="Audio">Audio</option>
                                    <option value="Vidéo">Vidéo</option>
                                </select>
                            </div>
                            <div>Type du contenu :&nbsp;<input id="typeC" name="typeC" type=text style="text-align: left;"/></div>
                            <div>Date de publication :&nbsp;<input id="dateP" name="dateP" type=text style="text-align: left;"/></div><br>
                            <div>Auteur du support :&nbsp;<input id="auteurS" name="auteurS" type=text style="text-align: left;"/></div>
                            <div>Type de l'auteur :<br>
                                <select name='typeA'>
                                    <option value='Compositeur'>Compositeur</option>
                                    <option value='Réalisateur'>Réalisateur</option>
                                </select>
                            </div>
                            <div>Description du support :&nbsp;<textarea id="descri" name="descri" type=text rows=2 COLS=20 maxWidth="200" style="text-align: left;"></textarea></div><br>
                            <div>Nombre d'exemplaire :&nbsp;<input id="nbEx" name="nbEx" type=text style="text-align: left;"/></div>
                            <div>Temps d'emprunt maximum :&nbsp;<input id="tpsEmprunt" name="tpsEmprunt" type=text style="text-align: left;"/>jrs</div>

                        <input id='submitAjouter' type="submit" name="AjouterSupport" value="Valider" style="margin-bottom: 30px;margin-left: 20px;"/>
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
            
            <table class="tab_support">
                <thead>
                        <tr>
                            <th> Titre</th>
                            <th> Type support</th>
                            <th> Type format</th>
                            <th> Type contenu</th>
                            <th> Date de publication</th>
                            <th> Description</th>
                            <th> Créateur</th>
                            <th> Type créateur</th>
                            <th> Nombre examplaire</th>
                            <th> Examplaire disponible</th>
                            <th> Nombre consultation</th>
                            <th> Temps d'emprunt maximum</th>
                        </tr>
                </thead>
                <tbody>
                    <?php Support::listAlterSupModif()?>
                </tbody>
                
            </table>
            
            
        </div>
        <div id="tabs-4">
            <p>Supprimer</p>
            <form method="POST" action="index.php?page2=gestion_support">
                <p>Pour supprimer la sélection : <input id='submitSupprimer' type="submit" name="SupprimerSupports" value="Cliquez ici" style="margin-bottom: 30px;margin-left: 20px;"/></p>
                <table class="tab_support">
                    <thead>
                            <tr>
                                <th> Titre</th>
                                <th> Type support</th>
                                <th> Type format</th>
                                <th> Type contenu</th>
                                <th> Date de publication</th>
                                <th> Description</th>
                                <th> Créateur</th>
                                <th> Type créateur</th>
                                <th> Nombre examplaire</th>
                                <th> Examplaire disponible</th>
                                <th> Nombre consultation</th>
                                <th> Temps d'emprunt maximum</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php Support::listAlterSupSupp() ?>
                    </tbody>
                    
                </table>
            </form>
        </div>
    </div>
</div>

<script>
$(function() {
    $("#accordionAjout").accordion({
        heightStyle: "content"
    });
    
    $("#tabs").tabs();
    $("#dateP").datepicker({
        changeMonth : true,
        changeYear : true
    }).
    datepicker("option","showAnim","slideDown").
    datepicker("option","dateFormat","yy-mm-dd");

    $("#submitAjouter").button();
    
    $('.tab_support').dataTable({
        "bJQueryUI": true,
        'iDisplayLength': 5,
        bAutoWidth: true
    });


});
</script>
