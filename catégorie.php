<?php include('./inc/haut.inc.php');?>
<?php
if(isset($_GET['IdCt'])){
    $IdCt=$_GET['IdCt'];
    if(isset($_GET['tri']) && isset($_GET['order'])){
        $rqt="select * from produit natural join catégorie where IdCt=$IdCt order by $_GET[tri] $_GET[order]";
    }
    elseif(isset($_GET['statut'])){
        if($_GET['statut']=='dispo'){
            $rqt="select * from produit  natural join catégorie where StatutPr=1 and IdCt=$IdCt";
        }
        elseif($_GET['statut']=='promo'){
            $rqt="select * from promo_produit natural join produit  natural join catégorie where IdCt=$IdCt";
        }
    }
    else{
        $rqt="select * from produit  natural join catégorie where IdCt=$IdCt order by NomCt";
    }
    $rslt=mysqli_query($mysqli,$rqt);
    $row=mysqli_fetch_assoc($rslt);
    $titre=$row['NomCt'];
    $nbre=mysqli_num_rows($rslt);

}
elseif(isset($_GET['rechercher']) && isset($_GET['mot'])){
    $rqt="select * from produit  where NomPr like '%$_GET[mot]%'";
    $rslt=mysqli_query($mysqli,$rqt);
    $row=mysqli_fetch_assoc($rslt);
    $titre="Produits cherchés";
    $nbre=mysqli_num_rows($rslt);
}

?>
        <div class='name_categorie'>
            <h2><?= $titre ?></h2>
            <p><?= $nbre ?> produits trouvés</p>
        </div>
        <div class='entete_categorie'>
            <div class='element'>
                <div class='trie'>
                    <div class='input_trie'>
                        <p><span class='trie_par'>Trie par :</span> <span class='name_trie'> Name</span></p>
                       
                        <span class='icon_select_trie'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_trie cacher'>
                        <ul>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&tri=NomCt&order=asc">Nom produit</a></li>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&tri=PrixPr&order=asc">Prix croissant</a></li>
                            <li><a href="catégorie.php?IdCt=<?=$IdCt?>&order=desc">Prix décroissant</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class='element'>
                <div class='statut'>
                    <div class='input_statut'>
                        <p><span class='statut_par'>statut :</span> <span class='name_statut'> Name</span></p>
                        <span class='icon_select_statut'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_statut cacher'>
                        <ul>
                            <li><a href='catégorie.php?IdCt=<?=$IdCt?>&statut=dispo'>Disponible</a></li>
                            <li><a href='catégorie.php?IdCt=<?=$IdCt?>&statut=promo'>En promo</a></li>
                        </ul>
                    </div>
                   
                </div>

            </div>
            <div class='interval_prix'>
               <div class='min'> Min  <input type='number'></div>
               <div class='max'> Max <input type='number'></div>
           </div>
           

        </div>
        <div class='Les_produit_categorie'>
        <?php
        $rslt=mysqli_query($mysqli,$rqt);
        while($row=mysqli_fetch_assoc($rslt)){
            echo"
            <a href='produits.php?IdPr=$row[IdPr]' class='produit'>
            <div class='photo_produit' >
                <img src='./inc/img/produits/$row[ImagePr]' alt=''>
            </div>
            <div class='nom_prix_produit'>
                <div class='nom_prod'>
                    $row[NomPr]
                </div>
                <div class='prix_prod'>
                    $row[PrixPr] Dhs
                </div>
            </div>
        </a>";
        }
        ?>
        </div>

<?php include('./inc/bas.inc.html'); ?>