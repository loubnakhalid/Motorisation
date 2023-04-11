<?php
//--------- BDD
include("connect.inc.php");
//--------- SESSION
session_start();
//--------- AUTRES INCLUSIONS
include("fonction.inc.php");
?>
<?php
$url = $_SERVER['REQUEST_URI'];
// on affiche l'URL de la page courante
if(isset($_SERVER['HTTP_REFERER'])){
    $lienPr= $_SERVER['HTTP_REFERER'];
}
?>
