<?php include("../inc/init.inc.php"); ?>
<?php
if(isset($_GET['table']) && isset($_GET['action'])){
    $table=$_GET['table'];
    $action=$_GET['action'];
    if($action=='supprimer' ){
        $id=$_GET['id'];
        $nomId=$_GET['nomId'];
        if($table=='catégorie'){
            $rqt="delete from produit where IdCt = '$id'";
            $rqt2="delete from $table where $nomId = '$id'";
            $rslt=mysqli_query($mysqli,$rqt);
            $rslt2=mysqli_query($mysqli,$rqt2);
            if($rslt&&$rslt2){
                header("location:gestion.php?table=$table");
                echo "<script>document.location.href='' ; </script>";
            } 
            else{
                echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
            }
        }
        else{
                $rqt="delete from $table where $nomId = '$id'";
                if($rslt){
                    header("location:gestion.php?table=$table");
                }
                else{
                    echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
                }
        }
        $rslt=mysqli_query($mysqli,$rqt);
        if($rslt){
            header("location:gestion.php?table=$table");
        }
        else{
            echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
        }
    }
    elseif($action=='modifier'){
    if($table=='catégorie'){
        $id=$_GET['id'];
        $NomCt=$_POST['NomCt'];
        $rslt=mysqli_query($mysqli,"update catégorie set NomCt='$NomCt' where IdCt=$id");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=catégorie';</script>";
        }
        else{
            echo "<script>alert('Erreur à la modification! Veuillez réssayer.');document.location.href='gestion.php?table=catégorie';</script>";
        }
    }
    elseif($table=='produit'){
        $id=$_GET['id'];
        $NomPr=$_POST['NomPr'];
        $DescriptionPr=$_POST['DescriptionPr'];
        $PrixPr=$_POST['PrixPr'];
        $StatutPr=$_POST['StatutPr'];
        $StockPr=$_POST['StockPr'];
        $IdCt =$_POST['IdCt'];
        $ImagePr=$_FILES['ImagePr'];
        $NomImage=$_POST['NomImage'];
        move_uploaded_file($ImagePr['tmp_name'],"../inc/img/produits/$NomImage");
        $rslt=mysqli_query($mysqli,"update produit set NomPr='$NomPr',DescriptionPr='$DescriptionPr',PrixPr=$PrixPr,StatutPr=$StatutPr,StockPr=$StockPr,IdCt='$IdCt' where IdPr=$id ");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=produit';</script>";
        }
        else{
            echo "<script>alert('Erreur à la modification! Veuillez réssayer.');document.location.href='gestion.php?table=produit';</script>";
        }
    }
    elseif($table=='commande'){
        $id=$_POST['IdCmd'];
        $DateCmd=$_POST['DateCmd'];
        $prixTT=$_POST['prixTT'];
        $modePaiement=$_POST['modePaiement'];
        $StatutCmd=$_POST['StatutCmd'];
        $NoteCmd=$_POST['NoteCmd'];
        $rslt=mysqli_query($mysqli,"update commande set DateCmd='$DateCmd',prixTT=$prixTT,modePaiement='$modePaiement',StatutCmd='$StatutCmd',NoteCmd='$NoteCmd' where IdCmd='$id'");
        if($rslt){
            if(isset($_POST['envEmail'])){
                    $rslt2=mysqli_query($mysqli,"select * from commande natural join membre where IdCmd='$id'");
                    $row2=mysqli_fetch_assoc($rslt2);
                    $rslt3=mysqli_query($mysqli,"select * from détails_commande natural join produit natural join commande natural join membre where IdCmd='$id'");
                    $header="From: Motorify.com <supportMotorify@test.com>\r\n";
                    $header.="Content-Type: text/html\r\n";
                    $tablePr="<table border='1' cellspacing='0' width='500px'><tr><th>Image</th><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
                    while($row3=mysqli_fetch_assoc($rslt3)){
                    $table.="<tr><td><img src='https://motorify.000webhostapp.com/inc/img/produits/$row3[ImagePr]' height='50px'></td><td>$row3[NomPr]</td><td>$row3[PrixPr]</td><td>$row3[qt]</td></tr>";
                    }
                    $table.="<tr><td colspan='4' align='center'>Total : $row2[prixTT] DH</td></tr></table>";
                    $date= date("d/m/Y H:i:s");
                if($StatutCmd=='Expédiée'){
                    $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'>
                    <fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'>
                        <legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous avons le plaisir de vous informer que votre commande a été expédiée avec succès. Vous trouverez
                        ci-dessous les détails de votre expédition :<br><br> <b>Date d'expédition</b> : $date <br><b>Numéro de suivi</b> : $id <br> <b>Adresse de livraison</b> : $row2[AdresseMb]<br> <b>Articles expédiés</b> : <br>$tablePr <br><br>Veuillez
                        noter que le numéro de suivi vous permettra de suivre l'avancement de votre colis. Si vous avez des questions ou des préoccupations concernant votre expédition, n'hésitez pas à nous contacter. <br>Nous espérons que vous apprécierez vos achats
                        et nous vous remercions de votre confiance.<br><br> Cordialement, <br><br> L'équipe d'expédition</fieldset></body></html>";
                    $subject="Avis d'expédition";
                }
                elseif($StatutCmd=='Annulée'){
                    $message="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'>
                    <fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'>
                        <legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br>
                        Nous vous écrivons pour vous informer que nous avons annulé votre commande numéro $id passée sur notre site web/par téléphone le $DateCmd. Nous sommes désolés pour toute gêne occasionnée.<br><br>
                        Nous avons annulé la commande en raison d'une erreur de stock ou de disponibilité de l'article commandé, ou pour toute autre raison qui a rendu impossible l'exécution de votre commande.<br><br>";
                        if($modePaiement=='Paypal'){
                        $message.=" Nous avons déjà procédé au remboursement de votre paiement, qui devrait apparaître sur votre compte dans les prochains jours.<br><br>";
                        }
                        $message.="Nous sommes désolés de ne pas avoir pu honorer votre commande cette fois-ci, mais nous espérons pouvoir vous servir à l'avenir. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter par email ou par téléphone.<br><br>
                        Cordialement,<br><br>
                        L'équipe de Motorify 
                    </fieldset></body></html>";
                    $subject="Annulation de la commande numéro $id";
                }
                $to=$row2['EmailMb'];
                mail($to,$subject,$message,$header);
            }
            echo "<script>document.location.href='gestion.php?table=commande';</script>";
        }
        else{
            echo "<script>alert('Erreur à la modification! Veuillez réssayer.');document.location.href='gestion.php?table=commande';</script>";
        }
    }
    elseif($table=='RDV'){
        $id=$_GET['id'];
        $TypePrjt=$_POST['TypePrjt'];
        $MessageRDV=$_POST['MessageRDV'];
        $DateRDV=$_POST['DateRDV'];
        $StatutRDV=$_POST['StatutRDV'];
        $rslt=mysqli_query($mysqli,"update rdv set TypePrjt='$TypePrjt', MessageRDV='$MessageRDV', DateRDV='$DateRDV', StatutRDV='$StatutRDV'");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=RDV';</script>";
        }
        else{
            echo "<script>alert('Erreur à la modification! Veuillez réssayer.');document.location.href='gestion.php?table=RDV';</script>";
        }
    }
    }
    elseif($action=='ajouter'){
        if($table=='catégorie'){
        $NomCt=$_POST['NomCt'];
        $rslt=mysqli_query($mysqli,"insert into catégorie (NomCt) values ('$NomCt')");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=catégorie';</script>";
        }
        else{
            echo "<script>alert('Erreur à l'insertion'! Veuillez réssayer.');document.location.href='gestion.php?table=catégorie';</script>";
        }
        }
        elseif($table=='produit'){
        $NomPr=$_POST['NomPr'];
        $DescriptionPr=$_POST['DescriptionPr'];
        $PrixPr=$_POST['PrixPr'];
        $StatutPr=$_POST['StatutPr'];
        $StockPr=$_POST['StockPr'];
        $IdCt =$_POST['IdCt'];
        $ImagePr=$_FILES['ImagePr'];
        $chemin='';
        do{
            $NomImage=random_int(10,1000).".jpg";
            $chemin="../inc/img/produits/$NomImage";
        }while(file_exists($chemin));
        move_uploaded_file($ImagePr['tmp_name'],$chemin);
        $rslt=mysqli_query($mysqli,"insert into produit (NomPr,DescriptionPr,PrixPr,StatutPr,StockPr,IdCt,ImagePr) values ('$NomPr','$DescriptionPr',$PrixPr,$StatutPr,$StockPr,'$IdCt','$NomImage')");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=produit';</script>";
        }
        else{
            echo "<script>alert('Erreur à l'ajout'! Veuillez réssayer.');document.location.href='gestion?php?table=produit';</script>";
        }
    }
    elseif($table=='commande'){
        $IdCmd=$_POST['IdCmd'];
        $IdMb=$_POST['IdMb'];
        $DateCmd=$_POST['DateCmd'];
        $prixTT=$_POST['prixTT'];
        $modePaiement=$_POST['modePaiement'];
        $StatutCmd=$_POST['StatutCmd'];
        $NoteCmd =$_POST['NoteCmd'];
        $rslt=mysqli_query($mysqli,"insert into commande (DateCmd,IdMb,StatutCmd,prixTT,modePaiement,NoteCmd) values ('$DateCmd',$IdMb,'$StatutCmd','$prixTT','$modePaiement','$NoteCmd')");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=commande';</script>";
        }
        else{
            echo "<script>alert('Erreur à l'ajout'! Veuillez réssayer.');document.location.href='gestion?php?table=commande';</script>";
        }
    }
    elseif($table=='RDV'){
        $TypePrjt=$_POST['TypePrjt'];
        $MessageRDV=$_POST['MessageRDV'];
        $DateRDV=$_POST['DateRDV'];
        $StatutRDV=$_POST['StatutRDV'];
        $rslt=mysqli_query($mysqli,"insert into rdv (TypePrjt,MessageRDV,DateDRV,StatutRDV) values ('$TypePrjt','$MessageRDV','$DateDRV','$StatutRDV)'");
        if($rslt){
            echo "<script>document.location.href='gestion.php?table=RDV';</script>";
        }
        else{
            echo "<script>alert('Erreur à l'insertion'! Veuillez réssayer.');document.location.href='gestion.php?table=RDV';</script>";
        }
    }
}
}
?>