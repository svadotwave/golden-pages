var currentURL = window.location.href;

function mostrarModal(cont, bg) {
    console.log('mostrar modal');
    cont.style.display = "block";
    bg.style.display = "block";
}

function ocultarModal(cont, bg) {
    console.log('ocultar modal');
    cont.style.display = "none";
    bg.style.display = "none";
}

if (currentURL.includes("/adm-categorias")) {

    // Modal para agregar
    var btn_add = document.getElementById("btn-mod-addCategoria"); // boton del modal
    var cont_add = document.getElementById("cont-mod-addCategoria"); // Contenido del modal
    var bg_add = document.getElementById("bg-mod-addCategoria"); // fondo del modal

    // Modificar
    var btn_upd = '.btn-mod-updCategoria';
    var cont_upd_item = 'item-cont-updCategoria-';
    var bg_upd_item = 'item-bg-updCategoria-';

    // Eliminar
    var btn_del = '.btn-mod-delCategoria';
    var cont_del_item = 'item-cont-delCategoria-';
    var bg_del_item = 'item-bg-delCategoria-';
    var close_del_item = 'item-close-delCategoria-';

    // Modal - Agregar
    if (alertasData.length === 0) {

        btn_add.addEventListener("click", () =>
            mostrarModal(cont_add, bg_add));

        // Cerrar modal al hacer clic en el fondo oscuro
        bg_add.addEventListener("click", () =>
            ocultarModal(cont_add, bg_add));

    } else {

        console.log('array con contenido');

        // Realiza otras acciones si no hay errores
        mostrarModal(cont_add, bg_add)

        // Cerrar modal al hacer clic en el fondo oscuro
        bg_add.addEventListener("click", () => {
            ocultarModal(cont_add, bg_add);
            window.location.href = currentURL;
        });   
    }

    // Modificar
    document.addEventListener("DOMContentLoaded", () => {
        var btn_upd_elem = document.querySelectorAll(btn_upd);
        

        btn_upd_elem.forEach(function(button) {
            button.addEventListener("click", () => {

                var id = button.getAttribute("data-id");

                var cont_upd = document.getElementById(cont_upd_item + id);
                var bg_upd = document.getElementById(bg_upd_item + id);

                mostrarModal(cont_upd, bg_upd);

                // Cerrar Modal al hacer clic en el fondo oscuro
                bg_upd.addEventListener("click", () => {
                    ocultarModal(cont_upd, bg_upd);
                });
            });
        });
    });

    // Eliminar
    document.addEventListener("DOMContentLoaded", () => {
        var btn_del_elem = document.querySelectorAll(btn_del);

        btn_del_elem.forEach(function(button) {
            button.addEventListener("click", () => {

                var id = button.getAttribute("data-id");

                var cont_del= document.getElementById(cont_del_item + id);
                var bg_del = document.getElementById(bg_del_item + id);
                var close = document.getElementById(close_del_item + id);

                mostrarModal(cont_del, bg_del);

                // Cerrar Modal al hacer clic en el fondo oscuro
                bg_del.addEventListener("click", () => {
                    ocultarModal(cont_del, bg_del);
                });

                // Cerrar modal al hacer clic en la "X" de cierre
                close.addEventListener("click", () => {
                    ocultarModal(cont_del, bg_del);
                });
            });
        });
    });


    
}


// var closeModalButton = document.getElementById("closeModal");

// Cerrar modal al hacer clic en la "X" de cierre
// closeModalButton.addEventListener("click", function() {
//     modal.style.display = "none";
//     modalBackground.style.display = "none";
// });

