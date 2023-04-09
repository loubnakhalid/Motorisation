<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="controller.php" method="post" onsubmit="return VérifIdt()">
<div class="NomPr"><div><fieldset><legend class="legendInput">Nom</legend><input type="text" name="NomMb" value="<?=$NomMb?>" class="InputNmPr"></fieldset><br><span class="ErPrNm"></span></div>
<div><fieldset><legend class="legendInput">Prénom</legend><input type="text" value="<?=$PrénomMb?>" name="PrénomMb" class="InputPrenPr"></fieldset><br><span class="ErPrpr"></span></div></div>
<div class="DateNsModif"><h4>Date de naissance</h4><div class="InputDtMdf">
    <div><fieldset><legend class="legendInput">Jour</legend><input type="number" name="DateJr" value="<?=$DateJr?>" class="InputDtJr"></fieldset></div>
    <div><fieldset><legend class="legendInput">Mois</legend><input type="number" value="<?=$DateMs?>" name="DateMs" class="InputDtMs"></fieldset></div>
    <div><fieldset><legend class="legendInput">Année</legend><input type="number" value="<?=$DateAnn?>" name="DateAnn" class="InputDtAns"></fieldset></div></div><span class="ErPrDT"></span>
    <div class="btnMf"><input type="submit" name="modifIdentit" value="Valider" class="BtnMfValider"><input type="button" value="Annuler" class="BtnMfAnnuler" onclick="AnnulerIdentité()"></div>
</div>
</form>
<script>
    function ChampsOb(valeur) {
        var aide = true;
        if (valeur == '') {
            aide = false
        }
        return aide;
}
    function VérifIdt() {
        const NmPr = document.querySelector('.InputNmPr');
        const prPr = document.querySelector('.InputPrenPr');
        const JrPr = document.querySelector('.InputDtJr');
        const MsPr = document.querySelector('.InputDtMs');
        const AnsPr = document.querySelector('.InputDtAns');

        let Erpr1 = document.querySelector('.ErPrNm');
        let Erpr2 = document.querySelector('.ErPrpr');
        let Erpr3 = document.querySelector('.ErPrDT');
        var aide = true;
        Erpr1.style.visibility = 'hidden';
        Erpr2.style.visibility = 'hidden';
        Erpr3.style.visibility = 'hidden';
        if (!ChampsOb(NmPr.value)) {
            Erpr1.innerHTML = 'Champs Obligatoire';
            Erpr1.style.visibility = "visible";
            aide = false;
        }
        if (!ChampsOb(prPr.value)) {
            Erpr2.innerHTML = 'Champs Obligatoire';
            Erpr2.style.visibility = "visible";
            aide = false;
        }
        return aide;
}
</script>
</body>
</html>