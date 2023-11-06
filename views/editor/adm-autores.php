<h1>Administrar Autores</h1>

<div class="bg-agregar">
    <div class="block-inline">
        <div id="btn-mod-cEdAu" class="btn-agregar">
            Nuevo Autor
        </div>
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


<!-- <div class="card">
        <div class="card-body">
            <div class="card-item-titulo">
                <div class="card-item nro">
                    <span class="h3-2">Nro.</span>
                </div>
                <div class="card-item">
                    <span class="h3-2">Nombre</span>
                </div>
            </div>
        </div>
    </div> -->

<?php
if (!empty($autores)) {
    $contador = 1;
    foreach ($autores as $autor) { ?>

        <div class="card">
            <div class="card-body">
                <div class="card-item-titulo">
                    <div class="card-item nro">
                        <span class="h3-2">
                            <?php echo $contador; ?>
                        </span>
                    </div>
                    <div class="card-item">
                        <span class="h3-2">
                            <?php echo $usuario->find('id_usuario', $autor->id_usuario)->nombre_usuario ?>
                        </span>
                    </div>
                    <div class="card-item">
                        <span class="h3-2">
                            <?php echo $usuario->find('id_usuario', $autor->id_usuario)->apellido_usuario ?>
                        </span>
                    </div>
                </div>
                <div class="card-item-botones">
                    <!-- === EDITAR === -->
                    <div
                        class="btn-modificar btn-mod-mCategoria"
                        data-id="<?php  ?>" >
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
                    data-id="<?php  ?>" >
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
        </div>

    <?php
    $contador++;
    }
} else {
    echo "No se encontraron resultados.";
}
?>