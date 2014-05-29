<script>
$(document).ready(function(){
   
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu.php"); ?>
    <?php include("vues/connexion.php"); ?>
    <br>
    <div class="titre_partie"><h1>Mots clés</h1></div>
    <div>
        <?php
        Link::findSupportsByKey($_GET['terme']);
        ?>
    </div>
</div>

