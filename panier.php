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
                        <td rowspan='3' class='ImagePr'>
                            <img  src='./inc/img/produits/".$_SESSION['panier']['ImagePr'][$i]."' alt=''>
                        </td>
                        <td class='NomPR' colspan='2'>".$_SESSION['panier']['NomPr'][$i]."</td>
                    </tr>
                    <tr>
                        <td colspan='2' class='qte'>
                            <div class='wrapper'>
                                <span class='incrementer'>-</span>
                                <span class='num'>".$_SESSION['panier']['qt'][$i]."</span>
                                <span class='decrementer'>+</span>
                            </div>
                        </td>
                    </tr> 
                    <tr>
                        <td>
                            <a class='lienSup'href='#'><i class='fa fa-trash' id='btnSup' onclick='document.location.href=\"controller.php?supPan=true&id=".$_SESSION['panier']['IdPr'][$i]."\"'></i></a>
                        </td>
                        <td class='prixPanier'>".$_SESSION['panier']['PrixPr'][$i]." DH </td>
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
            <button class='bouttonCmd'>Passer à la caisse</button>
        </div>
        "; 
    }
    ?>
</section>
<?php include("./inc/bas.inc.html") ?>