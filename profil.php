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
        echo "<div class='cmdVide'>Commande vide</div>";
     }
     ?>
    </div>
</section>
<?php 
    include("inc/bas.inc.html");
?>