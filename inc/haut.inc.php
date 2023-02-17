<?php
include("./inc/init.inc.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Motorify</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="./inc/css/header.css">
    <script src="./inc/js/header.js"></script>
</head>

<body>


    <header>
        <div class="logo">
            <a href="./index.php"><img src="./inc/img/logo3.png" alt="" class="logo3"></a>
        </div>

        <div class="recherche">
            <div class="div_input">
                <form action="" name="form_recherche" class="recherche_form">
                    <input type="text" name="chercher" id="cherche_input" value="Article, produit, marque..." onfocus="click_cherche_input(n)">
                    <button type="submit" class="btn_recherche"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></button>
                </form>
            </div>
        </div>

        <div class="navigation">
            <div class="info_travaille">
                <p class="tele">0705189060</p>
                <p class="heurs">Lundi à Vendredi 9h-12h </p>


            </div>
            <nav>
                <ul>
                    <li>
                        <a href=
                        <?php 
                            if(Connecte()){
                                echo "./index.php";
                            }
                            else{
                                echo "./identification.php?action=login";
                            }
                        ?>
                        ><img src="./inc/img/user.svg" alt="" class="icon_user"> </a>
                    </li>
                    <li>
                        <a href=
                        <?php 
                            if(Connecte()){
                                echo "./panier.php";
                            }
                            else{
                                echo "./identification.php?action=login";
                            }
                        ?>
                        > <img src="./inc/img/shopping-cart.svg" alt="" class="icon_panier"> </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="menu">
            <ul>
                <?php
                $rqt="SELECT * FROM catégorie";
                $rslt=mysqli_execute_query($mysqli,$rqt);
                while($row=mysqli_fetch_assoc($rslt)){
                    echo '<li><a href="produit.php?id_catégorie='.$row['Id_Catégorie'].'">'.$row['Nom_Catégorie'].'</a></li>';
                }
                ?>
            </ul>|
        </div>
    </header>
    <main>