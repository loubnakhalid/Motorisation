document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};
let btn_modifier_categorie = document.getElementsByClassName("btn_modifier_categorie"),
    valider_modif_categorie = document.getElementsByClassName("valider_modif_categorie"),
    nom_categorie = document.getElementsByClassName("nom_categorie");

for (let index = 0; index < btn_modifier_categorie.length; index++) {
    btn_modifier_categorie[index].addEventListener("click", () => {
        valider_modif_categorie[index].classList.remove("cacher_icon");
        nom_categorie[index].removeAttribute("readonly");
        nom_categorie[index].style.borderColor = '#00c985';
    });

}

let btn_ajouter_category = document.querySelector(".btn_ajouter_category"),
    containner_main_categorie = document.querySelector(".containner_main_categorie");
btn_ajouter_category.addEventListener("click", () => {
    containner_main_categorie.innerHTML = containner_main_categorie.innerHTML + "<form action='controller.php?table=catégorie&action=ajouter' method='post'><div class='category'> <div class='name_category'><input type='text' value='' name='NomCt' class='nom_categorie display'><button type='submit' class='valider_modif_categorie '><i class='bx bxs-check-square icon_valider_modif_categorie '></i></button> </div> </div></form>";
    document.querySelector(".nom_categorie.display").style.borderColor = '#00c985';
});
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



const input_quantite = document.querySelector(".input_quantite"),
    icon_modifier_commande_display = document.querySelector(".icon_modifier_commande_display"),
    valider_modif_display_cmd = document.querySelector(".valider_modif_display_cmd");
icon_modifier_commande_display.addEventListener("click", () => {
    input_quantite.removeAttribute("readonly");
    input_quantite.setAttribute("autofocus", true);
    input_quantite.style.borderColor = '#00c985';
    valider_modif_display_cmd.classList.remove("cacher_icon");
});