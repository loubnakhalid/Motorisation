<?php
$date= date("d/m/Y H:i:s");
$header="From: Motorify.com <supportMotorify@test.com>\r\n";
$header.="Content-Type: text/html\r\n";
$tablePr="<table border='1' cellspacing='0' width='500px'><tr><th>Image</th><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
while($row3=mysqli_fetch_assoc($rslt3)){
$tablePr.="<tr><td><img src='https://motorify.000webhostapp.com/inc/img/produits/$row3[ImagePr]' height='50px'></td><td>$row3[NomPr]</td><td>$row3[PrixPr]</td><td>$row3[qt]</td></tr>";
}
$tablePr.="<tr><td colspan='4' align='center'>Total : $row2[prixTT] DH</td></tr></table>";
$messageExp="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'>
<fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'>
<legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br> Nous avons le plaisir de vous informer que votre commande a été expédiée avec succès. Vous trouverez
ci-dessous les détails de votre expédition :<br><br> <b>Date d'expédition</b> : $date <br><b>Numéro de suivi</b> : $id <br> <b>Adresse de livraison</b> : $row2[AdresseMb]<br> <b>Articles expédiés</b> : <br>$tablePr <br><br>Veuillez
noter que le numéro de suivi vous permettra de suivre l'avancement de votre colis. Si vous avez des questions ou des préoccupations concernant votre expédition, n'hésitez pas à nous contacter. <br>Nous espérons que vous apprécierez vos achats
et nous vous remercions de votre confiance.<br><br> Cordialement, <br><br> L'équipe d'expédition</fieldset></body></html>";
$subject="Avis d'expédition";
$messageAnn="<html><head><style>span.im{color:black;} </style></head><body style='font-size:12pt;color:#3a3a3a;'>
<fieldset style='padding: 25px;border-color: #0870b5;text-align: justify;'>
<legend><img src='https://motorify.000webhostapp.com/inc/img/logo3.png' width='150px'></legend>Cher(e)<b> $row2[NomMb] $row2[PrénomMb] </b>,<br><br>
Nous vous écrivons pour vous informer que nous avons annulé votre commande numéro $id passée sur notre site web/par téléphone le $DateCmd. Nous sommes désolés pour toute gêne occasionnée.<br><br>
Nous avons annulé la commande en raison d'une erreur de stock ou de disponibilité de l'article commandé, ou pour toute autre raison qui a rendu impossible l'exécution de votre commande.<br><br>";
if($modePaiement=='Paypal'){
$messageAnn.=" Nous avons déjà procédé au remboursement de votre paiement, qui devrait apparaître sur votre compte dans les prochains jours.<br><br>";
}
$messageAnn.="Nous sommes désolés de ne pas avoir pu honorer votre commande cette fois-ci, mais nous espérons pouvoir vous servir à l'avenir. Si vous avez des questions ou des préoccupations, n'hésitez pas à nous contacter par email ou par téléphone.<br><br>
Cordialement,<br><br>L'équipe de Motorify</fieldset></body></html>";
?>