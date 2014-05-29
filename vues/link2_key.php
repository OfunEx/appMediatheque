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
    <div class="titre_partie"><h1>Suppression des liens entre mots clés et supports</h1></div>

			<table class="tab_link">

	                <thead>
	                        <tr>
	                            <th> Titre</th>
	                            <th> Type support</th>
	                            <th> Type format</th>
	                            <th> Type contenu</th>
	                            <th> Date de publication</th>
	                            <th> Description</th>
	                            <th> Auteur</th>
	                            <th> Profession auteur</th>
	                            <th> nb.E</th>
	                            <th> Tps emprunt</th>
	                        </tr>
	                </thead>

	                <tbody>

	                    <?php Link::listAlterSupModif(); ?>

	                </tbody>
			</table>
    
    
    <div id="delier">
        
    </div>
    
</div>