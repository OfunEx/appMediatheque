<div id="zone_de_texte">
		
		<?php 

			if(!isset($_POST["submit"])){
				//si le formulaire n'a pas été envoyé : 
		 ?>
	

        <form action="?page0=inscription" method="post" class="elegant-aero">
		    <h1>Inscription
		        <span>Veuillez remplir tout les champs.</span>
		    </h1>
		    <label>
		        <span>Nom : </span>
		        <input type="text" name="nom" placeholder="Votre nom"  required>
		    </label>
		    <label>
		        <span>Prenom : </span>
		        <input type="text" name="prenom" placeholder="Vote prénom"  required>
		    </label>
		    <label>
		        <span>Date de naissance :</span>
		        <input  id="birthdatepicker" type="text" name="dateNaiss" required>
		    </label>
		    <label>
		        <span>Votre Email :</span>
		        <input  type="email" name="email" placeholder="Adresse email valide" required>
		    </label>
		    <label>
		        <span>Identifiant :</span>
		        <input  type="text" name="identifiant" placeholder="Votre identifiant" required>
		    </label>
		    <label>
		        <span>Mot de passe :</span>
		        <input type="password" name="password" required>
		    </label>
		     <label>
		        <span>Confirmer le mot de passe: </span> 
		        <input  type="password" name="confpassword" required>
		    </label>  


		     <label>
		        <span>&nbsp;</span> 
		        <input type="submit" class="button" name="submit" value="Valider" /> 
		    </label>    
		</form>

		<?php 

			}
			else{


				for ($i=0; $i < 3; $i++) { 
					$errors[$i] = false;
				}

				if($_POST["password"] !== $_POST["confpassword"])
					$errors[0] = true;
				if(User::emailExist($_POST["email"]))
					$errors[1] = true;
				if(User::idCExist($_POST["identifiant"]))
					$errors[2] = true;



				// var_dump($_POST["password"],$_POST["confpassword"]);
				// var_dump($errors);



				//on vérifie si il y a une erreur : 

				$anError = false;

				for ($i=0; $i < count($errors); $i++) { 
					if($errors[$i] == true) $anError = true;
				}

				if($anError == true){


		 ?>


        <form action="?page0=inscription" method="post" class="elegant-aero">
		    <h1>Inscription
		        <span>Veuillez remplir tout les champs.</span>
				<!-- Affichage des erreurs : -->
				<ul>
				
				<?php 

					if($errors[0] == true){
						echo "<span><li>Les mots de passe ne sont pas les mêmes</li></span>";
					}
					if($errors[1] == true){
						echo "<span><li>Cette adresse email existe déjà</li></span>";
					}
					if($errors[2] == true){
						echo "<span><li>Cette identifiant existe déjà</li></span>";
					}

				 ?>
				</ul>


		    </h1>
		    <label>
		        <span>Nom : </span>
		        <input type="text" name="nom" placeholder="Votre nom"  <?php echo  "value='" . $_POST["nom"] . "'";?> required>
		    </label>
		    <label>
		        <span>Prenom : </span>
		        <input type="text" name="prenom" placeholder="Vote prénom"  <?php echo  "value='" . $_POST["prenom"] . "'";?> required>
		    </label>
		    <label>
		        <span>Date de naissance :</span>
		        <input  id="birthdatepicker" type="text" name="dateNaiss" <?php echo  "value='" . $_POST["dateNaiss"] . "'";?> required>
		    </label>
		    <label>
		        <span>Votre Email :</span>
		        <input  type="email" name="email" placeholder="Adresse email valide" <?php echo  "value='" . $_POST["email"] . "'";?> required>
		    </label>
		    <label>
		        <span>Identifiant :</span>
		        <input  type="text" name="identifiant" placeholder="Votre identifiant" <?php echo  "value='" . $_POST["identifiant"] . "'";?> required>
		    </label>
		    <label>
		        <span>Mot de passe :</span>
		        <input type="password" name="password" <?php echo  "value='" . $_POST["password"]  . "'";?> required>
		    </label>
		     <label>
		        <span>Confirmer le mot de passe: </span> 
		        <input  type="password" name="confpassword"  required>
		    </label>  


		     <label>
		        <span>&nbsp;</span> 
		        <input type="submit" class="button" name="submit" value="Valider" > 
		    </label>    
		</form>

		

		<?php 
				}
				else{
					//si il n'y pas d'erreur on inscrit le nouvel utilisateur:
					User::addUser($_POST["prenom"],
									$_POST["nom"],
									$_POST["dateNaiss"],
									$_POST["email"],
									$_POST["identifiant"],
									SHA1($_POST["password"]),
									1);

		?>

        <form action="?page0=inscription" method="post" class="elegant-aero">
		    <h1>Inscription Réussie !</h1>
		</form>


		<?php
				}
			}
		 ?>


</div>



<script type="text/javascript">
	//
    $( "#birthdatepicker" ).datepicker({
        changeMonth : true,
        changeYear : true
    }).
    datepicker("option","showAnim","slideDown").
    datepicker("option","dateFormat","yy-mm-dd");

</script>