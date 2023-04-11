function dispo() {
    if (document.getElementById('modifPrdt').StockPr.value <= 0) {
        document.getElementById('StatutPr').value = 'Indisponible';
    } else {
        document.getElementById('StatutPr').value = 'Disponible';
    }
}

function dispo() {
    if (document.getElementById('ajtPrdt').StockPr.value <= 0) {
        document.getElementById('StatutPr').value = 'Indisponible';
    } else {
        document.getElementById('StatutPr').value = 'Disponible';
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

function success(success) {
    swal({
        title: '',
        text: success,
        icon: 'success',
        button: 'Ok',
    });
}

function erreur(erreur) {
    swal({
        title: '',
        text: erreur,
        icon: 'warning',
        button: 'Ok',
    });
}

function ajouterFormulaire() {
    let btn_ajouter_category = document.querySelector(".btn_ajouter_category"),
        containner_main_categorie = document.querySelector(".containner_main_categorie");
    containner_main_categorie.innerHTML = containner_main_categorie.innerHTML + "<form action='controller.php?table=catégorie&action=ajouter' method='post'><div class='category inner'> <div class='name_category inner'><input type='text' value='' name='NomCt' class='nom_categorie display' style='border-color:#00c985'><button type='submit' class='valider_modif_categorie '><i class='bx bxs-check-square icon_valider_modif_categorie '></i></button><button type='reset' class='exit_modif_categorie'><i class='bx bxs-x-square icon_exit_modif_categorie inner''></i></button> </div> </div></form>";
    document.querySelector(".nom_categorie.display").style.borderColor = '#00c985';
    containner_main_categorie.lastChild.scrollIntoView({ behavior: 'smooth' });
    btn_ajouter_category.removeEventListener('click', ajouterFormulaire);

    let icon_exit_modif_categorie_inner = document.querySelector(".icon_exit_modif_categorie.inner");
    icon_exit_modif_categorie_inner.addEventListener("click", function() {
        const category_inner = this.closest(".category.inner");
        category_inner.remove();
        btn_ajouter_category.addEventListener('click', ajouterFormulaire);
        location.reload(true);
    });
}

function uploadImg() {
    let input_image = document.querySelector(".input_image"),
        image_telecharger = document.querySelector("#image_telecharger");
    let reader = new FileReader();
    reader.readAsDataURL(input_image.files[0]);
    reader.onload = () => {
        image_telecharger.setAttribute("src", reader.result);
    }
}