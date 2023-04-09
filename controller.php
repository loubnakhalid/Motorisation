<?php require_once("./inc/init.inc.php"); ?>
<?php
//Traitement d'inscription---------------------------------------------------------------------------------------------------------------//
if(isset($_POST['inscr']) || (isset($_GET['action'])) && $_GET['action'] == "inscription"){
    //Stocker les informations entrées par l'utilisateur afin de les récupérer au cas où l'email existe déjà---------------------------//
    setcookie('login[NomMb]',$_POST['NomMb'],time()+60);
    setcookie('login[PrénomMb]',$_POST['PrénomMb'],time()+60);
    setcookie('login[EmailMb]',$_POST['EmailMb'],time()+60);
    setcookie('login[Ville]',$_POST['Ville'],time()+60);
    setcookie('login[CP]',$_POST['CP'],time()+60);
    setcookie('login[AdresseMb]',$_POST['AdresseMb'],time()+60);
    setcookie('login[NumTélé]',$_POST['NumTélé'],time()+60);
    setcookie('login[DateNc]',$_POST['DateNc'],time()+60);
    try{
        $verifCode=mysqli_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$_POST[EmailMb]'");
        //Si l'email existe déjà dans la base données--------------------------------------//
		if(mysqli_num_rows($verifCode) > 0){
            setcookie('login[EmailMb]','',time()-1);
            $_SESSION['erreurLog']='Email déjà utilisé ! Veuillez en choisir un autre svp';
            header("location:identification.php?action=inscription");
		}
        else{
            //Ajout des antislashes et convertir les Caractères spéciaux en entités HTML (sécurité)-------------------------------------//
			foreach($_POST as $indice => $valeur)
			{
				$_POST[$indice] = htmlEntities(addSlashes($valeur));
			}
            //Initialisation des variables---------------------------------------------------------------------------------------------//
            $NomMb=strtoupper($_POST['NomMb']);
            $PrénomMb=ucfirst($_POST['PrénomMb']);
            $Ville=ucfirst($_POST['Ville']);
            $AdresseMb=ucfirst($_POST['AdresseMb']);
            $EmailMb=strtolower($_POST['EmailMb']);
            $header="From: Motorify.com <supportMotorify@test.com>\r\n";
			$header.="Content-Type: text/html\r\n";
			$message='<html><head></head><body style="font-size:13pt;color:#3a3a3a;"><fieldset style="padding: 25px;border-color: #0870b5;text-align: justify;"><legend><img src="https://motorify.000webhostapp.com/inc/img/logo3.png" width="150px"></legend>Bienvenue sur <b>Motorify</b>, votre destination en ligne pour tout ce qui concerne la motorisation !<br><br> Nous sommes là pour vous fournir toutes les informations, les conseils et les produits dont vous avez besoin pour améliorer votre expérience de motorisation et interphonie.<br><br>
			Nous sommes une équipe de professionnels de la motorisation, avec des années d\'expérience dans l\'industrie. Nous sommes déterminés à fournir les meilleurs produits et services à nos clients, afin que vous puissiez profiter pleinement de votre projet de motorisation.<br><br>
			Parcourez notre site <a href="Motorify.com" style="color:#26788e;decoration:none;font-weight:bold">Motorify.com</a> pour découvrir notre vaste sélection de produits de motorisation, y compris des pièces détachées, des accessoires, des télécommandes, ainsi que des outils et des équipements de motorisation. Nous sommes fiers de proposer une large gamme de produits de qualité supérieure, à des prix compétitifs.<br><br>
			N\'hésitez pas à nous contacter si vous avez des questions ou si vous avez besoin d\'aide pour trouver le produit parfait pour votre projet. Nous sommes là pour vous aider à chaque étape du processus.
			Nous sommes ravis de vous avoir parmi nous sur Motorify, et nous espérons que vous trouverez tout ce dont vous avez besoin pour améliorer votre expérience de conduite.</fieldset></body></html>';
			$subject="Bonjour ".$NomMb." ".$PrénomMb;
            $_POST['MDPS']=password_hash($_POST['MDPS'],PASSWORD_DEFAULT,['cost'=>14]);
            //Insertion dans la base de données et envoi d'email de Bienvenu------------------------------------------------------------//
			if(mysqli_query($mysqli,"INSERT INTO membre (NomMb,PrénomMb,NumTélé,DateNc,Ville,CP,AdresseMb,EmailMb,MDPS) VALUES ('$NomMb','$PrénomMb','$_POST[NumTélé]','$_POST[DateNc]','$Ville','$_POST[CP]','$AdresseMb','$EmailMb','$_POST[MDPS]')")){
                mail($EmailMb,$subject,$message,$header);
                unset($_COOKIE['login']);
                $_SESSION['success']='Vous êtes inscris avec succés ! Veuillez vous connecter à votre compte';
			    header("location:identification.php?action=connexion");
            }
            else{
                $_SESSION['erreur']="Erreur à l'inscription ! Veuillez réssayer plut tard ou contactez-nous";
                header("location:identification.php?action=inscription");
            }
		}
    }
    catch(Exception | Error $e){
        $_SESSION['erreur']="Erreur à l'inscription ! Veuillez réssayer plut tard ou contactez-nous";
        header("location:identification.php?action=inscription");
    }
}
//Traitement de connexion---------------------------------------------------------------------------------------------------------------//
if(isset($_POST['con'])){
    $EmailMb=strtolower(trim($_POST['EmailMb']));
    setcookie('login[EmailMb]',$EmailMb,time()+60);
    try{
        if($resultat = mysqli_query($mysqli,"SELECT * FROM membre WHERE EmailMb='$EmailMb'")){
            if(mysqli_num_rows($resultat) != 0)
            {
                $membre = mysqli_fetch_assoc($resultat);
                $pass =$_POST['MDPS'];
                if(password_verify($pass,$membre['MDPS']))
                {
                    //Stocker les informations du membre dans la session--------------------------------------------------------------------//
                    foreach($membre as $indice => $element)
                    {
                        if($indice != 'MDPS')
                        {
                            $_SESSION['membre'][$indice] = $element; 
                        }
                    }
                    //Redirection selon le type de membre (Admin ou client)----------------------------------------------------------------------------------//
                    if(Admin()){
                        header("location:./admin/accueil.php");
                    }
                    elseif(Client()){
                        header("location:./profil.php");
                    }
                }
                else
                {
                    $_SESSION['erreurLog']='Mot de passe incorrecte ! Veuillez réssayer';
                    header("location:identification.php?action=connexion");
                }
            }
            else
            {
                setcookie('login[EmailMb]','',time()-1);
                $_SESSION['erreurLog']='Email incorrecte ! Veuillez réssayer';
                header("location:identification.php?action=connexion");
            }
        }
        else{
            $_SESSION['erreur']="Erreur à la connexion ! Veuillez réssayer plut tard ou contactez-nous";
            header("location:identification.php?action=connexion");
        }
    }
    catch(Exception | Error $e){
        $_SESSION['erreur']="Erreur à la connexion ! Veuillez réssayer plut tard ou contactez-nous";
        header("location:identification.php?action=connexion");
    }
}
//Traitement mot de passe oublié (vérification de l'existance de l'email entré et envoi de code)----------------------------------------//
if (isset($_POST['mdpsOubl']) || ((isset($_GET['action'])) && $_GET['action'] == "mdpsOubl")) {
    $EmailMb = $_POST['EmailMb'];
    $_SESSION['EmailMb'] = $EmailMb;
    try{
        //Vérification de l'email entré----------------------------------------------------------------------------------------------------//
        if ($rslt=mysqli_query($mysqli, "SELECT * FROM membre WHERE EmailMb = '$EmailMb'")) {
            if (mysqli_num_rows($rslt) > 0) {
                //sélectionner un code de 6 chiffres aléatoirement--------------------------------------------------------------------------------------//
                $code = rand(999999, 111111);
                $subject = 'Email Verification Code';
                $message = "Le code de vérification est <b>". $code."</b>";
                $header="From: Motorify.com <supportMotorify@test.com>\r\n";
			    $header.="Content-Type: text/html\r\n";
                //Envoi du code par mail-------------------------------------------------------------------------------------------------//
                if (mail($EmailMb, $subject, $message, $header)) {
                    $_SESSION['code']=$code;
                    $successMssg = "Nous avons envoyé le code à votre Email : $EmailMb";
                    $_SESSION['successMssg'] = $successMssg;
                    header('location: identification.php?action=verifCode');
                } 
                else {
                    $_SESSION['erreur'] = "Erreur à l\'envoi du code ! Veuillez réssayer plus tard ou contactez-nous et merci";
                    header('location: identification.php?action=mdpsOubl');
                }
            }else{
                $_SESSION['erreurLog'] = "Adresse email n'existe pas ! Veuillez réssayer";
                header('location: identification.php?action=mdpsOubl');
            }
        }
        else {
            $_SESSION['erreur'] = "Erreur à l\'envoi du code ! Veuillez réssayer plus tard ou contactez-nous et merci";
            header('location: identification.php?action=mdpsOubl');
        }
    }
    catch(Exception | Error $e){
        $_SESSION['erreur'] = "Erreur à l\'envoi du code ! Veuillez réssayer plus tard ou contactez-nous et merci";
        header('location: identification.php?action=mdpsOubl');
    }
}
//Traitement mot de passe oublié (vérification du code entré)--------------------------------------------------------------------------//
if(isset($_POST['verifCode'])){
    $code=$_POST['code'];
    if($code==$_SESSION['code']){
        unset($_SESSION['code']);
        header("location: identification.php?action=nvPass");
    }
    else{
        $_SESSION['erreurLog']='Code incorrect ! Veuillez réssayer';
        header("location: identification.php?action=verifCode");
    }
}
//Traitement mot de passe oublié (changement de mot de passe)--------------------------------------------------------------------------//
if(isset($_POST['nvPass'])){
        $MDPS = password_hash( $_POST['MDPS'] ,PASSWORD_DEFAULT);
        $EmailMb = $_SESSION['EmailMb'];
        try{
            if(mysqli_query($mysqli,"UPDATE membre SET MDPS = '$MDPS' WHERE EmailMb = '$EmailMb'")){
                session_unset();
                session_destroy();
                header('location:./identification.php?action=connexion');
            }
            else{
                $_SESSION['erreur']='Erreur à la modification du mot de passe ! Veuillez réssayer plus tard ou cantactez-nous';
                header('location:./identification.php?action=nvPass');
            }
        }
        catch(Exception | Error $e){
            $_SESSION['erreur']='Erreur à la modification du mot de passe ! Veuillez réssayer plus tard ou cantactez-nous';
            header('location:./identification.php?action=nvPass');
        }

}
//Traitement d'ajout d'un produit dans le panier---------------------------------------------------------------------------------------//
if(isset($_POST['ajoutPan'])){
        $id=$_POST['IdPr'];
        $qt=$_POST['qt'];
        try{
            if($rslt=mysqli_query($mysqli,"select * from produit where IdPr=$id")){
                $row=mysqli_fetch_assoc($rslt);
                ajouterProduitDansPanier($row['IdPr'],$row['NomPr'],$qt,$row['PrixPr'],$row['ImagePr']);
                $_SESSION['success']='Vous avez ajouté le produit dans le panier avec succès !';
                header("location:produits.php?IdPr=$id");
            }
            else{
                $_SESSION['erreur']='Erreur à l\'ajout de produit ! Veuillez réssayer plus tard ou contactez-nous et merci';
                header("location:produits.php?IdPr=$id");
            }
        }
        catch(Exception | Error $e){
            $_SESSION['erreur']='Erreur à l\'ajout de produit ! Veuillez réssayer plus tard ou contactez-nous et merci';
            header("location:produits.php?IdPr=$id");
        }

}
//Traitement de modification de la qt de produit dans le panier-----------------------------------------------------------------------//
if(isset($_GET['qtPan']) && isset($_GET['pos']) && isset($_GET['nbre'])){
    $_SESSION['panier']['qt'][$_GET['pos']]=$_GET['nbre'];
    header("location:panier.php");
}
//Traitement de suppression d'un article du panier------------------------------------------------------------------------------------//
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
//Traitement de Finalisation de commande --------------------------------------------------------------------------------------------//
if(isset($_POST['Finaliser'])){
    $DateCmd=Date("20y-m-d");
    $IdMb=$_SESSION['membre']['IdMb'];
    $StatutCmd='En cours';
    $prixTT=montantTotal();
    $modePaiement=$_POST['modePaiement'];
    //Insertion de commande et détails commande -------------------------------------------------------------------------------------//
        if(mysqli_query($mysqli,"INSERT INTO commande (DateCmd,IdMb,StatutCmd,prixTT,modePaiement) values('$DateCmd',$IdMb,'$StatutCmd',$prixTT,'$modePaiement')")){
            $IdCmd = $mysqli->insert_id;
            for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++)
            {
                $IdPr=$_SESSION['panier']['IdPr'][$i];
                $qt=$_SESSION['panier']['qt'][$i];
                mysqli_query($mysqli,"INSERT INTO détails_commande (IdCmd, IdPr,qt) VALUES ($IdCmd,$IdPr,$qt)");
            }
        }
        else{
            $_SESSION['erreur']='Erreur à la finalisation de commande ! Veuillez contacter-nous et merci';
            header("location:panier.php");
        }
        //Modifiaction des informations du membre---------------------------------------------------------------------------------------//
        $NomMb=$_POST['NomMb'];
        $PrénomMb=$_POST['PrénomMb'];
        $NumTélé=$_POST['NumTélé'];
        $EmailMb=$_POST['EmailMb'];
        $AdresseMb=$_POST['AdresseMb'];
        if(mysqli_query($mysqli,"UPDATE membre set NomMb='$NomMb',PrénomMb='$PrénomMb',NumTélé='$NumTélé',EmailMb='$EmailMb',AdresseMb='$AdresseMb' where IdMb=$IdMb")){
            //Envoi Email de confirmation de commande----------------------------------------------------------------------------------------//
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
        }
        else{
            $_SESSION['erreur']='Erreur à la finalisation de commande ! Veuillez contacter-nous et merci';
            header("location:panier.php");
        }
        //Diminuer la quantité des produits commandés------------------------------------------------------------------------------------//
        for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
            $IdPr=$_SESSION['panier']['IdPr'][$i];
            $qt=$_SESSION['panier']['qt'][$i];
            if($rslt=mysqli_query($mysqli,"select * from produit where IdPr=$IdPr")){
                $row=mysqli_fetch_assoc($rslt);
                $StockPr=$row["StockPr"];
                $nvStock=($StockPr-$qt);
                if(mysqli_query($mysqli,"UPDATE produit SET StockPr=$nvStock where IdPr=$IdPr")){
                    unset($_SESSION['panier']);
                    $_SESSION['success']='Votre commande a été envoyé avec succès';
                    header("location:profil.php");
                }
                else{
                    $_SESSION['erreur']='Erreur à la finalisation de commande ! Veuillez contacter-nous et merci';
                    header("location:panier.php");
                }
            }
            else{
                $_SESSION['erreur']='Erreur à la finalisation de commande ! Veuillez contacter-nous et merci';
                header("location:panier.php");
            }
        }
}
//Traitement d'envoi dun RDV--------------------------------------------------------------------------------------------------------//
if(isset($_POST['envoiRDV'])){
    $DateRDV=Date("20y-m-d");
    $TypePrjt=$_POST['TypePrjt'];
    $Nom=strtoupper($_POST['NomMb']);
    $Prénom=ucfirst($_POST['PrénomMb']);
    $Adresse=ucfirst($_POST['AdresseMb']);
    $NumTélé=$_POST['NumTélé'];
    try{
        if(isset($_SESSION['membre']['IdMb'])){
            $IdMb=$_SESSION['membre']['IdMb'];
            if($rslt=mysqli_query($mysqli,"update membre set NomMb='$Nom',PrénomMb='$Prénom',AdresseMb='$Adresse',NumTélé='$NumTélé' where IdMb=$IdMb")){
                if($rslt2=mysqli_query($mysqli,"insert into RDV (IdMb,IdPart,DateRDV,TypePrjt,StatutRDV) values ($IdMb,NULL,'$DateRDV','$TypePrjt','Non traité')")){
                    $_SESSION['success']='Votre demande a été envoyée avec succès';
                    header("location:$lienPr");
                }
                else{
                    $_SESSION['erreur']='Erreur à l\'envoi de RDV ! Veuillez réssayer plus tard ou contacter-nous et merci';
                    header("location:$lienPr");
                }
            }
        }
        else{
            if($rslt=mysqli_query($mysqli,"insert into participant (NomPart,PrénomPart,AdressePart,NumTélé) values ('$Nom','$Prénom','$Adresse','$NumTélé')")){
                $IdPart=$mysqli->insert_id;
                if($rslt2=mysqli_query($mysqli,"insert into rdv (IdMb,IdPart,DateRDV,TypePrjt,StatutRDV) values (NULL,$IdPart,'$DateRDV','$TypePrjt','Non traité')")){
                    $_SESSION['success']='Votre demande a été envoyée avec succès';
                    header("location:$lienPr");
                }
                else{
                    $_SESSION['erreur']='Erreur à l\'envoi de RDV ! Veuillez réssayer plus tard ou contacter-nous et merci';
                    header("location:$lienPr");
                }
            }
            
        }
    }
    catch(Exception | Error $e){
        $_SESSION['erreur']='Erreur à l\'envoi de RDV ! Veuillez réssayer plus tard ou contacter-nous et merci';
        header("location:$lienPr");
    }
}
//Traitement de modification des informations du membre 
//modification d'identité
if(isset($_POST['modifIdentit'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $NomMb=strtoupper($_POST['NomMb']);
    $PrénomMb=ucfirst($_POST['PrénomMb']);
    $DateNc=$_POST['DateAnn'].'-'.$_POST['DateMs'].'-'.$_POST['DateJr'];
    try{
        if($rslt=mysqli_query($mysqli,"update membre set NomMb='$NomMb', PrénomMb='$PrénomMb', DateNc='$DateNc' where IdMb=$IdMb")){
            $_SESSION['success']='Les modifications ont été enregistréss avec succès !';
            header("location:profil.php");
        }
        else{
            $_SESSION['erreur']='Erreur à la modificaton des identifiants ! Veuillez réssayer plus tard ou contactez-nous';
            header("location:profil.php");
        }
    }
    catch(Exception | Error $e){
        $_SESSION['erreur']='Erreur à la modificaton des identifiants ! Veuillez réssayer plus tard ou contactez-nous';
        header("location:profil.php");
    }
}
//modification des identifiants
if(isset($_POST['modifIdentif'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $rslt=mysqli_query($mysqli,"select * from membre where IdMb=$IdMb");
    $row=mysqli_fetch_assoc($rslt);
    $EmailMb=strtolower($_POST['EmailMb']);
    $MDPS=$_POST['MDPS'];
    $mdps=$row['MDPS'];
    $nvMDPS=$_POST['nvMDPS'];
    try{
        if(password_verify($MDPS,$mdps)){
            $mdps=password_hash($MDPS,PASSWORD_DEFAULT);
            if($rslt=mysqli_query($mysqli,"update membre set EmailMb='$EmailMb', MDPS='$mdps' where IdMb=$IdMb")){
                $_SESSION['success']='Les modifications ont été enregistrées avec succès !';
                header("location:profil.php");
            }
        }
        else{
            $_SESSION['erreur']='Erreur à la modification des identifiants ! Veuillez réssayer plus tard ou contactez-nous';
            header("location:profil.php");
        }
    }
    catch(Exception | Error $e){
        $_SESSION['erreur']='Erreur à la modification des identifiants ! Veuillez réssayer plus tard ou contactez-nous';
        header("location:profil.php");
    }
}
//modification de cantact
if(isset($_POST['modifContact'])){
    $IdMb=$_SESSION['membre']['IdMb'];
    $AdresseMb=ucfirst($_POST['AdresseMb']);
    $Ville=ucfirst($_POST['Ville']);
    $CP=$_POST['CP'];
    $NumTélé=$_POST['NumTélé'];
    try{
        if($rslt=mysqli_query($mysqli,"update membre set AdresseMb='$AdresseMb', Ville='$Ville', CP='$CP',NumTélé='$NumTélé' where IdMb=$IdMb")){
            $_SESSION['success']='Les modifications ont été enregistrées avec succès !';
            header("location:profil.php");
        }
        else{
            $_SESSION['erreur']='Erreur à la modification des informations de contact ! Veuillez réssayer plus tard ou contactez-nous';
        }
    }
    catch(Exception | Error $e){
        header("location:profil.php?erreur=Erreur à la modificaton des informations de contact ! Veuillez réssayer plus tard ou contactez-nous");
    }
}
//Traitement de contactez-nous
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
//Traitement de déconnexion
if(isset($_GET['action']) && $_GET['action'] == "déconnexion") {
	$_SESSION = array();
    setcookie(session_name(),' ', time()-1);
    session_destroy();
    header("location:index.php");
}
?>