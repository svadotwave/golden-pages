<h1>Administrar Autores</h1>

<div class="bg-agregar">
    <div id="btn-mod-cEdAu" class="btn-agregar">
        Nuevo Autor
    </div>
</div>

<!-- Modal de crear -->
<div class="modal-background" id="bg-mod-cEdAu"></div>
<div class="modal-content" id="cont-mod-cEdAu">
    <div class="dentro-modal">
        <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/adm-autores">
        <fieldset>
            <legend class="titulo">
                <h1>Crear Autor</h1>
            </legend>

            <label class="block h3-2" for="">
                NOMBRE*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nombre_usuario"
                    value=""
                    placeholder="nombre">
            </label>

            <label class="block h3-2 m-t-18" for="">
                APELLIDO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="apellido_usuario"
                    value=""
                    placeholder="apellido">
            </label>

            <input 
                type="hidden" 
                name="tipo" 
                value="crear">

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
            <div class="table-item">
                <span class="h3-2">Apellido</span>
            </div>
        </div>
        <div class="btn-actions">
            <!-- name buttons -->
        </div>
    </div>
</div>

<?php
if (!empty($autores)) {
    $contador = 1;
    foreach ($autores as $autor) { ?>

        <div class="table">
            <div class="nro">
                <span class="h3-2">
                    <?php echo $contador; ?>
                </span>
            </div>
            <div class="table-body">
                
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $usuario->find('id_usuario', $autor->id_usuario)->nombre_usuario ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $usuario->find('id_usuario', $autor->id_usuario)->apellido_usuario ?>
                    </span>
                </div>
            </div>

            <div class="btn-actions">
                <!-- === EDITAR === -->
                <div
                    class="btn-modificar btn-mod-mEdAu"
                    data-id="<?php echo $autor->id_autor; ?>" >
                    Editar
                </div>
                <!-- Modal de Editar -->
                <div 
                class="modal-background" 
                id="bg-mod-mEdAu-<?php echo $autor->id_autor; ?>">
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-mEdAu-<?php echo $autor->id_autor; ?>">

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
                                name="id_autor" 
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
                class="btn-eliminar btn-mod-eEdAu m-izq-10"
                data-id="<?php echo $autor->id_autor; ?>" >
                    Eliminar
                </div>
                <!-- Modal de Eliminar -->
                <div 
                class="modal-background" 
                id="bg-mod-eEdAu-<?php echo $autor->id_autor; ?>" >
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-eEdAu-<?php echo $autor->id_autor; ?>" >

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-autores">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Eliminar Autor</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                Seguro que desea eliminar el autor: "
                                <?php echo
                                    $usuario->find('id_usuario', $autor->id_usuario)->nombre_usuario . " " .
                                    $usuario->find('id_usuario', $autor->id_usuario)->apellido_usuario;
                                ?>" ?
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_autor" 
                                value="<?php echo $autor->id_autor; ?>">
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
                                    id = "close-eEdAu-<?php echo $autor->id_autor; ?>" >
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
} else {
    echo "No se encontraron resultados.";
}
?>