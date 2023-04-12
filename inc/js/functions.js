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
    FormFooter.style.marginBottom = "24px";
    document.getElementById("inptConfirm").type = 'button';
    document.getElementById("inptConfirm").style.backgroundColor = '#b5b5b5';
    let errPayer = document.querySelector(".InfoCmdPai");
    errPayer.innerHTML = '<i class="fa fa-circle-info" style="color: #ababab;"></i> Veuillez payer pour finaliser la commande ';
    errPayer.style.display = 'block';
}

function MasquePaypal() {
    let AffichePaypal = document.getElementById("paypal-button-container");
    AffichePaypal.style.display = "none";
    let Form = document.getElementById("FinirCommande");
    Form.style.height = "550px";
    let FormFooter = document.getElementById("Fin");
    FormFooter.style.marginTop = "-40px";
    FormFooter.style.marginBottom = "0px";
    document.getElementById("inptConfirm").type = 'submit';
    document.getElementById("inptConfirm").style.backgroundColor = '#015e9b';
    let errPayer = document.querySelector(".InfoCmdPai");
    errPayer.style.display = 'none';
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
//--------Fonction  de vérification des champs

function ChampsOb(valeur) {
    var aide = true;
    if (valeur == '') {
        aide = false
    }
    return aide;
}

function ChampsText(valeur) {
    var aide = true;
    if (/[0-9]/.test(valeur)) {
        aide = false;
    }
    return aide;
}

function ChampsChiffre(valeur) {
    var aide = true;
    if (/[A-Z]/.test(valeur) || /[a-z]/.test(valeur)) {
        aide = false;
    }
    return aide;
}

function LongueurChamps(valeur, longueur) {
    var aide = true;
    if (valeur.length != longueur) {
        aide = false;
    }
    return aide;
}

function VerifTélé(valeur) {
    var aide = true;
    if (!/^07|^06/.test(valeur)) {
        aide = false;
    }
    return aide;
}

function VérifLongMps(valeur) {
    var aide = true;
    if (valeur.length < 8) {
        aide = false;
    }
    return aide;
}

function VerifCarctSpec(valeur) {
    var aide = true;
    var caractSpéciaux = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
    if (!caractSpéciaux.test(valeur)) {
        aide = false;
    }
    return aide;
}

function VerifMajMIn(valeur) {
    var aide = true;
    if (!/[A-Z]/.test(valeur) || !/[a-z]/.test(valeur)) {
        aide = false;
    }
    return aide;
}

function VerifCnfMps(valeur, valeur2) {
    var aide = true;
    if (valeur != valeur2) {
        aide = false;
    }
    return aide;
}

function verifEmail(valeur) {
    var validate = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    let aide = true;
    if (!validate.test(valeur)) {
        aide = false;
    }
    return aide;
}
//------Fonction vérification formulaires
function VérifCnt() {
    var aide = true;
    ErCnt1.style.visibility = 'hidden';
    ErCnt2.style.visibility = 'hidden';

    ObjetCnt.style.borderColor = "#1cdd1c";
    EmailCnt.style.borderColor = "#1cdd1c";

    if (!ChampsOb(ObjetCnt.value)) {
        ErCnt1.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ObjetCnt.style.borderColor = "red";
        ErCnt1.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(EmailCnt.value)) {
        ErCnt2.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        EmailCnt.style.borderColor = "red";
        ErCnt2.style.visibility = "visible";
        aide = false;
    } else if (!verifEmail(EmailCnt.value)) {
        ErCnt2.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Veuillez entrer une adresse email valide';
        EmailCnt.style.borderColor = "red";
        ErCnt2.style.visibility = "visible";
        aide = false;
    }
    return aide;
}

function VérifInscription() {
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

    ErAdrs.style.borderColor = "#1cdd1c";
    ErDT.style.borderColor = "#1cdd1c";
    ErEml.style.borderColor = "#1cdd1c";
    ErNom.style.borderColor = "#1cdd1c";
    ErPrenom.style.borderColor = "#1cdd1c";
    ErVille.style.borderColor = "#1cdd1c";
    ErTél.style.borderColor = "#1cdd1c";
    ErCP.style.borderColor = "#1cdd1c";
    ErMps.style.borderColor = "#1cdd1c";
    ErCnMps.style.borderColor = "#1cdd1c";
    /***********Vérifier champs vide ******* */
    if (!ChampsOb(ErNom.value)) {
        ObNom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErNom.style.borderColor = "red";
        ObNom.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(ErPrenom.value)) {
        ObPrénom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErPrenom.style.borderColor = "red";
        ObPrénom.style.visibility = "visible";
        aide = false;
    }
    /***Verifier Télé */
    if (!ChampsOb(ErTél.value)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(ErTél.value, 10)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit contenir 10 chiffres ';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    } else if (!ChampsChiffre(ErTél.value)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro ne doit pas contenir des lettres ';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(ErTél.value)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit débuter avec 06 ou 07 ';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    }
    /*----------- */
    if (!ChampsOb(ErDT.value)) {
        ObDT.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErDT.style.borderColor = "red";
        ObDT.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(ErVille.value)) {
        ObVille.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErVille.style.borderColor = "red";
        ObVille.style.visibility = "visible";
        aide = false;
    }
    /** Vérifier CP** */
    if (!ChampsOb(ErCP.value)) {
        ObCP.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErCP.style.borderColor = "red";
        ObCP.style.visibility = "visible";
        aide = false;
    } else if (!ChampsChiffre(ErCP.value)) {
        ObCP.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code postal doit contenir que des lettres ';
        ErCP.style.borderColor = "red";
        ObCP.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(ErCP.value, 5)) {
        ObCP.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code postal doit contenir 5 chiffres ';
        ErCP.style.borderColor = "red";
        ObCP.style.visibility = "visible";
        aide = false;
    }
    /*------- */
    if (!ChampsOb(ErAdrs.value)) {
        ObAds.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        ErAdrs.style.borderColor = "red";
        ObAds.style.visibility = "visible";
        aide = false;
    }
    /*verif email */

    if (!ChampsOb(ErEml.value)) {
        ObEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErEml.style.borderColor = "red";
        ObEml.style.visibility = "visible";
        aide = false;
    } else if (!verifEmail(ErEml.value)) {
        ObEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Veuillez entrer une adresse email valide<div style="margin-left:17px">(Ex : Exemple@domain.com)</div>';
        ErEml.style.borderColor = "red";
        ObEml.style.visibility = "visible";
        aide = false;
    }
    /**Vérifier Mot de passe** */
    if (!ChampsOb(ErMps.value)) {
        ObMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Champ obligatoire';
        ErMps.style.borderColor = "red";
        ObMps.style.visibility = "visible";
        aide = false;
    } else if (!VérifLongMps(ErMps.value) || !VerifMajMIn(ErMps.value) || !VerifCarctSpec(ErMps.value) || ChampsText(ErMps.value)) {
        ObMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir au moins :<div style="margin-left:15px"> 8 caractères <br> 1 chiffre<br> 1 caractère spécial <br> 1 majuscule</div> ';
        ErMps.style.borderColor = "red";
        ObMps.style.visibility = "visible";
        aide = false;
    }
    /*----------Vérifier confirmer mot de passe */
    if (!ChampsOb(ErCnMps.value)) {
        ObConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        ErCnMps.style.borderColor = "red";
        ObConfMps.style.visibility = "visible";
        aide = false;
    } else if (!VerifCnfMps(ErCnMps.value, ErMps.value)) {
        ObConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Les mots de passe ne sont pas identiques';
        ErCnMps.style.borderColor = "red";
        ObConfMps.style.visibility = "visible";
        aide = false;
    }
    /*----------------------------------------- */
    /********Vérifier champs texte******** */
    if (!ChampsText(ErNom.value)) {
        ObNom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne doit pas contenir des chiffres ';
        ErNom.style.borderColor = "red";
        ObNom.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(ErPrenom.value)) {
        ObPrénom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne doit pas contenir des chiffres ';
        ErPrenom.style.borderColor = "red";
        ObPrénom.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(ErVille.value)) {
        ObVille.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> La ville ne doit pas contenir des chiffres ';
        ErVille.style.borderColor = "red";
        ObVille.style.visibility = "visible";
        aide = false;
    }
    /*----------------------------------------- */

    return aide;
}

function VérifCmd() {
    const CmdPpl = document.getElementById('paypal');
    const CmdEspc = document.getElementById('espece');
    var aide = true;

    ErCmdNm.style.visibility = 'hidden';
    ErCmdPr.style.visibility = 'hidden';
    ErCmdEml.style.visibility = 'hidden';
    ErCmdTel.style.visibility = 'hidden';
    ErCmdAds.style.visibility = 'hidden';
    ErCmdPai.style.visibility = 'hidden';

    CmdNm.style.borderColor = "#1cdd1c";
    CmdPr.style.borderColor = "#1cdd1c";
    CmdEml.style.borderColor = "#1cdd1c";
    CmdTél.style.borderColor = "#1cdd1c";
    CmdAds.style.borderColor = "#1cdd1c";

    /****Vérifier champs vide*** */
    if (!ChampsOb(CmdNm.value)) {
        ErCmdNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CmdNm.style.borderColor = "red";
        ErCmdNm.style.visibility = "visible";
        aide = false;
    }
    if (!ChampsOb(CmdPr.value)) {
        ErCmdPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CmdPr.style.borderColor = "red";
        ErCmdPr.style.visibility = "visible";
        aide = false;
    }
    if (!ChampsOb(CmdEml.value)) {
        ErCmdEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CmdEml.style.borderColor = "red";
        ErCmdEml.style.visibility = "visible";
        aide = false;
    } else if (!verifEmail(CmdEml.value)) {
        ErCmdEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Veuillez entrer un email valide';
        CmdEml.style.borderColor = "red";
        ErCmdEml.style.visibility = "visible";
        aide = false;
    }
    if (!ChampsOb(CmdTél.value)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(CmdTél.value, 10)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit contenir 10 chiffres ';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    } else if (!ChampsChiffre(CmdTél.value)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro ne doit pas contenir des lettres ';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(CmdTél.value)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit débuter avec 06 ou 07 ';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(CmdAds.value)) {
        ErCmdAds.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CmdAds.style.borderColor = "red";
        ErCmdAds.style.visibility = "visible";
        aide = false;
    }
    /***Vérifier champs text */
    if (!ChampsText(CmdPr.value)) {
        ErCmdPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne doit pas contenir des chiffres ';
        CmdPr.style.borderColor = "red";
        ErCmdPr.style.visibility = "visible";
        aide = false;
    }
    if (!ChampsText(CmdNm.value)) {
        ErCmdNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne doit pas contenir pas des chiffres ';
        CmdNm.style.borderColor = "red";
        ErCmdNm.style.visibility = "visible";
        aide = false;
    }
    if (CmdPpl.checked == false && CmdEspc.checked == false) {
        ErCmdPai.innerHTML = ' Veuillez sélectionner un mode de paiement ';
        ErCmdPai.style.visibility = "visible";
        aide = false;
    }
    return aide;
}

function VérifCS() {
    var aide = true;
    ObCodeSec.style.display = 'display';
    if (!ChampsOb(CodeSécr.value)) {
        ObCodeSec.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        CodeSécr.style.borderColor = "red";
        ObCodeSec.style.display = "block";
        aide = false;
    } else if (!ChampsChiffre(CodeSécr.value)) {
        ObCodeSec.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code sécurité doit contenir que des chiffres ';
        CodeSécr.style.borderColor = "red";
        ObCodeSec.style.display = "block";
        aide = false;
    } else if (!LongueurChamps(CodeSécr.value, 6)) {
        ObCodeSec.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code sécurité doit être composé de 6 chiffres ';
        CodeSécr.style.borderColor = "red";
        ObCodeSec.style.display = "block";
        aide = false;
    }
    return aide;
}

function VérifNvMps() {
    var aide = true;
    ObReinMdps.style.display = 'none';
    ObReinConfMps.style.display = 'none';

    ReinMdps.style.borderColor = "#1cdd1c";
    ReinConfMps.style.borderColor = "#1cdd1c";
    if (!ChampsOb(ReinMdps.value) || !VérifLongMps(ReinMdps.value) || !VerifMajMIn(ReinMdps.value) || !VerifCarctSpec(ReinMdps.value) || ChampsText(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir au moins :<div style="margin-left:15px"> 8 caractères <br> 1 chiffre<br> 1 caractère spécial <br> 1 majuscule</div> ';
        ReinMdps.style.borderColor = "red";
        ObReinMdps.style.display = 'block';
        aide = false;
    }

    if (!ChampsOb(ReinConfMps.value)) {
        ObReinConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        ReinConfMps.style.borderColor = "red";
        ObReinConfMps.style.display = 'block';
        aide = false;
    } else if (!VerifCnfMps(ReinConfMps.value, ReinMdps.value)) {
        ObReinConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Les mots de passe ne sont pas identiques';
        ReinConfMps.style.borderColor = "red";
        ObReinConfMps.style.display = 'block';
        aide = false;
    }
    return aide;
}

function VérifMdpsOubl() {
    var aide = true;
    ObMspdOubEmail.style.display = 'none';
    if (!ChampsOb(MdpsOubEmail.value)) {
        ObMspdOubEmail.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        MdpsOubEmail.style.borderColor = "red";
        ObMspdOubEmail.style.display = "block";
        aide = false;
    } else if (!verifEmail(MdpsOubEmail.value)) {
        ObMspdOubEmail.innerHTML = '<i class = "fa-regular fa-circle-xmark "style = "color: #ff0000;"> </i> Veuillez entrer une adresse email valide (Ex : Exemple@domain.com)';
        MdpsOubEmail.style.borderColor = "red";
        ObMspdOubEmail.style.display = "block";
        aide = false;
    }
    return aide;
}

function VérifCnx() {
    var aide = true;
    prg1.style.display = 'none';
    prg2.style.display = 'none';

    Email.style.borderColor = "#1cdd1c";
    Mdps.style.borderColor = "#1cdd1c";


    if (!ChampsOb(Email.value)) {
        prg1.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        Email.style.borderColor = "red";
        prg1.style.display = "block";
        aide = false;
    } else if (!verifEmail(Email.value)) {
        prg1.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Veuillez entrer une adresse email valide<div style="margin-left:17px">(Ex : Exemple@domain.com)</div>';
        Email.style.borderColor = "red";
        prg1.style.display = "block";
        aide = false;
    }
    if (!ChampsOb(Mdps.value)) {
        prg2.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        Mdps.style.borderColor = "red";
        prg2.style.display = "block";
        aide = false;
    }
    return aide;
}

function VérifRDV() {
    var aide = true;

    ObRdvPrjt.style.visibility = 'hidden';
    ObRdvNm.style.visibility = 'hidden';
    ObRdvPr.style.visibility = 'hidden';
    ObRdvEml.style.visibility = 'hidden';
    ObRdvTel.style.visibility = 'hidden';

    RdvPrjt.style.borderColor = "#1cdd1c";
    RdvNm.style.borderColor = "#1cdd1c";
    RdvPr.style.borderColor = "#1cdd1c";
    RdvEml.style.borderColor = "#1cdd1c";
    RdvTel.style.borderColor = "#1cdd1c";

    /***********Vérifier champs vide ******* */
    if (VerifCnfMps(RdvPrjt.value, 'deft')) {
        ObRdvPrjt.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        RdvPrjt.style.borderColor = "red";
        ObRdvPrjt.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(RdvNm.value)) {
        ObRdvNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        RdvNm.style.borderColor = "red";
        ObRdvNm.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(RdvPr.value)) {
        ObRdvPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        RdvPr.style.borderColor = "red";
        ObRdvPr.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsOb(RdvEml.value)) {
        ObRdvEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        RdvEml.style.borderColor = "red";
        ObRdvEml.style.visibility = "visible";
        aide = false;
    }
    /***********Vérifier Télé ******* */
    if (!ChampsOb(RdvTel.value)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!ChampsChiffre(RdvTel.value)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro ne doit pas contenir des lettres ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(RdvTel.value)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit débuter avec 06 ou 07 ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(RdvTel.value, 10)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le numéro doit contenir 10 chiffres ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    }
    /***********Vérifier champs vide ******* */
    if (!ChampsText(RdvNm.value)) {
        ObRdvNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne doit pas contenir des chiffres ';
        RdvNm.style.borderColor = "red";
        ObRdvNm.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(RdvPr.value)) {
        ObRdvPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne doit pas contenir pas des chiffres ';
        RdvPr.style.borderColor = "red";
        ObRdvPr.style.visibility = "visible";
        aide = false;
    }
    return aide;
}

function VérifIdentité() {
    const ProfilNm = document.querySelector('.InputNmPr');
    const ProfilPr = document.querySelector('.InputPrenPr');
    const ProfJrs = document.querySelector('.InputDtJr');
    const ProfMs = document.querySelector('.InputDtMs');
    const ProfJAns = document.querySelector('.InputDtAns');
    const Identité = document.querySelector('.Identité');

    let ErPrNm = document.querySelector('.ErPrNm');
    let ErPrPr = document.querySelector('.ErPrpr');
    let ErPrDt = document.querySelector('.ErPrDT');

    var aide = true;
    ErPrNm.style.visibility = 'hidden';
    ErPrPr.style.visibility = 'hidden';
    ErPrDt.style.visibility = 'hidden';
    //--------Champs obligatoire
    if (!ChampsOb(ProfilNm.value)) {
        ErPrNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErPrNm.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    }
    if (!ChampsOb(ProfilPr.value)) {
        ErPrPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErPrPr.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    }
    if (!ChampsOb(ProfJrs.value) || !ChampsOb(ProfMs.value) || !ChampsOb(ProfJAns.value)) {
        ErPrDt.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErPrDt.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    } else if (!Comparer(ProfJrs.value, 1, 30) || !Comparer(ProfMs.value, 1, 12) || !Comparer(ProfJAns.value, 1933, 2005)) {
        ErPrDt.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Date non valide';
        ErPrDt.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    }
    //---------------Vérifier champs texte 
    if (!ChampsText(ProfilNm.value)) {
        ErPrNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le nom ne doit pas contenir des chiffres';
        ErPrNm.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    }
    if (!ChampsText(ProfilPr.value)) {
        ErPrPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le prénom ne doit pas contenir des chiffres';
        ErPrPr.style.visibility = 'visible';
        aide = false;
        Identité.style.height = '296px';
    }
    //--------------Vérifier champs date 
    //---comparer date

    return aide;
}

function Comparer(valeur, valeur2, valeur3) {
    var aide = true;
    if ((valeur < valeur2) || (valeur > valeur3)) {
        aide = false;
    }
    return aide;
}

function VérifIdentifiant() {
    const ProfModifEml = document.querySelector('.InputEmPr');
    const ProfModifMps = document.querySelector('.InputMpsPr');
    const ProfModifNvMps = document.querySelector('.InputNvMpsPr');
    const ProfModifConfMps = document.querySelector('.InputCnNVMpsPr');

    let ProfErEml = document.querySelector('.ErPrIdentif1');
    let ProfErMps = document.querySelector('.ErPrIdentif2');
    let ProfErNvMps = document.querySelector('.ErPrIdentif3');
    let ProfErConfMps = document.querySelector('.ErPrIdentif4');
    let btnMf = document.querySelector('.btnMf');

    var aide = true;
    ProfErEml.style.display = 'none';
    ProfErMps.style.display = 'none';
    ProfErNvMps.style.display = 'none';
    ProfErConfMps.style.display = 'none';
    //---Vérifier email
    if (!ChampsOb(ProfModifEml.value)) {
        ProfErEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ProfErEml.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    } else if (!verifEmail(ProfModifEml.value)) {
        ProfErEml.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Adresse email invalide';
        ProfErEml.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    }

    if (!ChampsOb(ProfModifMps.value)) {
        ProfErMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ProfErMps.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    }
    //-------Confirmer Mot de passe
    if (!ChampsOb(ProfModifConfMps.value)) {
        ProfErConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ProfErConfMps.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    } else if (!VerifCnfMps(ProfModifConfMps.value, ProfModifNvMps.value)) {
        ProfErConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Les deux mots de passe doivent correspondre';
        ProfErConfMps.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    }
    if (!ChampsOb(ProfModifNvMps.value)) {
        ProfErNvMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ProfErNvMps.style.display = "block";
        identifiant.style.height = '445px';
        aide = false;
    } else if (!VerifMajMIn(ProfModifNvMps.value) || !VerifCarctSpec(ProfModifNvMps.value) || ChampsText(ProfModifNvMps.value) || !VérifLongMps(ProfModifNvMps.value)) {
        ProfErNvMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le mot de passe doit contenir au moins :<br>8 caractères<br>1 chiffre<br>1 caractère spécial<br>1 majucsule';
        ProfErNvMps.style.display = "block";
        aide = false;
        identifiant = document.querySelector('.Identifiant2');
        identifiant.style.height = '542px';
    }
    return aide;
}

function VérifContact() {
    const ContactTel = document.querySelector('.InputTélPr');
    const ContactVille = document.querySelector('.InputVillePr');
    const ContactCp = document.querySelector('.InputCPPr');
    const ContactAds = document.querySelector('.InputAdrsPr');
    const Contact = document.querySelector('.Adresses2');

    let ErContactTel = document.querySelector('.ErContactTel');
    let ErContactVille = document.querySelector('.ErContactVille');
    let ErContactCp = document.querySelector('.ErContactCP');
    let ErContactAds = document.querySelector('.ErContactAds');

    var aide = true;
    ErContactTel.style.display = 'none';
    ErContactVille.style.display = 'none';
    ErContactCp.style.display = 'none';
    ErContactAds.style.display = 'none';
    //Vérifier Télé
    if (!ChampsOb(ContactTel.value)) {
        ErContactTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErContactTel.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!ChampsChiffre(ContactTel.value)) {
        ErContactTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le numéro ne doit pas contenir des caractères';
        ErContactTel.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!VerifTélé(ContactTel.value)) {
        ErContactTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le numéro doit débuter avec 06 ou 07';
        ErContactTel.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!LongueurChamps(ContactTel.value, 10)) {
        ErContactTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Le numéro doit contenir 10 chiffres';
        ErContactTel.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    }
    //Vérifier Ville
    if (!ChampsOb(ContactVille.value)) {
        ErContactVille.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErContactVille.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!ChampsText(ContactVille.value)) {
        ErContactVille.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> La ville ne doit pas contenir des chiffres ';
        ErContactVille.style.display = 'block';
        aide = false;
    }
    //Vérifier CP
    if (!ChampsOb(ContactCp.value)) {
        ErContactCp.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErContactCp.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!ChampsChiffre(ContactCp.value)) {
        ErContactCp.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;le code postal ne doit pas contenir des lettres';
        ErContactCp.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    } else if (!LongueurChamps(ContactCp.value, 5)) {
        ErContactCp.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;le code postal doit contenir 5 chiffres';
        ErContactCp.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    }
    //Vérifier Adresse
    if (!ChampsOb(ContactAds.value)) {
        ErContactAds.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>&nbsp;Champ obligatoire';
        ErContactAds.style.display = 'block';
        aide = false;
        Contact.style.height = '452px';
    }
    return aide;
}