<?php include("../inc/init.inc.php"); ?>
<?php
if(isset($_GET['table']) && isset($_GET['action'])){
    $table=$_GET['table'];
    $action=$_GET['action'];
    switch($table){
    case 'catégorie' :
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from catégorie where IdCt=$id";
            $success="Vous-avez supprimé la catégorie avec succés ! ";
        }
        else{
            $NomCt=$_POST['NomCt'];
            if($action=='ajouter'){
                $rqt="insert into catégorie (NomCt) values ('$NomCt')";
                $success="Vous-avez ajouté la catégorie avec succés ! ";
            }
            elseif($action=='modifier'){
                $id=$_GET['id'];
                $rqt="update catégorie set NomCt='$NomCt' where IdCt=$id";
                $success="Vous-avez modifié la catégorie avec succés ! ";
            }
        }
    ;break;
    case 'produit':
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from produit where IdPr=$id";
            $success="Vous-avez supprimé le produit avec succés ! ";
        }
        else{
            $NomPr=$_POST['NomPr'];
            $DescriptionPr=$_POST['DescriptionPr'];
            $PrixPr=$_POST['PrixPr'];
            $StatutPr=$_POST['StatutPr'];
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
                $rqt="insert into produit (NomPr,DescriptionPr,PrixPr,StatutPr,StockPr,IdCt,ImagePr) values ('$NomPr','$DescriptionPr',$PrixPr,$StatutPr,$StockPr,'$IdCt','$NomImage')";
                $success="Vous-avez ajouté le produit avec succés ! ";
            }
            elseif($action=='modifier'){
                $id=$_GET['id'];
                $NomImage=$_POST['NomImage'];
                move_uploaded_file($ImagePr['tmp_name'],"../inc/img/produits/$NomImage");
                $rqt="update produit set NomPr='$NomPr',DescriptionPr='$DescriptionPr',PrixPr='$PrixPr',StatutPr='$StatutPr',StockPr='$StockPr',IdCt='$IdCt' where IdPr=$id ";
                $success="Vous-avez modifié le produit avec succés ! ";
            }
        }
    ;break;
    case 'commande' :
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from commande where IdCmd=$id";
            $success="Vous-avez supprimé la commande avec succés ! ";
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
                $success="Vous-avez ajouté la commande avec succés ! ";
            }
            elseif($action=='modifier'){
                $id=$_POST['IdCmd'];
                $rqt="update commande set DateCmd='$DateCmd',prixTT=$prixTT,modePaiement='$modePaiement',StatutCmd='$StatutCmd',NoteCmd='$NoteCmd' where IdCmd='$id'";
                $success="Vous avez modifié la commande avec succés ! ";
            }
        }
    ;break;
    case 'RDV':
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from rdv where IdRDV=$id";
            $success="Vous-avez supprimé le rendez-vous avec succés ! ";
        }
        else{
            $TypePrjt=$_POST['TypePrjt'];
            $MessageRDV=$_POST['MessageRDV'];
            $DateRDV=$_POST['DateRDV'];
            $StatutRDV=$_POST['StatutRDV'];
            if($action=='ajouter'){
                $rqt="insert into rdv (TypePrjt,MessageRDV,DateDRV,StatutRDV) values ('$TypePrjt','$MessageRDV','$DateDRV','$StatutRDV)'";
                $success="Vous-avez ajouté le rendez-vous avec succés ! ";
            }
            elseif($action=='modifier'){
                $id=$_GET['id'];
                $rqt="update rdv set TypePrjt='$TypePrjt', MessageRDV='$MessageRDV', DateRDV='$DateRDV', StatutRDV='$StatutRDV'";
                $success="Vous-avez modifié le rendez-vous avec succés ! ";
            }
        }
    ;break;
    case 'promos':
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from promos where IdPromo=$id";
            $success="Vous-avez supprimé la promotion avec succés ! ";
        }
        else{
            $Taux=$_POST['Taux'];
            $DateDéb=$_POST['DateDéb'];
            $DateFin=$_POST['DateFin'];
            $StatutPromo=$_POST['StatutPromo'];
            if($action=='ajouter'){
                $rqt="insert into promos (Taux,DateDéb,DateFin,StatutPromo) values('$Taux','$DateDéb','$DateFin','$StatutPromo')";
                $success="Vous-avez ajouté la promotion avec succés ! ";
            }
            elseif($action=='modifier'){
                $id=$_GET['id'];
                $rqt="update promos set Taux=$Taux,DateDéb=$DateDéb,DateFin=$DateFin,StatutPromo=$StatutPromo where IdPromo=$id";
                $success="Vous-avez modifié la promotion avec succés ! ";
            }
        }
    ;break;
    case 'promo_produit':
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from promo_produit where IdPrmPrdt=$id";
            $success="Vous-avez annulé la promotion sur ce produit avec succés ! ";
        }
        elseif($action=='ajouter'){
            $IdPromo=$_POST['IdPromo'];
            $IdPr=$_POST['IdPr'];
            for($i=0;$i<count($IdPr);$i++){
                $rqt4="insert into promo_produit (IdPromo,IdPr) values('$IdPromo','$IdPr[$i]')";
                $rslt=mysqli_query($mysqli,$rqt4);
            }
            $success="Vous-avez effectuer la promotion sur les produits avec succés ! ";
        }
    ;break;
    case 'détails_commande':
        if($action=='supprimer'){
            $id=$_GET['id'];
            $rqt="delete from détails_commande where IdDétailsCmd=$id";
            $success="Vous-avez supprimé le produit de cette commande avec succés ! ";
        }
        elseif($action=='modifier'){
            $rqt="update détails_commande set qt=$_POST[qt]";
            $success="Vous-avez modifié la quantité du produit avec succés ! ";
        }
        elseif($action=='ajouter'){
            $IdCmd=$_POST['IdCmd'];
            $IdPr=$_POST['IdPr'];
            for($i=0;$i<count($IdPr);$i++){
                $rqt4="insert into détails_commande (IdCmd,IdPr,qt) values('$IdCmd','$IdPr[$i]',1)";
                $rslt=mysqli_query($mysqli,$rqt4);
            }
            $success="Vous-avez ajouté le produit à la commande avec succés ! ";
        }
        elseif($action=='ajouterCmd'){
            $IdCmd=$_POST['IdCmd'];
            $IdCmdAjt=$_POST['IdCmdAjt'];
            for($i=0;$i<count($IdCmdAjt);$i++){
                $rslt1=mysqli_query($mysqli,"select * from détails_commande where IdCmd=$IdCmdAjt[$i]");
                while($row1=mysqli_fetch_assoc($rslt1)){
                    $rslt4=mysqli_query($mysqli,"insert into détails_commande (IdCmd,IdPr,qt) values ($IdCmd,$row1[IdPr],$row1[qt])");
                    mysqli_query($mysqli,"delete from commande where IdCmd=$IdCmdAjt[$i]");
                }
            }
            $success="Vous-avez ajouté les détails de la commande avec succés ! ";
        }
    ;break;
    }
    if(isset($rqt)){
        if($rslt=mysqli_query($mysqli,$rqt)){
            if($table=='commande' && $action=='modifier'){
                if(isset($_POST['envEmail'])){
                    $rslt2=mysqli_query($mysqli,"select * from commande natural join membre where IdCmd='$id'");
                    $row2=mysqli_fetch_assoc($rslt2);
                    $rslt3=mysqli_query($mysqli,"select * from détails_commande natural join produit natural join commande natural join membre where IdCmd='$id'");
                    $header="From: Motorify.com <supportMotorify@test.com>\r\n";
                    $header.="Content-Type: text/html\r\n";
                    $tablePr="<table border='1' cellspacing='0' width='500px'><tr><th>Image</th><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
                    while($row3=mysqli_fetch_assoc($rslt3)){
                        $tablePr.="<tr><td><img src='https://motorify.000webhostapp.com/inc/img/produits/$row3[ImagePr]' height='50px'></td><td>$row3[NomPr]</td><td>$row3[PrixPr]</td><td>$row3[qt]</td></tr>";
                    }
                    $tablePr.="<tr><td colspan='4' align='center'>Total : $row2[prixTT] DH</td></tr></table>";
                    $date= date("d/m/Y H:i:s");
                    if($StatutCmd=='Expédiée'){
                        $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'<fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'><legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous avons le plaisir de vous informer que votre commande a été expédiée avec succès. Vous trouverez ci-dessous les détails de votre expédition :<br><br> <b>Date d'expédition</b> : $date <br><b>Numéro de suivi</b> : $id <br> <b>Adresse de livraison</b> : $row2[AdresseMb]<br> <b>Articles expédiés</b> : <br>$tablePr <br><br>Veuillez noter que le numéro de suivi vous permettra de suivre l'avancement de votre colis. Si vous avez des questions ou des préoccupations concernant votre expédition, n'hésitez pas à nous contacter. <br>Nous espérons que vous apprécierez vos achats et nous vous remercions de votre confiance.<br><br> Cordialement, <br><br> L'équipe d'expédition</fieldset></body></html>";
                        $subject="Avis d'expédition";
                    }
                    elseif($StatutCmd=='Annulée'){
                        $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'><fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'><legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous vous écrivons pour vous informer que nous avons annulé votre commande numéro $id passée sur notre site web/par téléphone le $DateCmd. Nous sommes désolés pour toute gêne occasionnée.<br><br> Nous avons annulé la commande en raison d'une erreur de stock ou de disponibilité de l'article commandé, ou pour toute autre raison qui a rendu impossible l'exécution de votre commande.<br><br>";
                        if($modePaiement=='Paypal'){
                            $message.=" Nous avons déjà procédé au remboursement de votre paiement, qui devrait apparaître sur votre compte dans les prochains jours.<br><br>";
                        }
                        $message.="Nous sommes désolés de ne pas avoir pu honorer votre commande cette fois-ci, mais nous espérons pouvoir vous servir à l'avenir. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter par email ou par téléphone.<br><br> Cordialement,<br><br>L'équipe de Motorify</fieldset></body></html>";
                        $subject="Annulation de la commande numéro $id";
                    }
                    $to=$row2['EmailMb'];
                    mail($to,$subject,$message,$header);
                }
            }
            if(isset($success)){
                header("location:gestion.php?table=$table&success=$success");
            }
            else{
                header("location:gestion.php?table=$table");
            }
        }
        else{
            echo mysqli_error($mysqli);
        }
    }
}
else{
    echo "<script>history.back();</script>";
}
?>