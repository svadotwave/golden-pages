<h1>Libros Comprados</h1>

<div class="bg-table">
    <div class="table">
        <div class="nro">
            <span class="h3-2">Nro.</span>
        </div>
        <div class="table-body">
            <div class="table-item">
                <span class="h3-2">Portada</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Nombre</span>
            </div>
            <div class="table-item">
                <span class="h3-2">Autor</span>
            </div>
        </div>
        <div class="btn-actions">
            <!-- name button -->
        </div>
    </div>
</div>


<?php
if (!empty($compras)) {
    $contador = 1;
    foreach ($compras as $compra) { ?>

        <div class="table">
            <div class="nro">
                    <span class="h3-2">
                        <?php echo $contador; ?>
                    </span>
                </div>
            <div class="table-body">
                <div class="table-item">
                    <img src="<?php echo $libro->find('id_libro',  $compra['id_libro'])->img_libro; ?>" alt="" style="width: 40px; height: 40px;">
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php echo $libro->find('id_libro',  $compra['id_libro'])->nombre_libro; ?>
                    </span>
                </div>
                <div class="table-item">
                    <span class="h3-2">
                        <?php
                            echo
                            $usuario->find('id_usuario', $compra['id_usuario'])->nombre_usuario . ' ' .
                            $usuario->find('id_usuario', $compra['id_usuario'])->apellido_usuario;           
                        
                        ?>
                    </span>
                </div>
            </div>
            <!-- acciones de botones -->
            <div class="btn-actions">

                <form 
                    class="from" 
                    method="POST"
                    action="/biblioteca">

                    <input 
                        type="hidden" 
                        name="titulo" 
                        value="<?php echo $libro->find('id_libro',  $compra['id_libro'])->nombre_libro; ?>" >

                    <input 
                        type="hidden" 
                        name="url" 
                        value="<?php echo $libro->find('id_libro',  $compra['id_libro'])->content_libro; ?>" >

                    <input 
                        type="hidden" 
                        name="tipo" 
                        value="descarga" >


                    <input
                        class="btn-modificar btn-mod-mLibro" 
                        type="submit" 
                        value="Descargar" 
                        readonly >

                </form>
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