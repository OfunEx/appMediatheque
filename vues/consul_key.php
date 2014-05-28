<script>
$(document).ready(function(){
   
    $(".com").hide();
    $( "#tabs_index" ).tabs();
    
    $( ".btn_key" ).button({
        text: false,
        icons: {
            primary: "ui-icon-carat-1-s"
        }
    })
    .click(function() {
        var options;
        if ( $( this ).text() === "fermer" ) {
            options = {
                label: "ouvert",
                icons: {
                    primary: "ui-icon-carat-1-n"
                }
            };
        } else {
            options = {
                label: "fermer",
                icons: {
                    primary: "ui-icon-carat-1-s"
                }
            };
        }
        $( this ).button( "option", options );
        if($( this ).text() === "ouvert"){
            $("#com"+$(this).attr('value')).show("slideDown");
        }
        else{
            $("#com"+$(this).attr('value')).hide("slideUp");
        }
    });
});
</script>
<div id="zone_de_texte">
    <?php include("vues/menu/menu.php"); ?>
    <?php include("vues/connexion.php"); ?>
    <br>
    <h1>Partie affichage des mot clés</h1>
    <div id="tabs_index">
        <?php
        Key::createListKeys();
        Key::listAllKeys();
        ?>
    </div>
</div>

