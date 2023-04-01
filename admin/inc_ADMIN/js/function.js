function dispo() {
    if (document.formModif.StockPr.value <= 0) {
        document.getElementById('StatutPr').getElementsByTagName('option')[1].selected = 'selected';
    } else {
        document.getElementById('StatutPr').getElementsByTagName('option')[0].selected = 'selected';
    }
}

function confirmSupp(table, action, id) {
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
            break;
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

function confirmModif(formModif) {
    swal({
            title: " ",
            text: "Voulez-vous vraiment effectuer les modifications ?",
            icon: "warning",

            buttons: [
                "Annuler",
                "Modifier",
            ],
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById(formModif).submit();
            } else {
                history.back();
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
            document.location.href = "gestion.php?table=" + table;
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
            history.back();
        });
}