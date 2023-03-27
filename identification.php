<?php include('./inc/haut.inc.php'); ?>
<?php
if(isset($_GET['action'])&&$_GET['action']=='connexion'){
	if(isset($_GET['panVide'])){
		echo "Veuillez vous connecter pour remplir votre panier ! ";
	}
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo "
	<section id='connexion'>
  		<div class='formCnx'>
  			<h2 class='titleIden'>Identifiez-vous </h2>
    		<form name='connexion' action='controller.php' method='post'>
        		<div class='input-Email'> 
             		<input type='email' name='EmailMb' placeholder='Email' class='inpCnx'>
       			</div>
       			<div class='input-Cnx'>
             		<input type='password' name='MDPS' placeholder='Mot de passe' class='inpCnx'>
       			</div>
       			<div class='btn-Cnx'>
             		<input type='submit' name='con' value='Se connecter' class='btnGn'>
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
	$MDPS= isset($_COOKIE['login']['MDPS']) ? $_COOKIE['login']['MDPS'] : "";
	$confMDPS= isset($_COOKIE['login']['confMDPS']) ? $_COOKIE['login']['confMDPS'] : "";
	$EmailMb= isset($_COOKIE['login']['EmailMb']) ? $_COOKIE['login']['EmailMb'] : "";
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo "
	<section id='inscrire'>
    <div class='FormInscr'>
            <h2 class='TitleInscr'>Créer un nouveau compte client</h2>
            <form name='inscription' method='post' action='controller.php' class='s'inscrire'>
                    <div>
                        <input type='text' name='NomMb' placeholder='Votre nom' class='inputInsc'>
                        <input type='text' name='PrénomMb' placeholder='Votre prenom'  class='inputInsc'>
                    </div>
                    <div>
                        <input type='tele' name='NumTélé' placeholder='Votre numéro de téléphone '  class='inputInsc'>
                        <input type='date' name='DateNc' placeholder='Votre date de naissance'  class='inputInsc'>
                    </div>
                    <div>
                        <input type='text' name='Ville' placeholder='Votre Ville '  class='inputInsc'>
                        <input type='num' name='CP' placeholder='Code Postal'  class='inputInsc' >
                    </div>
                    <div>
                        <input type='text' name='AdresseMb' placeholder='Votre adresse'  class='inputInsc'>
                        <input type='email' name='EmailMb' placeholder='Email'  class='inputInsc'>
                    </div>
                    <div>
                        <input type='password' name='MDPS' placeholder='mot de passe'  class='inputInsc'>
                        <input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe'  class='inputInsc'>
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
        	<form name='MtdpsOublié' action='controller.php' method='post'>
        		<div class='InputMtdpsOUb'>
                	<input type='email' name='EmailMb' placeholder='Votre Email'  class='inputEmail'>
            	</div>
            	<div class='BtnRnst'>
                	<input type='submit' name='mdpsOubl' value='Réinitialiser mon mot de passe' class='btnMtdps'>
                	<input type='submit' value='Retour' class='btnRetour'>
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
				<form name='Code' action='controller.php' method='post'>
					<div class='InputCode'>
						<input type='text' name='verifCode' placeholder='Votre Code'  class='inputCodeSec'>
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
				 <form name='Reini' action='controller.php' method='post'>
					<div class='InputRein'>
						<input type='password' name='MDPS' placeholder='Entrez votre nouveau mot de passe'  class='inputReinMdps'><br>
						<input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe '  class='ConfRein'>
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
<?php require_once("./inc/bas.inc.html"); ?>