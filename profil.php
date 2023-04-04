<?php
    include("inc/haut.inc.php");
    if(!Client() && !Admin()){
        echo "<script>document.location.href='identification.php?action=connexion';</script>";
    }
    $id=$_SESSION['membre']['IdMb'];
    $rslt=mysqli_query($mysqli,"select * from  membre where IdMb=$id");
    $row=mysqli_fetch_assoc($rslt);
    $NomMb=$row['NomMb'];
    $PrénomMb=$row['PrénomMb'];
    $DateNc=explode('-',$row['DateNc']);
    $DateAnn=$DateNc[0];
    $DateMs=$DateNc[1];
    $DateJr=$DateNc[2];
    $EmailMb=$row['EmailMb'];
    $AdresseMb=$row['AdresseMb'];
    $NumTélé=$row['NumTélé'];
    $CP=$row['CP'];
    $Ville=$row['Ville'];
?>
<section id="Profil">
     <div class="InforPersonnelle">
        <h3 class="ProfTitle">Mes informations personnelles</h3>
         <div class="Identité">
             <div class="SousTitle1">Mon identité</div>
             <div class="identitéInfo">
                 <div class="NomPr">
                    <div class="NomProf"><?=$NomMb?></div>
                    <div class="PrProf"><?=$PrénomMb?></div>
                 </div>
                 <div class="DateModif"><?=$DateAnn.'-'.$DateMs.'-'.$DateJr;?></div>
                    <div class="LienProf1"><a href="#">Modifier mon identité</a></div>
                 </div>
             </div>
             <div class="Identifiant2">
             <div class="SousTitle1">Mes identifiants</div>
             <div class="identifiantInfo">
                <div class="MpPrEmPr">
                    <div class="MpsPr"><b>Mot de passe : </b>*********</div>
                    <div class="EmailPr"><b>Email : </b><?=$EmailMb?></div>
                    <div class="LienProf2"><a href="#">Modifier mes identifiants</a></div>
                </div>
                 </div>
             </div>
             <div class="Adresses2">
             <div class="SousTitle1">Contact</div>
             <div class="AdressesInfo">
                <div class="MpPrEmPr">
                    <div class="AdrsVille">
                        <div class="MpsPr"><b>Adresse : </b><?=$row['AdresseMb']?></div>
                        <div class="EmailPr"><b>Code postal : </b><?=$row['CP']?></div>
                    </div>
                    <div class="TelCP">
                        <div class="EmailPr"><b>Téléphone : </b><?=$row['NumTélé']?></div>
                        <div class="MpsPr"><b>Ville : </b><?=$row['Ville']?></div>
                    </div>
                    <div class="LienProf3"><a href="#">Modifier contact</a></div>
                </div>
                 </div>
             </div>
             <div class="Déconnexion">
                <a class='BtnDéconnexion' href='controller.php?action=déconnexion'><i class="fa fa-power-off"><span class='SPdeconnexion'>Déconnexion</span></i></a>
            </div>
         </div>
         <div class='ProfCommande'>
        <h3 class='ProfTitle'>Mes commandes</h3>
     <?php
     $IdMb=$_SESSION['membre']['IdMb'];
     $rslt=mysqli_query($mysqli,"select * from commande where IdMb=$IdMb");
     if(mysqli_num_rows($rslt) >0){
        while($row=mysqli_fetch_assoc($rslt)){
            echo "
            <div class='Commande'>
              <div class='ProfIdCmd'>$row[IdCmd]</div>
              <div class='InfoCmd'>
                   <div class='ProfStCmd'>$row[StatutCmd]</div>
                   <div class='ProfPrCmd'>$row[prixTT] DH</div>
                   <div class='ProfNtCmd'>$row[modePaiement]</div>
              </div>
          </div>
            ";
         }
     }
     else{
        echo "<div class='cmdVide'>Commande vide</div>";
     }
     ?>
    </div>
</section>
<script>
    identité=document.querySelector('.Identité');
    lien = document.querySelector('.LienProf1');
    identitéDiv=document.querySelector('.identitéInfo');

    identifiant=document.querySelector('.Identifiant2');
    lien2 = document.querySelector('.LienProf2');
    identifiantDiv=document.querySelector('.identifiantInfo');

    adresses=document.querySelector('.Adresses2');
    lien3 = document.querySelector('.LienProf3');
    adressesDiv=document.querySelector('.AdressesInfo');

    function AnnulerIdentité()
    {
       identitéDiv.innerHTML='<div class="NomPr"><div class="NomProf"><b>Nom : </b><?=$NomMb?></div><div class="PrProf"><b>Prénom : </b><?=$PrénomMb?></div></div><div class="DateModif"><b>Date de naissance : </b><?=$DateAnn.'-'.$DateMs.'-'.$DateJr?></div><div class="LienProf1"><a href="#">Modifier mon identité</a></div>';
       identité.style.height="140px";
    }
    function AnnulerIdentifiant()
    {
       identifiantDiv.innerHTML='<div class="MpPrEmPr"><div class="MpsPr"><b>Mot de passe : </b>*********</div><div class="EmailPr"><b>Email : </b><?=$EmailMb?></div><div class="LienProf2"><a href="#">Modifier mes identifiants</a></div></div>';
       identifiant.style.height="140px";
    }
    function AnnulerContact()
    {
        adressesDiv.innerHTML='<div class="MpPrEmPr"><div class="AdrsVille"><div class="MpsPr"><b>Adresse : </b><?=$AdresseMb?></div><div class="MpsPr"><b>Ville : </b><?=$Ville?></div></div><div class="TelCP"><div class="EmailPr"><b>Téléphone : </b><?=$NumTélé?></div><div class="EmailPr"><b>Code postal : </b><?=$CP?></div></div><div class="LienProf3"><a href="#">Modifier contact</a></div></div>';
       adresses.style.height="140px";
    }

    lien.addEventListener('click', function() {
        identitéDiv.innerHTML = '<form action="controller.php" method="post"><div class="NomPr"><fieldset><legend class="legendInput">Nom</legend><input type="text" name="NomMb" value="<?=$NomMb?>" class="InputNmPr"></fieldset><fieldset><legend class="legendInput">Prénom</legend><input type="text" value="<?=$PrénomMb?>" name="PrénomMb" class="InputPrenPr"></fieldset></div><div class="DateNsModif"><h4>Date de naissance</h4><div class="InputDtMdf"><div><fieldset><legend class="legendInput">Jour</legend><input type="number" name="DateJr" value="<?=$DateJr?>" class="InputNmPr"></fieldset></div><div><fieldset><legend class="legendInput">Mois</legend><input type="number" value="<?=$DateMs?>" name="DateMs" class="InputNmPr"></fieldset></div><div><fieldset><legend class="legendInput">Année</legend><input type="number" value="<?=$DateAnn?>" name="DateAnn" class="InputNmPr"></fieldset></div></div><div class="btnMf"><input type="submit" name="modifIdentit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerIdentité()"></div></div></form>';
        identité.style.height="245px";
    });

    lien2.addEventListener('click', function(){
        identifiantDiv.innerHTML='<form action="controller.php" method="post"><fieldset class="identifiantModif"><legend class="legendInput">Email</legend><input type="text" value="<?=$EmailMb?>" name="EmailMb" class="InputEmPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Mot de passe actuel</legend><input type="text" name="MDPS" class="InputMpsPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput"> Nouveau Mot de passe </legend><input type="text" name="nvMDPS" class="InputNvMpsPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Confirmer le nouveau Mot de passe </legend><input type="text" name="confNvMDPS" class="InputCnNVMpsPr"></fieldset><div class="btnMf"><input type="submit" name="modifIdentif" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerIdentifiant()"></div></form>';
        identifiant.style.height='355px';
    }); 

    lien3.addEventListener('click', function(){
        adressesDiv.innerHTML='<form action="controller.php" method="post"><fieldset class="identifiantModif"><legend class="legendInput">Téléphone</legend><input type="tel" value="<?=$NumTélé?>" name="NumTélé" class="InputTélPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Ville</legend><input type="tel" value="<?=$Ville?>" name="Ville" class="InputVillePr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Code postal</legend><input type="tel" value="<?=$CP?>" name="CP" class="InputCPPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Adresse</legend><input type="tel" value="<?=$AdresseMb?>" name="AdresseMb" class="InputAdrsPr"></fieldset><div class="btnMf"><input type="submit" name="modifContact" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerContact()"></div>';
        adresses.style.height='355px';
    });

</script>
<?php 
    include("inc/bas.inc.html");
?>