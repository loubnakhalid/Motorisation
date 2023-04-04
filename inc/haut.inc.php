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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./inc/js/functions.js"></script>
</head>
<body>
    <header id='h'>
        <div class='logo'>
            <a href='index.php'><img src='inc/img/logo3.png' alt='' class='logo3'></a>
        </div>
        <div class='recherche'>
            <div class='div_input'>
                <form action='catégorie.php' method='get' name='form_recherche' class='recherche_form'>
                    <input type='text' name='mot' id='cherche_input' value='' placeholder='Article, produit, marque...'>
                    <button type='submit' name='rechercher' class='btn_recherche'><i class='fa-solid fa-magnifying-glass' aria-hidden='true'></i></button>
                </form>
            </div>
        </div>
        <div class='navigation'>
            <div class='login_hover hover'>
                <h2>indentifiez-vous</h2>
                <form action='controller.php' method='post' class='form_hover_identifier'>
                    <div class='input_hover_identifier'>
                        <input type='text' name='EmailMb' id='' placeholder='Email'>
                    </div>
                    <div class='input_hover_identifier'>
                        <input type='text' name='MDPS' id='' placeholder='Mot de passe'>
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
            <div class='info_travaille'>
                <p class='tele'><span style='color:#ff7e00;'>07 </span>05 18 90 60</p>
                <p class='heurs'>Lundi à Vendredi <span style='color:#ff7e00;'>9</span><span style='color: #015e9b;'>h</span> -<span style='color:#ff7e00;'>18</span><span style='color: #015e9b;'>h</span></p>
            </div>
            <nav class='panier_identifier'>
                <ul>
                    <li>
                        <a href='<?php if(Client() || Admin()){ echo 'profil.php' ;} else { echo 'identification.php?action=connexion'; } ?>' class='icon_user' <?php if(!Client() && !Admin()){echo "onmouseover='login()'";}?>>
                            <lord-icon src='https://cdn.lordicon.com/dxjqoygy.json'  state='hover-nodding' stroke='70' colors='primary:#1663c7,secondary:#ff840a' style='width:52px;height:52px'>
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
                            echo "<li><a href='catégorie.php?IdCt=".$row['IdCt']."'>".$row['NomCt']."</a></li>";
                        }
                    ?>
                </ul>
            </nav>
            <?php
            if(isset($_GET['action']) && $_GET['action']=='connexion'){
                echo "<nav style='padding: 9px;margin-top: 2px;align-items: center;font-size: 16px;font-weight: bold;color: white;background-color: #ff9200;'><p style='margin-left: 370px;'>Veuillez vous connectez ou créer un compte pour voir votre panier et faire des achats !</p></nav>";
            }
            ?>
        </div>
    </header>
    <main>
        <form id='RDV' action="controller.php" method="post" class='Rdv' onsubmit='return ValidationRdv()' style="display:none;">
            <div class='Formulaire '>
                <div class='Form-header'>
                    <div class='Form-title'>Demander RDV</div>
                    <button class='btn-ferm' onclick='history.back();'>&times;</button>
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
                        <option value='' disabled selected hidden>Votre type de projet</option>
                            <option value='Motorisation porte garage'>Motorisation porte de garage</option>
                            <option value='Motorisation volet roulant'>Motorisation de volet roulant</option>
                            <option value='Télécommandes'>Télécommandes</option>
                            <option value='Interphones & Visiophones'>Interphone&Visiophone</option>
                            <option value='Pièces détachées & Accessoires'>Pièces détachées & Accessoires</option>
                            <option value='Alarmes'>Alarmes</option>
                        </select>
                    </div>
                    <div class='Title2'>
                        Pour vous joindre :
                    </div>
                    <div class='Rjd'>
                        <div class='RjdNP'>
                            <input type='text' name='NomMb' value='' placeholder='Nom' id='InputRdvNm' class='RjdN'>
                            <input type='text' name='PrénomMb' value='' placeholder='Prénom' id='InputRdvPr' class='RjdP'><br>
                            <span class='ErRdvNom'>*Ce champs est obligatoire .</span>
                            <span class='ErRdvPr'>*Ce champs est obligatoire .</span>
                        </div>
                        <div class='RjdE'>
                            <input type='text' name='AdresseMb' value='' placeholder='Adresse' id='InputRdvEml' class='RjdEm'><br>
                            <span class='ErRdvEmail'>*Ce champs est obligatoire .</span>
                        </div>
                        <div class='RjdT'>
                            <input type='tel' name='NumTélé' value='' placeholder='Téléphone' id='InputRdvtel' class='RjdTel'><br>
                            <span class='ErRdvtel'>*Ce champs est obligatoire .</span>
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
        if(isset($_GET['erreur'])){
	    echo "
            <script>
            swal({
		        title: '$_GET[erreur]',
		        text: '',
		        icon: 'warning',
		        button: 'Ok',
	        })
	        .then((value) => {
		        history.back();
	        });
            </script>";
        }
        if(isset($_GET['success'])){
            echo "
            <script>
                swal({
                    title: '$_GET[success]',
                    text: '',
                    icon: 'success',
                    button: 'Ok',
                })
                .then((value) => {
                    history.back();
                });</script>";
        }
        ?>