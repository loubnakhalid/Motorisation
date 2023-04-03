<?php
    include("inc/haut.inc.php");
    $id=$_SESSION['membre']['IdMb'];
    $rslt=mysqli_query($mysqli,"select * from  membre where IdMb=$id");
    $row=mysqli_fetch_assoc($rslt);
?>
<section id="Profil">
     <div class="InforPersonnelle">
        <h3 class="ProfTitle">Mes informations personnelles</h3>
         <div class="Identité">
             <div class="SousTitle1">Mon identité</div>
             <div class="identitéInfo">
                 <div class="NomPr">
                    <div class="NomProf"><?=$row['NomMb']?></div>
                    <div class="PrProf"><?=$row['PrénomMb']?></div>
                 </div>
                 <div class="DateModif"><?=$row['DateNc']?></div>
                    <div class="LienProf1"><a href="#">Modifier mon identité</a></div>
                 </div>
             </div>
             <div class="Identifiant2">
             <div class="SousTitle1">Mes identifiants</div>
             <div class="identifiantInfo">
                <div class="MpPrEmPr">
                    <div class="MpsPr"><b>Mot de passe : </b>*********</div>
                    <div class="EmailPr"><b>Email : </b><?=$row['EmailMb']?></div>
                    <div class="LienProf2"><a href="#">Modifier mes identifiants</a></div>
                </div>
                 </div>
             </div>
             <div class="Adresses2">
             <div class="SousTitle1">Contact</div>
             <div class="AdressesInfo">
                <div class="MpPrEmPr">
                    <div class="MpsPr"><?=$row['AdresseMb']?></div>
                    <div class="EmailPr"><?=$row['NumTélé']?></div>
                    <div class="LienProf3"><a href="#">Modifier contact</a></div>
                </div>
                 </div>
             </div>
             <div class="Déconnexion">
                <a class='BtnDéconnexion' href='#'><i class="fa fa-power-off"><span class='SPdeconnexion'>Déconnexion</span></i></a>
            </div>
         </div>
     
     <div class="ProfCommande">
        <h3 class="ProfTitle">Mes commandes</h3>
        <div class="Commande">
          <span class="IdCMd">
          <input type="text" name="IdCmd" value="1" class="ProfIdCmd" readonly>
          </span>
          <span class="StatutCmd">
          <input type="text" name="StatutCmd" value="en cours" class="ProfStCmd" readonly>
          </span>
          <span class="PrixCmd">
          <input type="text" name="prixTT" value="152820 DH" class="ProfPrCmd" readonly>
          </span>
          <span class="NoteCmd">
          <input type="text" name="NoteCmd" value="je sui safea ehej" class="ProfNtCmd" readonly>
          </span>
      </div>
      <!--<div class="cmdVide">Commande vide</div>-->
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

    lien.addEventListener('click', function() {
        identitéDiv.innerHTML = '<div class="NomPr"><fieldset><legend class="legendInput">Nom</legend><input type="text" name="NomMb" class="InputNmPr"></fieldset><fieldset><legend class="legendInput">Prénom</legend><input type="text" name="PrénomMb" class="InputPrenPr"></fieldset></div><div class="DateNsModif"><h4>Date de naissance</h4><div class="InputDtMdf"><div><fieldset><legend class="legendInput">Jour</legend><input type="number" name="DateJr" class="InputNmPr"></fieldset></div><div><fieldset><legend class="legendInput">Mois</legend><input type="number" name="DateMs" class="InputNmPr"></fieldset></div><div><fieldset><legend class="legendInput">Année</legend><input type="number" name="DateAnn" class="InputNmPr"></fieldset></div></div><div class="btnMf"><input type="submit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler"></div></div>';
        identité.style.height="245px";
    });

    lien2.addEventListener('click', function(){
        identifiantDiv.innerHTML='<fieldset class="identifiantModif"><legend class="legendInput">Email</legend><input type="text" name="EmailMb" class="InputEmPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Mot de passe actuel</legend><input type="text" name="PrénomMb" class="InputMpsPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput"> Nouveau Mot de passe </legend><input type="text" name="PrénomMb" class="InputNvMpsPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Confirmer le nouveau Mot de passe </legend><input type="text" name="PrénomMb" class="InputCnNVMpsPr"></fieldset><div class="btnMf"><input type="submit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler"></div>';
        identifiant.style.height='355px';
    }); 

    lien3.addEventListener('click', function(){
        adressesDiv.innerHTML='<fieldset class="identifiantModif"><legend class="legendInput">Téléphone</legend><input type="tel" name="NumTélé" class="InputTélPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Ville</legend><input type="tel" name="Ville" class="InputVillePr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Code postal</legend><input type="tel" name="CP" class="InputCPPr"></fieldset><fieldset class="identifiantModif"><legend class="legendInput">Adresse</legend><input type="tel" name="AdresseMb" class="InputAdrsPr"></fieldset><div class="btnMf"><input type="submit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler"></div>';
        adresses.style.height='355px';
    });

</script>
<?php 
    include("inc/bas.inc.html");
?>