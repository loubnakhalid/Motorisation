<?php
include('./inc/init.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Motorify</title>
    <meta name='description' content=''>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" type="png" href="./inc/img/logo5.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src='https://cdn.lordicon.com/ritcuqlt.js'></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v6.3.0/css/all.css'>
    <link rel='stylesheet' href='inc/css/style.css'>
</head>

<body>
    <header id='h'>

        <div class='logo'>
            <a href='index.php'><img src='inc/img/logo3.png' alt='' class='logo3'></a>
        </div>

        <div class='recherche'>
            <div class='div_input'>
                <form action='' name='form_recherche' class='recherche_form'>
                    <input type='text' name='chercher' id='cherche_input' value='' placeholder='Article, produit, marque...' onclick='click_cherche_input()'>
                    <button type='submit' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                </form>
            </div>
        </div>
        <div class='navigation'>
            <div class='login_hover hover'>
                <h2>indentifiez-vous</h2>
                <form action='controller.php' method='post' class='form_hover_identifier'>
                    <div class='input_hover_identifier'>
                        <input type='text' name='email' id='' placeholder='Email'>
                    </div>
                    <div class='input_hover_identifier'>
                        <input type='text' name='mdp' id='' placeholder='Mot de passe'>
                    </div>
                    <div class='input_hover_identifier'>
                        <input type='submit' name='con' id='btn'>
                    </div>
                    <div class='login_hover_grp'>
                        <a href='controller.php?action=mdpsOubl'>Mot de passe oublié ?</a>
                        <a href='controller.php?action=inscription'>Créer un compte</a>
                    </div>
                </form>
            </div>
            <div class='info_travaille'>
                <p class='tele'><span style='color:#ff7e00;'>07 </span>05 18 90 60</p>
                <p class='heurs'>Lundi à Vendredi <span style='color:#ff7e00;'>9</span><span style='color: #015e9b;'>h</span> -<span style='color:#ff7e00;'>18</span><span style='color: #015e9b;'>h</span></p>
            </div>
            <nav class='panier_identifier'>
                <ul>
                    <li>
                        <a href='identification.php?action=connexion' class='icon_user'>
                            <lord-icon src='https://cdn.lordicon.com/dxjqoygy.json' trigger='hover' state='hover-nodding' stroke='70' colors='primary:#1663c7,secondary:#ff840a' style='width:52px;height:52px'>
                            </lord-icon>
                        </a>
                    </li>
                    <li>
                        <a href='panier.php'>
                            <lord-icon src='https://cdn.lordicon.com/slkvcfos.json' trigger='hover' colors='primary:#1663c7,secondary:#ff840a' stroke='70' style='width:52px;height:52px'>
                            </lord-icon>
                            </i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class='menu'>
            <nav>
                <ul>
                    <?php
                        $rqt='SELECT * FROM catégorie';
                        $rslt=mysqli_execute_query($mysqli,$rqt);
                        while($row=mysqli_fetch_assoc($rslt)){
                            echo "<li><a href='produit.php?id_catégorie=".$row['IdCt']."'>".$row['NomCt']."</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>