<?php
header("Cache-Control: no-store, no-cache,must-revalidate");
//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "motorisation");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

//--------- VARIABLES
$contenu = '';
 
//--------- AUTRES INCLUSIONS
require_once("fonction.inc.php");
?>
<?php
// protocole utilisé : http ou https ?
$url='';
// hôte (nom de domaine voire adresse IP)
//$url .= $_SERVER['HTTP_HOST'];
// emplacement de la ressource (nom de la page affichée). Utiliser $_SERVER['PHP_SELF'] si vous ne voulez pas afficher les paramètres de la requête
$url .= $_SERVER['REQUEST_URI'];
// on affiche l'URL de la page courante

?>
