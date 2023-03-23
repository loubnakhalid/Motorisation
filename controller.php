<?php require_once("./inc/init.inc.php"); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "déconnexion") 
{
	session_destroy(); 
    header("location:index.php");
}
if(isset($_POST['con']))
{
    $resultat = mysqli_execute_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$_POST[email]'");
    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();
        $pass =$_POST['mdp'];
        if(password_verify($pass,$membre['MDPS']))
        {
            foreach($membre as $indice => $element)
            {
                if($indice != 'MDPS')
                {
                    $_SESSION['membre'][$indice] = $element; 
                }
            }
            if(Admin()){
                header("location:./admin/index.php");
            }
            elseif(Client()){
                header("location:index.php");
            }
        }
        else
        {
            header("location:identification.php?action=login&erreur=Mot de passe incorrecte ! Veuillez réssayer .");
        }
    }
    else
    {
        header("location:identification.php?action=login&erreur=Email incorrecte ! Veillez réssayer .");
    }
}
if(isset($_POST['inscr']))
{
    setcookie('login[nom]',$_POST['nom'],time()+60);
    setcookie('login[prenom]',$_POST['prenom'],time()+60);
    setcookie('login[mdp1]',$_POST['mdp1'],time()+60);
    setcookie('login[mdp2]',$_POST['mdp2'],time()+60);
    setcookie('login[email]',$_POST['email'],time()+60);
    $verif_mdp=preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['mdp1']);
	$verifEmail=mysqli_execute_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$_POST[email]'");
		if($verifEmail->num_rows > 0){
            setcookie('login[email]','',time()-1);
            header("location:identification.php?action=inscription&erreur=Email déjà utilisé ! Veuillez en choisir un autre svp.");
		}
        elseif(!$verif_mdp || strlen($_POST['mdp1']) < 8 ){
            setcookie('login[mdp1]','',time()-1);
            setcookie('login[mdp2]','',time()-1);
            header("location:identification.php?action=inscription&erreur=Votre mot de passe doit contenir au minimum : 8 caractères, 1 chiffre, 1 caractère spécial, 1 majuscule");
        }
        elseif($_POST['mdp1'] != $_POST['mdp2']){
            setcookie('login[mdp2]','',time()-1);
            header("location:identification.php?action=inscription&erreur=Les mots de passe ne sont pas identiques ! Veuillez réssayer svp.");
        }
        else
		{
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
			$header="From: Motorify.com <supportMotorify@test.com>\r\n";
			$header.="Content-Type: text/html\r\n";
			$message='<html><head></head><body style="font-size:13pt;color:#3a3a3a;"><fieldset style="padding: 25px;border-color: #0870b5;text-align: justify;"><legend><img src="https://motorify.000webhostapp.com/inc/img/logo3.png" width="150px"></legend>Bienvenue sur <b>Motorify</b>, votre destination en ligne pour tout ce qui concerne la motorisation !<br><br> Nous sommes là pour vous fournir toutes les informations, les conseils et les produits dont vous avez besoin pour améliorer votre expérience de motorisation et interphonie.<br><br>
			Nous sommes une équipe de professionnels de la motorisation, avec des années d\'expérience dans l\'industrie. Nous sommes déterminés à fournir les meilleurs produits et services à nos clients, afin que vous puissiez profiter pleinement de votre projet de motorisation.<br><br>
			Parcourez notre site <a href="Motorify.com" style="color:#26788e;decoration:none;font-weight:bold">Motorify.com</a> pour découvrir notre vaste sélection de produits de motorisation, y compris des pièces détachées, des accessoires, des télécommandes, ainsi que des outils et des équipements de motorisation. Nous sommes fiers de proposer une large gamme de produits de qualité supérieure, à des prix compétitifs.<br><br>
			N\'hésitez pas à nous contacter si vous avez des questions ou si vous avez besoin d\'aide pour trouver le produit parfait pour votre projet. Nous sommes là pour vous aider à chaque étape du processus.
			Nous sommes ravis de vous avoir parmi nous sur Motorify, et nous espérons que vous trouverez tout ce dont vous avez besoin pour améliorer votre expérience de conduite.</fieldset></body></html>';
			$subject="Bonjour ".$_POST['nom']." ".$_POST['prenom'];
			$to=$_POST['email'];
			mail($to,$subject,$message,$header);
            $_POST['mdp1']=password_hash($_POST['mdp1'],PASSWORD_DEFAULT,['cost'=>14]);
			mysqli_execute_query($mysqli,"INSERT INTO membre (MDPS,NomMb,PrénomMb,EmailMb) VALUES ('$_POST[mdp1]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]')");
			header("location:index.php");
		}
	}
if (isset($_POST['forgotPass'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;

    $emailCheckQuery = "SELECT * FROM client WHERE email_client = '$email'";
    $emailCheckResult = mysqli_query($mysqli, $emailCheckQuery);

    if ($emailCheckResult) {
        if (mysqli_num_rows($emailCheckResult) > 0) {
            $code = rand(999999, 111111);
                $_SESSION['code']=$code;
                $subject = 'Email Verification Code';
                $message = "Le code de vérification est <b>". $_SESSION['code']."</b>";
                $sender = 'From: Motorify.com';

                if (mail($email, $subject, $message, $sender)) {
                    $message = "We've sent a verification code to your Email <br> $email";
                    $_SESSION['message'] = $message;
                    header('location: identification.php?action=verifEmail');
                } else {
                    header('location: identification.php?action=verifEmail&erreur=Erreur à l\'envoi du code ! contacter notre équipe et merci.');
                }
        }else{
            header('location: identification.php?action=verifEmail&erreur=Adresse email invalid ! Veuillez réssayer.');
        }
    }else {
        header('location: identification.php?action=verifEmail&erreur=Echec à la sélection de la base de données ! Veuillez contacter notre équipe et merci.');
    }
}
if(isset($_POST['verifEmail'])){
    $verifCode=$_POST['verifCode'];
    if($verifCode==$_SESSION['code']){
        header("location: identification.php?action=nvPass");
    }
    else{
        header("location: identification.php?action=verifEmail&erreur=Code invalide ! Veuillez réssayer .");
    }
}
if(isset($_POST['changePass'])){
    $verif_mdp=preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['pass']);
    if (!$verif_mdp ||strlen($_POST['pass']) < 8) {
        header("location:identification.php?action=nvPass&erreur=Votre mot de passe doit contenir au minimum : 8 caractères, 1 chiffre, 1 caractère spécial, 1 majuscule");
    } else {
        if ($_POST['pass'] != $_POST['confirmPass']) {
            header("location:identification.php?action=nvPass&erreur=Les mots de passe ne sont pas identiques ! Veuillez réssayer svp.");
        } else {
            $password = password_hash( $_POST['pass'] ,PASSWORD_DEFAULT);
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE client SET mot_de_passe = '$password' WHERE email_client = '$email'";
            $updatePass = mysqli_query($mysqli, $updatePassword) or die("Query Failed");
            session_unset();
            session_destroy();
            header('location:./identification.php?action=login');
        }
    }
}
if(isset($_GET['supPan'])){
    $id=$_GET['id'];
    $posPr = array_search($id, $_SESSION['panier']['IdPr']);
	if ($posPr !== false)
    {
		array_splice($_SESSION['panier']['NomPr'], $posPr, 1);
		array_splice($_SESSION['panier']['ImagePr'] ,$posPr,1);
		array_splice($_SESSION['panier']['IdPr'], $posPr, 1);
		array_splice($_SESSION['panier']['qt'], $posPr, 1);
		array_splice($_SESSION['panier']['PrixPr'], $posPr, 1);
	}
    header("location:panier.php");
}
if(isset($_GET['envEml'])){
    $subject=$_POST['subject'];
    $from=$_POST['from'];
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: <' . $from .'>'." \r\n".
                'Reply-To: '.  $from . "\r\n".
                'X-Mailer: PHP/' . phpversion();
    $to="motorify23@gmail.com";
    $message=$_POST['message'];
    if(mail($to,$subject,$message,$headers)){
        echo "<script>alert('message envoyé avec succés');document.location.href='$lienPr';</script>";
    }
    else{
        echo "<script>alert('echec de l'envoi.);document.location.href='$lienPr';</script>";
    }
}
?>