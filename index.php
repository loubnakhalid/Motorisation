<?php
include("inc/haut.inc.php");
?>
        <section class="publicite">
            <div class="publicite_content">
                <div class="slider">
                    <i class='bx bx-chevron-left' id="fleche_pub_left"></i>
                    <i class='bx bx-chevron-right' id="fleche_pub_right"></i>
                    <input type="radio" name="radio" class="rd" id="r1" checked>
                    <input type="radio" name="radio" class="rd" id="r2">
                    <!-- <input type="radio" name="radio" class="rd" id="r3">
                    <input type="radio" name="radio" class="rd" id="r4"> -->

                    <div class="img first">
                        <img src="./inc/img/test.png" alt="">
                    </div>
                    <div class="img">
                        <img src="./inc/img/help4.png" alt="">
                    </div>
                    
                    <div class="btn_radio_back">
                        <div  class="btn1" ></div>
                        <div  class="btn2" ></div>
                        <!-- <div  class="btn3" ></div>
                        <div  class="btn4" ></div> -->
                    </div>
                    
                </div>
                <div class="btn_radio">
                    <label for="r1" class="btn" ></label>
                    <label for="r2" class="btn" ></label>
                    <!-- <label for="r3" class="btn" ></label>
                    <label for="r4" class="btn" ></label> -->
                </div>
            
            </div>
        
        </section>
        <section class="categorie">
            <div class="entete_categorie">
                <div class="titre_categorie">
                    <h2>Nos top ventes</h2>
                    <p>Oui, ces produits sont vraiment top </p>

                </div>
                <div class="flech_categorie">
                    <button class="fleche_left_btn"><i class='bx bx-chevron-left'></i></button>
                    <button class="fleche_right_btn"><i class='bx bx-chevron-right'></i></button>
                </div>
            </div>
            <div class="tout_produit_categorie">
            <?php
            $rsltPlus=mysqli_query($mysqli,"select *,SUM(qt) as Somme from détails_commande NATURAL JOIN commande NATURAL JOIN produit GROUP BY IdPr ORDER BY somme DESC LIMIT 10;");
            while($row=mysqli_fetch_assoc($rsltPlus)){
                if($row['StockPr'] <= 0){
                    echo "<a href='produits.php?IdPr=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod' style='color:red;font-size:1.3em'>Rupture de stock</div></a>";
                }
                elseif(verifPromo($row['IdPr'])){
                    $nvPrix=nvPrix($row['IdPr']);
                    echo "<a href='produits.php?IdPr=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod'>$nvPrix DH <sup ><strike>$row[PrixPr] DH</strike> </sup></div></a>";
                }
                else{
                    echo "<a href='produits.php?IdPr=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod'>$row[PrixPr] DH</div></a>";
                }
            }
            ?>
            </div>
        </section>
        <?php
        $rslt=mysqli_query($mysqli,"select * from catégorie");
        while($row=mysqli_fetch_assoc($rslt)){
            echo "
            <section class='categorie'>
                <div class='entete_categorie'>
                    <div class='titre_categorie'>
                        <h2>$row[NomCt]</h2>
                    </div>
                    <div class='flech_categorie'>
                        <button class='fleche_left_btn'><i class='bx bx-chevron-left'></i></button>
                        <button class='fleche_right_btn'><i class='bx bx-chevron-right'></i></button>
                    </div>
                </div>
                <div class='tout_produit_categorie'>
            ";
            $rslt2=mysqli_query($mysqli,"select * from produit where IdCt=$row[IdCt]");
            while($row2=mysqli_fetch_assoc($rslt2)){
            if($row2['StockPr'] <= 0){
                echo "<a href='produits.php?IdPr=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod' style='color:red;font-size:1.2em'>Rupture de stock</div></a>";
            }
            elseif(verifPromo($row2['IdPr'])){
                $nvPrix=nvPrix($row2['IdPr']);
                echo "<a href='produits.php?IdPr=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod'>$nvPrix DH <sup ><strike>$row2[PrixPr] DH</strike> </sup></div></a>";
            }
            else{
                echo "<a href='produits.php?IdPr=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod'>$row2[PrixPr] DH</div></a>";
            }
            }
            echo "</div></section>";
        }
        ?>
     

        <section class="mes_categorie">
            <div class="entete">
                <h2>Guide d'achats</h2>
                <p>Ces catégories font parler d’elles</p>
            </div>
            <div class="div_categorie">
                <a href="footer.php?Guide=MotorisationPorteGarage" class="mon_categorie">
                    <div class="photo_categorie">
                       <img src="./inc/img/garage.jpg" alt="">

                    </div>
                    <p>Porte de garage</p>

                </a>
                <a  href="footer.php?Guide=MotorisationVolet" class="mon_categorie">
                    <div class="photo_categorie">
                        <img src="./inc/img/roulant.jpg" alt="">
                    </div>
                    <p>Volet roulant</p>

                </a>
                <a class="mon_categorie">
                    <div class="photo_categorie">
                    <img src="./inc/img/telecomande.jpg" alt="">
                    </div>
                    <p>Télécommandes</p>

                </a>
                <a href="footer.php?Guide=Interphonie" class="mon_categorie">
                    <div class="photo_categorie">
                    <img src="./inc/img/inter.jpg" alt="">

                    </div>
                    <p>Interphone & Visiophone</p>
                    

                </a>
                <a href="footer.php?Guide=Alarme" class="mon_categorie">
                    <div class="photo_categorie">
                        <img src="./inc/img/alarme.jpg" alt="">
                    </div>
                    <p>Alarmes</p>

                </a>


            </div>
        </section>
<?php include("inc/bas.inc.html"); ?>
