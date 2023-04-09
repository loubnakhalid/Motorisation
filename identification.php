<?php 
include('./inc/haut.inc.php');
?>
<?php
//Formulaire de connexion-----------------------------------------------------------------------//
if(isset($_GET['action'])&&$_GET['action']=='connexion'){
	if(isset($_SESSION['membre'])){
		echo "<script>document.location.href='index.php'</script>";
	}
	$EmailMb= isset($_COOKIE['login']['EmailMb']) ? $_COOKIE['login']['EmailMb'] : "";
	echo "
	<section id='connexion'>
  		<div class='formCnx'>
  			<h2 class='titleIden'>Identifiez-vous</h2>
    		<form name='connexion' action='controller.php' method='post' onsubmit='return VérifCnx()'>
			<div class='input-Email'> 
			<input type='text' name='EmailMb' value='$EmailMb' placeholder='Email' id='EmCnx' class='inpCnx'>
		   <p class='ErMsg1'></p>
		  </div>
		  <div class='input-Cnx'>
			<input type='password' name='MDPS' placeholder='Mot de passe'  id='MdpCnx' class='inpCnx'>
		   <p class='ErMsg2'></p>
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
//Formulaire d'inscription---------------------------------------------------------------------//
if(isset($_GET['action'])&&$_GET['action']=='inscription'){
	if(isset($_SESSION['membre'])){
		echo "<script>document.location.href='index.php'</script>";
	}
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
			<form name='inscription' method='post' action='controller.php' class='s'inscrire' onsubmit='return VérifInscription()'>
			<div class='InscNmPr'>
			<div>
				<input type='text' name='NomMb' placeholder='Votre nom' class='inputInsc' value='$NomMb'  id='InpNom'><br>
				<span class='ErNomOb'></span>
			</div>
			<div>
				<input type='text' name='PrénomMb' placeholder='Votre prenom'  class='inputInsc' value='$PrénomMb' id='InpPrénom'><br>
				<span class='ErPrOb'></span>
			</div>
			</div>
			<div class='InscTelDT'>
			<div>
				<input type='tele' name='NumTélé' placeholder='Votre numéro de téléphone '  class='inputInsc' value='$NumTélé' id='InpTélé'><br>
				<span class='ErTelOb'></span>
			</div>
			<div>
				<input type='date' name='DateNc' placeholder='Votre date de naissance'  class='inputInsc' value='$DateNc' id='InpDT'><br>
				<span class='ErDtOb'></span>
			</div>
			</div>
			<div class='InscVlCP'>
			<div>
				<input type='text' name='Ville' placeholder='Votre Ville '  class='inputInsc' value='$Ville' id='InpVille'><br>
				<span class='ErVlOb'></span>
			</div>
			<div>
				<input type='num' name='CP' placeholder='Code Postal'  class='inputInsc' value='$CP' id='InpCP'><br>
				<span class='ErCpOb'></span>
			</div>
			</div>
			<div class='InscAdrsEl'>
			<div>
				<input type='text' name='AdresseMb' placeholder='Votre adresse'  class='inputInsc' value='$AdresseMb' id='InpAdrs'><br>
				<span class='ErAdsOb'></span>
			</div>
			<div>
				<input type='text' name='EmailMb' placeholder='Email'  class='inputInsc' value='$EmailMb' id='InpEm'><br>
				<span class='ErEmlOb'></span>
			</div>
			</div>
			<div class='InscPsCnfPs'>
			<div>
				<input type='password' name='MDPS' placeholder='Mot de passe'  class='inputInsc' id='InpMps'><br>
				<span class='ErPsOb'></span>
			</div>
			<div>
				<input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe'  class='inputInsc'  id='InpConfMps'><br>
				<span class='ErCnfPsOb'></span>
			</div>
			</div>
			<div class='BtnInscription'>
			<input type='submit' value=\"S'inscrire\" name='inscr' class='btnInsc'>
			<input type='reset' value='Annuler' class='btnInsc' style='background-color: #ff9200;'>
		     </div>
			</form>
		</div>
	</section>
	";}

//Formulaire mot de passe oublié--------------------------------------------------------------//
if(isset($_GET['action'])&&$_GET['action']=='mdpsOubl'){
	if(isset($_SESSION['membre'])){
		echo "<script>document.location.href='index.php'</script>";
	}
	echo"
    <section id='MtdpsOubl'>
      	<div class='FormOubl'>
        	<h2 class='TitleMtdpsOub'>MOT DE PASSE OUBLIÉ ?</h2>
        	<h4 class='Prg'>Veuillez entrer votre adresse email ci-dessous pour recevoir le code de réinitialisation du mot de passe.</h4>
        	<form name='MtdpsOublié' action='controller.php' method='post' onsubmit='return VérifMdpsOubl()'>
        		<div class='InputMtdpsOUb'>
                	<input type='text' name='EmailMb' placeholder='Votre Email'  id='InputMdpsOub' class='inputEmail'><br>
					<span class='ErMdpsOubEmail'></span>
            	</div>
            	<div class='BtnRnst'>
                	<input type='submit' name='mdpsOubl' value='Réinitialiser mon mot de passe' class='btnMtdps'>
                	<input type='button' value='Retour' class='btnRetour1' onclick='history.back()'>
            	</div>
          	</form>
      	</div>
	</section>
	";
}
//Formulaire du code d esécurité--------------------------------------------------------------//
if(isset($_GET['action'])&&$_GET['action']=='verifCode'){
	if(isset($_SESSION['membre'])){
		echo "<script>document.location.href='index.php'</script>";
	}
	elseif(! isset($_SESSION['EmailMb']) || ! isset($_SESSION['code'])){
        echo "<script>document.location.href='identification.php?action=mdpsOubl'</script>";
    }
	echo"
	<section id='CodeSec'>
		<div class='FormCode'>
			<h2 class='TitleCodeSec'>Entrez votre code de sécurité</h2>
			<h4 class='PrgCode'>Merci de vérifier dans vos e-mails que vous avez reçu un message avec votre code. Celui-ci est composé de 8 chiffres.</h4>
			<form name='Code' action='controller.php' method='post' onsubmit='return VérifCS()'>
				<div class='InputCode'>
					<input type='text' name='code' placeholder='Votre Code' id='InputCS' class='inputCodeSec'><br>
					<span class='ErCodeSéc'></span>
				</div>
				<div class='BtnCode'>
					<input type='submit' name='verifCode' value='Continuer' class='btnCode'>
					<input type='button' value='Retour' class='btnRetour2' onclick='history.back()'>
				</div>
			</form>
		</div>
	</section>
	";}

//Formulaire de changement de mot de passe----------------------------------------------------//
if(isset($_GET['action'])&&$_GET['action']=='nvPass'){
	if(isset($_SESSION['membre'])){
		echo "<script>document.location.href='index.php'</script>";
	}
	elseif(! isset($_SESSION['EmailMb']) || ! isset($_SESSION['code'])){
        echo "<script>document.location.href='identification.php?action=mdpsOubl'</script>";
    }
	echo"
	<section id='ReinMdps'>
			<div class='FormRein'>
			<h2 class='TitleReinc'>Choisissez votre mot de passe</h2>
				<form name='Reini' action='controller.php' method='post' onsubmit='return VérifNvMps() '>
				<div class='InputRein'>
					<input type='password' name='MDPS' placeholder='Entrez votre nouveau mot de passe' id='InputRéinMdps' class='inputReinMdps'><br>
					<span class='ErReinMdps'></span><br>
					<input type='password' name='confMDPS' placeholder='Confirmer votre mot de passe ' id='InputRéinConfMdps'  class='ConfRein'><br>
					<span class='ErReinConfMdps'></span><br>
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
?>
<?php require_once("./inc/bas.inc.html"); ?>