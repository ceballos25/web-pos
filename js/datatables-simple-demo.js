window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    };
    
});

window.addEventListener('DOMContentLoaded', event => {
    const dynamic = document.getElementById('dynamic');
    if (dynamic) {
        new simpleDatatables.DataTable(dynamic);
    };
    
});