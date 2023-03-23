<?php
echo "
<div class='body'>
    <div class='div_form_modification_produit'>
        <i class='bx bxs-x-square icon_x_exit' onclick='document.location.href=\"$lienPr\"'></i>
        <form action='controller.php?table=produit&action=ajouter' method='post' enctype='multipart/form-data' onsubmit='return confirm(\"Voulez-vous vraiment ajouter le produit?\");'>
            <div class='form_left'>
                <div class='case'>
                    <label for=''>Nom produit</label>
                    <div class='input_text'>
                        <input type='text' name='NomPr' id='' value=''>
                    </div> 
                </div>
                <div class='case'>
                    <label for=''>Categorie</label>
                    <div class='input_select'>
                        <select name='IdCt' id=''>
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
                        <select name='StatutPr' id=''>
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
                        <input type='number' name='PrixPr' value='' id=''>
                    </div> 
                </div>
                <div class='case_prix_qauntite'>
                    <label for=''>Quantite</label>
                    <div class='input_text'>
                        <input type='number' value='' name='StockPr' id=''>
                    </div> 
                </div>
                <div class='case_text_area'>
                    <label for=''>Description</label>
                    <div class='input_text_area'>
                        <textarea name='DescriptionPr' id='' cols='96' rows='5'></textarea>
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
                    <input type='submit' value='Ajouter' class='btn_modifier_form_modifier_produit'>
                </div>
            </div>
        </div>
    </form>
</div>
";
?>