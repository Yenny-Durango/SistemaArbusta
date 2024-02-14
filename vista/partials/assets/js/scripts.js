/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
//
// Scripts
//

// Cerrar modal
function CerrarModal() {
    event.preventDefault();
    const modal = document.querySelector("#modal");
    modal.classList.add("hide");
    modal.addEventListener("animationend", function close() {
        modal.classList.remove("hide");
        modal.close();
        modal.removeEventListener("animationend", close);
    });
}

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

// metodo para pasar de pagina
function Metodo(pagina) {
    $.ajax({
        type: "POST",
        url: pagina,
        data: {},
        success: function (data) {
            $("#qCarga").html(data);
        }
    }
    );
};