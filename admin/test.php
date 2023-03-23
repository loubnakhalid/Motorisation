<?php include("../inc/init.inc.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="controller.php?table=détails_commande&action=ajouterCmd" method="post">
        <input name="IdCmd" value="4"><br>
        <?php
        $rslt=mysqli_query($mysqli,"select * from commande natural join membre");
        while($row=mysqli_fetch_assoc($rslt)){
            if($row['StatutCmd']=='En cours'){
                echo "<input type='checkbox' name='IdCmdAjt[]' value='$row[IdCmd]'> $row[IdCmd] $row[NomMb] $row[PrénomMb]<br>";
            }
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</body>
</html>