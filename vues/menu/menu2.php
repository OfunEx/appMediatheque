<script>
$(document).ready(function(){
   $( ".btn" ).button();
});
</script>

<div id="menu">
	<ul>
		<li><a class="btn" href="index.php">Se déconnecter</a></li>

		<li><a class="btn" href="index.php?page2=gestion_support" >Gestion des supports</a></li>

		<li><a class="btn" href="index.php?page2=gestion_key" >Gestion des mots clés</a></li>
                
                <li><a class="btn">Gestion des liens</a>
                    <ul>
                        <li><a class="btn" href="index.php?page2=link_key&partie=1" >Ajout de liens</a></li>
                        <li><a class="btn" href="index.php?page2=link_key&partie=2" >Supprimer des liens</a></li>
                    </ul>
                </li>
	</ul>
</div>