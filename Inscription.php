<?php include('./inc/haut.inc.php'); ?>
    <section id="inscription">
       <div class="form">
        <h3>Créer un compte </h3>
        <form name="frm" action="controller.php" method="post">
                <input type="text" name="NomMb" placeholder="Votre nom" required class="nom">
                <input type="text" name="PrénomMb" placeholder="Votre prenom" required class="prenom">
                <input type="tel" name="NumTélé" placeholder="Votre numéro de téléphone" required class="tele">
                <input type="date" name="DateNC" placeholder="Votre date de naissance" required class="date">
                <input type="text" name="Ville" placeholder="Votre ville" required class="ville">
                <input type="text" name="CP" placeholder="code postal" required class="cp">
                <input type="text" name="AdresseMb" placeholder="Votre adresse" required class="adresse">
                <input type="email" name="EmailMb" placeholder="Votre email" required class="email">
                <input type="password" name="MDPS" placeholder="mot de passe" required class="mtdps">
                <input type="password" name="confirmMdps" placeholder="Confirmer mot de passe" required class="confmdtps">
                <div class="boutton"><button class="boutton_submit" onclick="document.frm.submit()">S'inscrire</button></div>
        </form>
       </div>
    </section>
<?php include("./inc/bas.inc.html"); ?>