let change = document.querySelector(".change"),
    menu = document.querySelector(".menu");
change.addEventListener("click", () => {
    menu.classList.toggle("fermer");
});
document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};

var input_quantite = document.getElementsByClassName("input_quantite")
icon_exit__modif_display_cmd = document.getElementsByClassName("icon_exit__modif_display_cmd"),
    icon_modifier_commande_display = document.getElementsByClassName("icon_modifier_commande_display"),
    valider_modif_display_cmd = document.getElementsByClassName("valider_modif_display_cmd"),
    exit__modif_display_cmd = document.getElementsByClassName("exit__modif_display_cmd");
for (let index = 0; index < icon_modifier_commande_display.length; index++) {
    icon_modifier_commande_display[index].addEventListener("click", () => {
        input_quantite[index].removeAttribute("readonly");
        input_quantite[index].setAttribute("autofocus", true);
        input_quantite[index].style.borderColor = '#00c985';
        valider_modif_display_cmd[index].classList.remove("cacher_icon");
        exit__modif_display_cmd[index].classList.remove("cacher_icon");
    });

}
for (let index = 0; index < icon_exit__modif_display_cmd.length; index++) {
    icon_exit__modif_display_cmd[index].addEventListener("click", () => {
        input_quantite[index].setAttribute("readonly", true);
        input_quantite[index].style.borderColor = '#ffffff';
        valider_modif_display_cmd[index].classList.add("cacher_icon");
        exit__modif_display_cmd[index].classList.add("cacher_icon");
    });

}
let btn_ajouter_category = document.querySelector(".btn_ajouter_category"),
    containner_main_categorie = document.querySelector(".containner_main_categorie");
btn_ajouter_category.addEventListener("click", ajouterFormulaire);
let btn_modifier_categorie = document.getElementsByClassName("btn_modifier_categorie"),
    valider_modif_categorie = document.getElementsByClassName("valider_modif_categorie"),
    nom_categorie = document.getElementsByClassName("nom_categorie"),
    exit_modif_categorie = document.getElementsByClassName("exit_modif_categorie");

for (let index = 0; index < btn_modifier_categorie.length; index++) {
    btn_modifier_categorie[index].addEventListener("click", () => {
        valider_modif_categorie[index].classList.remove("cacher_icon");
        exit_modif_categorie[index].classList.remove("cacher_icon");
        nom_categorie[index].removeAttribute("readonly");
        nom_categorie[index].style.borderColor = '#00c985';
    });
}

for (let index = 0; index < exit_modif_categorie.length; index++) {
    exit_modif_categorie[index].addEventListener("click", () => {
        valider_modif_categorie[index].classList.add("cacher_icon");
        exit_modif_categorie[index].classList.add("cacher_icon");
        nom_categorie[index].setAttribute("readonly", true);
        nom_categorie[index].style.borderColor = '#ffffff';
    });
}