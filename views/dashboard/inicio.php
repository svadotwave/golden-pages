<h1>INICIO</h1>


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
                <img src="<?php echo $libro->img_libro ?>" alt="Libro 1" class="img-card" >
                <h3> <?php echo $libro->nombre_libro ?> </h3>
            </div>
    <?php
    $contador++;
    }
} else {
    echo "No se encontraron resultados.";
}
?>
</div>


