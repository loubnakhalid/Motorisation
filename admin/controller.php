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
        
    }
}
if(isset($_GET['table']) && isset($_GET['action']) && $_GET['action']=='modifier' ){
    $table=$_GET['table'];
    $id=$_GET['id'];
    $NomCt=$_POST['NomCt'];
    $rqt="update $table set NomCt=$NomCt where IdCt = $id";
    $rslt=mysqli_query($mysqli,$rqt);
    if($rslt){
        echo "<script> alert ('Vous avez supprimé la ligne avec succés.'); document.location.href='gestion.php?table=$table' ; </script>";
    }
    else{
        echo "<script> alert ('Erreur à la suppression de la base de données !.'); document.location.href='gestion.php?table=$table' ; </script>";
    }
}
?>