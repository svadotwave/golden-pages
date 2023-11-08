<h1>Libros Disponibles</h1>


<?php 

// debuguear("\n\n" . 'id = ' . $_SESSION['id'] . "\n" .
// 'nombre = ' . $_SESSION['nombre'] . "\n" .
// 'apellido = ' . $_SESSION['apellido'] . "\n" .
// 'email = ' . $_SESSION['email'] . "\n" .
// 'rol = ' . $_SESSION['rol'] . "\n"
// );

?>


<div class="tarjetas">
    <?php
    if (!empty($libros)) {
        $contador = 1;
        
        foreach ($libros as $libro) { ?>
            <div class="item-card">

                <div class="img-card">
                    <img src="<?php echo $libro->img_libro ?>" alt="portada no disponible..." >
                </div>

                <div class="info-card">
                    <h3 class="text-card"> <?php echo $libro->nombre_libro ?> </h3>
                    <p class="h3-2"> $ <?php echo $libro->precio_libro ?> </p>
                </div>
                
            </div>
    <?php
    $contador++;
    }
} else {
    echo "No se encontraron resultados.";
}
?>
</div>


