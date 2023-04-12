<?php
try{
    $mysqli = mysqli_connect("localhost", "root", "", "motorisation");
}
catch (Exception | Error $e){
    echo "Erreur à la connexion avec la base de données !";
    die();
}

?>