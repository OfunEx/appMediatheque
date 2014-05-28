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
                        ID-User :<br><input id="login" name="login" type=text required style="margin-bottom: 10px;text-align: left;"/><br>

                        Mot de passe :<br><input id="pass" name="pass" type=password required style="margin-bottom: 10px;text-align: left;"/><br>

                        <input type="submit" name="submit" value="Valider" style="margin-bottom: 10px;margin-left: 10px;">
                    </div>
                </div>
            </form>
        </div>

        <h3>Inscription</h3>
        <div>
            <form action="index.php?page0=inscription" method="POST">
                <div style=div style="text-align: left;margin-left: 10px;">
                    Nom : <input type="text" name="nom">
                    Prenom : <input type="text" name="prenom">
                    Date de naissance <input type="text" name="dateNaiss">
                    Email : <input type="text" name="mail">
                    ID-User : <input type="text" name="idConex">
                    Mot de passe : <input type="password" name="password">
                    Confirmer : <input type="password" name ="passwordConfirm">
                </div>
            </form>
        </div>
        
    </div>
    



</div>



