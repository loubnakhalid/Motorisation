<?php
echo "
<div class='body_cmd'>
        
        <div class='div_form_modification_cmd'>
            <i class='bx bxs-x-square icon_x_exit' onclick='document.location.href=\"gestion.php?table=commande\"'></i>
            <form action='controller.php?table=commande&action=ajouter' method='post' enctype='multipart/form-data'>

                <div class='case_text'>
                    <label for=''>N° commande</label>
                    <div class='input_text'>
                        <input type='text' name='IdCmd' id='' readonly>
                    </div> 
                </div>

                <div class='case_select'>
                <label for=''>Nom client</label>
                <div class='input_select'>
                   <select name='IdMb' id=''>
                ";
                $rslt=mysqli_query($mysqli,"select * from membre order by NomMb");
                while($row=mysqli_fetch_assoc($rslt)){
                    echo '<option value="'.$row['IdMb'].'">'.$row['NomMb'].' '.$row['PrénomMb'].'</option>';
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
                        <input type='date' name='DateCmd' id=''>
                    </div> 
                </div>

                <div class='case_text'>
                    <label for=''>Total</label>
                    <div class='input_text'>
                        <input type='number' name='prixTT' id=''>
                    </div> 
                </div>

                <div class='case_select'>
                    <label for=''>Mode paiement</label>
                    <div class='input_select'>
                       <select name='modePaiement' id=''>
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
                       <select name='StatutCmd' id=''>
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
                        <textarea name='NoteCmd' id='' cols='96' rows='4'></textarea>
                    </div> 
                </div>


                <div class='bas_form'>
                    <div class='submit_form_modification_cmd'>
                        <input type='reset' value='Effacer' class='btn_effacer_form_modifier_cmd'>
                        <input type='submit' value='Modifier' class='btn_modifier_form_modifier_cmd'>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
";
?>