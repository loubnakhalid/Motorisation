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
    document.body.style.overflowY = 'hidden';
}

function fermerRDV() {
    document.getElementById('RDV').style.display = 'none';
    document.body.style.overflowY = 'auto';
}

function AffichePaypal() {
    let AffichePaypal = document.getElementById("paypal-button-container");
    AffichePaypal.style.display = "block";
    let Form = document.getElementById("FinirCommande");
    Form.style.height = "595px";
    let FormFooter = document.getElementById("Fin");
    FormFooter.style.marginTop = "0px";
}

function MasquePaypal() {
    let AffichePaypal = document.getElementById("paypal-button-container");
    AffichePaypal.style.display = "none";
    let Form = document.getElementById("FinirCommande");
    Form.style.height = "500px";
    let FormFooter = document.getElementById("Fin");
    FormFooter.style.marginTop = "29px";
}

function afficherFinalisation() {
    document.getElementById('FinirCommande').style.display = 'block';
    document.getElementById('overlay').classList.add('active');
    document.body.style.overflowY = 'hidden';
}

function masquerFinalisation() {
    document.getElementById('FinirCommande').style.display = 'none';
    document.getElementById('overlay').classList.remove('active');
    document.body.style.overflowY = 'auto';
}