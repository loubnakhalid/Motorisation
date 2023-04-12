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
                    <div class="NomProf"><b>Nom et Prénom :  &nbsp;&nbsp;&nbsp;</b><?=$NomMb.' '.$PrénomMb?></div>
                 </div>
                 <div class="DateModif"><b>Date de naissance : &nbsp;&nbsp;&nbsp;</b><?=$DateAnn.'-'.$DateMs.'-'.$DateJr;?></div>
                    <div class="LienProf1" onclick="afficherIdentité()"><a>Modifier mon identité</a></div>
                 </div>
             </div>
             <div class="Identifiant2">
             <div class="SousTitle1">Mes identifiants</div>
             <div class="identifiantInfo">
                <div class="MpPrEmPr">
                    <div class="MpsPr"><b>Mot de passe : </b>***</div>
                    <div class="EmailPr"><b>Email : </b><?=$EmailMb?></div>
                    <div class="LienProf2" onclick="afficherIdentif()"><a>Modifier mes identifiants</a></div>
                </div>
                 </div>
             </div>
             <div class="Adresses2">
             <div class="SousTitle1">Contact</div>
             <div class="AdressesInfo">
                <div class="MpPrEmPr">
                        <div class="AdsPr"><b>Adresse : </b><?=$row['AdresseMb']?></div>
                        <div class="CPPr"><b>Code postal : </b><?=$row['CP']?></div>
                        <div class="TélePr"><b>Téléphone : </b><?=$row['NumTélé']?></div>
                        <div class="VlPr"><b>Ville : </b><?=$row['Ville']?></div>
                    <div class="LienProf3" onclick="afficherContact()"><a>Modifier contact</a></div>
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
        echo "<div class='cmdVide'>Pas de Commandes effectuées</div>";
     }
     ?>
    </div>
</section>
<script>
    function AnnulerIdentité() {
    identitéDiv.innerHTML = '<div class="identitéInfo"><div class="NomPr"><div class="NomProf"><b>Nom et Prénom :  &nbsp;&nbsp;&nbsp;</b><?=$NomMb.''.$PrénomMb?></div></div><div class="DateModif"><b>Date de naissance : &nbsp;&nbsp;&nbsp;</b><?=$DateAnn.' - '.$DateMs.' - '.$DateJr;?></div><div class="LienProf1" onclick="afficherIdentité()"><a>Modifier mon identité</a></div></div>';
    identité.style.height = "140px";
}

function AnnulerIdentifiant() {
    identifiantDiv.innerHTML = '<div class="MpPrEmPr"><div class="MpsPr"><b>Mot de passe : </b>***</div><div class="EmailPr"><b>Email : </b><?=$EmailMb?></div><div class="LienProf2" onclick="afficherIdentif()"><a>Modifier mes identifiants</a></div></div>';
    identifiant.style.height = "140px";
}

function AnnulerContact() {
    adressesDiv.innerHTML = '<div class="AdressesInfo"><div class="MpPrEmPr"><div class="AdsPr"><b>Adresse : </b><?=$AdresseMb?></div><div class="CPPr"><b>Code postal : </b><?=$CP?></div><div class="TélePr"><b>Téléphone : </b><?=$NumTélé?></div><div class="VlPr"><b>Ville : </b><?=$Ville?></div><div class="LienProf3" onclick="afficherContact()"><a>Modifier contact</a></div></div></div>';
    adresses.style.height = "200px";
}

function afficherIdentité() {
    identité = document.querySelector('.Identité');
    identitéDiv = document.querySelector('.identitéInfo');
    identitéDiv.innerHTML = '<form action="controller.php" method="post" onsubmit="return VérifIdentité()"><div class="NomPr"><div><input type="text" name="NomMb" value="<?=$NomMb?>" class="InputNmPr" placeholder="Nom"><br><span class="ErPrNm"></span></div><div><input type="text" value="<?=$PrénomMb?>" name="PrénomMb" class="InputPrenPr" placeholder="Prénom"><br><span class="ErPrpr"></span></div></div><div class="DateNsModif"><h4>Date de naissance</h4><div class="InputDtMdf"><div><input type="number" name="DateJr" value="<?=$DateJr?>" class="InputDtJr" placeholder="Jours"></div><div><input type="number" value="<?=$DateMs?>" name="DateMs" class="InputDtMs" placeholder="Mois"></div><div><input type="number" value="<?=$DateAnn?>" name="DateAnn" class="InputDtAns" placeholder="Année"></div></div><span class="ErPrDT"></span><div class="btnMf"><input type="submit" name="modifIdentit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerIdentité()"></div></div></form>';
    identité.style.height = "275px";
}

function afficherIdentif() {
    identifiant = document.querySelector('.Identifiant2');
    identifiantDiv = document.querySelector('.identifiantInfo');
    identifiantDiv.innerHTML = '<form action="controller.php" method="post" onsubmit="return VérifIdentifiant()"><input type="text" value="<?=$EmailMb?>" name="EmailMb" class="InputEmPr" placeholder="Email"><br><span class=ErPrIdentif1></span><br><input type="password" name="MDPS" class="InputMpsPr" placeholder="Mot de passe actuel"><br><span class=ErPrIdentif2></span><br><input type="password" name="nvMDPS" class="InputNvMpsPr" placeholder="Nouveau Mot de passe"><br><span class=ErPrIdentif3></span><bR><input type="password" name="confNvMDPS" class="InputCnNVMpsPr" placeholder="Confirmer le nouveau Mot de passe"><br><span class=ErPrIdentif4></span><div class="btnMf"><input type="submit" name="modifIdentif" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerIdentifiant()"></div></form>';
    identifiant.style.height = '389px';
}

function afficherContact() {
    adresses = document.querySelector('.Adresses2');
    adressesDiv = document.querySelector('.AdressesInfo');
    adressesDiv.innerHTML = '<form action="controller.php" method="post" onsubmit="return  VérifContact()"><input type="tel" value="<?=$NumTélé?>" name="NumTélé" class="InputTélPr" placeholder="Téléphone"><br><span class="ErContactTel"></span><br><input type="text" value="<?=$Ville?>" name="Ville" class="InputVillePr" placeholder="Ville"><br><span class="ErContactVille"></span><br><input type="number" value="<?=$CP?>" name="CP" class="InputCPPr" placeholder="Code postal"><br><span class="ErContactCP"></span><br><input type="text" value="<?=$AdresseMb?>" name="AdresseMb" class="InputAdrsPr" placeholder="Adresse"><br><span class="ErContactAds"></span><div class="btnMf"><input type="submit" name="modifContact" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerContact()"></div></form>';
    adresses.style.height = '394px';
}
</script>
<?php 
    include("inc/bas.inc.html");
?>