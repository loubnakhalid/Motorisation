
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
<section class='home'><script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
  google.charts.setOnLoadCallback(drawPieChart);
  //google.charts.setOnLoadCallback(drawPieChart);
	function drawChart() {
		// Sur la ligne ci-dessous, nous faisons un echo en php (code court) du json retourné par la fonction php buildChartArray
		let data = google.visualization.arrayToDataTable([["Date","Pages Vues","Visiteurs","Visites"],["11\/03",0,0,0],["12\/03",0,0,0],["13\/03",0,0,0],["14\/03",0,0,0],["15\/03",0,0,0],["16\/03",0,0,0],["17\/03",0,0,0],["18\/03",0,0,0],["19\/03",0,0,0],["20\/03",0,0,0],["21\/03",0,0,0],["22\/03",0,0,0],["23\/03",0,0,0],["24\/03",0,0,0],["25\/03",0,0,0]]);
		// Ci-dessous les options du graphique
		let options = {
			curveType: 'function',
			series: {
				0:{targetAxisIndex:0},
				1:{targetAxisIndex:1},
				2:{targetAxisIndex:1}
			},
			hAxis : { 
				textStyle : {
					fontSize: 10, // or the number you want
					fontName: 'Nunito',
          transform: 'none',
        }
			},
			vAxes: {
				0: {
					gridlines: {color: 'transparent'},
					textStyle : {
					fontSize: 10, // or the number you want
					fontName: 'Nunito'
					}
				},
				1: {
					gridlines: {color: 'transparent'},
					textStyle : {
					fontSize: 10, // or the number you want
					fontName: 'Nunito'
					}
				},
			},
			legend: {
				position: 'bottom',
				textStyle : {
				fontSize: 10, // or the number you want
				fontName: 'Nunito'
				}
			}
		};
		// Nous précisons où le graphique doit être "injecté"
		let chart = new google.visualization.LineChart(document.getElementById('chart'));
		// Nous dessinons le graphique
		chart.draw(data, options);
	}
  function drawPieChart(){
  var data = google.visualization.arrayToDataTable([['users','new users'],['Returning Visitor',14],['New Visitor',8]]);
  var options = {
  title: ''
  };
  var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
  chart.draw(data, options);
  }

</script>
<div>
<div>
  Utilisateurs : 8</div>
<div>
  Sessions : 22</div>
<div>
  Sessions par utilisateur : 2.75</div>
<div>
  Pages vues : 108</div>
<div>
  Pages/Sessions : 4.91</div>
<div>
  Durrée moyenne des sessions : 00:02:41</div>
<div>
  Taux de rebond : 31.82 %
</div>
<div>
  Nouvelles sessions : 36.36 %
</div>
</div>
<div>
<div id="chart"></div>
<div id="pieChart"></div>
</div>
</main>
</section>
<script src="./inc_ADMIN/js/menu.js"></script>
</body>

</html>