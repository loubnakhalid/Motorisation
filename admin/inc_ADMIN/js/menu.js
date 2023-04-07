let change = document.querySelector(".change"),
    menu = document.querySelector(".menu");
change.addEventListener("click", () => {
    menu.classList.toggle("fermer");
});

let btn_modifier_categorie = document.getElementsByClassName("btn_modifier_categorie"),
    valider_modif_categorie = document.getElementsByClassName("valider_modif_categorie"),
    nom_categorie = document.getElementsByClassName("nom_categorie"),
    exit_modif_categorie=document.getElementsByClassName("exit_modif_categorie");

for (let index = 0; index < btn_modifier_categorie.length; index++) {
    btn_modifier_categorie[index].addEventListener("click", () => {
        valider_modif_categorie[index].classList.remove("cacher_icon");
        exit_modif_categorie[index].classList.remove("cacher_icon");
        nom_categorie[index].removeAttribute("readonly");
        nom_categorie[index].style.borderColor = '#00c985';
    });

}
for (let index = 0; index < exit_modif_categorie.length; index++) {
    exit_modif_categorie[index].addEventListener("click", () => {
        valider_modif_categorie[index].classList.add("cacher_icon");
        exit_modif_categorie[index].classList.add("cacher_icon");
        nom_categorie[index].setAttribute("readonly",true);
        nom_categorie[index].style.borderColor = '#ffffff';
    });

}

var input_quantite = document.getElementsByClassName("input_quantite")
    icon_exit__modif_display_cmd=document.getElementsByClassName("icon_exit__modif_display_cmd"),
    icon_modifier_commande_display = document.getElementsByClassName("icon_modifier_commande_display"),
    valider_modif_display_cmd = document.getElementsByClassName("valider_modif_display_cmd"),
    exit__modif_display_cmd=document.getElementsByClassName("exit__modif_display_cmd");




for (let index = 0; index < icon_modifier_commande_display.length; index++) {
    icon_modifier_commande_display[index].addEventListener("click", () => {
        input_quantite[index].removeAttribute("readonly");
        input_quantite[index].setAttribute("autofocus", true);
        input_quantite[index].style.borderColor = '#00c985';
        valider_modif_display_cmd[index].classList.remove("cacher_icon");
        exit__modif_display_cmd[index].classList.remove("cacher_icon");
});
    
}
for (let index = 0; index < icon_exit__modif_display_cmd.length; index++) {
    icon_exit__modif_display_cmd[index].addEventListener("click", () => {
        input_quantite[index].setAttribute("readonly",true);
        input_quantite[index].style.borderColor = '#ffffff';
        valider_modif_display_cmd[index].classList.add("cacher_icon");
        exit__modif_display_cmd[index].classList.add("cacher_icon");
});
    
}

let input_image = document.querySelector(".input_image"),
    image_telecharger = document.querySelector("#image_telecharger");

input_image.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(input_image.files[0]);
        reader.onload = () => {
            image_telecharger.setAttribute("src", reader.result);
        }

    };




let btn_ajouter_category = document.querySelector(".btn_ajouter_category"),
    containner_main_categorie = document.querySelector(".containner_main_categorie");

    function ajouterFormulaire() {
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
btn_ajouter_category.addEventListener("click",ajouterFormulaire );









/*----------------------------------------------------------------------------------------------------------------------------------------------------------*/



    /*-----------------------------------------------------------------------------------*/







/*-----------------------------------------------------------------------------------*/
// document.addEventListener("DOMContentLoaded", function(event) {
//     var scrollpos = localStorage.getItem('scrollpos');
//     if (scrollpos) window.scrollTo(0, scrollpos);
// });

// window.onbeforeunload = function(e) {
//     localStorage.setItem('scrollpos', window.scrollY);
// };