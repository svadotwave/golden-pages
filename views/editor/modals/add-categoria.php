<!-- 
──────────────────────────────────────────────────
   :::::: Modal - Agregar
────────────────────────────────────────────────── 
-->
<div class="modal-background" id="bg-mod-addCategoria"></div>
<div class="modal-content" id="cont-mod-addCategoria">

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="">
        <fieldset>
            <legend class="titulo">
                <h1>Crear Categoría</h1>
            </legend>

            <label class="block h3-2" for="">
                NOMBRE*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nombre_categoria"
                    value=""
                    placeholder="categoria"
                    required>

                <input
                    type="hidden"
                    name="tipo"
                    value="agregar">

            </label>

            <?php
            if(!empty($alertas)) {
                    if(array_key_exists('categoria', $alertas["error"])) { ?>
                        <label class="body-2 error block" for="">
                        <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                        <?php echo $alertas["error"]['categoria']; ?>
                        </label>
            <?php       } 
                    } ?>

            <input
                class="btn-submit m-t-18 m-b-8" 
                type="submit" 
                value="CREAR" 
                readonly
            >

        </fieldset>
    </form>

</div>