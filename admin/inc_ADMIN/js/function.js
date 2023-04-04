function dispo() {
    if (document.getElementById('modifPrdt').StockPr.value <= 0) {
        document.getElementById('StatutPr').getElementsByTagName('option')[1].selected = 'selected';
    } else {
        document.getElementById('StatutPr').getElementsByTagName('option')[0].selected = 'selected';
    }
}

function confirmSupp(table, action, id, id2) {
    switch (table) {
        case "commande":
            vText = "Si vous supprimez la commande, les détails y associés vont être supprimés également !";
            break;
        case "produit":
            vText = "Voulez-vous vraiment supprimer ce produit définitivement ?";
            break;
        case "catégorie":
            vText = "Si vous supprimez la catégorie, les produits y associés vont être supprimés également !";
            break;
        case "promos":
            vText = "Si vous supprimez la promotion, les détails y associés vont être supprimés également";
            break;
        case "détails_commande":
            vText = "Voulez-vous vraiment supprimer le produit de la commande?";
            swal({
                    title: "Êtes-vous sûr?",
                    text: vText,
                    icon: "warning",
                    buttons: [
                        "Annuler",
                        "supprimer",
                    ],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        document.location.href = 'controller.php?table=' + table + '&action=' + action + '&id=' + id + '&id2=' + id2;
                    }
                });
            return;
        case "promo_produit":
            vText = "Voulez-vous vraiment supprimer le produit de la promotion?";
            break;
        case "RDV":
            vText = "Voulez-vous vraiment supprimer ce rendez-vous?";
            break;
    }
    swal({
            title: "Êtes-vous sûr?",
            text: vText,
            icon: "warning",
            buttons: [
                "Annuler",
                "supprimer",
            ],
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.location.href = 'controller.php?table=' + table + '&action=' + action + '&id=' + id;
            }
        });
}

function confirmModifAjt(formModif, mssg, action) {
    swal({
            title: " ",
            text: mssg,
            icon: "warning",

            buttons: [
                "Annuler",
                action,
            ],
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formModif).submit();
            }
        });
}

function success(success, table) {
    swal({
            title: '',
            text: success,
            icon: 'success',
            button: 'Ok',
        })
        .then((value) => {
            let params = new URLSearchParams(window.location.search);
            params.delete("success");
            let newUrl = "gestion.php?" + (params.toString());
            location.replace(newUrl);
        });
}

function successDétails(success) {
    swal({
            title: '',
            text: success,
            icon: 'success',
            button: 'Ok',
        })
        .then((value) => {
            let params = new URLSearchParams(window.location.search);
            params.delete("successDétails");
            let newUrl = "gestion.php?" + (params.toString());
            location.replace(newUrl);
        });
}

function erreur(erreur) {
    swal({
            title: '',
            text: erreur,
            icon: 'warning',
            button: 'Ok',
        })
        .then((value) => {
            history.back();
        });
}

function erreur2(erreur) {
    swal({
        title: '',
        text: erreur,
        icon: 'warning',
        button: 'Ok',
    });
}