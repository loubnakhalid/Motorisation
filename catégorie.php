<?php include('./inc/haut.inc.php');?>
<?php
if(isset($_GET['IdCt'])){
    $IdCt=$_GET['IdCt'];
    $rqt1="select * from catégorie where IdCt=$_GET[IdCt]";
    if(isset($_GET['tri']) && isset($_GET['order'])){
        $rqt="select * from produit natural join catégorie where IdCt=$IdCt order by $_GET[tri] $_GET[order]";
    }
    elseif(isset($_GET['statut'])){
        if($_GET['statut']=='dispo'){
            $rqt="select * from produit  natural join catégorie where StockPr>0 and IdCt=$IdCt";
        }
        elseif($_GET['statut']=='promo'){
            $rqt="select * from promo_produit natural join produit  natural join catégorie where IdCt=$IdCt";
        }
    }
    else{
        $rqt="select * from produit  natural join catégorie where IdCt=$IdCt order by NomCt";
    }
    $rslt=mysqli_query($mysqli,$rqt1);
    $rslt2=mysqli_query($mysqli,$rqt);
    $row=mysqli_fetch_assoc($rslt);
    $titre=$row['NomCt'];
    $nbre=mysqli_num_rows($rslt2);

}
elseif(isset($_GET['rechercher']) && isset($_GET['mot'])){
    if(isset($_GET['tri']) && isset($_GET['order'])){
        $rqt="select * from produit  where NomPr like '%$_GET[mot]% order by $_GET[tri] $_GET[order]";
    }
    elseif(isset($_GET['statut'])){
        if($_GET['statut']=='dispo'){
            $rqt="select * from produit  where NomPr like '%$_GET[mot]% and StockPr>0";
        }
        elseif($_GET['statut']=='promo'){
            $rqt="select * from promo_produit natural join produit natural join catégorie where NomPr like '%$_GET[mot]%'";
        }
    }
    else{
        $rqt="select * from produit  where NomPr like '%$_GET[mot]%'";
    }
    $rslt=mysqli_query($mysqli,$rqt);
    $row=mysqli_fetch_assoc($rslt);
    $titre="Produits cherchés";
    $nbre=mysqli_num_rows($rslt);
}
?>
     <div class="container_categorie">
        <div class='name_categorie'>
            <h2><?= $titre ?></h2>
            <p><?= $nbre ?> produits trouvés</p>
        </div>
        <div class='entete_mes_categorie'>
            <div class='element'>
                <div class='trie'>
                    <div class='input_trie'>
                        <p><span class='trie_par'>Trier par :</span></p>
                        <span class='icon_select_trie'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_trie'>
                        <ul>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&tri=NomPr&order=asc">Nom produit</a></li>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&tri=PrixPr&order=asc">Prix croissant</a></li>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&order=desc">Prix décroissant</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class='element'>
                <div class='statut'>
                    <div class='input_statut'>
                        <p><span class='statut_par'>Statut :</span></p>
                        <span class='icon_select_statut'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_statut'>
                        <ul>
                            <li><a href='catégorie.php?IdCt=<?=$IdCt?>&statut=dispo'>Disponible</a></li>
                            <li><a href='catégorie.php?IdCt=<?=$IdCt?>&statut=promo'>En promo</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class='Les_produit_categorie'>
        <?php
        $rslt2=mysqli_query($mysqli,$rqt);
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
        ?>
        </div>
    </div>
<?php include('./inc/bas.inc.html'); ?>