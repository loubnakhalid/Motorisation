<?php include('./inc/haut.inc.php'); ?>
<?php
if(isset($_GET['action'])&&$_GET['action']=='connexion'){
	$EmailMb= isset($_COOKIE['login']['EmailMb']) ? $_COOKIE['login']['EmailMb'] : "";
	echo "
	<section id='connexion'>
  		<div class='formCnx'>
  			<h2 class='titleIden'>Identifiez-vous </h2>
    		<form name='connexion' action='controller.php' method='post' onsubmit='return ValidationConnexion()'>
        		<div class='input-Email'> 
             		<input type='email' name='EmailMb' value='$EmailMb' placeholder='Email' id='EmCnx' class='inpCnx'>
					<p class='ErMsg1'>*Ce champ est obligatoire.</p>
	";
					if(isset($_GET['erreurEmailMb'])){
						echo "<script>document.getElementById(\"EmCnx\").style.borderColor = 'red';</script>";
						echo "<p class='ErMsg1' style='display:block'>*$_GET[erreurEmailMb]</p>";
					}
	echo"
       			</div>
       			<div class='input-Cnx'>
             		<input type='password' name='MDPS' placeholder='Mot de passe'  id='MdpCnx' class='inpCnx'>
					<p class='ErMsg2'>*Ce champ est obligatoire.</p>
	";
					if(isset($_GET['erreurMDPS'])){
						echo "<script>document.getElementById(\"MdpCnx\").style.borderColor = 'red';document.getElementById(\"EmCnx\").style.borderColor = 'green';</script>";
						echo "<p class='ErMsg1' style='display:block'>*$_GET[erreurMDPS]</p>";
					}
	echo"
       			</div>
       			<div class='btn-Cnx'>
             		<input type='submit' name='con' value='Se connecter' id='FRmbtnCnx' class='btnGn' >
       			</div>
       			<div class='MtdpsOubl'>
           			<a href='identification.php?action=mdpsOubl' class='TextOubl'>Mot de passe oublié ?</a>
        		</div>
    		</form>
  		</div>
  		<div class='CreerCmpt'>
        	<h2 class='TitleCmpt'>Créez votre compte</h2>
        	<h4 class='descCmpt'>Créer un compte a de nombreux avantages : commander plus rapidement, enregistrer plusieurs adresses, suivre vos commandes et plus encore.</h4>
        	<div class='BtnCmpt'>
           		<input type='button' value='Créer votre Compte' class='Cnx' onclick='document.location.href=\"identification.php?action=inscription\"'>
        	</div>
  		</div>
	</section>
	";
}
if(isset($_GET['action'])&&$_GET['action']=='inscription'){
	$NomMb= isset($_COOKIE['login']['NomMb']) ? $_COOKIE['login']['NomMb'] : "";
	$PrénomMb= isset($_COOKIE['login']['PrénomMb']) ? $_COOKIE['login']['PrénomMb'] : "";
	$NumTélé= isset($_COOKIE['login']['NumTélé']) ? $_COOKIE['login']['NumTélé'] : "";
	$Ville= isset($_COOKIE['login']['Ville']) ? $_COOKIE['login']['Ville'] : "";
	$CP= isset($_COOKIE['login']['CP']) ? $_COOKIE['login']['CP'] : "";
	$DateNc= isset($_COOKIE['login']['DateNc']) ? $_COOKIE['login']['DateNc'] : "";
	$AdresseMb= isset($_COOKIE['login']['AdresseMb']) ? $_COOKIE['login']['AdresseMb'] : "";
	$EmailMb= isset($_COOKIE['login']['EmailMb']) ? $_COOKIE['login']['EmailMb'] : "";
	echo "
	<section id='inscrire'>
    <div class='FormInscr'>
            <h2 class='TitleInscr'>Créer un nouveau compte client</h2>
            <form name='inscription' method='post' action='controller.php' class='s'inscrire' onsubmit='return ValidationCreation()'>
                    <div>
                        <input type='text' name='NomMb' placeholder='Votre nom' class='inputInsc' value='$NomMb'  id='InpNom'>
                        <input type='text' name='PrénomMb' placeholder='Votre prenom'  class='inputInsc' value='$PrénomMb' id='InpPrénom'><br>
						<span class='ErNomOb'>*Ce champs est obligatoire .</span>
                        <span class='ErPrOb'>*Ce champs est obligatoire .</span>
                    </div>
                    <div>
                        <input type='tele' name='NumTélé' placeholder='Votre numéro de téléphone '  class='inputInsc' value='$NumTélé' id='InpTélé'>
                        <input type='date' name='DateNc' placeholder='Votre date de naissance'  class='inputInsc' value='$DateNc' id='InpDT'><br>
						<span class='ErTelOb'>*Ce champs est obligatoire .</span>
                        <span class='ErDtOb'>*Ce champs est obligatoire.</span>
                    </div>
                    <div>
                        <input type='text' name='Ville' placeholder='Votre Ville '  class='inputInsc' value='$Ville' id='InpVille'>
                        <input type='num' name='CP' placeholder='Code Postal'  class='inputInsc' value='$CP' id='InpCP'><br>
						<span class='ErVlOb'>*Ce champs est obligatoire .</span>
                        <span class='ErCpOb'>*Ce champs est obligatoire .</span>
                    </div>
                    <div>
                        <input type='text' name='AdresseMb' placeholder='Votre adresse'  class='inputInsc' value='$AdresseMb' id='InpAdrs'>
                        <input type='email' name='EmailMb' placeholder='Email'  class='inputInsc' value='$EmailMb' id='InpEm'><br>
		";
						if(isset($_GET['erreurEmailMb'])){
							echo "<script>document.getElementById(\"InpEm\").style.borderColor = 'red';
							document.getElementById(\"InpAdrs\").style.borderColor = 'green';
							document.getElementById(\"InpNom\").style.borderColor = 'green';
							document.getElementById(\"InpPrénom\").style.borderColor = 'green';
							document.getElementById(\"InpTélé\").style.borderColor = 'green';
							document.getElementById(\"InpDT\").style.borderColor = 'green';
							document.getElementById(\"InpVille\").style.borderColor = 'green';
							document.getElementById(\"InpCP\").style.borderColor = 'green';
							</script>";
							echo "<span class='ErEmlOb' style='visibility:visible;left:324px;'>*$_GET[erreurEmailMb]</span>";
						}
		
		echo"
						<span class='ErAdsOb'>*Ce champs est obligatoire .</span>
                        <span class='ErEmlOb'>*Ce champs est obligatoire .</span>
                    </div>
                    <div>
                        <input type='password' name='MDPS' placeholder='mot de passe'  class='inputInsc' id='InpMps'>
                        <input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe'  class='inputInsc'  id='InpConfMps'><br>
						<span class='ErPsOb'>*Ce champs est obligatoire .</span>
                        <span class='ErCnfPsOb'>*Ce champs est obligatoire .</span>
                    </div>
                    <div class='BtnInscription'>
                        <input type='submit' value=\"S'inscrire\" name='inscr' class='btnInsc'>
                    </div>
            </form>
    </div>
	</section>
	";
}
if(isset($_GET['action'])&&$_GET['action']=='mdpsOubl'){
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo"
    <section id='MtdpsOubl'>
      	<div class='FormOubl'>
        	<h2 class='TitleMtdpsOub'>MOT DE PASSE OUBLIÉ ?</h2>
        	<h4 class='Prg'>Veuillez entrer votre adresse email ci-dessous pour recevoir le code de réinitialisation du mot de passe.</h4>
        	<form name='MtdpsOublié' action='controller.php' method='post' onsubmit='return  ValiderMdpsEmail();'>
        		<div class='InputMtdpsOUb'>
                	<input type='email' name='EmailMb' placeholder='Votre Email'  id='InputMdpsOub' class='inputEmail'><br>
					<span class='ErMdpsOubEmail'>*Ce champs est obligatoire .</span>
            	</div>
            	<div class='BtnRnst'>
                	<input type='submit' name='mdpsOubl' value='Réinitialiser mon mot de passe' class='btnMtdps'>
                	<input type='button' value='Retour' class='btnRetour'>
            	</div>
          	</form>
      	</div>
	</section>
	";
}
if(isset($_GET['action'])&&$_GET['action']=='verifEmail'){
	if(! isset($_SESSION['EmailMb'])){
        echo "<script>document.location.href='identification.php?action=mdpsOubl'</script>";
    }
	else{
		if(isset($_GET['erreur'])){
			echo $_GET['erreur'];
		}
		echo"
		<section id='CodeSec'>
			<div class='FormCode'>
				<h2 class='TitleCodeSec'>Entrez votre code de sécurité</h2>
				<h4 class='PrgCode'>Merci de vérifier dans vos e-mails que vous avez reçu un message avec votre code. Celui-ci est composé de 8 chiffres.</h4>
				<form name='Code' action='controller.php' method='post' onsubmit='return ValidationCodeSéc()'>
					<div class='InputCode'>
						<input type='text' name='verifCode' placeholder='Votre Code' id='InputCS' class='inputCodeSec'><br>
						<span class='ErCodeSéc'>*Ce champs est obligatoire .</span>
					</div>
					<div class='BtnCode'>
						<input type='submit' name='verifEmail' value='Continuer' class='btnCode'>
						<input type='button' value='Retour' class='btnRetour'>
					</div>
				</form>
			</div>
		</section>
		";
	}
}
if(isset($_GET['action'])&&$_GET['action']=='nvPass'){
	if(! isset($_SESSION['EmailMb']) || ! isset($_SESSION['code'])){
        echo "<script>document.location.href='identification.php?action=mdpsOubl'</script>";
    }
	else{
		if(isset($_GET['erreur'])){
			echo $_GET['erreur'];
		}
		echo"
		<section id='ReinMdps'>
			  <div class='FormRein'>
				<h2 class='TitleReinc'>Choisissez votre mot de passe</h2>
				 <form name='Reini' action='controller.php' method='post' onsubmit='return ValiderReinMdps()'>
					<div class='InputRein'>
						<input type='password' name='MDPS' placeholder='Entrez votre nouveau mot de passe' id='InputRéinMdps' class='inputReinMdps'><br>
						<span class='ErReinMdps'>*Ce champs est obligatoire .</span><br>
						<input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe ' id='InputRéinConfMdps'  class='ConfRein'><br>
						<span class='ErReinConfMdps'>*Ce champs est obligatoire .</span><br>
					</div>
					<div class='BtnRein'>
						<input type='submit' name='nvPass' value='Soumettre' class='btnReinMdps'>
						<input type='reset' value='Annuler' class='btnAnnul'>
					</div>
				  </form>
			  </div>
		</section>
		";
	}
}
?>
<?php
if(isset($_GET['successInscr'])){
	echo "<script>swal({
		title: '$_GET[success]',
		text: '',
		icon: 'success',
		button: 'Ok',
	})
	.then((value) => {
		document.location.href = 'identification.php?action=connexion';
	});</script>";
}
?>
<?php require_once("./inc/bas.inc.html"); ?>