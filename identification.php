<?php include('./inc/haut.inc.php'); ?>
<?php
if(isset($_GET['action'])&&$_GET['action']=='login'){
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo "
	<form method='post' action='controller.php'>
    	<label for='pseudo'>Pseudo</label><br/>
    	<input type='text' id='pseudo' name='email'><br><br>
    	<label for='mdp'>Mot de passe</label><br>
    	<input type='text' id='mdp' name='mdp'><br><br>
    	<a href='identification.php?action=forgot'>Forgot password?</a><br>
    	<input type='submit' value='Se connecter' name='con'><br>
		<a href='identification.php?action=inscription'>S\'inscrire</a><br>
	</form>
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
if(isset($_GET['action'])&&$_GET['action']=='forgot'){
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo"
    <h2>Entrez votre email :</h2>
    <form action='controller.php' method='POST' autocomplete='off'>
        <input type='email' name='email' placeholder='Email'><br>
        <input type='submit' name='forgotPass' value='Check'>
    </form>
	";
}
if(isset($_GET['action'])&&$_GET['action']=='verifEmail'){
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo"
	<div id='container'>
	<h2>Entrez le code : </h2>
	<form action='controller.php' method='POST' autocomplete='off'>
		<input type='number' name='verifCode' placeholder='Verification Code' required><br>
		<input type='submit' name='verifEmail' value='Verify'>
	</form>
	</div>
	";
}
if(isset($_GET['action'])&&$_GET['action']=='nvPass'){
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo"
    <h2>Entrez un nouveau mot de passe : </h2>
    <form action='controller.php' method='POST' autocomplete='off'>
        <input type='password' name='pass' placeholder='Password' required><br>
        <input type='password' name='confirmPass' placeholder='Confirm Password' required><br>
        <input type='submit' name='changePass' value='Save'>
    </form>
	";
}
?>
<?php require_once("./inc/bas.inc.html"); ?>