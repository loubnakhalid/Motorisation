const Email = document.querySelector("#EmCnx");
const Mdps = document.querySelector("#MdpCnx");

const ObjetCnt = document.querySelector('#SubjectCnt');
const EmailCnt = document.querySelector('#EmailCnt');

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
const RdvPrjt = document.querySelector('.TypePrjSe');
const RdvPr = document.querySelector('#InputRdvPr');
const RdvEml = document.querySelector('#InputRdvEml');
const RdvTel = document.querySelector('#InputRdvtel');

let prg1 = document.querySelector(".ErMsg1");
let prg2 = document.querySelector(".ErMsg2");

let ErCnt1 = document.querySelector('.ErCntObj');
let ErCnt2 = document.querySelector('.ErCntEml');


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
let ObRdvPrjt = document.querySelector('.ErRdv1');
let ObRdvPr = document.querySelector(".ErRdvPr");
let ObRdvEml = document.querySelector(".ErRdvEmail");
let ObRdvTel = document.querySelector(".ErRdvtel");
/*-----------Function Finalisation Commande-------------- */
/***********Champs***** */
const CmdNm = document.querySelector('.nom-input');
const CmdPr = document.querySelector('.prénom-input');
const CmdEml = document.querySelector('.Eml-input');
const CmdTél = document.querySelector('.tele-input');
const CmdAds = document.querySelector('.adresse-input');
//const CmdPpl = document.getElementById('paypal');
//const CmdEspc = document.getElementById('espece');
/*****Ereurs*** ********/
let ErCmdNm = document.querySelector('.ErCmdNom');
let ErCmdPr = document.querySelector('.ErCmdPrénom');
let ErCmdEml = document.querySelector('.ErCmdEml');
let ErCmdTel = document.querySelector('.ErCmdTél');
let ErCmdAds = document.querySelector('.ErCmdAds');
let ErCmdPai = document.querySelector('.ErCmdPai');

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
    if (!/[A-Z]/.test(valeur) && !/[a-z]/.test(valeur)) {
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
        ErCnt2.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Veuillez entrer un email valide';
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
    } else if (!ChampsChiffre(ErTél.value)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le Télé ne doit pas contenir pas des lettres ';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(ErTél.value)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le Télé débute avec 06 ou 07 ';
        ErTél.style.borderColor = "red";
        ObTél.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(ErTél.value, 10)) {
        ObTél.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le Télé ne contient que 10 chiffres ';
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
        ObCP.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code postal ne doit pas contenir des lettres ';
        ErCP.style.borderColor = "red";
        ObCP.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(ErCP.value, 5)) {
        ObCP.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code postal contient que 5 chiffres ';
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
        ObConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Les deux mots de passe doivent correspondre ';
        ErCnMps.style.borderColor = "red";
        ObConfMps.style.visibility = "visible";
        aide = false;
    }
    /*----------------------------------------- */
    /********Vérifier champs texte******** */
    if (!ChampsText(ErNom.value)) {
        ObNom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne contient pas des chifres ';
        ErNom.style.borderColor = "red";
        ObNom.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(ErPrenom.value)) {
        ObPrénom.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne contient pas des chifres ';
        ErPrenom.style.borderColor = "red";
        ObPrénom.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(ErVille.value)) {
        ObVille.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> La ville ne contient pas des chifres ';
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
    } else if (!ChampsChiffre(CmdTél.value)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé ne contient pas des lettres ';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(CmdTél.value)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé débute avec 06 ou 07 ';
        CmdTél.style.borderColor = "red";
        ErCmdTel.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(CmdTél.value, 10)) {
        ErCmdTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé contient 10 chiffres ';
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
        ErCmdPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne contient pas des chifres ';
        CmdPr.style.borderColor = "red";
        ErCmdPr.style.visibility = "visible";
        aide = false;
    }
    if (!ChampsText(CmdNm.value)) {
        ErCmdNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne contient pas des chifres ';
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
        ObCodeSec.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le code sécurité est composé de 6 chiffres ';
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
    if (!ChampsOb(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i>  Champ obligatoire';
        ReinMdps.style.borderColor = "red";
        ObReinMdps.style.display = 'block';
        aide = false;
    } else if (!VérifLongMps(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir plus de 8 caractères ';
        ReinMdps.style.borderColor = "red";
        ObReinMdps.style.display = 'block';
        aide = false;
    } else if (!VerifMajMIn(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir des lettre majuscules et miniscules ';
        ReinMdps.style.borderColor = "red";
        ObReinMdps.style.display = 'block';
        aide = false;
    } else if (!VerifCarctSpec(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir des caractères spéciaux ';
        ReinMdps.style.borderColor = "red";
        ObReinMdps.style.display = 'block';
        aide = false;
    } else if (ChampsText(ReinMdps.value)) {
        ObReinMdps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le mot de passe doit contenir des chiffres ';
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
        ObReinConfMps.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Les deux mots de passe doivent correspondre ';
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
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé ne contient pas des lettres ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!VerifTélé(RdvTel.value)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé débute avec 06 ou 07 ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    } else if (!LongueurChamps(RdvTel.value, 10)) {
        ObRdvTel.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Télé contient 10 chiffres ';
        RdvTel.style.borderColor = "red";
        ObRdvTel.style.visibility = "visible";
        aide = false;
    }
    /***********Vérifier champs vide ******* */
    if (!ChampsText(RdvNm.value)) {
        ObRdvNm.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le nom ne contient pas des chifres ';
        RdvNm.style.borderColor = "red";
        ObRdvNm.style.visibility = "visible";
        aide = false;
    }

    if (!ChampsText(RdvPr.value)) {
        ObRdvPr.innerHTML = '<i class="fa-regular fa-circle-xmark" style="color: #ff0000;"></i> Le prénom ne contient pas des chifres ';
        RdvPr.style.borderColor = "red";
        ObRdvPr.style.visibility = "visible";
        aide = false;
    }
    return aide;
}
/* ------------------------------------------------------------------------------- */
let btn_contacter_nous = document.querySelector(".btn_contacter_nous"),
    display_body_contacter_nous = document.querySelector(".display_body_contacter_nous");
btn_contacter_nous.addEventListener("click", () => {
    display_body_contacter_nous.classList.remove("cacher");
    document.body.style.overflowY = 'hidden';
});
let btn_fermer_contact = document.querySelector(".fermer-contact");
btn_fermer_contact.addEventListener("click", () => {
    display_body_contacter_nous.classList.add("cacher");
    document.body.style.overflowY = 'auto';
});
/*-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- --  */
let login_hover = document.querySelector(".login_hover");
let icon_user = document.querySelector(".icon_user");
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
//---------------------------------------------------------------------------------------------------
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