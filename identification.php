<?php include('./inc/haut.inc.php'); ?>
<?php
if($_GET['action']=='login'){
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
if($_GET['action']=='inscription'){
	$nom= isset($_COOKIE['login']['nom']) ? $_COOKIE['login']['nom'] : "";
	$prenom= isset($_COOKIE['login']['prenom']) ? $_COOKIE['login']['prenom'] : "";
	$mdp1= isset($_COOKIE['login']['mdp1']) ? $_COOKIE['login']['mdp1'] : "";
	$mdp2= isset($_COOKIE['login']['mdp2']) ? $_COOKIE['login']['mdp2'] : "";
	$email= isset($_COOKIE['login']['email']) ? $_COOKIE['login']['email'] : "";
	if(isset($_GET['erreur'])){
		echo $_GET['erreur'];
	}
	echo "
	<form method='post' action='controller.php'>
		Nom : <input type='text' name='nom' value='$nom'><br>
		Prenom : <input type='text' name='prenom' value='$prenom'><br>
		Mot de pass : <input type='text' name='mdp1' value='$mdp1'><br>
		Confirmer mot de passe : <input type='text' name='mdp2' value='$mdp2'><br>
		Email : <input type='text' name='email' value='$email'><br>
		<input type='submit' name='inscr'>
	</form>
	";
}
if($_GET['action']=='forgot'){
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
if($_GET['action']=='verifEmail'){
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
if($_GET['action']=='nvPass'){
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