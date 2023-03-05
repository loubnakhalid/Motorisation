<?php include("../inc/init.inc.php"); ?>
<?php
if(isset($_GET['table']) && isset($_GET['action'])){
    if($_GET['action']=='supprimer' ){
        $table=$_GET['table'];
        $id=$_GET['id'];
        $nomId=$_GET['nomId'];
        if($_GET['table']=='catégorie'){
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
                    echo "<script>document.location.href='' ; </script>";
                }
                else{
                    echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
                }
        }
        $rslt=mysqli_query($mysqli,$rqt);
        if($rslt){
            header("location:gestion.php?table=$table");
            echo "<script>document.location.href='' ; </script>";
        }
        else{
            echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
        }
    }
    elseif($_GET['action']=='modifier'){
    if($_GET['table']=='produit'){
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
            echo "<script>alert('Erreur à la modification! Veuillez réssayer.');document.location.href='gestion?php?table=produit';</script>";
        }
    }
    }
    elseif($_GET['action']=='ajouter'){
        if($_GET['table']=='produit'){
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
}
}
?>