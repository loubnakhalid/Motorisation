<?php include('./inc_ADMIN/menu.inc.php'); ?>
<?php
if(isset($_GET['icon_modifier_produit'])){
    $id=$_GET['id'];
    $rslt=mysqli_query($mysqli,"select * from produit natural join catégorie where IdPr=$id");
    $row=mysqli_fetch_assoc($rslt);
    include("./inc_ADMIN/modifier_produit.php");
}
if(isset($_GET['icon_ajouter_produit'])){
    include("./inc_ADMIN/ajouter_produit.php");
}
if(isset($_GET['icon_ajouter_commande'])){
    include("./inc_ADMIN/ajouter_commande.php");
}
if (isset($_GET['table'])) {
    if ($_GET['table'] == 'produit') {
        $CountProduct=mysqli_query($mysqli,"select * from produit");
        $nbreProduct=mysqli_num_rows($CountProduct);
        $countProductSell=mysqli_query($mysqli,"select * from détails_commande natural join produit natural join commande where StatutCmd='Livrée'");
        $sum=0;
        while($row=mysqli_fetch_assoc($countProductSell)){
            $sum=$sum+$row['qt'];
        }
        $countPrix=mysqli_query($mysqli,"select * from détails_commande natural join produit natural join commande where StatutCmd='Livrée'");
        $sumPrix=0;
        while($row=mysqli_fetch_assoc($countPrix)){
            $sumPrix=$sumPrix+($row['PrixPr']*$row['qt']);
        }
        $countCoutStock=mysqli_query($mysqli,"select * from produit");
        $sumCout=0;
        while($row=mysqli_fetch_assoc($countCoutStock)){
            $sumCout=$sumCout+($row['PrixPr']*$row['StockPr']);
        }
        $rsltPlus=mysqli_query($mysqli,"select NomPr,SUM(qt) as Somme from détails_commande NATURAL JOIN commande NATURAL JOIN produit GROUP BY IdPr ORDER BY somme DESC LIMIT 1;");
        $plusVendu=mysqli_fetch_assoc($rsltPlus);
        echo "
        <section class='home'>
        <header>
        <div class='header_header'>
        </div>
        <div class='case'>Nombre de produits : $nbreProduct </div>
        <div class='case'>Nombre de produits vendus : $sum </div>
        <div class='case'>Produit populaire : $plusVendu[NomPr] </div>
        <div class='case'>Chiffre d'affaires : $sumPrix DH </div>
        <div class='case'>Côut des produits en stock : $sumCout DH </div>

        </header>
        <main>
        <div class='table_produit' >
        <div class='entete'>
            <div class='element'>
                <div class='chercher'>
                    <form action='gestion.php?table=produit&recherche=true' method='post'>
                        <button type='submit' name='rechercher' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                        <input type='text' name='mot' id='' placeholder='chercher produit ...'>
                    </form>
                </div>
            </div>
            <div class='element'>
                <div class='trie'>
                    <div class='input_trie'>
                        <p><span class='trie_par'>Trier par :</span> <span class='name_trie'></span></p>
                       
                        <span class='icon_select_trie'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_trie cacher'>
                        <ul>
                        <li><a href='gestion.php?table=produit&tri=NomPr'>Nom</a></li>
                        <li><a href='gestion.php?table=produit&tri=NomCt'>Catégorie</a></li>
                        <li><a href='gestion.php?table=produit&tri=PrixPr'>Prix</a></li>
                        <li><a href='gestion.php?table=produit&tri=StockPr'>Quantité</a></li>
                        </ul>
                    </div>
                   
                </div>

            </div>
            <div class='element'>
                <div class='statut'>
                    <div class='input_statut'>
                        <p><span class='statut_par'>Statut : </span></p>
                        <span class='icon_select_statut'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_statut cacher'>
                        <ul>
                            <li><a href='gestion.php?table=produit'>Tout</a></li>
                            <li><a href='gestion.php?table=produit&statut=1'>Disponible</a></li>
                            <li><a href='gestion.php?table=produit&statut=0'>Indisponible</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class='element'>
                <div class=''>
                  
                </div>
            </div>
            <div class='produit'>
               <button onclick='document.location.href=\"gestion.php?table=produit&icon_ajouter_produit=true\"'><i class='fa-solid fa-plus'></i> Ajouter produit</button>
            </div>
        </div>
                    <table cellspacing='0' >
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Quantité</th> 
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>";
        if(isset($_GET['tri'])){
            $tri=$_GET['tri'];
            $rslt = mysqli_query($mysqli, "select * from produit natural join catégorie order by $tri");
        }
        elseif(isset($_GET['statut'])){
            $statut=$_GET['statut'];
            $rslt = mysqli_query($mysqli, "select * from produit natural join catégorie where StatutPr=$statut order by NomPr");
        }
        elseif(isset($_GET['recherche'])){
            $mot=$_POST['mot'];
            $rslt = mysqli_query($mysqli, "select * from produit natural join catégorie where NomPr like '$mot%' order by NomPr");
        }
        else{
            $rslt = mysqli_query($mysqli, 'select * from produit natural join catégorie');
        }
        while ($row = mysqli_fetch_assoc($rslt)) {
            $id=$row['IdPr'];
            echo "<tr> 
                            <td><img src='../inc/img/produits/".$row['ImagePr']."'alt=''></td>
                            <td>" . $row['NomPr'] . "</td>
                            <td>" . $row['NomCt'] . "</td>
                            <td>" . $row['PrixPr'] ."DH</td>
                            <td>" . $row['StatutPr'] . "</td>
                            <td>" . $row['StockPr'] . "</td>
                            <td class=\"action\">
                                <i class=\"bx bx-edit icon_modifier_produit\" onclick='document.location.href=\"gestion.php?table=produit&icon_modifier_produit=true&id=$id\"'></i>
                                <lord-icon
                                src=\"https://cdn.lordicon.com/qjwkduhc.json\"
                                trigger=\"hover\"
                                colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\"
                                state=\"hover-empty\"
                                style=\"width:35px;height:35px\" onClick=\"confirmSupp('produit','supprimer','IdPr',$id)\">
                            </lord-icon></td>
                          </tr>";        }
        echo "
                        </tbody>
                      </table>
                </form>
              
                  
            </div>
        ";
    }
    elseif($_GET['table']=='catégorie'){
        $CountCt=mysqli_query($mysqli,"select * from catégorie");
        $nbreCt=mysqli_num_rows($CountCt);
        $countCtPop=mysqli_query($mysqli,"select NomCt,count(*) as nbre from détails_commande natural join produit natural join commande NATURAL JOIN catégorie group by IdCt order by nbre desc LIMIT 1;");
        $CtPop=mysqli_fetch_assoc($countCtPop);
        $countCtMoinsPop=mysqli_query($mysqli,"select NomCt,count(*) as nbre from détails_commande natural join produit natural join commande NATURAL JOIN catégorie group by IdCt order by nbre asc LIMIT 1;");
        $CtMoinsPop=mysqli_fetch_assoc($countCtMoinsPop);
        echo "
        <section class='home'>
        <header>
        <div class='header_header'>
        </div>
        <div class='case'>Nombre de catégories : $nbreCt</div>
        <div class='case'>Catégorie la plus populaire :".$CtPop['NomCt']."</div>
        <div class='case'>Catégorie la moins populaire :". $CtMoinsPop['NomCt']."</div>
        <div class='case'></div>
        </header>
        <main>
        <div class='containner_main'>
        <div class='ajouter_category'>
        <button><i class='fa-solid fa-plus'></i> Ajouter catégorie</button>
        </div>
            ";
            $rslt = mysqli_query($mysqli, 'select * from catégorie order by NomCt');
        while ($row = mysqli_fetch_assoc($rslt)) {
            $id=$row['IdCt'];
            $rslt2=mysqli_query($mysqli,"select * from produit where IdCt = $id");
            echo " <div class='category'>
            <div class='name_category'>
                <span>".$row['NomCt']."</span>
            </div> 
                
                <div class='nbr_produit'>
                    <p>Nombre de produits :</p> <span>".mysqli_num_rows($rslt2)."</span>
                </div>    
                <div class='action_category'>
                    <i class='bx bx-edit modifier_category'></i>
                    <i class='bx bxs-x-square supprimer_category' onclick='confirmSupp(\"catégorie\",\"supprimer\",\"IdCt\",\"$id\")'></i>
                </div> 
        </div>";
        }
        echo '</div>';
    }
    elseif($_GET['table']=='commande'){
        echo "
        <section class='home'>
        <header>
        <div class='header_header'>
        </div>
        <div class='case'></div>
        <div class='case'></div>
        <div class='case'></div>
        <div class='case'></div>
        </header>
        <main>
    <div class='table_commande'>
    <div class='entete'>
    <div class='element'>
    <div class='chercher'>
        <form action='gestion.php?table=commande&rechercher=true' method='post'>
            <button type='submit' name='recherche' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
        <input type='text' name='mot' id='' placeholder='N° commande...'>
        </form>
    </div>
</div>
<div class='element'>
    <div class='trie'>
        <div class='input_trie'>
            <p><span class='trie_par'>Trier par :</span> <span class='name_trie'></span></p>
           
            <span class='icon_select_trie'>
                <i class='bx bxs-chevron-down'></i>
            </span>
        </div>
        <div class='display_trie cacher'>
            <ul>
            <li><a href='gestion.php?table=commande&tri=NomMb'>Nom client</a></li>
            <li><a href='gestion.php?table=commande&tri=DateCmd'>Date commande</a></li>
            <li><a href='gestion.php?table=commande&tri=prixTT'>Totale</a></li>
            <li><a href='gestion.php?table=commande&tri=modePaiement'>Mode paiement</a></li>
            <li><a href='gestion.php?table=commande&tri=Statut'>Statut</a></li>
            </ul>
        </div>
       
    </div>

</div>
<div class='element'>
    <div class='statut'>
        <div class='input_statut'>
        <p><span class='statut_par'>Statut : </span></p>
            <span class='icon_select_statut'>
                <i class='bx bxs-chevron-down'></i>
            </span>
        </div>
        <div class='display_statut cacher'>
            <ul>
                <li><a href='gestion.php?table=commande'>Tout</a></li>
                <li><a href='gestion.php?table=commande&statut=En cours'>En cours</a></li>
                <li><a href='gestion.php?table=commande&statut=Expédiée'>Expédiée</a></li>
                <li><a href='gestion.php?table=commande&statut=Livrée'>Livrée</a></li>
                <li><a href='gestion.php?table=commande&statut=Annulée'>Annulée</a></li>

            </ul>
        </div>
       
    </div>

</div>
        <div class='element'>
            <div class=''>

            </div>
        </div>
        <div class='produit'>
            <button onclick='document.location.href=\"gestion.php?table=commande&icon_ajouter_commande=true\"'><i class='fa-solid fa-plus '></i> Ajouter commande</button>
        </div>
    </div>
    <table cellspacing='0 '>
        <thead>
            <tr>
                <th>N° commande</th>
                <th>Nom client</th>
                <th>Date commande</th>
                <th>Totale</th>
                <th>Mode paiement</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        ";
        if(isset($_GET['tri'])){
            $tri=$_GET['tri'];
            $rslt = mysqli_query($mysqli, "select * from commande natural join membre order by $tri");
        }
        elseif(isset($_GET['statut'])){
            $statut=$_GET['statut'];
            $rslt = mysqli_query($mysqli, "select * from commande natural join membre where StatutCmd='$statut' order by IdCmd");
        }
        elseif(isset($_GET['rechercher'])){
            $mot=$_POST['mot'];
            $rslt = mysqli_query($mysqli, "select * from commande natural join membre where IdCmd like '$mot%' order by IdCmd");
        }
        else{
            $rslt = mysqli_query($mysqli, 'select * from commande natural join membre ');
        }
        while ($row = mysqli_fetch_assoc($rslt)) {
            $id=$row['IdCmd'];
            echo " <tr>
            <td>".$row['IdCmd']."</td>
            <td>".$row['NomMb']."</td>
            <td>".$row['DateCmd']."</td>
            <td>".$row['prixTT']."</td>
            <td>".$row['modePaiement']."</td>
            <td>".$row['StatutCmd']."</td>
            <td class=\"action\">
            <input type='button' value='détails'>
                    <i class=\"bx bx-edit icon_modifier_commande\"></i>
                    <lord-icon
                    src=\"https://cdn.lordicon.com/qjwkduhc.json\"
                    trigger=\"hover\"
                    colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\"
                    state=\"hover-empty\"
                    style=\"width:35px;height:35px\" onClick=\"confirmSupp('commande','supprimer','IdCmd',$id)\">
                    </lord-icon>
                </td>
        </tr>";
        }
        echo"
        </tbody>
    </table>
    </form>


</div>";
}
}
?>
<?php include('./inc_ADMIN/footer.html'); ?>