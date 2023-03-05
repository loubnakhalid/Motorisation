<?php
function Connecte()
{  
	if(!isset($_SESSION['membre'])) 
	{
		return false;
	}
	else
	{
		return true;
	}
}
function Client(){
	if(Connecte() && $_SESSION['membre']['Statut'] == 0) 
	{
			return true;
	}
	else{
		return false;
	}
}
function Admin()
{ 
	if(Connecte() && $_SESSION['membre']['Statut'] == 1) 
	{
			return true;
	}
	else{
		return false;
	}
	
}
function addZero($nbre){
if ($nbre<10){
	return "0".$nbre;
}
else{
	return $nbre;
}
}
function seconds($seconds){
	$getHours = floor($seconds / 3600);
	$getMins = floor(($seconds - ($getHours*3600)) / 60);
	$getSecs = floor($seconds % 60);
	return addZero($getHours).':'.addZero($getMins).':'.addZero($getSecs);
}
?>