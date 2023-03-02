let login_hover = document.querySelector(".login_hover");
let icon_user = document.querySelector(".icon_user");

function hide() {
    login_hover.classList.add("hover");
}

function affiche() {
    login_hover.classList.remove("hover");
}

icon_user.addEventListener("mouseover", affiche);
login_hover.addEventListener("mouseover", affiche);
icon_user.addEventListener("mouseleave", hide);
login_hover.addEventListener("mouseleave", hide);

function blur_cherche_input(n) {
    if (form_recherche.n.value.length == 0) form_recherche.n.value = 'Article, produit, marque...';
}

function click_cherche_input() {
    if (document.form_recherche.chercher.value == 'Article, produit, marque...') document.form_cherche.rechercher.value = "";
}