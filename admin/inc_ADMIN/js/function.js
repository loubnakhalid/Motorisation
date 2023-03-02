function confirmSupp(table, action, nomId, id) {
    if (confirm("Voulez-vous vraiment effectuer la suppression?")) {
        document.location.href = 'controller.php?table=' + table + '&action=' + action + '& nomId=' + nomId + '& id=' + id;
    }
}