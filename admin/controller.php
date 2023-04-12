<?php 
include("../inc/init.inc.php");
//Vérification si le membre est un Admin
if(!Admin()){
    header("location:../index.php");
}
?>
<?php
if(isset($_GET['table']) && isset($_GET['action'])){
    $table=$_GET['table'];
    $action=$_GET['action'];
    switch($table){
        //Traitement de la table catégorie
        case 'catégorie' :
            if($action=='supprimer'){
                $id=$_GET['id'];
                $rqt="delete from catégorie where IdCt=$id";
                $success="Vous-avez supprimé la catégorie avec succès ! ";
            }
            else{
                $NomCt=$_POST['NomCt'];
                if($action=='ajouter'){
                    $rqt="insert into catégorie (NomCt) values ('$NomCt')";
                    $success="Vous-avez ajouté la catégorie avec succès ! ";
                }
                elseif($action=='modifier'){
                    $IdCt=$_GET['IdCt'];
                    $rqt="update catégorie set NomCt='$NomCt' where IdCt=$IdCt";
                    $success="Vous-avez modifié la catégorie avec succès ! ";
                }
            }
        ;break;
        //Traitement de la table produit
        case 'produit':
            if($action=='supprimer'){
                $id=$_GET['id'];
                $rqt="delete from produit where IdPr=$id";
                $success="Vous-avez supprimé le produit avec succès ! ";
            }
            else{
                $NomPr=$_POST['NomPr'];
                $DescriptionPr=addslashes($_POST['DescriptionPr']);
                $PrixPr=$_POST['PrixPr'];
                $StockPr=$_POST['StockPr'];
                $IdCt =$_POST['IdCt'];
                $ImagePr=$_FILES['ImagePr'];
                if($action=='ajouter'){
                    $chemin='';
                    do{
                        $NomImage=random_int(10,1000).".jpg";
                        $chemin="../inc/img/produits/$NomImage";
                    }while(file_exists($chemin));
                    move_uploaded_file($ImagePr['tmp_name'],$chemin);
                    $rqt="insert into produit (NomPr,DescriptionPr,PrixPr,StockPr,IdCt,ImagePr) values ('$NomPr','$DescriptionPr',$PrixPr,$StockPr,'$IdCt','$NomImage')";
                    $success="Vous-avez ajouté le produit avec succès ! ";
                }
                elseif($action=='modifier'){
                    $IdPr=$_GET['IdPr'];
                    $NomImage=$_POST['NomImage'];
                    move_uploaded_file($ImagePr['tmp_name'],"../inc/img/produits/$NomImage");
                    $rqt="update produit set NomPr='$NomPr',DescriptionPr='$DescriptionPr',PrixPr='$PrixPr',StockPr='$StockPr',IdCt='$IdCt' where IdPr=$IdPr";
                    $success="Vous-avez modifié le produit avec succès ! ";
                }
            }
        ;break;
        //Traitement de la table commande
        case 'commande' :
            if($action=='supprimer'){
                $id=$_GET['id'];
                $rqt="delete from commande where IdCmd=$id";
                $success="Vous-avez supprimé la commande avec succès ! ";
            }
            else{
                $DateCmd=$_POST['DateCmd'];
                $prixTT=$_POST['prixTT'];
                $modePaiement=$_POST['modePaiement'];
                $StatutCmd=$_POST['StatutCmd'];
                $NoteCmd =$_POST['NoteCmd'];
                if($action=='ajouter'){
                    $IdMb=$_POST['IdMb'];
                    $rqt="insert into commande (DateCmd,IdMb,StatutCmd,prixTT,modePaiement,NoteCmd) values ('$DateCmd',$IdMb,'$StatutCmd','$prixTT','$modePaiement','$NoteCmd')";
                    $success="Vous-avez ajouté la commande avec succès ! ";
                }
                elseif($action=='modifier'){
                    $IdCmd=$_POST['IdCmd'];
                    $rqt="update commande set DateCmd='$DateCmd',prixTT=$prixTT,modePaiement='$modePaiement',StatutCmd='$StatutCmd',NoteCmd='$NoteCmd' where IdCmd='$IdCmd'";
                    $success="Vous avez modifié la commande avec succès ! ";
                }
            }
        ;break;
        //Traitement de la table RDV
        case 'RDV':
            if($action=='supprimer'){
                $id=$_GET['id'];
                $rqt="delete from rdv  where IdRDV=$id";
                $success="Vous-avez supprimé le rendez-vous avec succès ! ";
            }
            else{
                $nom=strtoupper($_POST['nom']);
                $prenom=ucfirst($_POST['prenom']);
                $DateRDV=$_POST['DateRDV'];
                $NumTélé=$_POST['NumTélé'];
                $adresse=ucfirst($_POST['adresse']);
                $StatutRDV=$_POST['StatutRDV'];
                $TypePrjt=$_POST['TypePrjt'];
                if($action=='ajouter'){
                    $rslt1=mysqli_query($mysqli,"insert into participant (NomPart,PrénomPart,AdressePart,NumTélé) values ('$nom','$prenom', '$adresse','$NumTélé')");
                    $IdPart= $mysqli->insert_id;
                    $rqt="insert into rdv (IdPart,IdMb,DateRDV,StatutRDV,TypePrjt) values ('$IdPart',NULL,'$DateRDV','$StatutRDV','$TypePrjt')";
                    $success="Vous-avez ajouté le rendez-vous avec succès ! ";
                }
                elseif($action=='modifier'){
                    $Id=explode('/',$_POST['Id']);
                    $NomId=$Id[0];
                    $ValeurId=$Id[1];
                    $IdRDV=$_GET['IdRDV'];
                    if($ValeurId=='IdMb'){
                        $rslt=mysqli_query($mysqli,"update membre set NomMb='$nom', PrénomMb='$prenom', AdresseMb='$adresse', NumTélé='$NumTélé' where IdMb=$ValeurId ");
                    }
                    elseif($NomId=='IdPart'){
                        $rslt=mysqli_query($mysqli,"update participant set NomPart='$nom', PrénomPart='$prenom', AdressePart='$adresse' where IdPart=$ValeurId ");
                    }
                    $rqt="update rdv set  DateRDV='$DateRDV', StatutRDV='$StatutRDV', TypePrjt='$TypePrjt' where IdRDV=$IdRDV";
                    $success="Vous-avez modifié le rendez-vous avec succès ! ";
                }
            }
        ;break;
        //Traitement de la table promos
        case 'promos':
            if($action=='supprimer'){
                $id=$_GET['id'];
                $rqt="delete from promos where IdPromo=$id";
                $success="Vous-avez supprimé la promotion avec succès ! ";
            }
            else{
                $Taux=$_POST['Taux'];
                $DateDéb=$_POST['DateDéb'];
                $DateFin=$_POST['DateFin'];
                $StatutPromo=$_POST['StatutPromo'];
                if($action=='ajouter'){
                    $rqt="insert into promos (Taux,DateDéb,DateFin,StatutPromo) values('$Taux','$DateDéb','$DateFin','$StatutPromo')";
                    $success="Vous-avez ajouté la promotion avec succès ! ";
                }
                elseif($action=='modifier'){
                    $id=$_GET['id'];
                    $rqt="update promos set Taux='$Taux',DateDéb='$DateDéb',DateFin='$DateFin',StatutPromo='$StatutPromo' where IdPromo=$id";
                    $success="Vous-avez modifié la promotion avec succès ! ";
                }
            }
        ;break;
        //Traitement de la table promo_produit
        case 'promo_produit':
            if($action=='supprimer'){
                $id=$_GET['id'];
                try{
                    if($rslt=mysqli_query($mysqli,"delete from promo_produit where IdPrmPrdt=$id")){
                        $_SESSION['success']='Vous-avez supprimé le produit avec succès !';
                        header("location:gestion.php?table=promos&détails_promos=true&id=$id");
                    }
                }
                catch(Exception | Error $e){
                    $_SESSION['erreur']="Erreur à la suppression de produit ! Veuillez contacter l'équipe de développement";
                    header("location:gestion.php?table=promos&détails_promos=true&id=$id");
                }
            }
            elseif($action=='ajouter'){
                $IdPromo=$_POST['IdPromo'];
                $IdPr=$_POST['IdPr'];
                try{
                    for($i=0;$i<count($IdPr);$i++){
                        $rslt=mysqli_query($mysqli,"insert into promo_produit (IdPromo,IdPr) values('$IdPromo','$IdPr[$i]')");
                    }
                    $_SESSION['success']='Vous-avez ajouté le(s) produit(s) avec succès !';
                    header("location:gestion.php?table=promos&détails_promos=true&id=$IdPromo");
                }
                catch(Exception | Error $e){
                    $_SESSION['erreur']="Erreur à l'ajout de(s) produit(s) ! Veuillez contacter l'équipe de développement .";
                    header("location:gestion.php?table=promos&détails_promos=true&id=$IdPromo");
                }
            }
        ;break;
        //Traitement de la table détails_commande
        case 'détails_commande':
            if($action=='supprimer'){
                if(isset($_GET['id']) && isset($_GET['id2'])){
                    $id=$_GET['id'];
                    $id2=$_GET['id2'];
                    try{
                        $rqtdét="delete from détails_commande where IdDétailsCmd=$id";
                        if($rsltdét=mysqli_query($mysqli,$rqtdét)){
                            if($rsltdét2=mysqli_query($mysqli,"select * from détails_commande natural join produit where IdCmd=$id2")){
                                $prixTT=0;
                                while($row2=mysqli_fetch_assoc($rsltdét2)){
                                    $prixTT+=$row2['PrixPr']*$row2['qt'];
                                }
                                if($rsltdét3=mysqli_query($mysqli,"update commande set prixTT=$prixTT where IdCmd=$id2")){
                                    $_SESSION['success']='Vous-avez supprimé le produit avec succès !';
                                    header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$id2");
                                }
                            }
                        }
                    }
                    catch(Exception | Error $e){
                        $_SESSION['erreur']='Erreur à la suppression de produit ! Veuillez contacter l\équipe de développement.';
                        header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$id2");
                    }
                }
            }
            elseif($action=='modifier'){
                if(isset($_GET['IdDétailsCmd']) && isset($_GET['IdCmd'])){
                    $id=$_GET['IdDétailsCmd'];
                    $IdCmd=$_GET['IdCmd'];
                    $qt=$_POST['qt'];
                    try{
                        $rslt1=mysqli_query($mysqli,"select * from détails_commande natural join produit where IdDétailsCmd=$id");
                        $row1=mysqli_fetch_assoc($rslt1);
                        $rowQt=$row1['qt'];
                        $stock=$row1['StockPr'];
                        if($rowQt>=$qt){
                            $nvQt=$stock+($rowQt-$qt);
                        }
                        else{
                            $nvQt=$stock-($qt-$rowQt);
                        }
                        $rqtdét="update détails_commande set qt=$qt where IdDétailsCmd=$id";
                        if($rsltdét=mysqli_query($mysqli,$rqtdét)){
                            if($rsltdét2=mysqli_query($mysqli,"select * from commande natural join détails_commande natural join produit where IdCmd=$IdCmd")){
                                $prixTT=0;
                                while($row2=mysqli_fetch_assoc($rsltdét2)){
                                    $prixTT=$prixTT+($row2['PrixPr']*$row2['qt']);
                                }
                                $IdPr=$row1['IdPr'];
                                if($rsltdét3=mysqli_query($mysqli,"update commande set prixTT='$prixTT' where IdCmd=$IdCmd")){
                                    if($rsltdét4=mysqli_query($mysqli,"update produit set StockPr=$nvQt where IdPr=$IdPr")){
                                        $_SESSION['success']='Vous-avez modifié la quantité du produit avec succès !';
                                        header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                                    }
                                }
                            }
                        }
                    }
                    catch(Exception | Error $e){
                        $_SESSION['erreur']='Erreur à la modification ! Veuillez contacter l\équipe de développement !';
                        header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                    }
                }
                else{
                    echo"<script>history.back();</script>";
                }
            }
            elseif($action=='ajouter'){
                $IdCmd=$_POST['IdCmd'];
                $IdPr=$_POST['IdPr'];
                try{
                    foreach($IdPr as $value ){
                        $rqt4="insert into détails_commande (IdCmd,IdPr,qt) values('$IdCmd','$value','1')";
                        $rslt=mysqli_query($mysqli,$rqt4);
                        $rslt2=mysqli_query($mysqli,"select * from produit where IdPr=$value");
                        $row2=mysqli_fetch_assoc($rslt2);
                        $nvStock=$row2['StockPr']-1;
                        $rslt2=mysqli_query($mysqli,"update produit set StockPr=$nvStock where IdPr=$value");
                    }
                    if($rsltdét=mysqli_query($mysqli,"select * from détails_commande natural join produit where IdCmd=$IdCmd")){
                        $prixTT=0;
                        while($row=mysqli_fetch_assoc($rsltdét)){
                            $IdPr=$row['IdPr'];
                            if(verifPromo($IdPr)){
                                $PrixPr=nvPrix($IdPr);
                            }
                            else{
                                $PrixPr=$row['PrixPr'];
                            }
                            $prixTT=$prixTT+($row['qt']*$PrixPr);
                        }
                        if($rsltdét1=mysqli_query($mysqli,"update commande set prixTT='$prixTT' where IdCmd=$IdCmd")){
                            $_SESSION['success']='Vous-avez ajouté le(s) produit(s) à la commande avec succès !';
                            header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                        }
                    }
                }
                catch(Exception | Error $e){
                    $_SESSION['erreur']="Erreur à l'ajout de(s) produit(s) ! Veuillez contacter l\'équipe de développement";
                    header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                }
            }
            elseif($action=='ajouterCmd'){
                try{
                    $IdCmd=$_POST['IdCmd'];
                    $IdCmdAjt=$_POST['IdCmdAjt'];
                    $rslt1=mysqli_query($mysqli,"select * from détails_commande where IdCmd=$IdCmdAjt");
                    if(mysqli_num_rows($rslt1)>0){
                        while($row1=mysqli_fetch_assoc($rslt1)){
                            $rslt2=mysqli_query($mysqli,"insert into détails_commande (IdCmd,IdPr,qt) values ($IdCmd,$row1[IdPr],$row1[qt])");
                        }
                        if($rslt3=mysqli_query($mysqli,"delete from commande where IdCmd=$IdCmdAjt")){
                            if($rslt4=mysqli_query($mysqli,"select * from détails_commande natural join produit where IdCmd=$IdCmd")){
                                $prixTT=0;
                                while($row4=mysqli_fetch_assoc($rslt4)){
                                    $prixTT+=$row4['PrixPr']*$row4['qt'];
                                }
                                if($rslt5=mysqli_query($mysqli,"update commande set prixTT=$prixTT where IdCmd=$IdCmd")){
                                    $_SESSION['success']='Vous-avez ajouté la commande avec succès !';
                                    header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                                }
                            }
                        }
                    }
                    else{
                        $_SESSION['erreur']="La commande sélectionnée $IdCmdAjt n\'a pas de détails ! ";
                        header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                    }
                }
                catch(Exception | Error $e){
                    $_SESSION['erreur']="Erreur lors de la modification de détails de la commande ! Veuillez contactez l\'équipe de développement . t";
                    header("location:gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd");
                }
            }
        ;break;
    }
    //l'éxecution de la requête 
    if(isset($rqt) ){
        try{
            if($rslt=mysqli_query($mysqli,$rqt)){
                if($table=='commande' && $action=='modifier'){
                    if(isset($_POST['envEmail'])){
                        $rslt2=mysqli_query($mysqli,"select * from commande natural join membre where IdCmd=$IdCmd");
                        $row2=mysqli_fetch_assoc($rslt2);
                        $rslt3=mysqli_query($mysqli,"select * from détails_commande natural join produit natural join commande natural join membre where IdCmd='$id'");
                        $header="From: Motorify.com <supportMotorify@test.com>\r\n";
                        $header.="Content-Type: text/html\r\n";
                        $date= date("d/m/Y H:i:s");
                        if($StatutCmd=='Expédiée'){
                            $message="<html><head><style>span.im{color:black;}</style></head><body style='font-size:12pt;color:#3a3a3a;'<fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'><legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous avons le plaisir de vous informer que votre commande a été expédiée avec succès. Vous trouverez ci-dessous les détails de votre expédition :<br><br> <b>Date d'expédition</b> : $date <br><b>Numéro de suivi</b> : $id <br> <b>Adresse de livraison</b> : $row2[AdresseMb]<br> <b>Articles expédiés</b> : <br>$tablePr <br><br>Veuillez noter que le numéro de suivi vous permettra de suivre l'avancement de votre colis. Si vous avez des questions ou des préoccupations concernant votre expédition, n'hésitez pas à nous contacter. <br>Nous espérons que vous apprécierez vos achats et nous vous remercions de votre confiance.<br><br> Cordialement, <br><br> L'équipe d'expédition</fieldset></body></html>";
                            $subject="Avis d'expédition";
                        }
                        elseif($StatutCmd=='Annulée'){
                            $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'><fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'><legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous vous écrivons pour vous informer que nous avons annulé votre commande numéro $IdCmd passée sur notre site web/par téléphone le $DateCmd. Nous sommes désolés pour toute gêne occasionnée.<br><br> Nous avons annulé la commande en raison d'une erreur de stock ou de disponibilité de l'article commandé, ou pour toute autre raison qui a rendu impossible l'exécution de votre commande.<br><br>";
                            if($modePaiement=='Paypal'){
                                $message.=" Nous avons déjà procédé au remboursement de votre paiement, qui devrait apparaître sur votre compte dans les prochains jours.<br><br>";
                            }
                            $message.="Nous sommes désolés de ne pas avoir pu honorer votre commande cette fois-ci, mais nous espérons pouvoir vous servir à l'avenir. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter par email ou par téléphone.<br><br> Cordialement,<br><br>L'équipe de Motorify</fieldset></body></html>";
                            $subject="Annulation de la commande numéro $IdCmd";
                        }
                        $to=$row2['EmailMb'];
                        mail($to,$subject,$message,$header);
                    }
                    if($StatutCmd=='Annulée'){
                        $rslt=mysqli_query($mysqli,"select * from détails_commande natural join produit where IdCmd=$IdCmd");
                        while($row=mysqli_fetch_assoc($rslt)){
                            $nvQt=$row['StockPr']+$row['qt'];
                            $rslt2=mysqli_query($mysqli,"update produit set StockPr=$nvQt where IdPr=$row[IdPr]");
                        }
                    }
                }
                if(isset($success)){
                    $_SESSION['success']=$success;
                    header("location:gestion.php?table=$table");
                }
                else{
                    header("location:gestion.php?table=$table");
                }
            }
        }
        catch(Exception | Error $e){
            $_SESSION['erreur']='Erreur ! Veuillez contacter l\'équipe de développement';
            header("location:gestion.php?table=$table");
        }
    }
}
else{
    echo "<script>history.back();</script>";
}
?>