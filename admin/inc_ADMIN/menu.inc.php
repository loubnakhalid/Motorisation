<?php include("../inc/init.inc.php"); ?>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css" > 
    <script src="./inc_ADMIN/js/function.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
                    <a href="./index.php">
                        <i class='bx bx-home  icon'></i>
                        <span class="text">Acceuil</span>
                    </a>
                </li>
                <li class="lien">
                    <a href="gestion.php?table=catégorie">
                        <i class='bx bx-category icon'></i>
                        <span class="text">Catégories</span>
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
                    <a href="gestion.php?table=RDV">
                        <i class='bx bx-phone-call icon'></i>
                        <span class="text">RDV</span>
                    </a>
                </li>
                <li class="lien ">
                    <a href="gestion.php?table=promos">
                    <i class="fa-solid fa-percent icon"></i>
                        <span class="text">Promos</span>
                    </a>
                </li>
                <li class="lien dec">
                    <a href="../controller.php?action=déconnexion">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text">Déconnexion</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
