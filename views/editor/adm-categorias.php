<h1>Administrar Categorias</h1>

<script>
    var alertasData = <?php echo $alertasModal; ?>;
    var tipoAlertaData = <?php echo $tipoAlertaModal; ?>;
    var idmodificarModal = <?php echo $idmodificarModal; ?>;
    var ban_js = <?php echo $banJS; ?>;  
</script>

<div class="alertaMensaje" id="ban">
    Mensaje de Alerta
</div>


<!-- btn - crear -->
<div class="bg-agregar">

    <div id="btn-mod-addCategoria" class="btn-agregar">
        Nueva Categoria
    </div>
    <!-- boton buscar --------------->
    <form 
        class="search" 
        method="POST"
        action="">
        <label class="block h3-2" for="">
            <input 
                class="input-search" 
                type="text"
                name="nombre_categoria"
                placeholder="Buscar categoria">
        </label>

        <input 
            type="hidden" 
            name="tipo" 
            value="buscar">

        <button class="btn-5" type="submit">
            <i class='fa-solid fa-magnifying-glass'></i>
        </button>
    </form>
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
                        <?php echo $categoria["nombre_categoria"] ?>
                    </span>
                </div>
            </div>
            <div class="table-body">
                <div class="table-item">
                    <span class="h3-2">
                        <?php
                        if($categoria["estado_categoria"] === '1') { ?>
                            <i class="fa-regular fa-circle-check" style="color: #33D69F;"></i> habilitado
                        <?php
                        } else { ?>
                            <i class="fa-regular fa-circle-xmark" style="color: #EC5757;"></i> Inhabilitado
                        <?php
                        }
                        ?>
                    </span>
                </div>
            </div>

            <!-- botones de la tabla -->
            <div class="btn-actions">
                <div class="btn-modificar btn-mod-updCategoria"
                    data-id="<?php echo $categoria["id_categoria"]; ?>" >
                    Editar
                </div>

                <div class="modal-background" 
                id="item-bg-updCategoria-<?php echo $categoria["id_categoria"]; ?>">
                </div>

                <!-- contenido del modal -->
                <div class="modal-content" 
                id="item-cont-updCategoria-<?php echo $categoria["id_categoria"]; ?>">
                
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
                                    name="nombre_categoria"
                                    value="<?php echo $categoria["nombre_categoria"]; ?>"
                                    placeholder="">
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
                                type="hidden" 
                                name="id_categoria" 
                                value="<?php echo $categoria["id_categoria"]; ?>">

                            <input 
                                type="hidden" 
                                name="tipo" 
                                value="modificar">

                            <!-- button -->
                            <input
                                class="btn-submit m-t-18 m-b-8" 
                                type="submit" 
                                value="MODIFICAR" 
                                readonly>

                        </fieldset>
                    </form>

                </div>



                <div class="btn-eliminar-full btn-mod-delCategoria m-izq-10"
                    data-id="<?php echo $categoria["id_categoria"]; ?>" >
                    <?php
                    if($categoria["estado_categoria"] === '1') {
                        echo 'Desactivar'; 
                    } else {
                        echo 'Activar';
                    }
                    ?>
                </div>

                <div class="modal-background" 
                id="item-bg-delCategoria-<?php echo $categoria["id_categoria"]; ?>" >
                </div>

                <!-- contenido del modal -->
                <div class="modal-content" 
                id="item-cont-delCategoria-<?php echo $categoria["id_categoria"]; ?>" >

                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="">
                        <fieldset>
                            <legend class="titulo">
                                <h1>
                                <?php
                                if($categoria["estado_categoria"] === '1') {
                                    echo 'Desactivar Categoria';
                                } else {
                                    echo 'Activar Categoria';
                                }
                                ?>
                                </h1>
                            </legend>

                            <label class="block h3-2 center" for="">
                            <?php
                            if($categoria["estado_categoria"] === '1') { ?>
                                <div>Seguro que desea desactivar la categoria:</div>
                                <div class="m-t-18"><?php echo $categoria["nombre_categoria"]. '?'; ?></div>
                                <?php
                            } else { ?>
                                <!-- <div>Activar la categoria:</div> -->
                                <div><?php echo $categoria["nombre_categoria"]; ?></div>
                            <?php    
                            }
                            ?>
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_categoria" 
                                value="<?php echo $categoria["id_categoria"]; ?>">

                            <input 
                                type="hidden" 
                                name="tipo" 
                                value="eliminar">

                            <!-- button -->
                            <div class="botones-modal">
                                <input
                                    class="btn-modificar" 
                                    type="submit" 
                                    value="Si" 
                                    readonly>
                                
                                <div
                                    class="btn-eliminar" 
                                    id = "item-close-delCategoria-<?php echo $categoria["id_categoria"]; ?>" >
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

    <h3 class="center">No se encontraron resultados.</h3>
<?php
}
?>