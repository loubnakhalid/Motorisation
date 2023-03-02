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
?>