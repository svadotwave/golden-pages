<h1>Administrar Libros</h1>

<div class="bg-agregar">
    <div id="btn-mod-cLibro" class="btn-agregar">
        Nuevo Libro
    </div>
</div>

<!-- Modal de crear -->
<?php include_once __DIR__ . '\modals\add-libro.php'; ?>

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
                <span class="h3-2">Portada</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Autor</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Categoria</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Precio</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Estado</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Publicado</span>
            </div>
        </div>
        <div class="btn-actions">
            <!-- name button -->
        </div>
    </div>
</div>


<?php
if (!empty($libros)) {
    $contador = 1;
    foreach ($libros as $libro) { ?>

        <div class="table">
            <div class="nro">
                    <span class="h3-2">
                        <?php echo $contador; ?>
                    </span>
                </div>
            <div class="table-body">
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $libro['nombre_libro'] ?>
                    </span>
                </div>
                <div class="table-item">
                    <img src="<?php echo $libro['img_libro'] ?>" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php
                            echo
                            $usuario->find('id_usuario', $autor->find('id_autor', $libro['id_autor'])->id_usuario)->nombre_usuario . ' ' .
                            $usuario->find('id_usuario', $autor->find('id_autor', $libro['id_autor'])->id_usuario)->apellido_usuario;           
                        
                        ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php
                            echo $categoria->find('id_categoria', $libro['id_categoria'])->nombre_categoria;
                        ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $libro['precio_libro'] ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $libro['estado_libro'] ?>
                    </span>
                </div>
            </div>
            <!-- acciones de botones -->
            <div class="btn-actions">
                <!-- === EDITAR === -->
                <div
                    class="btn-modificar btn-mod-mLibro"
                    data-id="<?php echo $libro['id_libro']; ?>" >
                    Editar
                </div>
                <!-- Modal de Editar -->
                <div 
                class="modal-background" 
                id="bg-mod-mLibro-<?php echo $libro['id_libro']; ?>">
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-mLibro-<?php echo $libro['id_libro']; ?>">

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-libros"
                        enctype="multipart/form-data">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Editar Categoría</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                TITULO DEL LIBRO*
                                <input 
                                    class="block p-t-5 input-text" 
                                    type="text"
                                    name="nombre_libro"
                                    value="<?php echo $libro['nombre_libro'] ?>"
                                    required
                                    placeholder="título">
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                PORTADA (PNG,JPG)*
                                <input 
                                    class="block p-t-5" 
                                    type="file"
                                    name="img_libro"
                                    required
                                    accept=".png, .jpg">
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                CONTENIDO (PDF)*
                                <input 
                                    class="block p-t-5" 
                                    type="file"
                                    name="content_libro"
                                    required
                                    accept=".pdf">
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                PRECIO*
                                <input 
                                    class="block p-t-5 input-text" 
                                    type="text"
                                    name="precio_libro"
                                    value="<?php echo $libro['precio_libro'] ?>"
                                    required
                                    placeholder="precio">
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                            AUTOR*
                            <select 
                                class="block p-t-5 input-select"
                                name="id_autor">
                            
                                <?php
                                // Iterar sobre el arreglo y generar opciones
                                foreach ($autores as $au) {
                                    
                                    if($au['id_autor'] === $libro['id_autor']) { ?>
                                        <option value="<?php echo $au['id_autor']; ?>" selected>
                                        <?php echo 
                                            $usuario->find('id_usuario', $au['id_usuario'])->nombre_usuario . ' ' .
                                            $usuario->find('id_usuario', $au['id_usuario'])->apellido_usuario
                                        ?>
                                        </option>
                                    
                                    <?php
                                    } else { ?>
                                        <option value="<?php echo $au['id_autor']; ?>" >
                                        <?php echo 
                                            $usuario->find('id_usuario', $au['id_usuario'])->nombre_usuario . ' ' .
                                            $usuario->find('id_usuario', $au['id_usuario'])->apellido_usuario
                                        ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                CATEGORIA*
                                <select 
                                    class="block p-t-5 input-select"
                                    name="id_categoria">
                                
                                    <?php
                                    // Iterar sobre el arreglo y generar opciones
                                    foreach ($categorias as $cat) { 
                                        
                                        if($cat['id_categoria'] === $libro['id_categoria']) {?>
                                            <option value="<?php echo $cat['id_categoria']; ?>" selected>
                                                <?php echo $cat['nombre_categoria']; ?>
                                            </option>
                                        <?php 
                                        } else {?>
                                            <option value="<?php echo $cat['id_categoria']; ?>" >
                                                <?php echo $cat['nombre_categoria']; ?>
                                            </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </label>

                            <label class="block h3-2 m-t-18" for="">
                                DESCRIPCIÓN DEL LIBRO*
                                <textarea
                                    class="block p-t-5 input-text input-area"
                                    name="descrip_libro"
                                    placeholder="Descripción"
                                    required><?php echo $libro['descrip_libro'] ?></textarea>
                            </label>
                            
                            <input 
                                type="hidden" 
                                name="id_libro" 
                                value="<?php echo $libro['id_libro'] ?>">
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
                class="btn-eliminar btn-mod-eLibro m-izq-10"
                data-id="<?php echo $libro['id_libro']; ?>" >
                    Eliminar
                </div>
                <!-- Modal de Eliminar -->
                <div 
                class="modal-background" 
                id="bg-mod-eLibro-<?php echo $libro['id_libro']; ?>" >
                </div>
                <!-- contenido del modal -->
                <div 
                class="modal-content" 
                id="cont-mod-eLibro-<?php echo $libro['id_libro']; ?>" >

                    <div class="dentro-modal">
                    <!-- formulario -->
                    <form 
                        class="from" 
                        method="POST"
                        action="/adm-libros">
                        <fieldset>
                            <legend class="titulo">
                                <h1>Eliminar Categoría</h1>
                            </legend>

                            <label class="block h3-2" for="">
                                Seguro que desea eliminar la categoria: "
                                <?php echo $libro['nombre_libro'] ?>" ?
                            </label>
                            <hr class="linea">
                            
                            <input 
                                type="hidden" 
                                name="id_libro" 
                                value="<?php echo $libro['id_libro'] ?>">
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
                                    id = "close-eLibro-<?php echo $libro['id_libro']; ?>" >
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
} else {?>

    <h3 class="center">No se encontraron resultados. Agrega un nuevo Libro</h3>
<?php
}
?>