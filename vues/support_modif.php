
<div id="zone_de_texte">
    <?php include("vues/menu/menu2.php"); ?>
    <br>
    <div class="titre_partie"><h1>Modifier cette entrée</h1></div>
    <div>
    <form method="POST" action="index.php?page2=gestion_support" style="height:300px;">
            <div style="float:left;margin-right:20px;margin-left:20px;">
                <?php Support::recup_support_id($_GET["id"]); ?>
            </div>

    </form>

    
    </div>
</div>

<script>    

$("#dateP").datepicker({
    changeMonth : true,
    changeYear : true
}).
datepicker("option","showAnim","slideDown").
datepicker("option","dateFormat","yy-mm-dd");


</script>




