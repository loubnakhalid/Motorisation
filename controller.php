<?php require_once("./inc/init.inc.php"); ?>
<?php
if(isset($_GET['action']) && $_GET['action'] == "déconnexion") {
	$_SESSION = array();
    setcookie(session_name(), ' ', time()-1);
    session_destroy();
    header("location:index.php");
}
if(isset($_POST['con'])){
    setcookie('login[EmailMb]',$_POST['EmailMb'],time()+60);
    $resultat = mysqli_execute_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$_POST[EmailMb]'");
    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();
        $pass =$_POST['MDPS'];
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
                header("location:./admin/accueil.php");
            }
            elseif(Client()){
                header("location:index.php");
            }
        }
        else
        {
            header("location:identification.php?action=connexion&erreurMDPS=Mot de passe incorrecte ! Veuillez réssayer .");
        }
    }
    else
    {
        setcookie('login[EmailMb]','',time()-1);
        header("location:identification.php?action=connexion&erreurEmailMb=Email incorrecte ! Veuillez réssayer .");
    }
}
if(isset($_POST['inscr']) || (isset($_GET['action'])) && $_GET['action'] == "inscription"){
    setcookie('login[NomMb]',$_POST['NomMb'],time()+60);
    setcookie('login[PrénomMb]',$_POST['PrénomMb'],time()+60);
    setcookie('login[EmailMb]',$_POST['EmailMb'],time()+60);
    setcookie('login[Ville]',$_POST['Ville'],time()+60);
    setcookie('login[CP]',$_POST['CP'],time()+60);
    setcookie('login[AdresseMb]',$_POST['AdresseMb'],time()+60);
    setcookie('login[NumTélé]',$_POST['NumTélé'],time()+60);
    setcookie('login[DateNc]',$_POST['DateNc'],time()+60);
	$verifEmail=mysqli_execute_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$_POST[EmailMb]'");
		if($verifEmail->num_rows > 0){
            setcookie('login[EmailMb]','',time()-1);
            header("location:identification.php?action=inscription&erreurEmailMb=Email déjà utilisé ! Veuillez en choisir un autre svp.");
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
			$subject="Bonjour ".$_POST['NomMb']." ".$_POST['PrénomMb'];
			$to=$_POST['EmailMb'];
			mail($to,$subject,$message,$header);
            $_POST['MDPS']=password_hash($_POST['MDPS'],PASSWORD_DEFAULT,['cost'=>14]);
			mysqli_execute_query($mysqli,"INSERT INTO membre (NomMb,PrénomMb,NumTélé,DateNc,Ville,CP,AdresseMb,EmailMb,MDPS) VALUES ('$_POST[NomMb]','$_POST[PrénomMb]','$_POST[NumTélé]','$_POST[DateNc]','$_POST[Ville]','$_POST[CP]','$_POST[AdresseMb]','$_POST[EmailMb]','$_POST[MDPS]')");
			header("location:identification.php?action=connexion&successInscr=Vous êtes inscris avec succés ! Veuillez vous connecter à votre compte .");
            unset($_COOKIE['login']);
		}
}
if (isset($_POST['mdpsOubl']) || (isset($_GET['action'])) && $_GET['action'] == "mdpsOubl") {
    $email = $_POST['EmailMb'];
    $_SESSION['EmailMb'] = $email;

    $emailCheckQuery = "SELECT * FROM membre WHERE EmailMb = '$email'";
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
if(isset($_POST['nvPass'])){
    $verif_mdp=preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $_POST['MDPS']);
    if (!$verif_mdp ||strlen($_POST['MDPS']) < 8) {
        header("location:identification.php?action=nvPass&erreur=Votre mot de passe doit contenir au minimum : 8 caractères, 1 chiffre, 1 caractère spécial, 1 majuscule");
    } else {
        if ($_POST['MDPS'] != $_POST['confMDPS']) {
            header("location:identification.php?action=nvPass&erreur=Les mots de passe ne sont pas identiques ! Veuillez réssayer svp.");
        } else {
            $MDPS = password_hash( $_POST['MDPS'] ,PASSWORD_DEFAULT);
            $EmailMb = $_SESSION['EmailMb'];
            $updatePassword = "UPDATE membre SET MDPS = '$MDPS' WHERE EmailMb = '$EmailMb'";
            $updatePass = mysqli_query($mysqli, $updatePassword) or die("Query Failed");
            session_unset();
            session_destroy();
            header('location:./identification.php?action=connexion');
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
if(isset($_GET['qtPan']) && isset($_GET['pos'])&& isset($_GET['nbre'])){
    $_SESSION['panier']['qt'][$_GET['pos']]=$_GET['nbre'];
    header("location:panier.php");
}
if(isset($_POST['Finaliser'])){
    $DateCmd=Date("20y-m-d");
    $IdMb=$_SESSION['membre']['IdMb'];
    $StatutCmd='En cours';
    $prixTT=montantTotal();
    $modePaiement=$_POST['modePaiement'];
    /*Insertion de commande et détails commande -------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    $rslt=mysqli_query($mysqli,"insert into commande (DateCmd,IdMb,StatutCmd,prixTT,modePaiement) values('$DateCmd',$IdMb,'$StatutCmd',$prixTT,'$modePaiement')");
    $IdCmd = $mysqli->insert_id;
		for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++)
		{
			$rslt1=mysqli_query($mysqli,"INSERT INTO détails_commande (IdCmd, IdPr,qt) VALUES ($IdCmd, " . $_SESSION['panier']['IdPr'][$i] . "," . $_SESSION['panier']['qt'][$i] . ")");
		}
    /* Modifiaction des informations du membre-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    $NomMb=$_POST['NomMb'];
    $PrénomMb=$_POST['PrénomMb'];
    $NumTélé=$_POST['NumTélé'];
    $EmailMb=$_POST['EmailMb'];
    $AdresseMb=$_POST['AdresseMb'];
    $rslt2=mysqli_query($mysqli,"UPDATE membre set NomMb='$NomMb',PrénomMb='$PrénomMb',NumTélé='$NumTélé',EmailMb='$EmailMb',AdresseMb='$AdresseMb' where IdMb=$IdMb");
    /*Envoi Email de confirmation de commande-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    $rslt2=mysqli_query($mysqli,"select * from membre where IdMb='$IdMb'");
    $row2=mysqli_fetch_assoc($rslt2);
    $to=$row2['EmailMb'];
    $header="From: Motorify.com <supportMotorify@test.com>\r\n";
    $header.="Content-Type: text/html\r\n";
    $tablePr="<table border='1' cellspacing='0' width='500px'><tr><th>Image</th><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
        $tablePr.="<tr><td><img src='https://motorify.000webhostapp.com/inc/img/produits/".$_SESSION['panier']['ImagePr'][$i]."' height='50px'></td><td>".$_SESSION['panier']['NomPr'][$i]."</td><td>".$_SESSION['panier']['PrixPr'][$i]."</td><td>".$_SESSION['panier']['qt'][$i]."</td></tr>";
    }
    $tablePr.="<tr><td colspan='4' align='center'>Total :".montantTotal()."DH</td></tr></table>";
    $date= date("d/m/Y H:i:s");
    $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'<fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'><legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous sommes heureux de vous informer que nous avons bien reçu votre commande. Vous trouverez ci-dessous les détails de votre commande :<br><br> <b>Date d'expédition</b> : $date <br><b>Numéro de suivi</b> : $IdCmd <br> <b>Adresse de livraison</b> : $row2[AdresseMb]<br> <b>Articles expédiés</b> : <br>$tablePr <br><br>Veuillez noter que le numéro de suivi vous permettra de suivre l'avancement de votre colis.<br>Nous avons bien pris en compte votre commande et nous la traiterons dès que possible. Vous recevrez une notification dès que votre commande sera expédiée.<br> Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter. <br>Nous espérons que vous apprécierez vos achats et nous vous remercions de votre confiance.<br><br> Cordialement, <br><br> L'équipe d'expédition</fieldset></body></html>";
    $subject="Confirmation de commande";
    mail($to,$subject,$message,$header);
    /*Diminuer la quantité des produits commandés-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
        $IdPr=$_SESSION['panier']['IdPr'][$i];
        $qt=$_SESSION['panier']['qt'][$i];
        $rslt=mysqli_query($mysqli,"select * from produit where IdPr=$IdPr");
        $row=mysqli_fetch_assoc($rslt);
        $StockPr=$row["StockPr"];
        $nvStock=($StockPr-$qt);
		$rslt1=mysqli_query($mysqli,"UPDATE produit SET StockPr=$nvStock where IdPr=$IdPr");
	}
    /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    unset($_SESSION['panier']);
    header("location:profil.php");
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
if(isset($_POST['envoiRDV'])){
    $DateRDV=Date("20y-m-d");
    $TypePrjt=$_POST['TypePrjt'];
    $Nom=$_POST['NomMb'];
    $Prénom=$_POST['PrénomMb'];
    $Adresse=$_POST['AdresseMb'];
    $NumTélé=$_POST['NumTélé'];
    //try{
        if(isset($_SESSION['membre']['IdMb'])){
            $IdMb=$_SESSION['membre']['IdMb'];
            if($rslt=mysqli_query($mysqli,"update membre set NomMb='$Nom',PrénomMb='$Prénom',AdresseMb='$Adresse',NumTélé='$NumTélé' where IdMb=$IdMb")){
                if($rslt2=mysqli_query($mysqli,"insert into RDV (IdMb,IdPart,DateRDV,TypePrjt,StatutRDV) values ($IdMb,NULL,'$DateRDV','$TypePrjt','Non traité')")){
                    header("location:$lienPr?success=Votre demande a été envoyée avec succès");
                }
            }
        }
        else{
            if($rslt=mysqli_query($mysqli,"insert into participant (NomPart,PrénomPart,AdressePart,NumTélé) values ('$Nom','$Prénom','$Adresse','$NumTélé')")){
                $IdPart=$mysqli->insert_id;
                if($rslt2=mysqli_query($mysqli,"insert into rdv (IdMb,IdPart,DateRDV,TypePrjt,StatutRDV) values (NULL,$IdPart,'$DateRDV','$TypePrjt','Non traité')")){
                    header("location:$lienPr?success=Votre demande a été envoyée avec succès");
                }
            }
            
        }
    //}
    /*catch(Exception | Error $e){
        header("location:$lienPr?erreur=Erreur à la demande de Rendez-vous ! Veuillez réssayer plus tard ou cantactez-nous et merci .");
    }*/
}
if(isset($_POST['ajoutPan'])){
    if(! Client() && ! Admin()){
        echo "<script>document.location.href='identification.php?action=connexion&panVide=true';</script>";
    }
    else{
        $id=$_POST['IdPr'];
        $qt=$_POST['qt'];
        $rslt=mysqli_query($mysqli,"select * from produit where IdPr=$id");
        $row=mysqli_fetch_assoc($rslt);
        ajouterProduitDansPanier($row['IdPr'],$row['NomPr'],$qt,$row['PrixPr'],$row['ImagePr']);
        header("location:produits.php?IdPr=$id&success=Vous avez ajouté le produit dans le panier avec succès ! ");
    }
}
if(isset($_POST['modifIdentit'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $NomMb=$_POST['NomMb'];
    $PrénomMb=$_POST['PrénomMb'];
    $DateNc=$_POST['DateAnn'].'-'.$_POST['DateMs'].'-'.$_POST['DateJr'];
    try{
        if($rslt=mysqli_query($mysqli,"update membre set NomMb='$NomMb', PrénomMb='$PrénomMb', DateNc='$DateNc' where IdMb=$IdMb")){
            header("location:profil.php?success=Votre modification a été enregistrée avec succès ! ");
        }
    }
    catch(Exception | Error $e){
        header("location:profil.php?erreur=Erreur à la modificaton des identifiants ! Veuillez réssayer plus tard ou contactez-nous . ");
    }
}
if(isset($_POST['modifIdentif'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $rslt=mysqli_query($mysqli,"select * from membre where IdMb=$IdMb");
    $row=mysqli_fetch_assoc($rslt);
    $EmailMb=$_POST['EmailMb'];
    $MDPS=$_POST['MDPS'];
    $mdps=$row['MDPS'];
    $nvMDPS=$_POST['nvMDPS'];
    try{
        if(password_verify($MDPS,$mdps)){
            $mdps=password_hash($MDPS,PASSWORD_DEFAULT);
            if($rslt=mysqli_query($mysqli,"update membre set EmailMb='$EmailMb', MDPS='$mdps' where IdMb=$IdMb")){
                header("location:profil.php?success=Votre modification a été enregistrée avec succès ! ");
            }
        }
        else{
            header("location:profil.php?erreur=Le mot de passe que vous-avez entré est incorrecte ! ");
        }
    }
    catch(Exception | Error $e){
        header("location:profil.php?erreur=Erreur à la modificaton des identifiants ! Veuillez réssayer plus tard ou contactez-nous . ");
    }
}
if(isset($_POST['modifContact'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $AdresseMb=$_POST['AdresseMb'];
    $Ville=$_POST['Ville'];
    $CP=$_POST['CP'];
    $NumTélé=$_POST['NumTélé'];
    try{
        if($rslt=mysqli_query($mysqli,"update membre set AdresseMb='$AdresseMb', Ville='$Ville', CP='$CP',NumTélé='$NumTélé' where IdMb=$IdMb")){
            header("location:profil.php?success=Votre modification a été enregistrée avec succès ! ");
        }
    }
    catch(Exception | Error $e){
        header("location:profil.php?erreur=Erreur à la modificaton des identifiants ! Veuillez réssayer plus tard ou contactez-nous . ");
    }
}
?>