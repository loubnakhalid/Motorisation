document.addEventListener("DOMContentLoaded", function(event) {
    const btn_details_commande = document.querySelector(".btn_details_commande"),
        body_display_commande = document.querySelector(".body_display_commande"),
        bodyElement = document.body;

    btn_details_commande.addEventListener("click", () => {
        body_display_commande.classList.remove("cacher_body_display_commande");
        bodyElement.style.overflowY = "hidden";
    });

    const input_quantite = document.querySelector(".input_quantite"),
        icon_modifier_commande_display = document.querySelector(".icon_modifier_commande_display"),
        valider_modif_display_cmd = document.querySelector(".valider_modif_display_cmd");
    icon_modifier_commande_display.addEventListener("click", () => {
        input_quantite.removeAttribute("readonly");
        input_quantite.setAttribute("autofocus", true);
        input_quantite.classList.add("modif_qnt_vert");
        valider_modif_display_cmd.classList.remove("cacher_icon");
    });


    const ajouter_cmd_display_cmd = document.querySelector(".ajouter_cmd_display_cmd"),
        ajouter_cmd_details_cmd = document.querySelector(".ajouter_cmd_details_cmd")
    div_details_display_commande = document.querySelector(".div_details_display_commande");
    ajouter_cmd_display_cmd.addEventListener("click", () => {
        div_details_display_commande.classList.add("cacher_body_display_commande");
        ajouter_cmd_details_cmd.classList.remove("cacher_body_display_commande");
    });


    const ajouter_prd_display_cmd = document.querySelector(".ajouter_prd_display_cmd"),
        ajouter_prd_details_cmd = document.querySelector(".ajouter_prd_details_cmd");
    ajouter_prd_display_cmd.addEventListener("click", () => {
        div_details_display_commande.classList.add("cacher_body_display_commande");
        ajouter_prd_details_cmd.classList.remove("cacher_body_display_commande");
    });
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};
const change = document.querySelector(".change"),
    menu = document.querySelector(".menu");
change.addEventListener("click", () => {
    menu.classList.toggle("fermer");
})

// const mod=document.querySelector(".modifier");
// const read=document.querySelector(".read");
// mod.addEventListener("click",()=>{
//     read.removeAttribute("readonly")
// })
/*-----------------------------------------------------------------------------------*/

const trie_par = document.querySelector(".input_trie"),
    display_trie = document.querySelector(".display_trie");
trie_par.addEventListener("click", () => {
    display_trie.classList.toggle("cacher");
});

const statut_produit = document.querySelector(".input_statut"),
    display_statut = document.querySelector(".display_statut");
statut_produit.addEventListener("click", () => {
    display_statut.classList.toggle("cacher");
});

trie_par.addEventListener("mouseover", () => {
    display_trie.classList.remove("cacher");
});
trie_par.addEventListener("mouseleave", () => {
    display_trie.classList.add("cacher");
});

display_trie.addEventListener("mouseover", () => {
    display_trie.classList.remove("cacher");
});
display_trie.addEventListener("mouseout", () => {
    display_trie.classList.add("cacher");
});


statut_produit.addEventListener("mouseout", () => {
    display_statut.classList.add("cacher");
});
statut_produit.addEventListener("mouseover", () => {
    display_statut.classList.remove("cacher");
});

display_statut.addEventListener("mouseout", () => {
    display_statut.classList.add("cacher");
});
display_statut.addEventListener("mouseover", () => {
    display_statut.classList.remove("cacher");
});
/*-----------------------------------------------------------------------------------*/


let input_image = document.querySelector(".input_image"),
    image_telecharger = document.querySelector("#image_telecharger");

input_image.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(input_image.files[0]);
        reader.onload = () => {
            image_telecharger.setAttribute("src", reader.result);
        }

    }
    /*-----------------------------------------------------------------------------------*/

let div_form_modification_produit = document.querySelector(".div_form_modification_produit"),
    body = document.querySelector(".body"),
    btn_retour_form_modifier_produit = document.querySelector(".btn_retour_form_modifier_produit"),
    icon_modifier = document.getElementsByClassName("icon_modifier_produit");

/*for (let i = 0; i < icon_modifier.length; i++) {
    icon_modifier[i].addEventListener("click", () => {
        body.classList.remove("cacher");
    });
}


btn_retour_form_modifier_produit.addEventListener("click", () => {
    body.classList.add("cacher");
});

*/
body.addEventListener("click", (event) => {
    if (!div_form_modification_produit.contains(event.target)) {
        document.location.href = "gestion.php?table=produit";
    }

});
/*-----------------------------------------------------------------------------------*/

/*const nom_categorie = document.querySelector(".nom_categorie"),
    btn_valider_categorie = document.querySelector(".btn_valider_categorie"),
    btn_modifier_categorie = document.querySelector(".btn_modifier_categorie"),
    btn_supprimer_categorie = document.querySelector(".btn_supprimer_categorie");

btn_modifier_categorie.addEventListener("click", () => {
    nom_categorie.removeAttribute("readonly");
    btn_modifier_categorie.classList.add("cacher");
    btn_valider_categorie.classList.remove("cacher");
});
btn_valider_categorie.addEventListener("click", () => {
    nom_categorie.setAttribute("readonly", true);
    btn_valider_categorie.classList.add("cacher");
    btn_modifier_categorie.classList.remove("cacher");
});*/
/*-----------------------------------------------------------------------------------*/
var icon_x_exit_rdv = document.querySelector('.icon_x_exit_rdv'),
    body_display_modif_rdv = document.querySelector('.body_display_modif_rdv');
icon_x_exit_rdv.addEventListener('click', () => {
    body_display_modif_rdv.classList.add('cacher_body_display_modif_rdv');
});

var icon_x_exit_promo = document.querySelector('.icon_x_exit_promo'),
    body_display_modif_promo = document.querySelector('.body_display_modif_promo');
icon_x_exit_promo.addEventListener('click', () => {
    body_display_modif_promo.classList.add('cacher_body_display_modif_promo');
});


let btn_modifier_rdv = document.getElementsByClassName("btn_mpdofier_rdv");
for (let index = 0; index < btn_modifier_rdv.length; index++) {
    btn_modifier_rdv[index].addEventListener("click", () => {
        body_display_modif_rdv.classList.remove('cacher_body_display_modif_rdv');

    });

}
/*-----------------------------------------------------------------------------------*/

/*const btn_details_commande = document.querySelector(".btn_details_commande"),
    body_display_commande = document.querySelector(".body_display_commande"),
    bodyElement = document.body;

btn_details_commande.addEventListener("click", () => {
    body_display_commande.classList.remove("cacher_body_display_commande");
    bodyElement.style.overflowY = "hidden";
});

const input_quantite = document.querySelector(".input_quantite"),
    icon_modifier_commande_display = document.querySelector(".icon_modifier_commande_display"),
    valider_modif_display_cmd = document.querySelector(".valider_modif_display_cmd");
icon_modifier_commande_display.addEventListener("click", () => {
    input_quantite.removeAttribute("readonly");
    input_quantite.setAttribute("autofocus", true);
    input_quantite.classList.add("modif_qnt_vert");
    valider__modif_display_cmd.classList.remove("cacher_icon");
});


const ajouter_cmd_display_cmd = document.querySelector(".ajouter_cmd_display_cmd"),
    ajouter_cmd_details_cmd = document.querySelector(".ajouter_cmd_details_cmd")
div_details_display_commande = document.querySelector(".div_details_display_commande");
ajouter_cmd_display_cmd.addEventListener("click", () => {
    div_details_display_commande.classList.add("cacher_body_display_commande");
    ajouter_cmd_details_cmd.classList.remove("cacher_body_display_commande");
});


const ajouter_prd_display_cmd = document.querySelector(".ajouter_prd_display_cmd"),
    ajouter_prd_details_cmd = document.querySelector(".ajouter_prd_details_cmd");
ajouter_prd_display_cmd.addEventListener("click", () => {
    div_details_display_commande.classList.add("cacher_body_display_commande");
    ajouter_prd_details_cmd.classList.remove("cacher_body_display_commande");
});*/

const input_quantite = document.querySelector(".input_quantite"),
    icon_modifier_commande_display = document.querySelector(".icon_modifier_commande_display"),
    valider_modif_display_cmd = document.querySelector(".valider_modif_display_cmd");
icon_modifier_commande_display.addEventListener("click", () => {
    input_quantite.removeAttribute("readonly");
    input_quantite.setAttribute("autofocus", true);
    input_quantite.style.borderColor = '#00c985';
    valider_modif_display_cmd.classList.remove("cacher_icon");
});