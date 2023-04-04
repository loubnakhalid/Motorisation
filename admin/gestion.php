<?php
include('./inc_ADMIN/menu.inc.php'); ?>
<?php
if(isset($_GET['modifier_produit']) && isset($_GET['IdPr'])){
    $IdPr=$_GET['IdPr'];
    try{
    $rslt=mysqli_query($mysqli,"select * from produit natural join catégorie where IdPr=$IdPr");
    $row=mysqli_fetch_assoc($rslt);
    echo "
    <div class='body'>
        <div class='div_form_modification_produit'>
            <i class='bx bxs-x-square icon_x_exit' onclick='history.back();'></i>
            <form id='modifPrdt' action='controller.php?table=produit&action=modifier&IdPr=$IdPr' method='post' enctype='multipart/form-data'>
                <div class='form_left'>
                    <div class='case'>
                        <label for=''>Nom produit</label>
                        <div class='input_text'>
                            <input type='text' name='NomPr' value='$row[NomPr]'>
                        </div> 
                    </div>
                    <div class='case'>
                        <label for=''>Categorie</label>
                        <div class='input_select'>
                            <select name='IdCt'>
    ";
                        $rslt2=mysqli_query($mysqli,"select * from catégorie");
                        while($row2=mysqli_fetch_assoc($rslt2)){
                            if($row['NomCt']==$row2['NomCt']){
                                echo "
                                <option value='$row2[IdCt]' selected>$row2[NomCt]</option>
                                ";
                            }
                            else{
                                echo "
                                <option value='$row2[IdCt]'>$row2[NomCt]</option>
                                ";
                            }
                        }
                            echo "
                            </select>
                            <div class='icon_select'>
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                        </div> 
                    </div>
                    <div class='case'>
                        <label for=''>Statut</label>
                        <div class='input_select'>
                            <select name='StatutPr' id='StatutPr'>
                                <option value='1'>Disponible</option>
                            ";
                            if($row['StatutPr']=='0'){
                                echo "
                                <option value='0' selected>Indisponible</option>
                                ";
                            }
                            else{
                                echo "
                                <option value='0'>Indisponible</option>
                                ";
                            }
                            echo "
                            </select>
                            <div class='icon_select'>
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                        </div> 
                    </div>
                    <div class='case_prix_qauntite'>
                        <label for=''>Prix</label>
                        <div class='input_text'>
                            <input type='number' name='PrixPr' value='$row[PrixPr]'>
                        </div> 
                    </div>
                    <div class='case_prix_qauntite'>
                        <label for=''>Quantite</label>
                        <div class='input_text'>
                            <input type='number' value='$row[StockPr]' name='StockPr' onChange='dispo()'>
                        </div> 
                    </div>
                    <div class='case_text_area'>
                        <label for=''>Description</label>
                        <div class='input_text_area'>
                            <textarea name='DescriptionPr' cols='96' rows='5'>$row[DescriptionPr]</textarea>
                        </div> 
                    </div>
                </div>
                <div class='form_right'>
                    <div class='case_image'>
                        <label for=''>Image</label>
                        <div class='zone_image'>
                            <input type='hidden' name='NomImage' value='$row[ImagePr]'>
                            <input type='file' class='input_image' name='ImagePr' >
                            <img src='../inc/img/produits/$row[ImagePr]' id='image_telecharger'>
                        </div>
                    </div>
                </div>
                <div class='form_bas'>
                    <div class='submit_form'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_produit'>
                        <input type='button' value='Modifier' class='btn_modifier_form_modifier_produit' onclick=\"confirmModifAjt('modifPrdt','Voulez-vous vraiament modifier le produit ?','Modifier')\">
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
    }
    catch(Exception $e){
        echo"<script>erreur('Erreur à la sélection de la base de données ! Veuillez contactez l\'équipe de développement.')</script>";
    }

}
if(isset($_GET['ajouter_produit'])){
    echo "
    <div class='body'>
        <div class='div_form_modification_produit'>
            <i class='bx bxs-x-square icon_x_exit' onclick='history.back()'></i>
            <form id='ajtPrdt' action='controller.php?table=produit&action=ajouter' method='post' enctype='multipart/form-data'>
                <div class='form_left'>
                    <div class='case'>
                        <label for=''>Nom produit</label>
                        <div class='input_text'>
                            <input type='text' name='NomPr'>
                        </div> 
                    </div>
                    <div class='case'>
                        <label for=''>Categorie</label>
                        <div class='input_select'>
                            <select name='IdCt'>
    ";
                            $rslt2=mysqli_query($mysqli,"select * from catégorie");
                            while($row2=mysqli_fetch_assoc($rslt2)){
                                echo "
                                <option value='.$row2[IdCt].'>$row2[NomCt]</option>
                                ";
                            }
                            echo "
                            </select>
                            <div class='icon_select'>
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                        </div> 
                    </div>
                    <div class='case'>
                        <label for=''>Statut</label>
                        <div class='input_select'>
                            <select name='StatutPr'>
                                <option value='1'>Disponible</option>
                                <option value='0'>Indisponible</option>
                            </select>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                    </div>
                    <div class='case_prix_qauntite'>
                        <label for=''>Prix</label>
                        <div class='input_text'>
                            <input type='number' name='PrixPr'>
                        </div> 
                    </div>
                    <div class='case_prix_qauntite'>
                        <label for=''>Quantite</label>
                        <div class='input_text'>
                            <input type='number' name='StockPr'>
                        </div> 
                    </div>
                    <div class='case_text_area'>
                        <label for=''>Description</label>
                        <div class='input_text_area'>
                            <textarea name='DescriptionPr' cols='96' rows='5'></textarea>
                        </div> 
                    </div>
                </div>
                <div class='form_right'>
                    <div class='case_image'>
                        <label for=''>Image</label>
                        <div class='zone_image'>
                            <input type='file' class='input_image' name='ImagePr' >
                            <img src='./inc_ADMIN/img/telecharger_image.png' id='image_telecharger'>
                        </div>
                    </div>
                </div>
                <div class='form_bas'>
                    <div class='submit_form'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_produit'>
                        <input type='button' value='Ajouter' class='btn_modifier_form_modifier_produit' onclick=\"confirmModifAjt('ajtPrdt','Voulez-vous vraiment ajouter le produit ?','Ajouter')\">
                    </div>
                </div>
            </div>
        </form>
    </div>
    ";
}
if(isset($_GET['modifier_commande']) && isset($_GET['IdCmd'])){
    $IdCmd=$_GET['IdCmd'];
    $rslt=mysqli_query($mysqli,"select * from commande natural join membre where IdCmd=$IdCmd");
    $row=mysqli_fetch_assoc($rslt);
    echo "
    <div class='body_cmd'>
        <div class='div_form_modification_cmd'>
            <i class='bx bxs-x-square icon_x_exit' onclick='history.back()'></i>
            <form action='controller.php?table=commande&action=modifier' method='post' id='modifCMD' enctype='multipart/form-data' >
                <div class='case_text'>
                    <label for=''>N° commande</label>
                    <div class='input_text'>
                        <input type='text' name='IdCmd' value='$row[IdCmd]' readonly>
                    </div> 
                </div>
                <div class='case_text'>
                    <label for=''>Nom client</label>
                    <div class='input_text'>
                        <input type='text' name='NomMb' value='$row[NomMb]' readonly>
                    </div> 
                </div>
                <div class='case_text'>
                    <label for=''>Date commande</label>
                    <div class='input_text'>
                        <input type='date' name='DateCmd' value='$row[DateCmd]'>
                    </div> 
                </div>
                <div class='case_text'>
                    <label for=''>Total</label>
                    <div class='input_text'>
                        <input type='number' name='prixTT' value='$row[prixTT]'>
                    </div> 
                </div>
                <div class='case_select'>
                    <label for=''>Mode paiement</label>
                    <div class='input_select'>
                        <select name='modePaiement' id='mode'>
                            <option value='Carte'>Carte</option>
                            <option value='Chèque'>Chèque</option>
                            <option value='Espèces'>Espèces</option>
                            <option value='Paypal'>Paypal</option>
                        </select>
                        <script>
                            selectd='$row[modePaiement]';
                            if(selectd=='Carte'){
                                selectd=0;
                            }
                            else if(selectd=='Chèque'){
                                selectd=1;
                            }
                            else if(selectd=='Espèces'){
                                selectd=2;
                            }
                            else if(selectd=='Paypal'){
                                selectd=3;
                            }
                            document.getElementById('mode').getElementsByTagName('option')[selectd].selected= 'selected';
                        </script>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                </div>
                <div class='case_select'>
                    <label for=''>Statut</label>
                    <div class='input_select'>
                        <select name='StatutCmd' id='statut'>
                            <option value='En cours'>En cours</option>
                            <option value='Expédiée'>Expédiée</option>
                            <option value='Livrée'>Livrée</option>
                            <option value='Annulée'>Annulée</option>
                        </select>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                </div>
                <script>
                    selectd='$row[StatutCmd]';
                    if(selectd=='En cours'){
                        selectd=0;
                    }
                    else if(selectd=='Expédiée'){
                        selectd=1;
                    }
                    else if(selectd=='Livrée'){
                        selectd=2;
                    }
                    else if(selectd=='Annulée'){
                        selectd=3;
                    }
                    document.getElementById('statut').getElementsByTagName('option')[selectd].selected= 'selected';
                </script>
                <div class='case_text_area'>
                    <label for=''>Note</label>
                    <div class='input_text_area'>
                        <textarea name='NoteCmd' cols='96' rows='4'>$row[NoteCmd]</textarea>
                    </div> 
                </div>
                <div class='case_cocher'>
                    <input type='checkbox' name='envEmail'> Renseigner le client par l'état de la commande
                </div>
                <div class='bas_form'>
                    <div class='submit_form_modification_cmd'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_cmd'>
                        <input type='button' value='Modifier' class='btn_modifier_form_modifier_cmd' onclick='confirmModifAjt(\"modifCMD\",\"Voulez-vous vraiment modifier la commande?\",\"Modifier\");'>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
}
if(isset($_GET['ajouter_commande'])){
    echo "
    <div class='body_cmd'>
        <div class='div_form_modification_cmd'>
            <i class='bx bxs-x-square icon_x_exit' onclick='history.back()'></i>
            <form id='ajtCmd' action='controller.php?table=commande&action=ajouter' method='post' enctype='multipart/form-data'>
                <div class='case_text'>
                    <label for=''>N° commande</label>
                    <div class='input_text'>
                        <input type='text' name='IdCmd' readonly>
                    </div> 
                </div>
                <div class='case_select'>
                    <label for=''>Nom client</label>
                    <div class='input_select'>
                        <select name='IdMb'>
    ";
                        $rslt=mysqli_query($mysqli,"select * from membre order by NomMb");
                        while($row=mysqli_fetch_assoc($rslt)){
                            echo '
                            <option value="'.$row['IdMb'].'">'.$row['NomMb'].' '.$row['PrénomMb'].'</option>
                            ';
                        }
                        echo"
                        </select>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                </div>
                <div class='case_text'>
                    <label for=''>Date commande</label>
                    <div class='input_text'>
                        <input type='date' name='DateCmd'>
                    </div> 
                </div>
                <div class='case_text'>
                    <label for=''>Total</label>
                    <div class='input_text'>
                        <input type='number' name='prixTT'>
                    </div> 
                </div>
                <div class='case_select'>
                    <label for=''>Mode paiement</label>
                    <div class='input_select'>
                        <select name='modePaiement'>
                            <option value='Paypal'>Paypal</option>
                            <option value='Carte'>Carte</option>
                            <option value='Espèces'>Espèces</option>
                            <option value='Chèque'>Chèque</option>
                        </select>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                </div>
                <div class='case_select'>
                    <label for=''>Statut</label>
                    <div class='input_select'>
                        <select name='StatutCmd'>
                            <option value='En cours'>En cours</option>
                            <option value='Expédiée'>Expédiée</option>
                            <option value='Livrée'>Livrée</option>
                            <option value='Annulée'>Annulée</option>
                        </select>
                        <div class='icon_select'>
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div> 
                </div>
                <div class='case_text_area'>
                    <label for=''>Note</label>
                    <div class='input_text_area'>
                        <textarea name='NoteCmd' cols='96' rows='4'></textarea>
                    </div> 
                </div>
                <div class='bas_form'>
                    <div class='submit_form_modification_cmd'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_cmd'>
                        <input type='button' value='Ajouter' class='btn_modifier_form_modifier_cmd' onclick=\"confirmModifAjt('ajtCmd','Voulez-vous vraiment ajouter la commande?','Ajouter')\">
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
}
if(isset($_GET['détails_commande']) && isset($_GET['IdCmd'])){
    $IdCmd=$_GET['IdCmd'];
    if(isset($_GET['btn_détails_commande']) ){
        echo "
        <div class='body_display_commande'>
            <div class='div_details_display_commande'>
                <i class='bx bxs-x-square icon_x_exit' onclick='history.back();' style='right: 0'></i>
                <table cellspacing='0 '>
                    <thead>
                        <tr>
                        <th>Nom produit</th>
                        <th>Quantite</th>
                        <th class='action'>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
        ";
                    $rslt=mysqli_query($mysqli,"select * from commande natural join détails_commande natural join produit where IdCmd=$IdCmd");
                    while($row=mysqli_fetch_assoc($rslt)){
                    $IdDétailsCmd=$row['IdDétailsCmd'];
                    $StockPr=$row['StockPr'];
                        echo"
                        <form action='controller.php?table=détails_commande&action=modifier&IdDétailsCmd=$IdDétailsCmd&IdCmd=$IdCmd' method='post'>
                            <tr>
                                <td>$row[NomPr]</td>
                                <td class='td_valider'><input type='text' value='$row[qt]' name='qt' class='input_quantite' onchange='if(this.value>$StockPr){erreur2(\"Le stock est épuisée ! \");this.value=$StockPr;}' readonly autofocus>
                                    <button type='submit' class='valider_modif_display_cmd cacher_icon'><i class='bx bxs-check-square icon_valider_modif_display_cmd '></i></button>
                                </td>
                                <td class='action'>
                                    <i class='bx bx-edit icon_modifier_commande_display'  ></i>
                                    <lord-icon src='https://cdn.lordicon.com/qjwkduhc.json' trigger='hover' colors='primary:#e83a30,secondary:#e83a30,tertiary:#ffffff' state='hover-empty' style='width:35px;height:35px' onClick=\"confirmSupp('détails_commande','supprimer',$IdDétailsCmd,$IdCmd);\"></lord-icon>
                                </td>
                            </tr> 
                        </form>
                        ";
        }
                    echo"
                    </tbody>
                </table>
                <div class='bas_table'>
                    <button onclick='document.location.href=\"gestion.php?table=commande&détails_commande=true&ajouter_commande_détails=true&IdCmd=$IdCmd\"' class='ajouter_cmd_display_cmd'><i class='fa-solid fa-plus '></i> commande</button>
                    <button onclick='document.location.href=\"gestion.php?table=commande&détails_commande=true&ajouter_produit_détails=true&IdCmd=$IdCmd\"' class='ajouter_prd_display_cmd'><i class='fa-solid fa-plus '></i> produit</button>
                </div>
            </div>
        </div>
        ";

    }
    elseif(isset($_GET['ajouter_commande_détails'])){
        echo "
        <div class='body_display_commande'>
            <div class='ajouter_cmd_details_cmd'>
            <i class='bx bxs-x-square icon_x_exit' onclick='history.back();'  style='right: 0'></i>
                <form id='ajtCmdDt' action='controller.php?table=détails_commande&action=ajouterCmd' method='post'>
                    <table cellspacing='0 '>
                        <thead>
                            <tr>
                                <th></th>
                                <th>N° commande</th>
                                <th>Nom client</th>
                            </tr>
                        </thead>
                        <tbody>
        ";
                    $rslt=mysqli_query($mysqli,"select * from commande natural join membre");
                    while($row=mysqli_fetch_assoc($rslt)){
                        $IdCmdAjt=$row['IdCmd'];
                        if($IdCmd != $IdCmdAjt){
                            echo"
                            <input type='hidden' name='IdCmd' value='$IdCmd'>
                            <tr>
                                <td><input type='radio' name='IdCmdAjt' value='$IdCmdAjt' id='chek1'></td>
                                <td>$IdCmdAjt</td>
                                <td>$row[NomMb] $row[PrénomMb] </td>
                            </tr>
                            ";
                            }
                        }
                        echo"
                        </tbody>
                    </table>
                    <div class='bas'>
                        <button type='button' onclick=\"confirmModifAjt('ajtCmdDt','Voulez-vous vraiment ajouter la commande $IdCmdAjt à la commande $IdCmd?','Ajouter')\">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        ";
    }
    elseif(isset($_GET['ajouter_produit_détails'])){
        echo "
        <div class='body_display_commande'>
            <div class='ajouter_prd_details_cmd'>
                <i class='bx bxs-x-square icon_x_exit' onclick='history.back();'  style='right: 0'></i>
                <form id='ajtPrdtDt' action='controller.php?table=détails_commande&action=ajouter' method='post'>
                    <table cellspacing='0 '>
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom produit</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
        ";
                        $rslt=mysqli_query($mysqli,"select * from produit where IdPr NOT IN (select IdPr from détails_commande where IdCmd=$IdCmd ) AND StatutPr=1 order by NomPr");
                        while($row=mysqli_fetch_assoc($rslt)){
                            $IdPr=$row['IdPr'];
                            echo"
                            <tr>
                                <td class='prd'><input type='checkbox' value='$IdPr' name='IdPr[]' id='chek1'></td>
                                <td>$row[NomPr]</td>
                                <td><img src='../inc/img/produits/$row[ImagePr]'></td>
                                <input type='hidden' name='IdCmd' value='$IdCmd'>
                            </tr>
                            ";
                        }
        echo"
                        </tbody>
                    </table>
                    <div class='bas'>
                        <button type='button' onclick=\"confirmModifAjt('ajtPrdtDt','Voulez-vous vraiment ajouter les produits à la commande $IdCmd?','Ajouter')\">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        ";
    }
}
if(isset($_GET['ficheClient']) && isset($_GET['id'])){
    $id=$_GET['id'];
    $rslt=mysqli_query($mysqli,"select * from membre where IdMb=$id");
    $row=mysqli_fetch_assoc($rslt);
    echo "
    <div class='body_cmd'>
    <div class='fiche_client'>
    <div class='haut'><i class='bx bxs-x-square icon_x_exit_rdv' onclick='history.back()'></i></div>
    <div class='client'>
        <h1>Contact</h1>
    </div>
    <div class='contenue_client'>
        <div class='info'>
            <h3>Nom</h3>
            <span>$row[NomMb]</span>
        </div>
        <div class='info'>
            <h3>Prénom</h3>
            <span>$row[PrénomMb]</span>
        </div>
        <div class='info'>
            <h3>Email</h3>
            <span>$row[EmailMb]</span>
        </div>
        <div class='info'>
            <h3>Telephone Mobile</h3>
            <span>$row[NumTélé]</span>
        </div>
        <div class='info'>
            <h3>Date Naissance</h3>
            <span>$row[DateNc]</span>
        </div>
        <div class='info'>
            <h3>Ville</h3>
            <span>$row[Ville]</span>
        </div>
       
        <div class='info'>
            <h3>Code postal</h3>
            <span>$row[CP]</span>
        </div>
        <div class='info'>
            <h3>Adresse</h3>
            <span>$row[AdresseMb]</span>
        </div>
        

    </div>
    </div>
    </div>";
}
if(isset($_GET['modifier_RDV']) && isset($_GET['IdRDV'])){
    $IdRDV=$_GET['IdRDV'];
    $rslt=mysqli_query($mysqli,"select * from rdv where IdRdv= $IdRDV");
    $row=mysqli_fetch_assoc($rslt);
    echo "
    <div class='body_display_modif_rdv'>
        <div class='div_modif_rdv'>  
            <div class='haut'><i class='bx bxs-x-square icon_x_exit_rdv' onclick='history.back()'></i></div>
            <form id='modifRDV' action='controller.php?table=RDV&action=modifier&IdRDV=$IdRDV' method='post'>
                <div class='case_nmr'>
                    <label for=''>N° RDV</label>
                    <div class='input_text'>
                        <input type='text' name='IdRDV' value='$row[IdRDV]' readonly>
                    </div> 
                </div>
                <div class='case_date'>
                    <label for=''>Date</label>
                    <div class='input_text'>
                        <input type='date' name='DateRDV' value='$row[DateRDV]'>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Nom client</label>
                    <div class='input_text'>
                        <input type='text' name='NomMb' value='$row[NomMb]'>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Statut</label>
                    <div class='input_select'>
                        <select name='StatutRDV' id='StatutRdv' >
                            <option value='Traité'>Traité</option>
                            <option value='Non traité'>Non traité</option>
                        </select>
                    </div>
                    <script>
                        if('$row[StatutRDV]'=='Traité'){
                            document.getElementById('StatutRdv').getElementsByTagName('option')[0].selected='selected';
                        }
                        else{
                            document.getElementById('StatutRdv').getElementsByTagName('option')[1].selected='selected';
                        }
                    </script>
                </div>
                <div class='case'>
                    <label for=''>Télephone</label>
                    <div class='input_text'>
                        <input type='tel' name='NumTélé' value='$row[NumTélé]'>
                    </div> 
                </div>
                <div class='case_adress'>
                    <label for=''>Adress</label>
                    <div class='input_text'>
                        <input type='text' name='AdresseMb' value='$row[AdresseMb]'>
                    </div> 
                </div>
                <div class='form_bas'>
                    <div class='submit_form'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_rdv'>
                        <input type='button' value='Modifier' class='btn_modifier_form_modifier_rdv' onclick=\"confirmModifAjt('modifRDV','Voulez-vous vraiment modifier le RDV?','Modifier')\">
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
}
if(isset($_GET['ajouter_RDV'])){
    echo "
    <div class='body_display_modif_rdv'>
        <div class='div_modif_rdv'>  
            <div class='haut'><i class='bx bxs-x-square icon_x_exit_rdv' onclick='history.back();'></i></div>
            <form id='ajtRDV' action='controller.php?table=RDV&action=ajouter' method='post'>
                <div class='case_nmr'>
                    <label for=''>N RDV</label>
                    <div class='input_text'>
                        <input type='text' name='' value='' readonly>
                    </div> 
                </div>
                <div class='case_date'>
                    <label for=''>Date</label>
                    <div class='input_text'>
                        <input type='date' name='DateRDV' value=''>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Nom client</label>
                    <div class='input_text'>
                        <input type='text' name='NomMb' value=''>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Statut</label>
                    <div class='input_select'>
                            <select name='StatutRDV' >
                            <option value='Traité'>Traité</option>
                            <option value=''Non traité>Non Traité</option>
                        </select>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Télephone</label>
                    <div class='input_text'>
                        <input type='tel' name='NumTélé' value=''>
                    </div> 
                </div>
                <div class='case_adress'>
                    <label for=''>Adress</label>
                    <div class='input_text'>
                        <input type='text' name='AdresseMb' value=''>
                    </div> 
                </div>
                <div class='form_bas'>
                    <div class='submit_form'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_rdv'>
                        <input type='button' value='Ajouter' class='btn_modifier_form_modifier_rdv' onclick=\"confirmModifAjt('ajtRDV','Voulez-vous vraiment ajouter le RDV?','Ajouter')\">
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
}
if(isset($_GET['modifier_promos']) && isset($_GET['id'])){
    $id=$_GET['id'];
    $rslt=mysqli_query($mysqli,"select * from promos where IdPromo=$id");
    $row=mysqli_fetch_assoc($rslt);
    echo" <div class='body_display_modif_promo '>
    <div class='div_modif_promo '>
        <div class='haut'><i class='bx bxs-x-square icon_x_exit_promo' onclick='history.back();'></i></div>
        <form id='modifPromo' action='controller.php?table=promos&action=modifier&id=$id' method='post'>

            <div class='case_nmr'>
                <label for=''>N promo</label>
                <div class='input_text'>
                    <input type='number' name='IdPromo' value='$row[IdPromo]' readonly>
                </div>
            </div>
            <div class='case_nmr'>
                <label for=''>Taux</label>
                <div class='input_text'>
                    <input type='number' name='Taux' value='$row[Taux]'>
                </div>
            </div>
            <div class='case'>
                <label for=''>Statut</label>
                <div class='input_select'>
                    <select name='StatutPromo'>
        ";
        if($row['StatutPromo']=='En cours'){
            echo "<option value='En cours' selected>En cours </option>
                <option value='Terminée'>Terminée </option>";
        }
        else{
            echo "<option value='En cours' selected>En cours </option>
            <option value='Terminée' selected>Terminée </option>";
        }
        echo"
                    </select>
                </div>
            </div>

            <div class='case_date'>
                <label for=''>Date début</label>
                <div class='input_text'>
                    <input type='date' name='DateDéb' value='$row[DateDéb]'>
                </div>
            </div>
            <div class='case_date'>
                <label for=''>Date fin</label>
                <div class='input_text'>
                    <input type='date' name='DateFin' value='$row[DateFin]'>
                </div>
            </div>


            <div class='form_bas'>
                <div class='submit_form'>
                    <input type='reset' value='Effacer' class='btn_effacer_form_modifier_promo'>
                    <input type='button' value='Modifier' class='btn_modifier_form_modifier_promo' onclick=\"confirmModifAjt('modifPromo','Voulez-vous vraiment modifier la promotion?','Modifier')\">
                </div>
            </div>
        </form>
    </div>
    </div>";
}
if(isset($_GET['ajouter_promos'])){
    echo" 
    <div class='body_display_modif_promo'>
        <div class='div_modif_promo '>
            <div class='haut'><i class='bx bxs-x-square icon_x_exit_promo' onclick='history.back();'></i></div>
            <form id='ajtPromo' action='controlleR.php?table=promos&action=ajouter' method='post'>
                <div class='case_nmr'>
                    <label for=''>N promo</label>
                    <div class='input_text'>
                        <input type='number' name='IdPromo' value='' readonly>
                    </div>
                </div>
                <div class='case_nmr'>
                    <label for=''>Taux</label>
                    <div class='input_text'>
                        <input type='number' name='Taux' value=''>
                    </div>
                </div>
                <div class='case'>
                    <label for=''>Statut</label>
                    <div class='input_select'>
                        <select name='StatutPromo'>
                        <option value='En cours'>En cours</option>
                        <option value='Terminée'>Terminée</option> 
                        </select>
                    </div>
                </div>
                <div class='case_date'>
                    <label for=''>Date début</label>
                    <div class='input_text'>
                        <input type='date' name='DateDéb' value=''>
                    </div>
                </div>
                <div class='case_date'>
                    <label for=''>Date fin</label>
                    <div class='input_text'>
                        <input type='date' name='DateFin' value=''>
                    </div>
                </div>
                <div class='form_bas'>
                    <div class='submit_form'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_promo'>
                        <input type='button' value='Ajouter' class='btn_modifier_form_modifier_promo'  onclick=\"confirmModifAjt('ajtPromo','Voulez-vous vraiment ajouter la promotion?','Ajouter')\">
                    </div>
                </div>
            </form>
        </div>
    </div>
    ";
}
if(isset($_GET['détails_promos']) && isset($_GET['id'])){
    $id=$_GET['id'];
    echo "  <div class='body_display_modif_promo '><div class='div_details_promo'>
    <i class='bx bxs-x-square icon_x_exit' onclick='history.back();'  style='right: 0'></i>
    <table cellspacing='0'>
        <thead>
            <tr>
                <th>Image</th>
                <th>Nom produit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
    ";
    $rsly=mysqli_query($mysqli,"select * from promo_produit natural join produit where IdPromo=$id");
    while($row=mysqli_fetch_assoc($rsly)){
        echo "
        <tr>
                <td><img src='../inc/img/produits/$row[ImagePr]'></td>
                <td>$row[NomPr]</td>
                <td>
                    <lord-icon src='https://cdn.lordicon.com/qjwkduhc.json' trigger='hover' colors='primary:#e83a30,secondary:#e83a30,tertiary:#ffffff' state='hover-empty' style='width:35px;height:35px' onclick='confirmSupp(\"promos\",\"supprimer\",$row[IdPrmPrdt])'></lord-icon>
                </td>
            </tr>
        ";
    }
    echo" 
            </tbody>
        </table>
        <div class='bas'>
            <button class='ajouter_prd_details_promo' onclick='document.location.href=\"gestion.php?table=promos&ajouter_prmprdt=true&id=$id\"'><i class='fa-solid fa-plus '></i> produit</button>
        </div>
        </div>
        </div>";
}
if(isset($_GET['ajouter_prmprdt']) && isset($_GET['id'])){
    $id=$_GET['id'];
    echo "
    <div class='body_display_modif_promo '>
        <div class='div_ajouter_prd_details_promo'>
            <div class='haut'><i class='bx bxs-x-square icon_x_exit_promo' onclick='history.back();'></i></div>
            <form action='controller.php?table=promo_produit&action=ajouter' method='post'>
                <table cellspacing='0 '>
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nom produit</th>
                        </tr>
                    </thead>
                    <tbody>
    ";
                $rslt=mysqli_query($mysqli,"select * from produit where IdPr not in (select IdPr from promo_produit where IdPromo=$id) order by NomPr");
                while($row=mysqli_fetch_assoc($rslt)){
                    $IdPr=$row['IdPr'];
                    echo"
                    <tr>
                        <input type='hidden' name='IdPromo' value='$id'>
                        <td class='td_check'><input type='checkbox' id='chek1'name='IdPr[]' value='$IdPr'  class='checkbox'><img src='../inc/img/produits/$row[ImagePr]'></td>
                        <td><label for='chek1' class='chek_prd'>$row[NomPr]</label></td>
                    </tr>";
                }
                    echo"
                    </tbody>
                </table>
                <div class='bas'>
                    <button type='submit'>Ajouter</button>
                </div>
            </form>
        </div>
    </div>";
}
?>
<?php
if (isset($_GET['table'])) {
    switch($_GET['table']){
        case 'produit' :
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
            echo "
            <section class='home'>
                <header class='produit'>
                    <div class='header_header_produit'></div>
                    <div class='case_produit'>Nombre de produits : $nbreProduct </div>
                    <div class='case_produit'>Nombre de produits vendus : $sum </div>
                    <div class='case_produit'>Chiffre d'affaires : $sumPrix DH </div>
                    <div class='case_produit'>Côut des produits en stock : $sumCout DH </div>
                </header>
                <main>
                    <div class='table_produit' >
                        <div class='entete'>
                            <div class='element'>
                                <div class='chercher'>
                                    <form action='gestion.php?table=produit' method='get'>
                                        <input type='hidden' name='table' value='produit'>
                                        <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                        <input type='text' name='mot' placeholder='Nom produit ...'>
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
                            <div></div>
                        </div>
                        <div class='produit'>
                            <button onclick='document.location.href=\"$url&ajouter_produit=true\"'><i class='fa-solid fa-plus'></i> Ajouter produit</button>
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
                            $rslt = mysqli_query($mysqli, 'select * from produit natural join catégorie order by NomPr');
                        }
                        while ($row = mysqli_fetch_assoc($rslt)) {
                            $IdPr=$row['IdPr'];
                            if($row['StatutPr']==1){
                                $statut='Disponible';
                                $color='#28dd28';
                            }
                            else{
                                $statut='Indisponible';
                                $color='red';
                            }
                            echo "
                            <tr> 
                                <td><img src='../inc/img/produits/".$row['ImagePr']."'alt=''></td>
                                <td>" . $row['NomPr'] . "</td>
                                <td>" . $row['NomCt'] . "</td>
                                <td>" . $row['PrixPr'] ."DH</td>
                                <td style='color:$color'>" . $statut . "</td>
                                <td>" . $row['StockPr'] . "</td>
                                <td class=\"action\">
                                    <i class=\"bx bx-edit icon_modifier_produit\" onclick='document.location.href=\"$url&modifier_produit=true&IdPr=$IdPr\"'></i>
                                    <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\" style=\"width:35px;height:35px\" onClick=\"confirmSupp('produit','supprimer',$IdPr)\"></lord-icon>
                                </td>
                            </tr>";
                        }
                    echo "
                        </tbody>
                    </table>";
        ;break;
        case 'catégorie' :
            $CountCt=mysqli_query($mysqli,"select * from catégorie");
            $nbreCt=mysqli_num_rows($CountCt);
            $countCtPop=mysqli_query($mysqli,"select NomCt,count(*) as nbre from détails_commande natural join produit natural join commande NATURAL JOIN catégorie group by IdCt order by nbre desc LIMIT 1;");
            $CtPop=mysqli_fetch_assoc($countCtPop);
            $countCtMoinsPop=mysqli_query($mysqli,"select NomCt,count(*) as nbre from détails_commande natural join produit natural join commande NATURAL JOIN catégorie group by IdCt order by nbre asc LIMIT 1;");
            $CtMoinsPop=mysqli_fetch_assoc($countCtMoinsPop);
            echo "
            <section class='home'>
                <header class='categorie'>
                    <div class='header_header_categorie'></div>
                    <div class='case_categorie'>Nombre de catégories : $nbreCt</div>
                    <div class='case_categorie'>Catégorie la plus populaire :".$CtPop['NomCt']."</div>
                    <div class='case_categorie'>Catégorie la moins populaire :". $CtMoinsPop['NomCt']."</div>
                </header>
                <main>
                    <div class='containner_main_categorie'>
                    <div class='ajouter_category'>
                            <button class='btn_ajouter_category' ><i class='fa-solid fa-plus'></i> Ajouter catégorie</button>
                        </div>
                        
            ";
                        $rslt = mysqli_query($mysqli, 'select * from catégorie order by NomCt');
                        while ($row = mysqli_fetch_assoc($rslt)) {
                        $IdCt=$row['IdCt'];
                        $rslt2=mysqli_query($mysqli,"select * from produit where IdCt = $IdCt");
                        echo"
                        <form action='controller.php?table=catégorie&action=modifier&IdCt=$IdCt' id='modifCt$IdCt' method='post'>
                        <div class='category'>
                            <div class='name_category'>
                                <input type='text' value='".$row['NomCt']."' name='NomCt' readonly class='nom_categorie'>
                                <button type='button' class='valider_modif_categorie cacher_icon' onclick=\"confirmModifAjt('modifCt$IdCt','Voulez-vous vraiment modifier le nom de la catégorie?','Modifier')\"><i class='bx bxs-check-square icon_valider_modif_categorie'></i></button>
                            </div> 
                            <div class='nbr_produit'>
                                <p>Nombre de produits :</p> <span>".mysqli_num_rows($rslt2)."</span>
                            </div>
                            <div class='action_category'>
                            
                                <i class=\"bx bx-edit btn_modifier_categorie\" ></i>
                                <lord-icon class='btn_supprimer_categorie' src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\"  colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\" style=\"width:35px;height:35px\" onclick=\"confirmSupp('catégorie','supprimer',$IdCt)\" ></lord-icon>
                            </div> 
                        </div>
                        </form>
                        ";
                        }
                        // <input  type='submit' value='Valider' class='btn_valider_categorie'>
                                // <input  type='button' value='Modifier' class='btn_modifier_categorie cacher'>
                    echo "
                    </div>
                    ";
        ;break;
        case 'commande' :
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
                <header class='commande'>
                    <div class='header_header_commande'></div>
                    <div class='case_commande'> Total commandes : $row </div>
                    <div class='case_commande'> En cours : $row1 </div>
                    <div class='case_commande'> Expédiée : $row2 </div>
                    <div class='case_commande'> Livrée : $row3 </div>
                    <div class='case_commande'> Annulée : $row4 </div>
                </header>
                <main>
                    <div class='table_commande'>
                        <div class='entete'>
                            <div class='element'>
                                <div class='chercher'>
                                    <form action='gestion.php' method='get'>
                                        <input type='hidden' name='table' value='commande'>
                                        <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                        <input type='text' name='mot' placeholder='N° Commande'>
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
                            <button onclick='document.location.href=\"$url&ajouter_commande=true\"'><i class='fa-solid fa-plus '></i> Ajouter commande</button>
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
                                $IdCmd=$row['IdCmd'];
                                echo " 
                                <tr>
                                    <td>".$row['IdCmd']."</td>
                                    <td><a href='gestion.php?table=commande&ficheClient=true&id=$row[IdMb]' style='color:rgb(69, 87, 106)'>".$row['NomMb']." ".$row['PrénomMb']."</a></td>
                                    <td>".$row['DateCmd']."</td>
                                    <td>".$row['prixTT']."</td>
                                    <td>".$row['modePaiement']."</td>
                                    <td>".$row['StatutCmd']."</td>
                                    <td class=\"action\">
                                        <input type='button' value='détails' class='btn_details_commande' onclick='document.location.href=\"gestion.php?table=commande&détails_commande=true&btn_détails_commande=true&IdCmd=$IdCmd\"'>
                                        <i class=\"bx bx-edit icon_modifier_commande\" onclick='document.location.href=\"$url&modifier_commande=true&IdCmd=$IdCmd\"' ></i>
                                        <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\" style=\"width:35px;height:35px\" onClick=\"confirmSupp('commande','supprimer',$IdCmd)\"></lord-icon>
                                    </td>
                                </tr>
                                ";
                            }
                            echo"
                            </tbody>
                        </table>
                            ";
        ;break;
        case 'RDV' :
            $rslt1=mysqli_query($mysqli,"select * from rdv");
            $nbre=mysqli_num_rows($rslt1);
            $rslt2=mysqli_query($mysqli,"select * from rdv where StatutRDV='Traité'");
            $nbreTr=mysqli_num_rows($rslt2);
            $rslt3=mysqli_query($mysqli,"select * from rdv where StatutRDV='Non traité'");
            $nbreNonTr=mysqli_num_rows($rslt3);
            echo"
                <section class='home '>
                    <header class='rdv'>
                        <div class='header_header_rdv'></div>
                        <div class='case_rdv'>Nombre de RDV : $nbre</div>
                        <div class='case_rdv'>RDV Traité : $nbreTr</div>
                        <div class='case_rdv'>RDV Non traité : $nbreNonTr</div>
                    </header>
                    <main>
                        <div class='table_rdv'>
                            <div class='entete'>
                                <div class='element'>
                                    <div class='chercher '>
                                        <form action='gestion.php' method='get'>
                                            <input type='hidden' name='table' value='RDV'>
                                            <button type='submit' name='recherche' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                            <input type='text' name='mot' placeholder='N° RDV'>
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
                                    <button onclick='document.location.href=\"gestion.php?table=RDV&ajouter_RDV=true\"'><i class='fa-solid fa-plus' ></i> Ajouter RDV</button>
                                </div>
                            </div>
                            <table cellspacing='0'>
                                <thead>
                                    <tr>
                                        <th>N° RDV</th>
                                        <th>Client</th>
                                        <th>Adresse</th>
                                        <th>Télé</th>
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
                                    $rslt = mysqli_query($mysqli, "select * from rdv  order by $tri ");
                                }
                                elseif(isset($_GET['statut'])){
                                    $statut=$_GET['statut'];
                                    $rslt = mysqli_query($mysqli, "select * from rdv where StatutRDV='$statut' order by IdRDV");
                                }
                                elseif(isset($_GET['recherche']) && isset($_GET['mot'])){
                                    $mot=$_GET['mot'];
                                    $rslt = mysqli_query($mysqli, "select * from rdv  where IdRDV like '%$mot%' order by IdRDV");
                                }
                                else{
                                    $rslt=mysqli_query($mysqli,"select * from rdv  order by IdRDV");
                                }
                                while($row=mysqli_fetch_assoc($rslt)){
                                    $IdRDV=$row['IdRDV'];
                                    echo "
                                    <tr>
                                        <td>$row[IdRDV]</td>
                                        <td>$row[NomMb] $row[PrénomMb]</td>
                                        <td>$row[AdresseMb]</td>
                                        <td>$row[NumTélé]</td>
                                        <td>$row[TypePrjt]</td>
                                        <td>$row[DateRDV]</td>
                                        <td>$row[StatutRDV]</td>
                                        <td class='action'>
                                            <i class='bx bx-edit btn_modifier_rdv' onclick='document.location.href=\"gestion.php?table=RDV&modifier_RDV=true&IdRDV=$IdRDV\"'></i>
                                            <lord-icon src='https://cdn.lordicon.com/qjwkduhc.json' trigger='hover' colors='primary:#e83a30,secondary:#e83a30,tertiary:#ffffff' state='hover-empty' style='width:35px;height:35px' onClick=\"confirmSupp('RDV','supprimer',$IdRDV)\"></lord-icon>
                                        </td>
                                    </tr>";
                                }
                                echo "
                                </tbody>
                            </table>
                        </div>";
        ;break;
        case 'promos' :
            $rslt1=mysqli_query($mysqli,"select * from promos");
            $nbre=mysqli_num_rows($rslt1);
            $rslt2=mysqli_query($mysqli,"select * from promos where StatutPromo='En cours'");
            $nbreEnCrs=mysqli_num_rows($rslt2);
            $rslt3=mysqli_query($mysqli,"select * from promos where StatutPromo='Terminée'");
            $nbreTerm=mysqli_num_rows($rslt3);
            echo"
            <section class='home'>
                <header class='promos'>
                    <div class='header_header_promos'></div>
                    <div class='case_promos'>Nombre de promos : $nbre</div>
                    <div class='case_promos'>Promos En cours : $nbreEnCrs</div>
                    <div class='case_promos'>Promos Terminées : $nbreTerm</div>
                </header>
                <main>
                    <div class='table_promos'>
                        <div class='entete'>
                            <div class='element'>
                                <div class='chercher'>
                                    <form action='gestion.php?table=promos' method='get'>
                                        <input type='hidden' name='table' value='promos'>
                                        <button type='submit' name='recherche' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                                        <input type='text' name='mot' placeholder='N° promo...'>
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
                            <button onclick='document.location.href=\"gestion.php?table=promos&ajouter_promos=true\"'><i class='fa-solid fa-plus '></i> Ajouter promotion</button>
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
                        if(isset($_GET['tri'])){
                            $tri=$_GET['tri'];
                            $rslt = mysqli_query($mysqli, "select * from promos  order by $tri ");
                        }
                        elseif(isset($_GET['statut'])){
                            $statut=$_GET['statut'];
                            $rslt = mysqli_query($mysqli, "select * from promos where StatutPromo='$statut' order by IdPromo");
                        }
                        elseif(isset($_GET['recherche']) && isset($_GET['mot'])){
                            $mot=$_GET['mot'];
                            $rslt = mysqli_query($mysqli, "select * from promos  where IdPromo like '%$mot%' order by IdPromo");
                        }
                        else{
                            $rslt=mysqli_query($mysqli,"select * from promos  order by IdPromo");
                        }
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
                                    <input type='button' value='détails' onclick='document.location.href=\"gestion.php?table=promos&détails_promos=true&id=$id\"'>
                                    <i class=\"bx bx-edit icon_modifier_commande\" onclick='document.location.href=\"gestion.php?table=promos&modifier_promos=true&id=$id\"' ></i>
                                    <lord-icon src=\"https://cdn.lordicon.com/qjwkduhc.json\" trigger=\"hover\" colors=\"primary:#e83a30,secondary:#e83a30,tertiary:#ffffff\" state=\"hover-empty\"style=\"width:35px;height:35px\" onClick=\"confirmSupp('promos','supprimer',$id)\"></lord-icon>
                                </td>
                            </tr>
                            ";
                        }
                        echo"
                        </tbody>
                    </table>
                        ";
        ;break;
    }
}
if(isset($_GET['success'])){
    echo "<script>success('$_GET[success]','$_GET[table]');</script>";
}
if(isset($_GET['successDétails'])){
    echo "<script>successDétails('$_GET[successDétails]');</script>";
}
if(isset($_GET['erreur'])){
    echo "<script>erreur('$_GET[erreur]');</script>";
}
?>
<?php include('./inc_ADMIN/footer.html');?>