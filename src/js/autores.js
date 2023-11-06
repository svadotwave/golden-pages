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
}



