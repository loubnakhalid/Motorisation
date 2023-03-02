
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./inc_ADMIN/css/style.css">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.lordicon.com/ritcuqlt.js"></script>
</head>

<body>
    <nav class="menu ">
        <header>
            <div class="logo">
                <img src="./inc_ADMIN/img/logo1.png" alt="" id="logo1">
                <img src="./inc_ADMIN/img/logo2.png" alt="" id="logo2">
            </div>
            <i class='bx bx-chevron-left change'></i>
        </header>
        <div class="main_menu">
            <ul>
                <li class="lien acceuil">
                    <a href="">
                        <i class='bx bx-home  icon'></i>
                        <span class="text">Acceuil</span>
                    </a>
                </li>
                <li class="lien">
                    <a href="gestion.php?table=catégorie">
                        <i class='bx bx-category icon'></i>
                        <span class="text">Categories</span>
                    </a>
                </li>
                <li class="lien">
                    <a href="gestion.php?table=produit">
                        <i class='bx bxl-product-hunt icon'></i>
                        <span class="text">Produits</span>
                    </a>
                </li>
                <li class="lien">
                    <a href="gestion.php?table=commande">
                        <i class='bx bx-cart-alt icon'></i>
                        <span class="text">Commandes</span>

                    </a>
                </li>
                <li class="lien">
                    <a href="">
                        <i class='bx bx-phone-call icon'></i>
                        <span class="text">RDV</span>

                    </a>
                </li>
                <li class="lien ">
                    <a href="">
                        <i class='bx bx-message-dots icon'></i>
                        <span class="text">Messages</span>

                    </a>
                </li>
                <li class="lien dec">
                    <a href="">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text">Deconexion</span>

                    </a>
                </li>
            </ul>

        </div>
    </nav>
    <section class="home">
        <header>
            <div class="header_header">
            </div>
            <div class="case"></div>
            <div class="case"></div>
            <div class="case"></div>
            <div class="case"></div>
        </header>
        <main>
            
        <div class='table' >
                
        <div class='entete'>
            <div class='element'>
                <div class='chercher'>
                    <form action=''>
                        <button type='submit' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                        <input type='text' name='' id='' placeholder='chercher produit ...'>
                        
                    </form>
                </div>
            </div>
            <div class='element'>
                <div class='trie'>
                    <div class='input_trie'>
                        <p><span class='trie_par'>Trie par :</span> <span class='name_trie'> prix</span></p>
                       
                        <span class='icon_select_trie'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_trie cacher'>
                        <ul>
                            <li><a href=''>nom produit</a></li>
                            <li><a href=''>category</a></li>
                            <li><a href=''>prix</a></li>
                            <li><a href=''>quantite</a></li>
                            
                        </ul>
                    </div>
                   
                </div>

            </div>
            <div class='element'>
                <div class='statut'>
                    <div class='input_statut'>
                        <p>statut de produit : </p>
                        <span class='icon_select_statut'>
                            <i class='bx bxs-chevron-down'></i>
                        </span>
                    </div>
                    <div class='display_statut cacher'>
                        <ul>
                            <li><a href=''>nom produit</a></li>
                            <li><a href=''>category</a></li>
                            <li><a href=''>prix</a></li>
                            <li><a href=''>quantite</a></li>
                            
                        </ul>
                    </div>
                   
                </div>

            </div>
            <div class='element'>
                <div class=''>
                  
                </div>

            </div>
            <div class='produit'>
               <button><i class='fa-solid fa-plus'></i> Ajouter produit</button>
            </div>


        </div>
                    <table cellspacing='0' >
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Prix</th>
                            <th>Statut</th>
                            <th>Quantité</th> 
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody><tr> 
                            <td><img src='../inc/img/produits/1.jpg'  alt=''></td>
                            <td>rail à LED SIMPLY16</td>
                            <td>Motorisation porte de garage</td>
                            <td>5000DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=1">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/2.jpg'  alt=''></td>
                            <td>KIT  FAAC DOLPHIN D1000 </td>
                            <td>Motorisation porte de garage</td>
                            <td>4500DH</td>
                            <td>1</td>
                            <td>9</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=2">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/4.jpg'  alt=''></td>
                            <td>SOMMER DUO VISION 500</td>
                            <td>Motorisation porte de garage</td>
                            <td>4600DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=3">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/5.jpg'  alt=''></td>
                            <td>KIT SPY NICE</td>
                            <td>Motorisation porte de garage</td>
                            <td>6000DH</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=4">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/6.jpg'  alt=''></td>
                            <td>NICE SPIN-23KCE</td>
                            <td>Motorisation porte de garage</td>
                            <td>3000DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=5">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/7.jpg'  alt=''></td>
                            <td>KIT BFT PRO BOTTICELLI SMART </td>
                            <td>Motorisation porte de garage</td>
                            <td>6700DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=6">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/9.jpg'  alt=''></td>
                            <td>CAME Ver10 U4494</td>
                            <td>Motorisation porte de garage</td>
                            <td>4000DH</td>
                            <td>1</td>
                            <td>9</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=7">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/8.jpg'  alt=''></td>
                            <td>SOMMER Sprint Evolution et Duo</td>
                            <td>Motorisation porte de garage</td>
                            <td>5000DH</td>
                            <td>1</td>
                            <td>7</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=8">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/6r.jpg'  alt=''></td>
                            <td>KIT FAAC T-MODE TMK</td>
                            <td>Motorisation de volet roulant</td>
                            <td>2500DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=12">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/7r.jpg'  alt=''></td>
                            <td>KIT NICE RADIO</td>
                            <td>Motorisation de volet roulant</td>
                            <td>3000DH</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=13">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/4r.jpg'  alt=''></td>
                            <td>KIT FAAC T-MODE TMK</td>
                            <td>Motorisation de volet roulant</td>
                            <td>2300DH</td>
                            <td>1</td>
                            <td>5</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=14">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/2r.jpg'  alt=''></td>
                            <td>Moteur tubulaire FAAC</td>
                            <td>Motorisation de volet roulant</td>
                            <td>2000DH</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=15">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/8r.jpg'  alt=''></td>
                            <td>Moteur filaire TM45</td>
                            <td>Motorisation de volet roulant</td>
                            <td>1500DH</td>
                            <td>1</td>
                            <td>9</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=16">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/3r.jpg'  alt=''></td>
                            <td>Moteur tubulaire Nice</td>
                            <td>Motorisation de volet roulant</td>
                            <td>1300DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=17">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/1r.jpg'  alt=''></td>
                            <td>MOTEUR NIEM151</td>
                            <td>Motorisation de volet roulant</td>
                            <td>1300DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=18">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/1t.jpg'  alt=''></td>
                            <td>NICE ON2-EFM,868MHZ</td>
                            <td>Télécommandes</td>
                            <td>400DH</td>
                            <td>1</td>
                            <td>14</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=9">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/2t.jpg'  alt=''></td>
                            <td>NICE ON9E, 433.92MHZ</td>
                            <td>Télécommandes</td>
                            <td>300DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=10">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/3t.jpg'  alt=''></td>
                            <td>FAAC TM2433DS, 433MHZ</td>
                            <td>Télécommandes</td>
                            <td>190DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=11">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/4t.jpg'  alt=''></td>
                            <td>CAME TOP432S</td>
                            <td>Télécommandes</td>
                            <td>250DH</td>
                            <td>1</td>
                            <td>2</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=19">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/5t.jpg'  alt=''></td>
                            <td>MOTORLINE FALK </td>
                            <td>Télécommandes</td>
                            <td>150DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=20">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/6t.jpg'  alt=''></td>
                            <td>FAAC XT2 </td>
                            <td>Télécommandes</td>
                            <td>180DH</td>
                            <td>1</td>
                            <td>7</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=21">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/1i.jpg'  alt=''></td>
                            <td>Combiné audio GOLMAR</td>
                            <td>Interphone&Visiophone</td>
                            <td>350DH</td>
                            <td>1</td>
                            <td>3</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=27">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/2i.jpg'  alt=''></td>
                            <td>KIT VIDEO AIPHONE </td>
                            <td>Interphone&Visiophone</td>
                            <td>770DH</td>
                            <td>1</td>
                            <td>7</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=29">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/3i.jpg'  alt=''></td>
                            <td>KIT VIDÉO CAME MTM-BIANCA</td>
                            <td>Interphone&Visiophone</td>
                            <td>550DH</td>
                            <td>1</td>
                            <td>9</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=30">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/4i.jpg'  alt=''></td>
                            <td>Caméra IP d'extérieure Thomson </td>
                            <td>Interphone&Visiophone</td>
                            <td>3000DH</td>
                            <td>1</td>
                            <td>14</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=31">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/5i.jpg'  alt=''></td>
                            <td>POSTE MAÎTRE AUDIO MAINS </td>
                            <td>Interphone&Visiophone</td>
                            <td>1300DH</td>
                            <td>1</td>
                            <td>7</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=32">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/1a.jpg'  alt=''></td>
                            <td>CLAVIER À CODE RADIO</td>
                            <td>Alarmes</td>
                            <td>2000DH</td>
                            <td>1</td>
                            <td>6</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=22">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/2a.jpg'  alt=''></td>
                            <td>Alarme KIT MYNICE</td>
                            <td>Alarmes</td>
                            <td>10000DH</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=23">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/3a.jpg'  alt=''></td>
                            <td>Thomson AVIDSEN</td>
                            <td>Alarmes</td>
                            <td>550DH</td>
                            <td>1</td>
                            <td>14</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=24">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/4a.jpg'  alt=''></td>
                            <td>DÉTECTEUR INFRAROUGES</td>
                            <td>Alarmes</td>
                            <td>2190DH</td>
                            <td>1</td>
                            <td>9</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=25">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr><tr> 
                            <td><img src='../inc/img/produits/5a.jpg'  alt=''></td>
                            <td>alarmes double-fréquence </td>
                            <td>Alarmes</td>
                            <td>12000DH</td>
                            <td>1</td>
                            <td>1</td>
                            <td class="action">
                                <i class="bx bx-edit modifier"></i>
                                <a href="controller.php?table=produit&action=supprimer&nomId=IdPr&id=26">
                                <lord-icon
                                src="https://cdn.lordicon.com/qjwkduhc.json"
                                trigger="hover"
                                colors="primary:#e83a30,secondary:#e83a30,tertiary:#ffffff"
                                state="hover-empty"
                                style="width:35px;height:35px">
                                </a>
                            </lord-icon></td>
                          </tr>
                        </tbody>
                      </table>
                </form>
              
                  
            </div>
        </main>
</section>
<script src="./inc_ADMIN/js/menu.js"></script>
</body>

</html>