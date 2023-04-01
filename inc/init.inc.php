<?php
//--------- BDD
include("connect.inc.php");
//--------- SESSION
session_start();
//--------- AUTRES INCLUSIONS
include("fonction.inc.php");
?>
<?php
// protocole utilisé : http ou https ?
$url='';
// hôte (nom de domaine voire adresse IP)
//$url .= $_SERVER['HTTP_HOST'];
// emplacement de la ressource (nom de la page affichée). Utiliser $_SERVER['PHP_SELF'] si vous ne voulez pas afficher les paramètres de la requête
$url .= $_SERVER['REQUEST_URI'];
// on affiche l'URL de la page courante
if(isset($_SERVER['HTTP_REFERER'])){
    $lienPr= $_SERVER['HTTP_REFERER'];
}
?>
