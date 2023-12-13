<h1>Administrar Autores</h1>

<div class="bg-agregar">
    <div id="btn-mod-cEdAu" class="btn-agregar">
        Nuevo Autor
    </div>
</div>

<!-- Modal de crear -->
<?php include_once __DIR__ . '\modals\add-autor.php'; ?>


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
                        <?php echo $usuario->find('id_usuario', $autor['id_usuario'])->nombre_usuario; ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $usuario->find('id_usuario', $autor['id_usuario'])->apellido_usuario; ?>
                    </span>
                </div>
            </div>

            <div class="btn-actions">
                <!-- === EDITAR === -->
                <div
                    class="btn-modificar btn-mod-mEdAu"
                    data-id="<?php echo $autor['id_usuario']; ?>" >
                    Editar
                </div>
                <!-- Modal de Editar -->
                <div 
                class="modal-background" 
                id="bg-mod-mEdAu-<?php echo $autor['id_usuario']; ?>">
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-mEdAu-<?php echo $autor['id_usuario']; ?>">

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Editar Categoría</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                NOMBRE*
                                <input 
                                    class="block p-t-5 input-text" 
                                    type="text"
                                    name="nombre_usuario"
                                    value="<?php echo $usuario->find('id_usuario', $autor['id_usuario'])->nombre_usuario; ?>"
                                    placeholder="">
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                APELLIDO*
                                <input 
                                    class="block p-t-5 input-text" 
                                    type="text"
                                    name="apellido_usuario"
                                    value="<?php echo $usuario->find('id_usuario', $autor['id_usuario'])->apellido_usuario; ?>"
                                    placeholder="">
                            </label>
                            
                            <input 
                                type="hidden" 
                                name="id_usuario" 
                                value="<?php echo $autor['id_usuario'] ?>">
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
                data-id="<?php echo $autor['id_usuario']; ?>" >
                    Eliminar
                </div>
                <!-- Modal de Eliminar -->
                <div 
                class="modal-background" 
                id="bg-mod-eEdAu-<?php echo $autor['id_usuario']; ?>" >
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-eEdAu-<?php echo $autor['id_usuario']; ?>" >

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
                                    $usuario->find('id_usuario', $autor['id_usuario'])->nombre_usuario . " " .
                                    $usuario->find('id_usuario', $autor['id_usuario'])->apellido_usuario;
                                ?>" ?
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_autor" 
                                value="<?php echo $autor['id_usuario']; ?>">
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
                                    id = "close-eEdAu-<?php echo $autor['id_usuario']; ?>" >
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

    <h3 class="center">No se encontraron resultados. Agrega un nuevo Autor</h3>
<?php
}
?>