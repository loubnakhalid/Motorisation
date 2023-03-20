<?php
$lienPr= $_SERVER['HTTP_REFERER'];
echo "
    <div class='body'>
        <div class='div_form_modification_produit'>
            <i class='bx bxs-x-square icon_x_exit' onclick='document.location.href=\"$lienPr\"'></i>
            <form name='formModif' action='controller.php?table=produit&action=modifier&id=$id' method='post' enctype='multipart/form-data' onsubmit='return confirm(\"Voulez-vous vraiment effectuer la modification?\");'>
                <div class='form_left'>
                    <div class='case'>
                        <label for=''>Nom produit</label>
                        <div class='input_text'>
                            <input type='text' name='NomPr' id='' value='$row[NomPr]'>
                        </div> 
                    </div>
                    <div class='case'>
                        <label for=''>Categorie</label>
                        <div class='input_select'>
                            <select name='IdCt' id='' >
        ";
                                 $rslt2=mysqli_query($mysqli,"select * from catégorie");
                                 while($row2=mysqli_fetch_assoc($rslt2)){
                                    if($row['NomCt']==$row2['NomCt']){
                                        echo "<option value='$row2[IdCt]' selected>$row2[NomCt]</option>";
                                    }
                                    else{
                                        echo "<option value='.$row2[IdCt].'>$row2[NomCt]</option>";
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
                                echo "<option value='0' selected>Indisponible</option>";
                                }
                                else{
                                echo "<option value='0'>Indisponible</option>";
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
                            <input type='number' name='PrixPr' value='$row[PrixPr]' id=''>
                        </div> 
                    </div>
                    <div class='case_prix_qauntite'>
                        <label for=''>Quantite</label>
                        <div class='input_text'>
                            <input type='number' value='$row[StockPr]' name='StockPr' id='' onChange='dispo()'>
                        </div> 
                    </div>
                    <div class='case_text_area'>
                        <label for=''>Description</label>
                        <div class='input_text_area'>
                            <textarea name='DescriptionPr' id='' cols='96' rows='5'>$row[DescriptionPr]</textarea>
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
                        <input type='submit' value='Modifier' class='btn_modifier_form_modifier_produit'>
                    </div>
            </form>
                </div>
        </div>
    </div>
";
?>