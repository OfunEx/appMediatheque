<script>
$(document).ready(function(){
   
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu.php"); ?>
    <?php include("vues/connexion.php"); ?>
    <br>
    <div class="titre_partie"><h1>Mots clés du support </h1></div>
    <div>
        <table class="tab_support">
        <div>
            <thead>
                <tr>
                    <th> Terme associé</th>
                </tr>
            </thead>
                <?php Support::getKeysSupport($_GET['id']); ?>

        </table>
        
    </div>
</div>

