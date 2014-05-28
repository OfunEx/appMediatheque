<div id="zone_de_texte">
		
		<?php 
			$errors = null;

			if(!isset($_POST["submit"]) && $errors === null){
				//si le formulaire n'a pas été envoyé : 
		 ?>
	

        <form action="?page0=inscription" method="post" class="elegant-aero">
		    <h1>Inscription
		        <span>Veuillez remplir tout les champs.</span>
		    </h1>
		    <label>
		        <span>Nom : </span>
		        <input type="text" name="nom" placeholder="Votre nom" />
		    </label>
		    <label>
		        <span>Prenom : </span>
		        <input type="text" name="prenom" placeholder="Vote prénom" />
		    </label>
		    <label>
		        <span>Date de naissance :</span>
		        <input  id="birthdatepicker" type="text" name="dateNaiss">
		    </label>
		    <label>
		        <span>Votre Email :</span>
		        <input  type="email" name="email" placeholder="Adresse email valide">
		    </label>
		    <label>
		        <span>Identifiant :</span>
		        <input  type="text" name="identifiant" placeholder="Votre identifiant">
		    </label>
		    <label>
		        <span>Mot de passe :</span>
		        <input type="password" name="password">
		    </label>
		     <label>
		        <span>Confirmer le mot de passe: </span> 
		        <input  type="password" name="confpassword">
		    </label>  


		     <label>
		        <span>&nbsp;</span> 
		        <input type="submit" class="button" name="submit" value="Valider" /> 
		    </label>    
		</form>

		<?php 

			}
			else{

				$_POST["nom"];
				$_POST["prenom"];
				$_POST["dateNaiss"];
				$_POST["email"];
				$_POST["identifiant"];
				$_POST["password"];
				$_POST["confpassword"];

				if($_POST["password"] !== $_POST["confpassword"])
					$errors[0] = true;
				if(true){}









		 ?>
		

		<?php 

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