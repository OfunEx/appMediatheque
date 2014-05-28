<script>
$(function() {
    
    $( "#accordionConnex" ).accordion({
        heightStyle: "fill",
        collapsible: true,
        active: 2,
        icons: {
            header: "ui-icon-circle-plus",
            activeHeader: "ui-icon-circle-minus"
        }
    });
   
});

</script>


<div class="connexFloat">
    <div id="accordionConnex">
        <h3>Connexion</h3>
        <div>
            <form method="POST" action="index.php?page0=connexion">
                <div>
                    <div style="text-align: left;margin-left: 10px;">
                        Identifiant :<br><input id="login" name="login" type=text required style="margin-bottom: 10px;text-align: left;"/><br>

                        Mot de passe :<br><input id="pass" name="pass" type=password required style="margin-bottom: 10px;text-align: left;"/><br>

                        <input type="submit" name="submit" value="Valider" style="margin-bottom: 10px;margin-left: 10px;">
                    </div>
                </div>
            </form>

            <p>Pas encore inscrit ? <a href="index.php?page0=inscription">inscrivez-vous ici !</a></p>
        </div>
        
    </div>
    



</div>



