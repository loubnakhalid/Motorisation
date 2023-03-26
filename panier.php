<?php include('./inc/haut.inc.php'); ?>
<section id="panier" class="pagePanier"> 
    <div>
    <?php
    if(!isset($_SESSION['panier']['IdPr'])){
        echo "Votre panier est vide ";
    }
    else{
        for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
            $IdPr=$_SESSION['panier']['IdPr'][$i];
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
                        $rslt=mysqli_query($mysqli,"select * from produit where IdPr=$IdPr");
                        $row=mysqli_fetch_assoc($rslt);
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
                                <span class='incrementer' onclick='augmenterQt($i)'>+</span>
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
            <button class='bouttonCmd' onclick='document.location.href=\"finalisationcommande.php\"'>Passer à la caisse</button>
        </div>
        "; 
    }
    ?>
</section>
<script>
        /*let plus = document.getElementsByClassName("incrementer"),
        moins = document.getElementsByClassName("decrementer"),
        quantite_panier = document.getElementsByClassName("btnQte");
        for(let j=0;j<plus.length;j++){
        plus[j].addEventListener("click", () => {
        if (quantite_panier[j].value >= 0) {
            quantite_panier[j].value++;
        }
        document.location.href='controller.php?qtPan=true&pos=<?=$i?>&nbre='+quantite_panier[j].value;
        });
    }
    for(let j=0;j<moins.length;j++){
        moins[j].addEventListener("click", () => {
        if (quantite_panier[j].value > 0) {
            quantite_panier[j].value--;
        }
        document.location.href='controller.php?qtPan=true&pos=<?=$i?>&nbre='+quantite_panier[j].value;
        });
        }*/
        
        </script>
<?php include("./inc/bas.inc.html") ?>