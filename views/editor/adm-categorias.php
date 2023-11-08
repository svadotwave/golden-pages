<h1>Administrar Categorias</h1>

<div class="bg-agregar">
    <div id="btn-mod-cCategoria" class="btn-agregar">
        Nueva Categoria
    </div>
</div>

<!-- Modal de crear -->
<div class="modal-background" id="bg-mod-cCategoria"></div>
<div class="modal-content" id="cont-mod-cCategoria">
    <div class="dentro-modal">
        <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/adm-categorias">
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
                    placeholder="categoria">
            </label>

            <!-- button -->
            <input
                class="btn-submit m-t-18 m-b-25" 
                type="submit" 
                value="CREAR" 
                readonly
            >

        </fieldset>
    </form>
    </div>
</div>

<div class="bg-table">
    <div class="table">
        <div class="nro">
            <span class="h3-2">Nro.</span>
        </div>
        <div class="table-body">
            <div class="table-item">
                <span class="h3-2">Nombre</span>
            </div>
        </div>
        <div class="btn-actions">
            <!-- name buttons -->
        </div>
    </div>
</div>


<?php
if (!empty($categorias)) {
    $contador = 1;
    foreach ($categorias as $categoria) { ?>

        <div class="table">
            <div class="nro">
                <span class="h3-2">
                    <?php echo $contador; ?>
                </span>
            </div>
            <div class="table-body">
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $categoria->nombre_categoria ?>
                    </span>
                </div>
            </div>

            <!-- acciones de botones -->
            <div class="btn-actions">
                <!-- === EDITAR === -->
                <div
                    class="btn-modificar btn-mod-mCategoria"
                    data-id="<?php echo $categoria->id_categoria; ?>" >
                    Editar
                </div>
                <!-- Modal de Editar -->
                <div 
                class="modal-background" 
                id="bg-mod-mCategoria-<?php echo $categoria->id_categoria; ?>">
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-mCategoria-<?php echo $categoria->id_categoria; ?>">

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-categorias">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Editar Categoría</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                NOMBRE*
                                <input 
                                    class="block p-t-5 input-text" 
                                    type="text"
                                    name="nombre_categoria"
                                    value="<?php echo $categoria->nombre_categoria ?>"
                                    placeholder="">
                            </label>
                            
                            <input 
                                type="hidden" 
                                name="id_categoria" 
                                value="<?php echo $categoria->id_categoria ?>">
                            <input 
                                type="hidden" 
                                name="tipo" 
                                value="modificar">

                            <!-- button -->
                            <input
                                class="btn-submit m-t-18 m-b-25" 
                                type="submit" 
                                value="MODIFICAR" 
                                readonly>

                        </fieldset>
                    </form>
                    </div>
                </div>
                <!-- === ELIMINAR === -->
                <div
                class="btn-eliminar btn-mod-eCategoria m-izq-10"
                data-id="<?php echo $categoria->id_categoria; ?>" >
                    Eliminar
                </div>
                <!-- Modal de Eliminar -->
                <div 
                class="modal-background" 
                id="bg-mod-eCategoria-<?php echo $categoria->id_categoria; ?>" >
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-eCategoria-<?php echo $categoria->id_categoria; ?>" >

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-categorias">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Eliminar Categoría</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                Seguro que desea eliminar la categoria: "
                                <?php echo $categoria->nombre_categoria ?>" ?
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_categoria" 
                                value="<?php echo $categoria->id_categoria ?>">
                            <input 
                                type="hidden" 
                                name="tipo" 
                                value="eliminar">

                            <!-- button -->
                            <div class="botones-modal">
                                <input
                                    class="btn-modificar m-t-18" 
                                    type="submit" 
                                    value="Si" 
                                    readonly>
                                
                                <div
                                    class="btn-eliminar m-t-18" 
                                    id = "close-eCategoria-<?php echo $categoria->id_categoria; ?>" >
                                    No
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    <?php
    $contador++;
    }
} else { ?>

    <h3 class="center">No se encontraron resultados. Agrega una nueva Categoria</h3>
<?php
}
?>