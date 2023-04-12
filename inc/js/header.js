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
/*****Ereurs*** ********/
let ErCmdNm = document.querySelector('.ErCmdNom');
let ErCmdPr = document.querySelector('.ErCmdPrénom');
let ErCmdEml = document.querySelector('.ErCmdEml');
let ErCmdTel = document.querySelector('.ErCmdTél');
let ErCmdAds = document.querySelector('.ErCmdAds');
let ErCmdPai = document.querySelector('.ErCmdPai');

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
        conteur = 1;
        rd[1].checked = true;
    } else {
        conteur--;
        rd[conteur].checked = true;
    }
});
fleche_pub_right.addEventListener("click", () => {
    if (conteur == 1) {
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