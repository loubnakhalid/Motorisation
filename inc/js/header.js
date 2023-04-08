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
/*-- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- -- */
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
paypal.Buttons({
    createOrder: (data, actions) => {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?=montantTotal();?>'
                }
            }]
        });
    },
    onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
            console.log("Capture result", orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert("Transaction ${transaction.status}: ${transaction.id} ");

        });
    }
}).render("#paypal-button-container");