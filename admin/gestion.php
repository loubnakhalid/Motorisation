<?php
include('./inc_ADMIN/menu.inc.php'); ?>
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
if(isset($_GET['icon_modifier_commande'])){
    $id=$_GET['id'];
    $rslt=mysqli_query($mysqli,"select * from commande natural join membre where IdCmd=$id");
    $row=mysqli_fetch_assoc($rslt);
    include("./inc_ADMIN/modifier_commande.php");
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
                <div class='header_header'></div>
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
                                <form action='gestion.php?table=produit' method='get'>
                                    <input type='hidden' name='table' value='produit'>
                                    <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                    <input type='text' name='mot' id='' placeholder='Chercher produit ...'>
                                </form>
                            </div>
                        </div>
                        <div class='element'>
                            <div class='trie'>
                                <div class='input_trie'>
                                    <p><span class='trie_par'>Trier par :</span> <span class='name_trie'></span></p>
                                    <span class='icon_select_trie'><i class='bx bxs-chevron-down'></i></span>
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
                                    <span class='icon_select_statut'><i class='bx bxs-chevron-down'></i></span>
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
                        <div class=''></div>
                    </div>
                    <div class='produit'>
                        <button onclick='document.location.href=\"$url&icon_ajouter_produit=true\"'><i class='fa-solid fa-plus'></i> Ajouter produit</button>
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
                    elseif(isset($_GET['recherche']) && isset($_GET['mot'])){
                        $mot=$_GET['mot'];
                        $rslt = mysqli_query($mysqli, "select * from produit natural join catégorie where NomPr like '%$mot%' order by NomPr");
                    }
                    else{
                        $rslt = mysqli_query($mysqli, 'select * from produit natural join catégorie');
                    }
                    while ($row = mysqli_fetch_assoc($rslt)) {
                        $id=$row['IdPr'];
                        echo "
                        <tr> 
                            <td><img src='../inc/img/produits/".$row['ImagePr']."'alt=''></td>
                            <td>" . $row['NomPr'] . "</td>
                            <td>" . $row['NomCt'] . "</td>
                            <td>" . $row['PrixPr'] ."DH</td>
                            <td>" . $row['StatutPr'] . "</td>
                            <td>" . $row['StockPr'] . "</td>
                            <td class=\"action\">
                                <i class=\"bx bx-edit icon_modifier_produit\" onclick='document.location.href=\"$url&icon_modifier_produit=true&id=$id\"'></i>
                                <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\" style=\"width:35px;height:35px\" onClick=\"confirmSupp('produit','supprimer',$id)\"></lord-icon>
                            </td>
                        </tr>";
                    }
                echo "
                    </tbody>
                </table>";
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
                <div class='header_header'></div>
                <div class='case'>Nombre de catégories : $nbreCt</div>
                <div class='case'>Catégorie la plus populaire :".$CtPop['NomCt']."</div>
                <div class='case'>Catégorie la moins populaire :". $CtMoinsPop['NomCt']."</div>
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
                    echo"
                    <div class='category'>
                        <div class='name_category'>
                            <span>".$row['NomCt']."</span>
                        </div> 
                        <div class='nbr_produit'>
                            <p>Nombre de produits :</p> <span>".mysqli_num_rows($rslt2)."</span>
                        </div>
                        <div class='action_category'>
                            <i class='bx bx-edit modifier_category'></i>
                            <i class='bx bxs-x-square supprimer_category' onclick='confirmSupp(\"catégorie\",\"supprimer\",\"$id\")'></i>
                        </div> 
                    </div>
                    ";
                    }
                echo "
                </div>
                ";
    }
    elseif($_GET['table']=='commande'){
        $totale=mysqli_query($mysqli,"select * from commande");
        $row=mysqli_num_rows($totale);
        $enCrs=mysqli_query($mysqli,"select * from commande where StatutCmd='En cours'");
        $row1=mysqli_num_rows($enCrs);
        $exp=mysqli_query($mysqli,"select * from commande where StatutCmd='Expédiée'");
        $row2=mysqli_num_rows($exp);
        $liv=mysqli_query($mysqli,"select * from commande where StatutCmd='Livrée'");
        $row3=mysqli_num_rows($liv);
        $ann=mysqli_query($mysqli,"select * from commande where StatutCmd='Annulée'");
        $row4=mysqli_num_rows($ann);
        echo "
        <section class='home'>
            <header>
                <div class='header_header'></div>
                <div class='case'> Total commandes : $row </div>
                <div class='case'> En cours : $row1 </div>
                <div class='case'> Expédiée : $row2 </div>
                <div class='case'> Livrée : $row3 </div>
                <div class='case'> Annulée : $row4 </div>
            </header>
            <main>
                <div class='table_commande'>
                    <div class='entete'>
                        <div class='element'>
                            <div class='chercher'>
                                <form action='gestion.php' method='get'>
                                    <input type='hidden' name='table' value='commande'>
                                    <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                    <input type='text' name='mot' id='' placeholder='N° Commande'>
                                </form>
                            </div>
                        </div>
                    <div class='element'>
                        <div class='trie'>
                            <div class='input_trie'>
                                <p><span class='trie_par'>Trier par :</span> <span class='name_trie'></span></p>
                                <span class='icon_select_trie'><i class='bx bxs-chevron-down'></i></span>
                            </div>
                            <div class='display_trie cacher'>
                                <ul>
                                    <li><a href='gestion.php?table=commande&tri=NomMb'>Nom client</a></li>
                                    <li><a href='gestion.php?table=commande&tri=DateCmd'>Date commande</a></li>
                                    <li><a href='gestion.php?table=commande&tri=prixTT'>Totale</a></li>
                                    <li><a href='gestion.php?table=commande&tri=modePaiement'>Mode paiement</a></li>
                                    <li><a href='gestion.php?table=commande&tri=StatutCmd'>Statut</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='element'>
                        <div class='statut'>
                            <div class='input_statut'>
                                <p><span class='statut_par'>Statut : </span></p>
                                <span class='icon_select_statut'><i class='bx bxs-chevron-down'></i></span>
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
                        <div class=''></div>
                    </div>
                    <div class='produit'>
                        <button onclick='document.location.href=\"$url&icon_ajouter_commande=true\"'><i class='fa-solid fa-plus '></i> Ajouter commande</button>
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
                            $rslt = mysqli_query($mysqli, "select * from commande natural join membre order by $tri ");
                        }
                        elseif(isset($_GET['statut'])){
                            $statut=$_GET['statut'];
                            $rslt = mysqli_query($mysqli, "select * from commande natural join membre where StatutCmd='$statut' order by IdCmd");
                        }
                        elseif(isset($_GET['recherche']) && isset($_GET['mot'])){
                            $mot=$_GET['mot'];
                            $rslt = mysqli_query($mysqli, "select * from commande natural join membre where IdCmd like '%$mot%' order by IdCmd");
                        }
                        else{
                            $rslt = mysqli_query($mysqli, 'select * from commande natural join membre ');
                        }
                        while ($row = mysqli_fetch_assoc($rslt)) {
                            $id=$row['IdCmd'];
                            echo " 
                            <tr>
                                <td>".$row['IdCmd']."</td>
                                <td>".$row['NomMb']."</td>
                                <td>".$row['DateCmd']."</td>
                                <td>".$row['prixTT']."</td>
                                <td>".$row['modePaiement']."</td>
                                <td>".$row['StatutCmd']."</td>
                                <td class=\"action\">
                                    <input type='button' value='détails'>
                                    <i class=\"bx bx-edit icon_modifier_commande\" onclick='document.location.href=\"$url&icon_modifier_commande=true&id=$id\"' ></i>
                                    <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\" style=\"width:35px;height:35px\" onClick=\"confirmSupp('commande','supprimer',$id)\"></lord-icon>
                                </td>
                            </tr>
                            ";
                        }
                        echo"
                        </tbody>
                    </table>
                        ";
    }
    elseif($_GET['table']=='RDV'){
        $rslt1=mysqli_query($mysqli,"select * from rdv");
        $nbre=mysqli_num_rows($rslt1);
        $rslt2=mysqli_query($mysqli,"select * from rdv where StatutRDV='Traité'");
        $nbreTr=mysqli_num_rows($rslt2);
        $rslt3=mysqli_query($mysqli,"select * from rdv where StatutRDV='Non traité'");
        $nbreNonTr=mysqli_num_rows($rslt3);
        echo "
        <section class='home '>
            <header>
                <div class='header_header'></div>
                <div class='case'>Nombre de RDV : $nbre</div>
                <div class='case'>RDV Traité : $nbreTr</div>
                <div class='case'>RDV Non traité : $nbreNonTr</div>
            </header>
            <main>
                <div class='table_rdv'>
                    <div class='entete'>
                        <div class='element'>
                            <div class='chercher '>
                                <form action='gestion.php' method='get'>
                                    <input type='hidden' name='table' value='RDV'>
                                    <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                    <input type='text' name='mot' id='' placeholder='N° RDV'>
                                </form>
                            </div>
                        </div>
                        <div class='element'>
                            <div class='trie'>
                                <div class='input_trie'>
                                    <p><span class='trie_par'>Trie par :</span> <span class='name_trie'></span></p>
                                    <span class='icon_select_trie'><i class='bx bxs-chevron-down'></i></span>
                                </div>
                                <div class='display_trie cacher'>
                                    <ul>
                                        <li><a href='gestion.php?table=RDV&tri=IdRDV'>N° RDV</a></li>
                                        <li><a href='gestion.php?table=RDV&tri=NomMb'>Nom client</a></li>
                                        <li><a href='gestion.php?table=RDV&tri=DateRDV'>Date</a></li>
                                        <li><a href='gestion.php?table=RDV&tri=TypePrjt'>Type projet</a></li>
                                        <li><a href='gestion.php?table=RDV&tri=StatutRDV'>StatutRDV</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class='element'>
                            <div class='statut'>
                                <div class='input_statut'>
                                    <p><span class='statut_par'>statut :</span> <span class='name_statut'></span></p>
                                    <span class='icon_select_statut'><i class='bx bxs-chevron-down'></i></span>
                                </div>
                                <div class='display_statut cacher'>
                                    <ul>
                                        <li><a href='gestion.php?table=RDV'>Tout</a></li>
                                        <li><a href='gestion.php?table=RDV&statut=Traité'>Traité</a></li>
                                        <li><a href='gestion.php?table=RDV&statut=Non traité'>Non traité</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class='element'>
                            <div class=''></div>
                        </div>
                        <div class='produit'>
                            <button><i class='fa-solid fa-plus '></i> Ajouter RDV</button>
                        </div>
                    </div>
                    <table cellspacing='0'>
                        <thead>
                            <tr>
                                <th>N° RDV</th>
                                <th>Client</th>
                                <th>Type de projet</th>
                                <th>Date</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
        ";
                        if(isset($_GET['tri'])){
                            $tri=$_GET['tri'];
                            $rslt = mysqli_query($mysqli, "select * from rdv natural join membre order by $tri ");
                        }
                        elseif(isset($_GET['statut'])){
                            $statut=$_GET['statut'];
                            $rslt = mysqli_query($mysqli, "select * from rdv natural join membre where StatutRDV='$statut' order by IdRDV");
                        }
                        elseif(isset($_GET['recherche']) && isset($_GET['mot'])){
                            $mot=$_GET['mot'];
                            $rslt = mysqli_query($mysqli, "select * from rdv natural join membre where IdRDV like '%$mot%' order by IdRDV");
                        }
                        else{
                            $rslt=mysqli_query($mysqli,"select * from rdv natural join membre order by IdRDV");
                        }
                        while($row=mysqli_fetch_assoc($rslt)){
                            $id=$row['IdRDV'];
                            echo "
                            <tr>
                                <td>$row[IdRDV]</td>
                                <td>$row[NomMb] $row[PrénomMb]</td>
                                <td>$row[TypePrjt]</td>
                                <td>$row[DateRDV]</td>
                                <td>$row[StatutRDV]</td>
                                <td class='action'>
                                    <i class='bx bx-edit modifier'></i>
                                    <lord-icon src='https://cdn.lordicon.com/qjwkduhc.json' trigger='hover' colors='primary:#e83a30,secondary:#e83a30,tertiary:#ffffff' state='hover-empty' style='width:35px;height:35px' onClick=\"confirmSupp('RDV','supprimer',$id)\"></lord-icon>
                                </td>
                            </tr>";
                        }
                        echo "
                        </tbody>
                    </table>
                </div>";
    }
    elseif($_GET['table']=='promos'){
        $rslt1=mysqli_query($mysqli,"select * from promos");
        $nbre=mysqli_num_rows($rslt1);
        $rslt2=mysqli_query($mysqli,"select * from promos where StatutPromo='En cours'");
        $nbreEnCrs=mysqli_num_rows($rslt2);
        $rslt3=mysqli_query($mysqli,"select * from promos where StatutPromo='Terminée'");
        $nbreTerm=mysqli_num_rows($rslt3);
        echo "
        <section class='home'>
            <header>
                <div class='header_header'></div>
                <div class='case'>Nombre de promos : $nbre</div>
                <div class='case'>Promos En cours : $nbreEnCrs</div>
                <div class='case'>Promos Terminées : $nbreTerm</div>
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
                                    <span class='icon_select_trie'><i class='bx bxs-chevron-down'></i></span>
                                </div>
                                <div class='display_trie cacher'>
                                    <ul>
                                        <li><a href='gestion.php?table=promos&tri=DateDéb'>Date début</a></li>
                                        <li><a href='gestion.php?table=promos&tri=DateFin'>Date fin</a></li>
                                        <li><a href='gestion.php?table=promos&tri=Taux'>Taux</a></li>
                                        <li><a href='gestion.php?table=promos&tri=StatutPromo'>Statut</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class='element'>
                            <div class='statut'>
                                <div class='input_statut'>
                                    <p><span class='statut_par'>Statut : </span></p>
                                    <span class='icon_select_statut'><i class='bx bxs-chevron-down'></i></span>
                                </div>
                            <div class='display_statut cacher'>
                                <ul>
                                    <li><a href='gestion.php?table=promos'>Tout</a></li>
                                    <li><a href='gestion.php?table=promos&statut=En cours'>En cours</a></li>
                                    <li><a href='gestion.php?table=promos&statut=Terminée'>Terminée</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class='element'>
                        <div class=''></div>
                    </div>
                    <div class='produit'>
                        <button onclick='document.location.href=\"gestion.php?table=promos&icon_ajouter_promo=true\"'><i class='fa-solid fa-plus '></i> Ajouter promotion</button>
                    </div>
                </div>
                <table cellspacing='0 '>
                    <thead>
                        <tr>
                            <th>N° promo</th>
                            <th>Taux</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
                    $rslt = mysqli_query($mysqli, 'select * from promos');
                    while ($row = mysqli_fetch_assoc($rslt)) {
                        $id=$row['IdPromo'];
                        echo " 
                        <tr>
                            <td>".$row['IdPromo']."</td>
                            <td>".$row['Taux']."</td>
                            <td>".$row['DateDéb']."</td>
                            <td>".$row['DateFin']."</td>
                            <td>".$row['StatutPromo']."</td>
                            <td class=\"action\">
                                <input type='button' value='détails'>
                                <i class=\"bx bx-edit icon_modifier_commande\" onclick='document.location.href=\"gestion.php?table=promos&icon_modifier_promo=true&id=$id\"' ></i>
                                <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\"style=\"width:35px;height:35px\" onClick=\"confirmSupp('promo','supprimer',$id)\"></lord-icon>
                            </td>
                        </tr>
                        ";
                    }
                    echo"
                    </tbody>
                </table>
                    ";
    }
}
?>
<?php include('./inc_ADMIN/footer.html');?>