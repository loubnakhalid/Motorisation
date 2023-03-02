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