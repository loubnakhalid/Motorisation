<?php include('./inc/haut.inc.php'); ?>
<?php
$id=$_GET['IdPr'];
$rslt=mysqli_query($mysqli,"select * from produit where IdPr=$id");
$row=mysqli_fetch_assoc($rslt);
$prix=$row['PrixPr'];
if(verifPromo($row['IdPr'])){
    $prix=nvPrix($row['IdPr']);
    $rslt2=mysqli_query($mysqli,"select * from promos natural join promo_produit where IdPr=$row[IdPr]");
    $row2=mysqli_fetch_assoc($rslt2);
    $taux=$row2['Taux'];
}
?> 
        <section class="fiche_produit">
           <div class="fiche_produit_left">
                <img src="./inc/img/produits/<?= $row['ImagePr'] ?>" alt="">
           </div>
           <div class="fiche_produit_right">
                <div class="nom_produit">
                    <h1><?= $row['NomPr']; ?></h1>
                </div>
                <div class="description">
                    <h3> Caractéristiques techniques</h3>
                    <pre><?=$row['DescriptionPr']?></pre>
                </div>
                <div class="prix">
                    <?php
                    if($row['StockPr'] <= 0){
                        echo "<div class='prix_dh' style='color:red;  font-size: 27px;'> Rupture de stock </div>";
                    }
                    else{
                        if(verifPromo($row['IdPr'])){
                            echo "<div class='prix_dh'> $prix DH <sup style='color:red;'><strike>$row[PrixPr] DH</strike> </sup></div>";
                            echo "<div class='promo'>-$taux%</div>";
                        }
                        else{
                            echo "<div class='prix_dh'> $prix DH </div>";
                        }
                        echo "
                        </div>
                        <div class='add_panier'>
                            <form action='controller.php' method='post' >
                                <input type='hidden' name='IdPr' value='$row[IdPr]'>
                                <div class='controle'>
                                    <span class='moins'>
                                        <i class='bx bx-minus'></i>
                                    </span>
                                    <span class='nombre'>
                                        <input type='text' name='qt' value='1' size='5' class='quantite_panier' readonly >
                                    </span>
                                    <span class='plus'>
                                        <i class='bx bx-plus'></i>
                                    </span>
                                </div>
                                <div class='panier'>
                                    <i class='bx bx-cart'></i> 
                                    <input type='submit' value='Ajouter panier' name='ajoutPan' readonly>
                                </div>";
                    }
                    ?>
                
                    </form>
                </div>
                </div>
        </section>
        <?php
        $rslt3=mysqli_query($mysqli,"select * from produit where IdCt=$row[IdCt] LIMIT 10");
            echo "
            <section class='categorie'>
                <div class='entete_categorie'>
                    <div class='titre_categorie'>
                        <h2>Produits similaires : </h2>
                    </div>
                    <div class='flech_categorie'>
                        <button class='fleche_left_btn'><i class='bx bx-chevron-left'></i></button>
                        <button class='fleche_right_btn'><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
                <div class='tout_produit_categorie'>
            ";
            while($row3=mysqli_fetch_assoc($rslt3)){
            if(verifPromo($row3['IdPr'])){
                $nvPrix=nvPrix($row3['IdPr']);
                echo "<a href='produits.php?IdPr=$row3[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row3[ImagePr]'></div><div class='nom_prod'>$row3[NomPr]</div><div class='prix_prod'>$nvPrix DH <sup ><strike>$row3[PrixPr] DH</strike> </sup></div></a>";
            }
            elseif($row3['StockPr'] <= 0){
                echo "<a href='produits.php?IdPr=$row3[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row3[ImagePr]'></div><div class='nom_prod'>$row3[NomPr]</div><div class='prix_prod' style='color:red;font-size:1.3em'>Rupture de stock</div></a>";

            }
            else{
                echo "<a href='produits.php?IdPr=$row3[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row3[ImagePr]'></div><div class='nom_prod'>$row3[NomPr]</div><div class='prix_prod'>$row3[PrixPr] DH</div></a>";
            }
            }
            echo "</div></section>";
        ?>
<script>
    let plus = document.querySelector(".plus"),
    moins = document.querySelector(".moins"),
    quantite_panier = document.querySelector(".quantite_panier");

plus.addEventListener("click", () => {
    let stock=<?=$row['StockPr']?>;
    if(quantite_panier.value >= stock){
        swal({
		        title: 'Le stock de ce produit s\'est épuisé !',
		        text: '',
		        icon: 'warning',
		        button: 'Ok',
	        });
        quantite_panier.value=stock;
    }
    else if(quantite_panier.value >= 0){
        quantite_panier.value++;
    }
});
moins.addEventListener("click", () => {
    if (quantite_panier.value > 0) {
        quantite_panier.value--;
    }
});
</script>
<?php include("./inc/bas.inc.html");?>
