function hide() {
    login_hover.classList.add("hover");
}

function affiche() {
    login_hover.classList.remove("hover");
}

function login() {
    icon_user.addEventListener("mouseover", affiche);
    login_hover.addEventListener("mouseover", affiche);
    icon_user.addEventListener("mouseleave", hide);
    login_hover.addEventListener("mouseleave", hide);
}

function diminuerQt(pos) {
    let inpt = document.getElementsByClassName("btnQte");
    if (inpt[pos].value > 0) {
        inpt[pos].value--;
    }
    document.location.href = 'controller.php?qtPan=true&pos=' + pos + '&nbre=' + inpt[pos].value;
}

function augmenterQt(pos, stock) {
    let inpt = document.getElementsByClassName("btnQte");
    if (inpt[pos].value >= stock) {
        inpt[pos].value = stock;
        swal({
            title: 'Le stock de ce produit s\'est épuisé!',
            text: 'Il en reste que ' + stock + ' articles ',
            icon: 'warning',
            button: 'Ok',
        });
        return;
    } else if (inpt[pos].value >= 0) {
        inpt[pos].value++;
        document.location.href = 'controller.php?qtPan=true&pos=' + pos + '&nbre=' + inpt[pos].value;
    }

}

function ouvrirRDV() {
    document.getElementById('RDV').style = '';
}

function fermerRDV() {
    document.getElementById('RDV').style.display = 'none';
}