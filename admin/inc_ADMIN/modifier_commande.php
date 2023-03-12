<?php
echo "
<div class='body_cmd'>
        <div class='div_form_modification_cmd'>
            <i class='bx bxs-x-square icon_x_exit' onclick='document.location.href=\"gestion.php?table=commande\"'></i>
            <form action='controller.php?table=commande&action=modifier' method='post' enctype='multipart/form-data'>

                <div class='case_text'>
                    <label for=''>N° commande</label>
                    <div class='input_text'>
                        <input type='text' name='IdCmd' id='' value='$row[IdCmd]' readonly>
                    </div> 
                </div>

                <div class='case_text'>
                <label for=''>Nom client</label>
                <div class='input_text'>
                    <input type='text' name='NomMb' id='' value='$row[NomMb]' readonly>
                </div> 
                </div>

                <div class='case_text'>
                    <label for=''>Date commande</label>
                    <div class='input_text'>
                        <input type='date' name='DateCmd' value='$row[DateCmd]' id=''>
                    </div> 
                </div>

                <div class='case_text'>
                    <label for=''>Total</label>
                    <div class='input_text'>
                        <input type='number' name='prixTT' value='$row[prixTT]' id=''>
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
                        <textarea name='NoteCmd' id='' cols='96' rows='4'>$row[NoteCmd]</textarea>
                    </div> 
                </div>
                <div class='case_cocher'>
                    <input type='checkbox' name='envEmail'> Renseigner le client par l'état de la commande
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
