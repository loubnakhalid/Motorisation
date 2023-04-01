<?php
    include("inc/haut.inc.php");
?>
<section id="profilMb">
   <div class="profil">
      <div class="InfoPers">
        <h3 class="ProfilT1">Mes informations personnelles</h3>
            <div class="identité">
                <div class="TitleProf1">Mon identité</div>
                <input type="text" name="NomMb" value="Boufeljat" class="ProfNm" readonly>
                <input type="text" name="PrénomMb" value="Boufeljat" class="ProfPr" readonly><br>
                <input type="text" name="DateNc" value="2/2I/1992" class="ProfDt" readonly><br><br>
                <span class="lien"><a href="#" class="ContLien">Modifier mes informations</a></span>
            </div>

            <div class="identifiant">
                 <div class="TitleProf1">Mes identifiants</div>
                 <span class="NomInp"><b>Mot de passe :</b></span>
                <input type="password" name="MDPS" value="*******" class="ProfMps" readonly><br>
                <span class="NomInp"><b>Email : </b></span>
                <input type="email" name="EmailMb" value="safaeBoufeljat4loubna@gmail.com" class="ProfEmail" readonly><br><br>
                <span class="lien"><a href="#" class="ContLien">Modifier mes identifiants</a></span>
            </div>

            <div class="Adresses">
                 <div class="TitleProf1">Mes Adresses</div>
                <input type="texte" name="AdresseMb" value="rue nour S9 nà2 Oujda hejeike;allala" class="Profadrs" readonly><br>
                <input type="tel" name="NumTélé" value="0672829272" class="ProfTél" readonly><br>
                <span class="lien"><a href="#" class="ContLien">Modifier mes adresses</a></span>
            </div>

      </div> 
      <div class ="CommandeMb">
      <h3 class="ProfilT2">Mes Commandes</h3>
      <?php
      $id=$_SESSION['membre']['IdMb'];
      $rslt=mysqli_query($mysqli,"select * from commande  natural join membre where IdMb=$id");
      while($row=mysqli_fetch_assoc($rslt)){
        echo"
        <div class='Commande'>
          <span class='IdCMd'>
          <input type='text' name='IdCmd' value='$row[IdCmd]' class='ProfIdCmd' readonly>
          </span>
          <span class='StatutCmd'>
          <input type='text' name='StatutCmd' value='$row[StatutCmd]' class='ProfStCmd' readonly>
          </span>
          <span class='PrixCmd'>
          <input type='text' name='prixTT' value='$row[prixTT] Dhs' class='ProfPrCmd' readonly>
          </span>
          <span class='NoteCmd'>
          <input type='text' name='NoteCmd' value='$row[NoteCmd]' class='ProfNtCmd' readonly>
          </span>
      </div>
      ";
      }
      ?>
   </div>
</section>
<?php 
    include("inc/bas.inc.html");
?>