function mostrarModal(t,e){t.style.display="block",e.style.display="block"}function ocultarModal(t,e){t.style.display="none",e.style.display="none"}var currentURL;if("http://localhost:3000/"===(currentURL=window.location.href)){var btn_mod_cAutor=document.getElementById("btn-mod-cAutor"),cont_mod_cAutor=document.getElementById("cont-mod-cAutor"),bg_mod_cAutor=document.getElementById("bg-mod-cAutor");btn_mod_cAutor.addEventListener("click",(function(){cont_mod_cAutor.style.display="block",bg_mod_cAutor.style.display="block"})),bg_mod_cAutor.addEventListener("click",(function(){cont_mod_cAutor.style.display="none",bg_mod_cAutor.style.display="none"}))}if("http://localhost:3000/autor"===currentURL){var btn_mod_cLibAu=document.getElementById("btn-mod-cLibAu"),cont_mod_cLibAu=document.getElementById("cont-mod-cLibAu"),bg_mod_cLibAu=document.getElementById("bg-mod-cLibAu");btn_mod_cLibAu.addEventListener("click",(function(){cont_mod_cLibAu.style.display="block",bg_mod_cLibAu.style.display="block"})),bg_mod_cLibAu.addEventListener("click",(function(){cont_mod_cLibAu.style.display="none",bg_mod_cLibAu.style.display="none"}))}if(currentURL.includes("adm-autores")){console.log("entre");var btn_mod_cEdAu=document.getElementById("btn-mod-cEdAu"),cont_mod_cEdAu=document.getElementById("cont-mod-cEdAu"),bg_mod_cEdAu=document.getElementById("bg-mod-cEdAu");btn_mod_cEdAu.addEventListener("click",(function(){cont_mod_cEdAu.style.display="block",bg_mod_cEdAu.style.display="block"})),bg_mod_cEdAu.addEventListener("click",(function(){cont_mod_cEdAu.style.display="none",bg_mod_cEdAu.style.display="none"})),document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".btn-mod-mEdAu").forEach((function(t){t.addEventListener("click",(function(){var e=t.getAttribute("data-id");console.log("hola"+e);var d=document.getElementById("cont-mod-mEdAu-"+e),o=document.getElementById("bg-mod-mEdAu-"+e);d.style.display="block",o.style.display="block",o.addEventListener("click",(function(){d.style.display="none",o.style.display="none"}))}))}))})),document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".btn-mod-eEdAu").forEach((function(t){t.addEventListener("click",(function(){var e=t.getAttribute("data-id"),d=document.getElementById("cont-mod-eEdAu-"+e),o=document.getElementById("bg-mod-eEdAu-"+e),n=document.getElementById("close-eEdAu-"+e);d.style.display="block",o.style.display="block",o.addEventListener("click",(function(){d.style.display="none",o.style.display="none"})),n.addEventListener("click",(function(){d.style.display="none",o.style.display="none"}))}))}))}))}if((currentURL=window.location.href).includes("/adm-categorias")){const t=document.getElementById("ban");var btn_add=document.getElementById("btn-mod-addCategoria"),cont_add=document.getElementById("cont-mod-addCategoria"),bg_add=document.getElementById("bg-mod-addCategoria"),btn_upd=".btn-mod-updCategoria",cont_upd_item="item-cont-updCategoria-",bg_upd_item="item-bg-updCategoria-",btn_del=".btn-mod-delCategoria",cont_del_item="item-cont-delCategoria-",bg_del_item="item-bg-delCategoria-",close_del_item="item-close-delCategoria-";if(0===alertasData.length)console.log("alertas sin contenido ->"),ban_js&&(console.log("entra a ban"),t.classList.remove("show-alert"),setTimeout(()=>{t.classList.add("show-alert")},2e3)),btn_add.addEventListener("click",()=>mostrarModal(cont_add,bg_add)),bg_add.addEventListener("click",()=>ocultarModal(cont_add,bg_add));else{if(console.log("alertas con contenido"),"modificar"===tipoAlertaData){var cont_upd=document.getElementById(cont_upd_item+idmodificarModal),bg_upd=document.getElementById(bg_del_item+idmodificarModal);mostrarModal(cont_upd,bg_upd),bg_upd.addEventListener("click",()=>{ocultarModal(cont_upd,bg_upd),window.location.href=currentURL})}"agregar"===tipoAlertaData&&(mostrarModal(cont_add,bg_add),bg_add.addEventListener("click",()=>{ocultarModal(cont_add,bg_add),window.location.href=currentURL}))}document.addEventListener("DOMContentLoaded",()=>{document.querySelectorAll(btn_upd).forEach((function(t){t.addEventListener("click",()=>{var e=t.getAttribute("data-id"),d=document.getElementById(cont_upd_item+e),o=document.getElementById(bg_upd_item+e);mostrarModal(d,o),o.addEventListener("click",()=>{ocultarModal(d,o)})})}))}),document.addEventListener("DOMContentLoaded",()=>{document.querySelectorAll(btn_del).forEach((function(t){t.addEventListener("click",()=>{var e=t.getAttribute("data-id"),d=document.getElementById(cont_del_item+e),o=document.getElementById(bg_del_item+e),n=document.getElementById(close_del_item+e);mostrarModal(d,o),o.addEventListener("click",()=>{ocultarModal(d,o)}),n.addEventListener("click",()=>{ocultarModal(d,o)})})}))})}if((currentURL=window.location.href).includes("/adm-libros")){var btn_mod_cLibro=document.getElementById("btn-mod-cLibro"),cont_mod_cLibro=document.getElementById("cont-mod-cLibro"),bg_mod_cLibro=document.getElementById("bg-mod-cLibro");btn_mod_cLibro.addEventListener("click",(function(){cont_mod_cLibro.style.display="block",bg_mod_cLibro.style.display="block"})),bg_mod_cLibro.addEventListener("click",(function(){cont_mod_cLibro.style.display="none",bg_mod_cLibro.style.display="none"})),document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".btn-mod-mLibro").forEach((function(t){t.addEventListener("click",(function(){var e=t.getAttribute("data-id"),d=document.getElementById("cont-mod-mLibro-"+e),o=document.getElementById("bg-mod-mLibro-"+e);d.style.display="block",o.style.display="block",o.addEventListener("click",(function(){d.style.display="none",o.style.display="none"}))}))}))})),document.addEventListener("DOMContentLoaded",(function(){document.querySelectorAll(".btn-mod-eLibro").forEach((function(t){t.addEventListener("click",(function(){var e=t.getAttribute("data-id"),d=document.getElementById("cont-mod-eLibro-"+e),o=document.getElementById("bg-mod-eLibro-"+e),n=document.getElementById("close-eLibro-"+e);d.style.display="block",o.style.display="block",o.addEventListener("click",(function(){d.style.display="none",o.style.display="none"})),n.addEventListener("click",(function(){d.style.display="none",o.style.display="none"}))}))}))}))}
//# sourceMappingURL=app.js.map
