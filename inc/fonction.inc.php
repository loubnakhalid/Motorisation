<?php
function Connecte()
{  
	if(!isset($_SESSION['client'])) 
	{
		return false;
	}
	else
	{
		return true;
	}
}
function Client(){
	if(Connecte() && $_SESSION['client']['Statut'] == 0) 
	{
			return true;
	}
	return false;
}
function Admin()
{ 
	if(Connecte() && $_SESSION['client']['Statut'] == 1) 
	{
			return true;
	}
	return false;
}
?>