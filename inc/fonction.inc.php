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
	if(Connecte() && ($_SESSION['membre']['Statut'] == 0)) 
	{
		return true;
	}
	else{
		return false;
	}
}
function Admin()
{ 
	if(Connecte() && ($_SESSION['membre']['Statut'] == 1)) 
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
function dispoPr($id){
	include("connect.inc.php");
	$rslt=mysqli_query($mysqli,"select * from produit where IdPr=$id");
	if(mysqli_num_rows($rslt)>0){
		return true;
	}
	else{
		return false;
	}
}
function nvPrix($id){
	include("connect.inc.php");
	$rslt=mysqli_query($mysqli,"select * from promo_produit natural join promos natural join produit where IdPr=$id");
	$row=mysqli_fetch_assoc($rslt);
	$nvPrix=$row['PrixPr']-(($row['PrixPr']*$row['Taux'])/100);
	return $nvPrix;
}
function verifPromo($IdPr){
	include("connect.inc.php");
	$rslt=mysqli_query($mysqli,"select * from promo_produit natural join promos natural join produit where IdPr=$IdPr");
	$row=mysqli_fetch_assoc($rslt);
	if(mysqli_num_rows($rslt)>0){
		$DateDéb=$row['DateDéb'];
		$DateFin=$row['DateFin'];
		$DateNow=Date("20y-m-d");
		if($DateDéb <= $DateNow && $DateFin >= $DateNow){
		return true;
		}
		else{
			return false;
		}
	}
	else{
		return false;
	}
}
function Taux($IdPr){
	include("connect.inc.php");
	$rslt2=mysqli_query($mysqli,"select * from promos natural join promo_produit where IdPr=$IdPr");
    $row2=mysqli_fetch_assoc($rslt2);
	$taux=$row2['Taux'];
    return $taux;
}
function creationDuPanier()
{
   if (!isset($_SESSION['panier']))
   {
      $_SESSION['panier']=array();
      $_SESSION['panier']['NomPr'] = array();
      $_SESSION['panier']['IdPr'] = array();
	  $_SESSION['panier']['ImagePr'] = array();
      $_SESSION['panier']['qt'] = array();
      $_SESSION['panier']['PrixPr'] = array();
   }
}

function ajouterProduitDansPanier($IdPr,$NomPr,$qt,$PrixPr,$ImagePr)
{
	creationDuPanier(); 
    $posPr = array_search($IdPr,  $_SESSION['panier']['IdPr']); 
    if ($posPr !== false)
    {
         $_SESSION['panier']['qt'][$posPr] += $qt;
    }
    else 
    {
        $_SESSION['panier']['NomPr'][] = $NomPr;
		$_SESSION['panier']['ImagePr'][] =$ImagePr;
        $_SESSION['panier']['IdPr'][] = $IdPr;
        $_SESSION['panier']['qt'][] = $qt;
		if(verifPromo($IdPr)){
			$_SESSION['panier']['PrixPr'][] = nvPrix($IdPr);
		}
		else{
		$_SESSION['panier']['PrixPr'][] = $PrixPr;
		}
    }
}
//------------------------------------
function montantTotal()
{
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++) 
   {
      $total += $_SESSION['panier']['qt'][$i] * $_SESSION['panier']['PrixPr'][$i];
   }
   return round($total,2);
}
//------------------------------------
function retirerproduitDuPanier($id_produit_a_supprimer)
{
	$posPr = array_search($id_produit_a_supprimer,  $_SESSION['panier']['IdPr']);
	if ($posPr !== false)
    {
		array_splice($_SESSION['panier']['NomPr'], $posPr, 1);
		array_splice($_SESSION['panier']['ImagePr'] ,$posPr,1);
		array_splice($_SESSION['panier']['IdPr'], $posPr, 1);
		array_splice($_SESSION['panier']['qt'], $posPr, 1);
		array_splice($_SESSION['panier']['PrixPr'], $posPr, 1);
	}
}
?>