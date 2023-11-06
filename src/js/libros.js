// // Modal para agregar
// var btn_mod_cLibro = document.getElementById("btn-mod-cLibro"); // boton del modal
// var cont_mod_cLibro = document.getElementById("cont-mod-cLibro"); // Contenido del modal
// var bg_mod_cLibro = document.getElementById("bg-mod-cLibro"); // fondo del modal
// // var closeModalButton = document.getElementById("closeModal");

// // Abrir modal al hacer clic en el botón
// btn_mod_cLibro.addEventListener("click", function() {
//     cont_mod_cLibro.style.display = "block";
//     bg_mod_cLibro.style.display = "block";
// });

// // Cerrar modal al hacer clic en la "X" de cierre
// // closeModalButton.addEventListener("click", function() {
// //     modal.style.display = "none";
// //     modalBackground.style.display = "none";
// // });

// // Cerrar modal al hacer clic en el fondo oscuro
// bg_mod_cLibro.addEventListener("click", function() {
//     cont_mod_cLibro.style.display = "none";
//     bg_mod_cLibro.style.display = "none";
// });

var currentURL = window.location.href;

if (currentURL.includes("/adm-libros")) {

    // Modal para agregar
    var btn_mod_cLibro = document.getElementById("btn-mod-cLibro"); // boton del modal
    var cont_mod_cLibro = document.getElementById("cont-mod-cLibro"); // Contenido del modal
    var bg_mod_cLibro = document.getElementById("bg-mod-cLibro"); // fondo del modal
    // var closeModalButton = document.getElementById("closeModal");

    // Abrir modal al hacer clic en el botón
    btn_mod_cLibro.addEventListener("click", function() {
        cont_mod_cLibro.style.display = "block";
        bg_mod_cLibro.style.display = "block";
    });

    // Cerrar modal al hacer clic en la "X" de cierre
    // closeModalButton.addEventListener("click", function() {
    //     modal.style.display = "none";
    //     modalBackground.style.display = "none";
    // });

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_mod_cLibro.addEventListener("click", function() {
        cont_mod_cLibro.style.display = "none";
        bg_mod_cLibro.style.display = "none";
    });

    // Modificar
    document.addEventListener("DOMContentLoaded", function() {
        var btn_mod_mLibro = document.querySelectorAll(".btn-mod-mLibro");

        btn_mod_mLibro.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_libro = button.getAttribute("data-id");

                var modal = document.getElementById("cont-mod-mLibro-" + id_libro);
                var modalBackground = document.getElementById("bg-mod-mLibro-" + id_libro);

                modal.style.display = "block";
                modalBackground.style.display = "block";

                // Cerrar Modal al hacer clic en el fondo oscuro
                modalBackground.addEventListener("click", function() {
                    modal.style.display = "none";
                    modalBackground.style.display = "none";
                });
            });
        });
    });

    // Eliminar
    document.addEventListener("DOMContentLoaded", function() {
        var btn_mod_eLibro = document.querySelectorAll(".btn-mod-eLibro");

        btn_mod_eLibro.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_libro = button.getAttribute("data-id");

                var modal = document.getElementById("cont-mod-eLibro-" + id_libro);
                var modalBackground = document.getElementById("bg-mod-eLibro-" + id_libro);
                var closeModalButton = document.getElementById("close-eLibro-" + id_libro);

                modal.style.display = "block";
                modalBackground.style.display = "block";

                // Cerrar Modal al hacer clic en el fondo oscuro
                modalBackground.addEventListener("click", function() {
                    modal.style.display = "none";
                    modalBackground.style.display = "none";
                });

                // Cerrar modal al hacer clic en la "X" de cierre
                closeModalButton.addEventListener("click", function() {
                modal.style.display = "none";
                modalBackground.style.display = "none";
                });
            });
        });
    });
}



