<?php
$mysqli = new mysqli("localhost", "root", "", "motorisation");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
?>