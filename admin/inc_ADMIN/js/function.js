function confirmSupp(table, action, nomId, id) {
    if (confirm("Voulez-vous vraiment effectuer la suppression?")) {
        document.location.href = 'controller.php?table=' + table + '&action=' + action + '& nomId=' + nomId + '& id=' + id;
    }
}

function dispo() {
    if (document.formModif.StockPr.value <= 0) {
        document.getElementById('StatutPr').getElementsByTagName('option')[1].selected = 'selected';
    } else {
        document.getElementById('StatutPr').getElementsByTagName('option')[0].selected = 'selected';
    }
}