var currentURL = window.location.href;

if (currentURL.includes("/adm-categorias")) {

    // Modal para agregar
    var btn_mod_cCategoria = document.getElementById("btn-mod-cCategoria"); // boton del modal
    var cont_mod_cCategoria = document.getElementById("cont-mod-cCategoria"); // Contenido del modal
    var bg_mod_cCategoria = document.getElementById("bg-mod-cCategoria"); // fondo del modal
    // var closeModalButton = document.getElementById("closeModal");

    // Abrir modal al hacer clic en el botón
    btn_mod_cCategoria.addEventListener("click", function() {
        cont_mod_cCategoria.style.display = "block";
        bg_mod_cCategoria.style.display = "block";
    });

    // Cerrar modal al hacer clic en la "X" de cierre
    // closeModalButton.addEventListener("click", function() {
    //     modal.style.display = "none";
    //     modalBackground.style.display = "none";
    // });

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_mod_cCategoria.addEventListener("click", function() {
        cont_mod_cCategoria.style.display = "none";
        bg_mod_cCategoria.style.display = "none";
    });

    // Modificar
    document.addEventListener("DOMContentLoaded", function() {
        var btn_mod_mCategoria = document.querySelectorAll(".btn-mod-mCategoria");

        btn_mod_mCategoria.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_categoria = button.getAttribute("data-id");

                var modal = document.getElementById("cont-mod-mCategoria-" + id_categoria);
                var modalBackground = document.getElementById("bg-mod-mCategoria-" + id_categoria);

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
        var btn_mod_eCategoria = document.querySelectorAll(".btn-mod-eCategoria");

        btn_mod_eCategoria.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_categoria = button.getAttribute("data-id");

                var modal = document.getElementById("cont-mod-eCategoria-" + id_categoria);
                var modalBackground = document.getElementById("bg-mod-eCategoria-" + id_categoria);
                var closeModalButton = document.getElementById("close-eCategoria-" + id_categoria);

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

