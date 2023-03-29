<?php
echo "<div class='body_display_commande '>
<div class='div_details_display_commande '>
    <table cellspacing='0 '>
        <thead>
            <tr>
                <th>Nom produit</th>
                <th>Quantite</th>
                <th class='action'>Actions</th>
            </tr>
        </thead>
        <tbody>
           <form action=''>
            <tr>
                <td>JAKHROUTI</td>
                <td><input type='text' value='3' class='input_quantite' readonly autofocus ></td>
                <td class='action'>
                    <button type='submit' class='valider__modif_display_cmd cacher_icon'><i class='bx bxs-check-square icon_valider_modif_display_cmd '></i></button>
                    <i class='bx bx-edit icon_modifier_commande_display'  ></i>
                    <lord-icon src='https://cdn.lordicon.com/qjwkduhc.json' trigger='hover' colors='primary:#e83a30,secondary:#e83a30,tertiary:#ffffff' state='hover-empty' style='width:35px;height:35px' onClick='confirmSupp('commande','supprimer')'></lord-icon>
                </td>
           </tr>
           </form>
        </tbody>
     </table>
     <div class='bas_table'>
        <button onclick='' class='ajouter_cmd_display_cmd'><i class='fa-solid fa-plus '></i> commande</button>
        <button onclick='' class='ajouter_prd_display_cmd'><i class='fa-solid fa-plus '></i> produit</button>
     </div>

</div>

<div class='ajouter_cmd_details_cmd cacher_body_display_commande'>
    <form action=''>
    <table cellspacing='0 '>
       
        <tbody>
           
            <tr>
                <td><input type='checkbox' id='chek1'><label for='chek1' class='check_cmd'>Cammande</label></td>
           </tr>
        </tbody>
     </table>
     <div class='bas'>
        <button type='submit'>Ajouter</button>
     </div>
    </form>
</div>

<div class='ajouter_prd_details_cmd cacher_body_display_commande'>
    <form action=''>
        <table cellspacing='0 '>
            <thead>
                <tr>
                    <th>Nom produit</th>
                    <th>Quantite</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class='prd'><input type='checkbox' id='chek1'><label for='chek1' class='check_prd'>Nom de produit</label></td>
                    <td><input type='number' class='inpt_qnt_prd'></td>
               </tr>
            </tbody>
         </table>
         <div class='bas'>
            <button type='submit'>Ajouter</button>
         </div>
        </form>
    </div>
</div>";

?>
<script>
const btn_details_commande=document.querySelector(".btn_details_commande"),
body_display_commande=document.querySelector(".body_display_commande"),
 bodyElement = document.body;

btn_details_commande.addEventListener("click",()=>{
    body_display_commande.classList.remove("cacher_body_display_commande");
    bodyElement.style.overflowY = "hidden";
});

const input_quantite=document.querySelector(".input_quantite"),
icon_modifier_commande_display=document.querySelector(".icon_modifier_commande_display"),
valider_modif_display_cmd=document.querySelector(".valider_modif_display_cmd");
icon_modifier_commande_display.addEventListener("click",()=>{
    input_quantite.removeAttribute("readonly");
    input_quantite.setAttribute("autofocus",true);
    input_quantite.classList.add("modif_qnt_vert");
    valider__modif_display_cmd.classList.remove("cacher_icon");
});


const ajouter_cmd_display_cmd=document.querySelector(".ajouter_cmd_display_cmd"),
ajouter_cmd_details_cmd=document.querySelector(".ajouter_cmd_details_cmd")
div_details_display_commande=document.querySelector(".div_details_display_commande");
ajouter_cmd_display_cmd.addEventListener("click",()=>{
    div_details_display_commande.classList.add("cacher_body_display_commande");
    ajouter_cmd_details_cmd.classList.remove("cacher_body_display_commande");
});


const ajouter_prd_display_cmd=document.querySelector(".ajouter_prd_display_cmd"),
ajouter_prd_details_cmd=document.querySelector(".ajouter_prd_details_cmd");
ajouter_prd_display_cmd.addEventListener("click",()=>{
    div_details_display_commande.classList.add("cacher_body_display_commande");
    ajouter_prd_details_cmd.classList.remove("cacher_body_display_commande");
});
</script>