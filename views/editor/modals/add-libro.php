<div class="modal-background" id="bg-mod-cLibro"></div>
<div class="modal-content" id="cont-mod-cLibro">
    <div class="dentro-modal">
        <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action=""
        enctype="multipart/form-data">
        <fieldset>
            <legend class="titulo">
                <h1>Crear Libro</h1>
            </legend>

            <label class="block h3-2" for="">
                TITULO DEL LIBRO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nombre_libro"
                    value=""
                    required
                    placeholder="título">
            </label>

            <label class="block h3-2 m-t-18" for="">
                PORTADA (PNG,JPG)*
                <input 
                    class="block p-t-5" 
                    type="file"
                    name="img_libro"
                    value=""
                    required
                    accept=".png, .jpg">
            </label>

            <label class="block h3-2 m-t-18" for="">
                CONTENIDO (PDF)*
                <input 
                    class="block p-t-5" 
                    type="file"
                    name="content_libro"
                    value=""
                    required
                    accept=".pdf">
            </label>

            <label class="block h3-2 m-t-18" for="">
                PRECIO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="precio_libro"
                    value=""
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
                    foreach ($autores as $au) { ?>
                        <option value="<?php echo $au['id_autor']; ?>" >
                        <?php echo 
                            $usuario->find('id_usuario', $au['id_usuario'])->nombre_usuario . ' ' .
                            $usuario->find('id_usuario', $au['id_usuario'])->apellido_usuario
                        ?>
                        </option>
                    <?php
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
                    foreach ($categorias as $cat) { ?>
                        <option value="<?php echo $cat['id_categoria']; ?>" >
                            <?php echo $cat['nombre_categoria']; ?>
                        </option>
                    <?php
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
                    value=""
                    required></textarea>
            </label>

            <input 
                type="hidden" 
                name="tipo" 
                value="agregar">

            <!-- button -->
            <input
                class="btn-submit m-t-18 m-b-25" 
                type="submit" 
                value="CREAR LIBRO" 
                readonly
            >

        </fieldset>
    </form>
    </div>
</div>