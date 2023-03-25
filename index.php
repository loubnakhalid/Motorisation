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
                    <input type="radio" name="radio" class="rd" id="r3">
                    <input type="radio" name="radio" class="rd" id="r4">

                    <div class="img first">
                        <img src="./inc/img/test.png" alt="">
                    </div>
                    <div class="img">
                        <img src="./inc/img/help4.png" alt="">
                    </div>
                    <div class="img">
                        <img src="./inc/img/index/a.jpg" alt="">
                    </div>
                    <div class="img">
                        <img src="./inc/img/index/g.jpg" alt="">
                    </div>

                    <div class="btn_radio_back">
                        <div  class="btn1" ></div>
                        <div  class="btn2" ></div>
                        <div  class="btn3" ></div>
                        <div  class="btn4" ></div>
                    </div>
                    
                </div>
                <div class="btn_radio">
                    <label for="r1" class="btn" ></label>
                    <label for="r2" class="btn" ></label>
                    <label for="r3" class="btn" ></label>
                    <label for="r4" class="btn" ></label>
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
                    echo "<a href='produits.php?id=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod' style='color:red;font-size:1.3em'>Rupture de stock</div></a>";
                }
                elseif(verifPromo($row['IdPr'])){
                    $nvPrix=nvPrix($row['IdPr']);
                    echo "<a href='produits.php?id=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod'>$nvPrix DH <sup ><strike>$row[PrixPr] DH</strike> </sup></div></a>";
                }
                else{
                    echo "<a href='produits.php?id=$row[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row[ImagePr]'></div><div class='nom_prod'>$row[NomPr]</div><div class='prix_prod'>$row[PrixPr] DH</div></a>";
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
                echo "<a href='produits.php?id=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod' style='color:red;font-size:1.3em'>Rupture de stock</div></a>";
            }
            elseif(verifPromo($row2['IdPr'])){
                $nvPrix=nvPrix($row2['IdPr']);
                echo "<a href='produits.php?id=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod'>$nvPrix DH <sup ><strike>$row2[PrixPr] DH</strike> </sup></div></a>";
            }
            else{
                echo "<a href='produits.php?id=$row2[IdPr]' class='produit'><div class='photo_produit'><img src='./inc/img/produits/$row2[ImagePr]'></div><div class='nom_prod'>$row2[NomPr]</div><div class='prix_prod'>$row2[PrixPr] DH</div></a>";
            }
            }
            echo "</div></section>";
        }
        ?>
        <section class="information_pourquoi">
            <div class="text_pourquoi">
                <h1> <span style="font-weight: 400;">Pourquoi </span><span style="font-weight: 900;">Motorify</span>  <span style="font-weight: 400;">?</span></h1>


                <p class="p1">Pour rendre votre maison plus fonctionnelle ! </p> 

                <p class="p2">Motorify offre des solutions de motorisation pour les portails,
                    volets, garages et systèmes d'alarme et de vidéosurveillance.</p>
                <ul>
                    <li>
                        <p class="p2" ><span class="def">Un meilleur confort </span>: ouvrir et fermer manuellement son portail est contraignant. Qu'il pleuve ou qu'il neige, un seul geste suffit avec nos motorisations.</p>
                    </li>
                    <li>
                        <p class="p2"><span class="def">Une sécurité renforcée </span> :  saviez-vous que des équipements motorisés résistent mieux aux effractions ? 
                        </p>
                    </li>
                    <li>
                        <p class="p2"><span class="def">Des économies d'énergie </span>: nos équipements peuvent être reliés à des panneaux solaires pour une facture réduite !
                        </p>
                    </li>
                </ul>
                <span>
                 En tant que numéro 1 en automatisme de portail au Maroc, nous vous garantissons des 
                            produits de qualité aux meilleurs rapports qualité-prix. </span>
                <span><a href=""  style="color: #e46301; text-decoration:none;"> N'hésitez pas à nous contacter 
                    pour découvrir nos solutions sur mesure adaptées à vos besoins.</a></span>
            </div>
            <div class="photo_pourquoi">
                <img src="./inc/img/index/pour2.jpg" alt="">
            </div>
        </section>
<?php include("inc/bas.inc.html"); ?>