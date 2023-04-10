<?php include('./inc/haut.inc.php'); ?>
<?php
if(! Client() && ! Admin()){
    echo "<script>document.location.href='identification.php?action=connexion';</script>";
}
?>
    <?php
    if(empty($_SESSION['panier']['IdPr'])){
    echo "
    <section id='panierVide' class='pagePanier'>
        <div>
            <div class='div_panier_vide'>
                <div class='panier_vide'>
                    <lord-icon src='https://cdn.lordicon.com/slkvcfos.json' trigger='hover' colors='primary:#1663c7,secondary:#ff840a' style='width:150px;height:150px'></lord-icon>
                    <h1 class='text_panier_vide'>
                        <strong class='bold'>Votre panier </strong>est actuellement <strong class='bold'>vide</strong>
                    </h1>
                    <a href='index.php' >Commencer mes achats</a>
                </div>
            </div>
        </div>
    </section>";
    }
    else{
        echo "
        <section id='panier' class='pagePanier'> 
        <div>";
        for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
            $IdPr=$_SESSION['panier']['IdPr'][$i];
            $rslt=mysqli_query($mysqli,"select * from produit where IdPr=$IdPr");
            $row=mysqli_fetch_assoc($rslt);
            $StockPr=$row['StockPr'];
            echo "
            <div id='Produits'>
                <table>
                    <tr>
                        <td rowspan='2' class='ImagePr'>
                            <img  src='./inc/img/produits/".$_SESSION['panier']['ImagePr'][$i]."' alt=''>
                        </td>
                        <td class='NomPR' >".$_SESSION['panier']['NomPr'][$i]."</td>
            ";
                    if(verifPromo($IdPr)){
                        echo"
                        <td class='prixPanier'>".$_SESSION['panier']['PrixPr'][$i]." DH <br>
                           <span class='promo'>".$row['PrixPr']." DH</span>
                           <span class='prcntg'>-".Taux($IdPr)."%</span>
                        </td>
                        ";
                    }
                    else{
                        echo"
                        <td class='prixPanier'>".$_SESSION['panier']['PrixPr'][$i]." DH <br></td>
                        ";
                    }
            echo"
                    </tr>
                    <tr>
                       <td></td>
                    </tr>   
                    <tr>
                        <td>
                            <a class='lienSup'href='#'><i class='fa fa-trash' id='btnSup' onclick='document.location.href=\"controller.php?supPan=true&id=".$_SESSION['panier']['IdPr'][$i]."\"'><span class='Supprimer'>Supprimer</span></i></a>
                        </td>
                        <td colspan='2' class='qte'>
                            <div class='wrapper'>
                                <span class='decrementer' onclick='diminuerQt($i)'>-</span>
                                <span class='num'> <input type='text' name='quantite' class='btnQte' value=".$_SESSION['panier']['qt'][$i]."  readonly ></span>
                                <span class='incrementer' onclick='augmenterQt($i,$StockPr)'>+</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        ";
        ?>
        <?php
        }
        $total=montantTotal();
        echo"
        </div>
        <div id='Total'>
            <h3>RÉSUMÉ DU PANIER</h3>
                <table>
                    <tr>
                        <td>sous-Total</td>
                        <td>$total DH</td>
                    </tr>
                    <tr>
                        <td>Expédition</td>
                        <td>Gratuite</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>$total DH</strong></td>
                    </tr>
                </table>
            <button class='bouttonCmd' onclick=\"afficherFinalisation()\">Passer à la caisse</button>
        </div>
        </div>
        </section>
        "; 
    }
    ?>

<div class="container" id="FinirCommande" style="display:none">
    <div class="container-header">
        <div class="title">Finalisation de la commande</div>
        <button class="close-boutton" onclick="masquerFinalisation()">&times;</button>
    </div>
    <form action="controller.php" method="post" onsubmit="return VérifCmd()">
            <?php
            $id=$_SESSION['membre']['IdMb'];
            $rslt=mysqli_query($mysqli,"select * from membre where IdMb=$id");
            $row=mysqli_fetch_assoc($rslt);
            ?>
            <div class="container-body">
                <div class="title-sec1">Contact :</div>
                <div class="input-perso">
                    <div class='CmdNmP'>
                        <div>
                            <label>Nom :<input type="text" name="NomMb" value="<?=$row['NomMb'];?>" class="nom-input"></label><br>
                            <span class='ErCmdNom'></span>
                        </div>
                        <div>
                           <label>Prénom :<input type="text" name="PrénomMb" value="<?=$row['PrénomMb'];?>"  class="prénom-input"></label><br>
                           <span class='ErCmdPrénom'></span>
                        </div>
                    </div>
                    <div class='CmdET'>
                        <div>
                            <label>Email :<input type="text" name="EmailMb" value="<?=$row['EmailMb'];?>"  class="Eml-input"></label><br>
                            <span class='ErCmdEml'></span>
                        </div>
                        <div>
                           <label> Téléphone :<input type="tel" name="NumTélé" value="<?=$row['NumTélé'];?>"  class="tele-input"></label><br>
                           <span class='ErCmdTél'></span>
                        </div>
                    </div>
                    <div class="adresse">
                        <label>Adresse :<input type="text" name="AdresseMb" value="<?=$row['AdresseMb'];?>"  class="adresse-input"></label><br>
                        <span class='ErCmdAds'></span>
                    </div>
                </div>
                <div class="title-sec3">Mode de paiement :</div>
                <div class="input-paim">
                    <span class="qst">Quel moyen de paiement voulez-vous utiliser?</span><br>
                    <input type="radio" name="modePaiement" value="Paypal" id="paypal" class="paiement-input" onclick="AffichePaypal()">
                    <label for="paypal">Paiement avec Paypal </label><br>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container" class="btn-Paypal"></div>
                    <input type="radio" name="modePaiement" value="Espèces" id="espece" class="paiement-input" onclick="MasquePaypal()">
                    <label for="espece">Paiement cash à la livraison </label></label><br>
                    <span class='ErCmdPai'></span>
                </div>
            </div>
            <div class="container-footer">
            <span class='InfoCmdPai' ></span><br>
                <div class="input-fin" id="Fin">
                    <input type="submit" value="Confirmer" name="Finaliser" id="inptConfirm" class="input-Conf">
                    <input type="reset" value="Annuler" name="Annuler" class="input-Annul">
                   </div>
                </div>
                </form>
    </div>
    <div class="" id="overlay"></div>
<script>
paypal.Buttons({
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?=montantTotal();?>'
                }
            }]
        });
    },
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            console.log("Capture result", orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            swal({
                title: 'Paiement avec succès',
                text: '',
                icon: 'success',
                button: 'Ok',
            });
            MasquePaypal();
        });
    }
}).render("#paypal-button-container");
</script>
<?php include("./inc/bas.inc.html") ?>