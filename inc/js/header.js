let login_hover = document.querySelector(".login_hover");
let icon_user = document.querySelector(".icon_user");

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
/* ------------------------------------------------------------------------------- */
let fleche_left_btn = document.getElementsByClassName("fleche_left_btn"),
    fleche_right_btn = document.getElementsByClassName("fleche_right_btn"),
    tout_produit_categorie = document.getElementsByClassName("tout_produit_categorie");

for (let index = 0; index < fleche_left_btn.length; index++) {
    fleche_left_btn[index].addEventListener("click", () => {
        tout_produit_categorie[index].scrollLeft = tout_produit_categorie[index].scrollLeft - 250;

    });

}
for (let index = 0; index < fleche_right_btn.length; index++) {
    fleche_right_btn[index].addEventListener("click", () => {
        tout_produit_categorie[index].scrollLeft = tout_produit_categorie[index].scrollLeft + 250;

    });

}

/* ------------------------------------------------------------------------------- */
const Email = document.querySelector("#EmCnx");
const Mdps = document.querySelector("#MdpCnx");

const btn = document.querySelector("#FRmbtnCnx");
const ErNom = document.querySelector('#InpNom');
const ErPrenom = document.querySelector('#InpPrénom');
const ErVille = document.querySelector('#InpVille');
const ErCP = document.querySelector('#InpCP');
const ErTél = document.querySelector('#InpTélé');
const ErDT = document.querySelector('#InpDT');
const ErAdrs = document.querySelector('#InpAdrs');
const ErEml = document.querySelector('#InpEm');
const ErMps = document.querySelector('#InpMps');
const ErCnMps = document.querySelector('#InpConfMps');

const CodeSécr = document.querySelector('#InputCS');

const MdpsOubEmail = document.querySelector('#InputMdpsOub');

const ReinMdps = document.querySelector('#InputRéinMdps');
const ReinConfMps = document.querySelector('#InputRéinConfMdps');

const RdvNm = document.querySelector('#InputRdvNm');
const RdvPr = document.querySelector('#InputRdvPr');
const RdvEml = document.querySelector('#InputRdvEml');
const RdvTel = document.querySelector('#InputRdvtel');

let prg1 = document.querySelector(".ErMsg1");
let prg2 = document.querySelector(".ErMsg2");


let ObNom = document.querySelector(".ErNomOb");
let ObPrénom = document.querySelector(".ErPrOb");
let ObDT = document.querySelector(".ErDtOb");
let ObEml = document.querySelector(".ErEmlOb");
let ObAds = document.querySelector(".ErAdsOb");
let ObMps = document.querySelector(".ErPsOb");
let ObConfMps = document.querySelector(".ErCnfPsOb");
let ObVille = document.querySelector(".ErVlOb");
let ObTél = document.querySelector(".ErTelOb");
let ObCP = document.querySelector(".ErCpOb");

let ObCodeSec = document.querySelector(".ErCodeSéc");

let ObMspdOubEmail = document.querySelector(".ErMdpsOubEmail");

let ObReinMdps = document.querySelector(".ErReinMdps");
let ObReinConfMps = document.querySelector(".ErReinConfMdps");

let ObRdvNm = document.querySelector(".ErRdvNom");
let ObRdvPr = document.querySelector(".ErRdvPr");
let ObRdvEml = document.querySelector(".ErRdvEmail");
let ObRdvTel = document.querySelector(".ErRdvtel");

function ValidationRdv() {
    //Vérifier Nom
    var aide = true;
    if (RdvNm.value == "") {
        ObRdvNm.style.visibility = "visible";
        aide = false;
    } else if (/[0-9]/.test(RdvNm.value)) {
        ObRdvNm.innerHTML = '*le nom ne doit pas contenir un chiffre';
        ObRdvNm.style.visibility = "visible";
        ObRdvPr.style.position = "relative";
        ObRdvPr.style.left = "21px";
        aide = false;
    }
    //Vérifier Prénom
    if (RdvPr.value == "") {
        ObRdvPr.style.visibility = "visible";
        aide = false;
    } else if (/[0-9]/.test(RdvPr.value)) {
        ObRdvPr.innerHTML = '*le prénom ne doit pas contenir un chiffre';
        ObRdvPr.style.visibility = "visible";
        aide = false;
    }
    //Vérifier Email
    if (RdvEml.value == "") {
        ObRdvEml.style.visibility = "visible";
        aide = false;
    }
    //Vérifier télé
    if (RdvTel.value == "") {
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (/[A-Z]/.test(RdvTel.value) || /[a-z]/.test(RdvTel.value)) {
        ObRdvTel.innerHTML = '*le Télé ne doit pas contenir des lettres';
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!/^07|^06/.test(RdvTel.value)) {
        ObRdvTel.innerHTML = '*le Télé  doit commencer par 06 ou 07';
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (RdvTel.value.length != 10) {
        ObRdvTel.innerHTML = '*le Télé  doit contenir 10 chiffres';
        ObRdvTel.style.visibility = "visible";
        aide = false;
    }
    return aide;

}

function ValiderReinMdps() {
    var aide = true;
    ObReinMdps.style.visibility = "hidden";
    ObReinConfMps.style.visibility = "hidden";
    //Verifier mot de passe
    if (ReinMdps.value == "") {
        ObReinMdps.style.visibility = "visible";
        aide = false;
    } else if (!/[A-Z]/.test(ReinMdps.value)) {
        ObReinMdps.innerHTML = '*le mot de passe doit contenir une majuscule';
        ObReinMdps.style.visibility = "visible";
        aide = false;
    } else if (!/[a-z]/.test(ReinMdps.value)) {
        ObReinMdps.innerHTML = '*le mot de passe doit contenir une minuscule';
        ObReinMdps.style.visibility = "visible";
        aide = false;
    } else if (!/[0-9]/.test(ReinMdps.value)) {
        ObReinMdps.innerHTML = '*le mot de passe doit contenir un chiffre';
        ObReinMdps.style.visibility = "visible";
        aide = false;
    } else if (ReinMdps.value.length < 8) {
        ObReinMdps.innerHTML = '*le mot de passe doit contenir plus de 8chiffres';
        ObReinMdps.style.visibility = "visible";
        aide = false;
    } else if (!/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(ReinMdps.value)) {
        ObReinMdps.innerHTML = '*le mot de passe doit contenir un caractère spécial';
        ObReinMdps.style.visibility = "visible";
        aide = false;
    }
    //vvérifier confirmer mot de passe
    if (ReinConfMps.value == "") {
        ObReinConfMps.style.visibility = "visible";
        aide = false;
    } else if (ReinConfMps.value != ReinMdps.value) {
        ObReinConfMps.innerHTML = '*Les deux mots de passe doivent correspondre';
        ObReinConfMps.style.visibility = "visible";
        aide = false;
    }
    return aide;

}

function ValidationCreation() {
    var aide = true;
    ObAds.style.visibility = "hidden";
    ObDT.style.visibility = "hidden";
    ObEml.style.visibility = "hidden";
    ObNom.style.visibility = "hidden";
    ObPrénom.style.visibility = "hidden";
    ObVille.style.visibility = "hidden";
    ObTél.style.visibility = "hidden";
    ObCP.style.visibility = "hidden";
    ObMps.style.visibility = "hidden";
    ObConfMps.style.visibility = "hidden";
    ErAdrs.style.borderColor = "green";
    ErDT.style.borderColor = "green";
    ErEml.style.borderColor = "green";
    ErNom.style.borderColor = "green";
    ErPrenom.style.borderColor = "green";
    ErVille.style.borderColor = "green";
    ErTél.style.borderColor = "green";
    ErCP.style.borderColor = "green";
    ErMps.style.borderColor = "green";
    ErCnMps.style.borderColor = "green";
    //----Vérifier si les champs est vide
    //Vérifier adresse
    if (ErAdrs.value == "") {
        ObAds.style.visibility = "visible";
        ErAdrs.style.borderColor = "red";
        aide = false;
    }
    //Vérifier Date
    if (ErDT.value == "") {
        ObDT.style.visibility = "visible";
        ErDT.style.borderColor = "red";
        aide = false;
    }
    //Vérifier Email
    if (ErEml.value == "") {
        ObEml.style.visibility = "visible";
        ErEml.style.borderColor = "red";
        aide = false;
    }
    //------
    //Vérifie Nom
    if (ErNom.value == "") {
        ObNom.style.visibility = "visible";
        ErNom.style.borderColor = "red";
        aide = false;
    } else if (/[0-9]/.test(ErNom.value)) {
        ObNom.innerHTML = '*le nom ne doit pas contenir un chiffre';
        ObNom.style.visibility = "visible";
        ErNom.style.borderColor = "red";
        ObPrénom.style.position = "relative";
        ObPrénom.style.left = "93px";
        aide = false;
    }
    //Vérife Prénom
    if (ErPrenom.value == "") {
        ObPrénom.style.visibility = "visible";
        ErPrenom.style.borderColor = "red";
        aide = false;
    } else if (/[0-9]/.test(ErPrenom.value)) {
        ObPrénom.innerHTML = '*le prénom ne doit pas contenir un chiffre';
        ObPrénom.style.visibility = "visible";
        ErPrenom.style.borderColor = "red";
        aide = false;
    }
    //vérifier Ville
    if (ErVille.value == "") {
        ObVille.style.visibility = "visible";
        ErVille.style.borderColor = "red";
        aide = false;
    } else if (/[0-9]/.test(ErVille.value)) {
        ObVille.innerHTML = '*la ville ne doit pas contenir un chiffre';
        ObVille.style.visibility = "visible";
        ErVille.style.borderColor = "red";
        ObCP.style.position = "relative";
        ObCP.style.left = "93px";
        aide = false;
    }
    //Verifier Télé
    if (ErTél.value == "") {
        ObTél.style.visibility = "visible";
        ErTél.style.borderColor = "red";
        aide = false;
    } else if (/[A-Z]/.test(ErTél.value) || /[a-z]/.test(ErTél.value)) {
        ObTél.innerHTML = '*le Télé ne doit pas contenir des lettres';
        ObTél.style.visibility = "visible";
        ErTél.style.borderColor = "red";
        ObDT.style.position = "relative";
        ObDT.style.left = "90px";
        aide = false;
    } else if (!/^07|^06/.test(ErTél.value)) {
        ObTél.innerHTML = '*le Télé  doit commencer par 06 ou 07';
        ObTél.style.visibility = "visible";
        ErTél.style.borderColor = "red";
        ObDT.style.position = "relative";
        ObDT.style.left = "88px";
        aide = false;
    } else if (ErTél.value.length != 10) {
        ObTél.innerHTML = '*le Télé  doit contenir 10 chiffres';
        ObTél.style.visibility = "visible";
        ErTél.style.borderColor = "red";
        ObDT.style.position = "relative";
        ObDT.style.left = "130px";
        aide = false;
    }

    //Vérifier Code Postal
    if (ErCP.value == "") {
        ObCP.style.visibility = "visible";
        ErCP.style.borderColor = "red";
        aide = false;
    } else if (/[A-Z]/.test(ErCP.value) || /[a-z]/.test(ErCP.value)) {
        ObCP.innerHTML = '*le Code postal ne doit pas contenir des lettres';
        ObCP.style.visibility = "visible";
        ErCP.style.borderColor = "red";
        aide = false;
    } else if (ErCP.value.length != 5) {
        ObCP.innerHTML = '*le Code Postal  doit contenir 5 chiffres';
        ObCP.style.visibility = "visible";
        ErCP.style.borderColor = "red";
    }
    //Vérifier mot de passe
    if (ErMps.value == "") {
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        aide = false;
    } else if (!/[A-Z]/.test(ErMps.value)) {
        ObMps.innerHTML = '*le mot de passe doit contenir une majuscule';
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        ObConfMps.style.position = "relative";
        ObConfMps.style.left = "53px";
        aide = false;
    } else if (!/[a-z]/.test(ErMps.value)) {
        ObMps.innerHTML = '*le mot de passe doit contenir une minuscule';
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        ObConfMps.style.position = "relative";
        ObConfMps.style.left = "53px";
        aide = false;
    } else if (!/[0-9]/.test(ErMps.value)) {
        ObMps.innerHTML = '*le mot de passe doit contenir un chiffre';
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        ObConfMps.style.position = "relative";
        ObConfMps.style.left = "53px";
        aide = false;
    } else if (ErMps.value.length < 8) {
        ObMps.innerHTML = '*le mot de passe doit contenir plus de 8chiffres';
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        ObConfMps.style.position = "relative";
        ObConfMps.style.left = "39px";
        aide = false;
    } else if (!/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(ErMps.value)) {
        ObMps.innerHTML = '*le mot de passe doit contenir un caractère spécial';
        ObMps.style.visibility = "visible";
        ErMps.style.borderColor = "red";
        ObConfMps.style.position = "relative";
        ObConfMps.style.left = "39px";
        aide = false;
    }
    //Vérifier Confirmer Mps
    if (ErCnMps.value == "") {
        ObConfMps.style.visibility = "visible";
        ErCnMps.style.borderColor = "red";
        aide = false;
    } else if (ErCnMps.value != ErMps.value) {
        ObConfMps.innerHTML = '*Les deux mots de passe doivent correspondre';
        ObConfMps.style.visibility = "visible";
        ErCnMps.style.borderColor = "red";
    }
    return aide;

}

function ValidationConnexion() {
    aide = true;
    prg1.style.display = "none";
    prg2.style.display = "none";
    Email.style.borderColor = "green";
    Mdps.style.borderColor = "green";
    if (Email.value == "") {
        prg1.style.display = "block";
        Email.style.borderColor = "red";
        aide = false;
    }
    if (Mdps.value == "") {
        prg2.style.display = "block";
        Mdps.style.borderColor = "red";
        aide = false;
    }
    return aide;
}

function ValidationCodeSéc() {
    var aide = true;
    ObCodeSec.style.visibility = "hidden";
    if (CodeSécr.value == "") {
        ObCodeSec.style.visibility = "visible";
        aide = false;
    } else if (/[A-Z]/.test(CodeSécr.value) || /[a-z]/.test(CodeSécr.value)) {
        ObCodeSec.innerHTML = '*le code doit contenir seulement des chiffres';
        ObCodeSec.style.visibility = "visible";
        aide = false;
    }
    return aide;
}

function ValiderMdpsEmail() {
    ObMspdOubEmail.style.visibility = "hidden";
    var aide = true;
    if (MdpsOubEmail.value == "") {
        ObMspdOubEmail.style.visibility = "visible";
        aide = false;
    }
    return aide;
}
/* ------------------------------------------------------------------------------- */

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