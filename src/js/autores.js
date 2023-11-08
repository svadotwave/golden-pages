var currentURL = window.location.href;

// Ser autor
if (currentURL === "http://localhost:3000/") {
    // Modal para agregar
    var btn_mod_cAutor = document.getElementById("btn-mod-cAutor"); // boton del modal
    var cont_mod_cAutor = document.getElementById("cont-mod-cAutor"); // Contenido del modal
    var bg_mod_cAutor = document.getElementById("bg-mod-cAutor"); // fondo del modal
    // var closeModalButton = document.getElementById("closeModal");

    // Abrir modal al hacer clic en el botón
    btn_mod_cAutor.addEventListener("click", function() {
        cont_mod_cAutor.style.display = "block";
        bg_mod_cAutor.style.display = "block";
    });

    // Cerrar modal al hacer clic en la "X" de cierre
    // closeModalButton.addEventListener("click", function() {
    //     modal.style.display = "none";
    //     modalBackground.style.display = "none";
    // });

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_mod_cAutor.addEventListener("click", function() {
        cont_mod_cAutor.style.display = "none";
        bg_mod_cAutor.style.display = "none";
    });
}

// Agregar libro desde autor
if (currentURL === "http://localhost:3000/autor") {

    // Modal para agregar
    var btn_mod_cLibAu = document.getElementById("btn-mod-cLibAu"); // boton del modal
    var cont_mod_cLibAu = document.getElementById("cont-mod-cLibAu"); // Contenido del modal
    var bg_mod_cLibAu = document.getElementById("bg-mod-cLibAu"); // fondo del modal
    // var closeModalButton = document.getElementById("closeModal");

    // Abrir modal al hacer clic en el botón
    btn_mod_cLibAu.addEventListener("click", function() {
        cont_mod_cLibAu.style.display = "block";
        bg_mod_cLibAu.style.display = "block";
    });

    // Cerrar modal al hacer clic en la "X" de cierre
    // closeModalButton.addEventListener("click", function() {
    //     modal.style.display = "none";
    //     modalBackground.style.display = "none";
    // });

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_mod_cLibAu.addEventListener("click", function() {
        cont_mod_cLibAu.style.display = "none";
        bg_mod_cLibAu.style.display = "none";
    });
}

// agregar autor desde editor
if (currentURL.includes("adm-autores")) {
    console.log('entre');

    // Modal para agregar
    var btn_mod_cEdAu = document.getElementById("btn-mod-cEdAu"); // boton del modal
    var cont_mod_cEdAu = document.getElementById("cont-mod-cEdAu"); // Contenido del modal
    var bg_mod_cEdAu = document.getElementById("bg-mod-cEdAu"); // fondo del modal
    // var closeModalButton = document.getElementById("closeModal");

    // Abrir modal al hacer clic en el botón
    btn_mod_cEdAu.addEventListener("click", function() {
        cont_mod_cEdAu.style.display = "block";
        bg_mod_cEdAu.style.display = "block";
    });

    // Cerrar modal al hacer clic en la "X" de cierre
    // closeModalButton.addEventListener("click", function() {
    //     modal.style.display = "none";
    //     modalBackground.style.display = "none";
    // });

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_mod_cEdAu.addEventListener("click", function() {
        cont_mod_cEdAu.style.display = "none";
        bg_mod_cEdAu.style.display = "none";
    });

    // Modificar
    document.addEventListener("DOMContentLoaded", function() {
        var btn_mod_mEdAu = document.querySelectorAll(".btn-mod-mEdAu");

        btn_mod_mEdAu.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_autor = button.getAttribute("data-id");

                console.log('hola' + id_autor);

                var modal = document.getElementById("cont-mod-mEdAu-" + id_autor);
                var modalBackground = document.getElementById("bg-mod-mEdAu-" + id_autor);

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
        var btn_mod_eEdAu = document.querySelectorAll(".btn-mod-eEdAu");

        btn_mod_eEdAu.forEach(function(button) {
            button.addEventListener("click", function() {

                var id_autor = button.getAttribute("data-id");

                var modal = document.getElementById("cont-mod-eEdAu-" + id_autor);
                var modalBackground = document.getElementById("bg-mod-eEdAu-" + id_autor);
                var closeModalButton = document.getElementById("close-eEdAu-" + id_autor);

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



