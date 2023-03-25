<?php include('./inc/haut.inc.php'); ?>
<section id="panier" class="pagePanier"> 
    <div>
    <?php
    if(!isset($_SESSION['panier']['IdPr'])){
        echo "Votre panier est vide ";
    }
    else{
        for($i = 0; $i < count($_SESSION['panier']['IdPr']); $i++){
            echo "
            <div id='Produits'>
                <table>
                    <tr>
                        <td rowspan='2' class='ImagePr'>
                            <img  src='./inc/img/produits/".$_SESSION['panier']['ImagePr'][$i]."' alt=''>
                        </td>
                        <td class='NomPR' >".$_SESSION['panier']['NomPr'][$i]."</td>
                        <td class='prixPanier'>".$_SESSION['panier']['PrixPr'][$i]." DH <br>
                           <span class='promo'>1005DH</span>
                           <span class='prcntg'>-30%</span>
                        </td>
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
                                <span class='incrementer'>-</span>
                                <span class='num'> <input type='text' name='quantite' value=".$_SESSION['panier']['qt'][$i]."  readonly class='btnQte'></span>
                                <span class='decrementer'>+</span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        ";
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
<?php include("./inc/bas.inc.html") ?>