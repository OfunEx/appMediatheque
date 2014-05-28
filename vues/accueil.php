
<?php include 'vues/connexion.php'; ?>

<div id ="zone_de_texte">
<?php include("vues/menu/menu.php"); ?>
<br>
<div class="titre_partie"><h1>Bienvenue Visiteur</h1></div>


	<form method ="get" action="" id="search">
	<input name  ="q" type="text" size="40" placeholder="Rechercher..." />
	</form>


	<?php 

		if(isset($_GET["q"])){

			$query = strtolower($_GET["q"]);

			$res = Key::findKey($query);

			if(!is_null($res)){

				Link::findSupportsByKey($res);

			}
			else{

				echo "<p>Ce mot clé n'existe pas...</p>";
				$sugKeys = Key::findSuggestedKey($query);
				if ( strlen($query) >= 2 && count($sugKeys) > 0) {
					echo "<p>peut être voulez-vous dire : ";
					
					foreach ($sugKeys as $key) {
						echo "<a href=\"http://localhost/appMediatheque/?q=".$key."\">".$key."</a><br/>";
					}

					echo "</p>";



				}
				
			}

		}



	?>

</div>
