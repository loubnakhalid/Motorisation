<?php include("./inc/init.inc.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./inc/css/FinalisationCommande.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=ASPxcd5frMaueHLGEQxTi2BO9tpV77s51-fKg1XduObyJyLXB4VrlZ0j0CprL9tb0CHg43b2GZW1Jpab&currency=USD"></script>
    <script>
        paypal.Buttons({
            
            //sets up the transaction when a payment button is clicked 
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?=montantTotal();?>' //can also reference
                        }
                    }]
                });

            },
            //Finalize the transaction after payer approval 
            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData) {
                    //Successful capturel for dev/demo purposes:
                    console.log("Capture result", orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];
                    alert("Transaction ${transaction.status}: ${transaction.id} ");

                });
            }
        }).render("#paypal-button-container");
        //affiche boutton paypal
        /*const btnPaypal = document.getElementById("paypal");
        const AffichPaypal=document.querySelector(".btn-Paypal");
        btnPaypal.addEventListener("click", () => {
            AffichPaypal.style.display="block";
        })*/
        function AffichePaypal()
        {
            let AffichePaypal =document.getElementById("paypal-button-container");
            AffichePaypal.style.display="block";
            let Form=document.getElementById("FinirCommande");
            Form.style.height="650px";
            let FormFooter=document.getElementById("Fin");
            FormFooter.style.marginTop="0px";
        }
        function MasquePaypal()
        {
            let AffichePaypal =document.getElementById("paypal-button-container");
            AffichePaypal.style.display="none";
            let Form=document.getElementById("FinirCommande");
            Form.style.height="550px";
            let FormFooter=document.getElementById("Fin");
            FormFooter.style.marginTop="29px";
        }
    </script>
</head>

<body>
    <form action="controller.php" method="post">
        <div class="container" id="FinirCommande">
            <div class="container-header">
                <div class="title">Finalisation de la commande</div>
                <button class="close-boutton">&times;</button>
            </div>
            <?php
            $id=$_SESSION['membre']['IdMb'];
            $rslt=mysqli_query($mysqli,"select * from membre where IdMb=$id");
            $row=mysqli_fetch_assoc($rslt);
            ?>
            <div class="container-body">
                <div class="title-sec1">Contact :</div>
                <div class="input-perso">
                    <label>Nom :<input type="text" name="NomMb" value="<?=$row['NomMb'];?>" class="nom-input"></label>
                    <span class="prénom"><label>Prénom :<input type="text" name="PrénomMb" value="<?=$row['PrénomMb'];?>"  class="prénom-input"></label><br></span>
                    <span class="tele"><label>Télé :<input type="tel" name="NumTélé" value="<?=$row['NumTélé'];?>"  class="tele-input"></label></span>
                </div>
                <div class="title-sec2">Adresse :</div>
                <div class="input-adrs">
                    <label><input type="text" name="AdresseMb" value="<?=$row['AdresseMb'];?>" class="adresse-input"></label>
                </div>
                <div class="title-sec3">Mode de paiement :</div>
                <div class="input-paim">
                    <span class="qst">Quel moyen de paiement voulez-vous utiliser?</span><br>
                    <input type="radio" name="modePaiement" value="Paypal" id="paypal" class="paiement-input" onclick="AffichePaypal()">
                    <label for="paypal">Paiement avec Paypal </label><br>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container" class="btn-Paypal"></div>
                    <input type="radio" name="modePaiement" value="Cash" id="espece" class="paiement-input" onclick="MasquePaypal()">
                    <label for="espece">Paiement cash à la livraison </label></label>
                </div>
            </div>
            <div class="container-footer">
                <div class="input-fin" id="Fin">
                    <input type="submit" value="Confirmer" name="Finaliser" class="input-Conf">
                    <input type="reset" value="Annuler" name="Annuler" class="input-Annul">
                   </div>
                </div>
            </div>
            <div class="active" id="overlay"></div>
    </form>
</body>

</html>