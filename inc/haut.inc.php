<?php
include('./inc/init.inc.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Motorify</title>
    <link rel="icon" type="png" href="./inc/img/logo5.png">
    <link rel='stylesheet' href='inc/css/style.css'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v6.3.0/css/all.css'>
    <script src='https://cdn.lordicon.com/ritcuqlt.js'></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=ASPxcd5frMaueHLGEQxTi2BO9tpV77s51-fKg1XduObyJyLXB4VrlZ0j0CprL9tb0CHg43b2GZW1Jpab&currency=USD"></script>
    <script src="./inc/js/functions.js"></script>
</head>
<body>
    <!--Formulaire contactez-nous-->
    <div class="display_body_contacter_nous cacher">
        <div class="contacter_nous">
            <i class='bx bxs-x-square icon_x_exit_contacter_nous fermer-contact'></i>
            <h3>Contactez-nous</h3>
            <div class="contacter">
                <form action="controller.php?envEml=true" method="post" onsubmit="return VérifCnt()">
                    <div class='CntObjEml'>
                    <div class="CntObj">
                        <input type="text" name="subject" placeholder="Objet" class="inpp" id="SubjectCnt"><br>
                        <span class="ErCntObj"></span>
                    </div>
                    <div class="CntEml">
                        <input type="text" name="from" placeholder="Email" class="inpp" id='EmailCnt'><br>
                        <span class="ErCntEml"></span>
                    </div>
                    </div>
                        <textarea name="message" id="" cols="30" rows="10" placeholder="Description"></textarea>
                    <input type="submit" name="envEml" value="Envoyer" class="envoyer">
                </form>
            </div>
        </div>
    </div>
    <!------------------------------>
    <header id='header'>
        <div class='logo'>
            <a href='index.php'><img src='inc/img/logo3.png' alt='' class='logo3'></a>
            <button class="btn_rendez_vous" onclick='ouvrirRDV()' >Rendez-vous</button>
        </div>
        <div class='recherche'>
            <div class='div_input'>
                <form action='catégorie.php' method='get' name='form_recherche' class='recherche_form'>
                    <input type='text' name='mot' id='cherche_input' value='' placeholder='Article, produit, marque...'>
                    <button type='submit' name='rechercher' value='true' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                </form>
            </div>
        </div>
        <div class='navigation'>
            <div class='login_hover hover'>
                <h2>Identifiez-vous</h2>
                <form action='controller.php' method='post' class='form_hover_identifier'>
                    <div class='input_hover_identifier'>
                        <input type='text' name='EmailMb' id='' placeholder='Email'>
                    </div>
                    <div class='input_hover_identifier'>
                        <input type='password' name='MDPS' id='' placeholder='Mot de passe'>
                    </div>
                    <div class='input_hover_identifier'>
                        <input type='submit' name='con' id='btn'>
                    </div>
                    <div class='login_hover_grp'>
                        <a href='identification.php?action=mdpsOubl'>Mot de passe oublié ?</a>
                        <a href='identification.php?action=inscription'>Créer un compte</a>
                    </div>
                </form>
            </div>
            <?php
            if(Admin()){
                echo "<div class='info_travaille'>
                        <button onclick='document.location.href=\"./admin/accueil.php\"'>Gestion Boutique</button>
                    </div>";
            }
            else{
                echo "<div class='info_travaille'>
                        <p class='tele'><span style='color:#ff7e00;'>07 </span>05 18 90 60</p>
                        <p class='heurs'>Lundi à Vendredi <span style='color:#ff7e00;'>9</span><span style='color: #015e9b;'>h</span> -<span style='color:#ff7e00;'>18</span><span style='color: #015e9b;'>h</span></p>
                    </div>";
            }
            ?>
            <?php
            if(Admin() || Client()){
                echo "
                <nav class='panier_identifier'>
                <ul>
                    <li>
                        <a href='profil.php' class='icon_user'>
                            <i class='fa-solid fa-user icon' style='color: #015e9b;'></i><span>Profil</span></a>
                    </li>
                    <li>
                        <a href='panier.php'>
                            <i class='fa-solid fa-cart-shopping icon' style='color: #ff8c02;'></i>
                            <span>Panier</span>
                            </i>
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
            ";
            }
            else{
                echo "
            <nav class='panier_identifier'>
                <ul>
                    <li>
                        <a href='identification.php?action=connexion' class='icon_user' onmouseover='login()'>
                            <i class='fa-solid fa-user-plus icon' style='color:#015e9b;'></i> 
                            <span>M'identifier</span>
                        </a>
                    </li>
                    <li>
                        <a href='panier.php'>
                            <i class='fa-solid fa-cart-shopping icon' style='color: #ff8c02;'></i>
                            <span>Panier</span>
                            </i>
                        </a>
                    </li>
                </ul>
            </nav>
            </div>
            ";
            }
            ?>
        <div class='menu'>
            <nav >
                <ul>
                    <?php
                        $rqt='SELECT * FROM catégorie';
                        $rslt=mysqli_query($mysqli,$rqt);
                        while($row=mysqli_fetch_assoc($rslt)){
                            echo "<li><a href='catégorie.php?IdCt=".$row['IdCt']."'>".$row['NomCt']."</a></li>";
                        }
                    ?>
                </ul>
            </nav>
            <?php
            if(isset($_SESSION['erreurLog'])){
                echo "<nav class='nav_identifier' style='background-color:red'>$_SESSION[erreurLog]</nav>";
                unset($_SESSION['erreurLog']);
            }
            elseif(isset($_SESSION['successMssg'])){
                echo "<nav class='nav_identifier' style='background-color:#0dbd0d'>$_SESSION[successMssg]</nav>";
                unset($_SESSION['successMssg']);
            }
            elseif(isset($_GET['action']) && ($_GET['action']=='connexion' || $_GET['action']=='inscription')){
                echo "<nav class='nav_identifier' >Veuillez vous connectez ou créer un compte pour consulter votre panier et faire des achats !</nav>";
            }
            ?>
        </div>
    </header>
    <main>
        <!--Formulaire RDV-->
       <form id='RDV' action="controller.php" method="post" class='Rdv' onsubmit='return VérifRDV()' style="display:none;">
       <?php
        if(isset($_SESSION['membre']['IdMb'])){
            $rqt='SELECT * FROM membre WHERE IdMb='.$_SESSION['membre']['IdMb'];
            $rslt=mysqli_query($mysqli,$rqt);
            $row=mysqli_fetch_assoc($rslt);
            $Nom=$row['NomMb'];
            $Prénom=$row['PrénomMb'];
            $NumTélé=$row['NumTélé'];
            $Adresse=$row['AdresseMb'];
        }
        else{
            $Nom="";
            $Prénom="";
            $NumTélé="";
            $Adresse="";
        }
        ?>
            <div class='Formulaire'>
                <div class='Form-header'>
                    <div class='Form-title'>Demander RDV</div>
                    <input type="button" class='btn-ferm' onclick='fermerRDV()' value="&times;">
                </div>
               <div class='Form-content'>
                    <div class='PrgDate'>
                        Un conseiller vous rappelle dans les plus brefs délais pour convenir une date
                    </div>
                    <div class='Title1'>
                        Type de projet :
                    </div>
                    <div class='TypePrj'>
                        <select name="TypePrjt" class='TypePrjSe'>
                        <option value='deft' disabled selected hidden>Votre type de projet</option>
                            <option value='Motorisation porte garage'>Motorisation porte de garage</option>
                            <option value='Motorisation volet roulant'>Motorisation de volet roulant</option>
                            <option value='Télécommandes'>Télécommandes</option>
                            <option value='Interphones & Visiophones'>Interphone&Visiophone</option>
                            <option value='Pièces détachées & Accessoires'>Pièces détachées & Accessoires</option>
                            <option value='Alarmes'>Alarmes</option>
                        </select><br>
                        <span class='ErRdv1' style="visibility:hidden"></span>
                    </div>
                    <div class='Title2'>
                        Pour vous joindre :
                    </div>
                    <div class='Rjd'>
                        <div class='RjdNP'>
                            <div>
                            <input type='text' name='NomMb' value='<?=$Nom?>' placeholder='Nom' id='InputRdvNm' class='RjdN'><br>
                            <span class='ErRdvNom' style="visibility:hidden"></span>
                            </div>
                            <div>
                            <input type='text' name='PrénomMb' value='<?=$Prénom?>' placeholder='Prénom' id='InputRdvPr' class='RjdP'><br>
                            <span class='ErRdvPr' style="visibility:hidden"></span>
                            </div>
                        </div>
                        <div class='RjdE'>
                            <input type='text' name='AdresseMb' value='<?=$Adresse?>' placeholder='Adresse' id='InputRdvEml' class='RjdEm'><br>
                            <span class='ErRdvEmail' style="visibility:hidden"></span>
                        </div>
                        <div class='RjdT'>
                            <input type='tel' name='NumTélé' value='<?=$NumTélé?>' placeholder='Téléphone' id='InputRdvtel' class='RjdTel'><br>
                            <span class='ErRdvtel' style="visibility:hidden"></span>
                        </div>
                    </div>
                    <div class='RjdBt'>
                        <input type='submit' name='envoiRDV' value='Envoyer votre demande' class='RjdButton'>
                    </div>
                </div>
            </div>
            <div id='Sur'></div>
        </form>
<?php
if(isset($_SESSION['erreur'])){
    echo "
    <script>
        swal({
            title: \"$_SESSION[erreur]\",
            text: '',
            icon: 'warning',
            button: 'Ok',
        });
    </script>";
    unset($_SESSION['erreur']);
}
elseif(isset($_SESSION['success'])){
        echo "
        <script>
            swal({
                title: '$_SESSION[success]',
                text: '',
                icon: 'success',
                button: 'Ok',
            });
        </script>";
        unset($_SESSION['success']);
}
?>