<h1>Administrar Categorias</h1>

<script>
    var alertasData = <?php echo $alertasJSON; ?>;
</script>

<!-- btn - crear -->
<div class="bg-agregar">
    <div id="btn-mod-addCategoria" class="btn-agregar">
        Nueva Categoria
    </div>
</div>

<?php include_once __DIR__ . '\modals\add-categoria.php'; ?>

<!-- tabla principal -->
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
        <div class="table-body">
            <div class="table-item">
                <span class="h3-2">Estado</span>
            </div>
        </div>
        <div class="btn-actions">
            <!-- TODO - name buttons -->
        </div>
    </div>
</div>

<!-- cuerpo de la tabla -->
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
            <div class="table-body">
                <div class="table-item">
                    <span class="h3-2">
                        <?php
                        if($categoria->estado_categoria === '1') {
                            echo 'habilitado'; 
                        } else {
                            echo 'Inhabilitado';
                        }
                        ?>
                    </span>
                </div>
            </div>

            <!-- botones de la tabla -->
            <div class="btn-actions">
                <div class="btn-modificar btn-mod-updCategoria"
                    data-id="<?php echo $categoria->id_categoria; ?>" >
                    Editar
                </div>

                <div class="modal-background" 
                id="item-bg-updCategoria-<?php echo $categoria->id_categoria; ?>">
                </div>

                <!-- contenido del modal -->
                <div class="modal-content" 
                id="item-cont-updCategoria-<?php echo $categoria->id_categoria; ?>">
                
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



                <div class="btn-eliminar-full btn-mod-delCategoria m-izq-10"
                    data-id="<?php echo $categoria->id_categoria; ?>" >
                    <?php
                    if($categoria->estado_categoria === '1') {
                        echo 'Desactivar'; 
                    } else {
                        echo 'Activar';
                    }
                    ?>
                </div>

                <div class="modal-background" 
                id="item-bg-delCategoria-<?php echo $categoria->id_categoria; ?>" >
                </div>

                <!-- contenido del modal -->
                <div class="modal-content" 
                id="item-cont-delCategoria-<?php echo $categoria->id_categoria; ?>" >

                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-categorias">
                        <fieldset>
                            <legend class="titulo">
                                <h1>
                                <?php
                                if($categoria->estado_categoria === '1') {
                                    echo 'Activar Categoria';
                                } else {
                                    echo 'Desactivar Categoria';
                                }
                                ?>
                                </h1>
                            </legend>

                            <label class="block h3-2 center" for="">
                            <?php
                            if($categoria->estado_categoria === '1') {
                                echo 'Activar la categoria: ' . $categoria->nombre_categoria; 
                            } else {
                                echo 'Seguro que desea Desactivar la categoria: ' . $categoria->nombre_categoria . '?'; 
                            }
                            ?>
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_categoria" 
                                value="<?php echo $categoria->id_categoria ?>">

                            <input 
                                type="hidden" 
                                name="nombre_categoria" 
                                value="<?php echo $categoria->nombre_categoria ?>">

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
                                    id = "item-close-delCategoria-<?php echo $categoria->id_categoria; ?>" >
                                    No
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    
                </div>


            </div>
        </div>

    <?php
    $contador++;
    } // fin - foreach
} else { ?>

    <h3 class="center">No se encontraron resultados. Agrega una nueva Categoria</h3>
<?php
}
?>