document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};
const change = document.querySelector(".change"),
    menu = document.querySelector(".menu");
change.addEventListener("click", () => {
    menu.classList.toggle("fermer");
})

// const mod=document.querySelector(".modifier");
// const read=document.querySelector(".read");
// mod.addEventListener("click",()=>{
//     read.removeAttribute("readonly")
// })

const trie_par = document.querySelector(".input_trie"),
    display_trie = document.querySelector(".display_trie");
trie_par.addEventListener("click", () => {
    display_trie.classList.toggle("cacher");
});

const statut_produit = document.querySelector(".input_statut"),
    display_statut = document.querySelector(".display_statut");
statut_produit.addEventListener("click", () => {
    display_statut.classList.toggle("cacher");
});

trie_par.addEventListener("mouseover", () => {
    display_trie.classList.remove("cacher");
});
trie_par.addEventListener("mouseleave", () => {
    display_trie.classList.add("cacher");
});

display_trie.addEventListener("mouseover", () => {
    display_trie.classList.remove("cacher");
});
display_trie.addEventListener("mouseout", () => {
    display_trie.classList.add("cacher");
});


statut_produit.addEventListener("mouseout", () => {
    display_statut.classList.add("cacher");
});
statut_produit.addEventListener("mouseover", () => {
    display_statut.classList.remove("cacher");
});

display_statut.addEventListener("mouseout", () => {
    display_statut.classList.add("cacher");
});
display_statut.addEventListener("mouseover", () => {
    display_statut.classList.remove("cacher");
});


let input_image = document.querySelector(".input_image"),
    image_telecharger = document.querySelector("#image_telecharger");

input_image.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(input_image.files[0]);
    reader.onload = () => {
        image_telecharger.setAttribute("src", reader.result);
    }

}

let div_form_modification_produit = document.querySelector(".div_form_modification_produit"),
    body = document.querySelector(".body"),
    btn_retour_form_modifier_produit = document.querySelector(".btn_retour_form_modifier_produit"),
    icon_modifier = document.getElementsByClassName("icon_modifier_produit");

/*for (let i = 0; i < icon_modifier.length; i++) {
    icon_modifier[i].addEventListener("click", () => {
        body.classList.remove("cacher");
    });
}


btn_retour_form_modifier_produit.addEventListener("click", () => {
    body.classList.add("cacher");
});

*/
body.addEventListener("click", (event) => {
    if (!div_form_modification_produit.contains(event.target)) {
        document.location.href = "gestion.php?table=produit";
    }

});