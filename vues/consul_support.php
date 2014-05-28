
<div id="zone_de_texte">
    <?php include("vues/menu/menu.php"); ?>
    <?php include("vues/connexion.php") ?>
    <br>
    <h1>Partie affichage support</h1>
    <?php
    Support::listAllSupports();
    ?>
</div>

