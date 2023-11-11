var currentURL = window.location.href;

if (currentURL.includes("/adm-categorias")) {
  const element = document.getElementById("ban");

  // Modal para agregar
  var btn_add = document.getElementById("btn-mod-addCategoria"); // boton del modal
  var cont_add = document.getElementById("cont-mod-addCategoria"); // Contenido del modal
  var bg_add = document.getElementById("bg-mod-addCategoria"); // fondo del modal

  // Modificar
  var btn_upd = ".btn-mod-updCategoria";
  var cont_upd_item = "item-cont-updCategoria-";
  var bg_upd_item = "item-bg-updCategoria-";

  // Eliminar
  var btn_del = ".btn-mod-delCategoria";
  var cont_del_item = "item-cont-delCategoria-";
  var bg_del_item = "item-bg-delCategoria-";
  var close_del_item = "item-close-delCategoria-";

  // Modal - Agregar

  if (alertasData.length === 0) {
    console.log("alertas sin contenido ->");

    if (ban_js) {
      console.log("entra a ban");
      element.classList.remove("show-alert");
      setTimeout(() => {
        element.classList.add("show-alert");
      }, 2000);
    }

    btn_add.addEventListener("click", () => mostrarModal(cont_add, bg_add));

    // Cerrar modal al hacer clic en el fondo oscuro
    bg_add.addEventListener("click", () => ocultarModal(cont_add, bg_add));
  } else {
    console.log("alertas con contenido");

    if (tipoAlertaData === "modificar") {
      var cont_upd = document.getElementById(cont_upd_item + idmodificarModal);
      var bg_upd = document.getElementById(bg_del_item + idmodificarModal);

      mostrarModal(cont_upd, bg_upd);

      bg_upd.addEventListener("click", () => {
        ocultarModal(cont_upd, bg_upd);
        window.location.href = currentURL;
      });
    }

    if (tipoAlertaData === "agregar") {
      // Realiza otras acciones si no hay errores
      mostrarModal(cont_add, bg_add);

      // Cerrar modal al hacer clic en el fondo oscuro
      bg_add.addEventListener("click", () => {
        ocultarModal(cont_add, bg_add);
        window.location.href = currentURL;
      });
    }
  }

  // Modificar
  document.addEventListener("DOMContentLoaded", () => {
    var btn_upd_elem = document.querySelectorAll(btn_upd);

    btn_upd_elem.forEach(function (button) {
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

    btn_del_elem.forEach(function (button) {
      button.addEventListener("click", () => {
        var id = button.getAttribute("data-id");

        var cont_del = document.getElementById(cont_del_item + id);
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
