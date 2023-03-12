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
var fleche_pub_left = document.getElementById("fleche_pub_left"),
    fleche_pub_right = document.getElementById("fleche_pub_right"),
    rd = document.getElementsByClassName("rd");

for (let i = 0; i < rd.length; i++) {
    if (rd[i].checked) {
        var conteur = i;
        break;
    }

}
fleche_pub_left.addEventListener("click", () => {

    if (conteur == 0) {
        conteur = 3;
        rd[3].checked = true;

    } else {
        conteur--;
        rd[conteur].checked = true;
    }
});
fleche_pub_right.addEventListener("click", () => {
    if (conteur == 3) {
        conteur = 0;
        rd[0].checked = true;
    } else {
        conteur++;
        rd[conteur].checked = true;
    }

});
let fleche_left_btn = document.querySelector(".fleche_left_btn")
fleche_right_btn = document.querySelector(".fleche_right_btn"),
    tout_produit_categorie = document.querySelector(".tout_produit_categorie")


fleche_right_btn.addEventListener("click", () => {
    tout_produit_categorie.scrollLeft = tout_produit_categorie.scrollLeft + 250;

});

fleche_left_btn.addEventListener("click", () => {
    tout_produit_categorie.scrollLeft = tout_produit_categorie.scrollLeft - 250;

});