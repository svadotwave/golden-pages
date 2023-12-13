<h1>Libros Disponibles</h1>


<?php 

// debuguear("\n\n" . 'id = ' . $_SESSION['id'] . "\n" .
// 'nombre = ' . $_SESSION['nombre'] . "\n" .
// 'apellido = ' . $_SESSION['apellido'] . "\n" .
// 'email = ' . $_SESSION['email'] . "\n" .
// 'rol = ' . $_SESSION['rol'] . "\n"
// );

?>



<?php
if (!empty($libros)) { ?>
    
    <div class="tarjetas">
    <?php
    foreach ($libros as $libro) { ?>
        <div class="item-card">

            <div class="img-card">
                <img src="<?php echo $libro['img_libro'] ?>" alt="portada no disponible..." >
            </div>

            <div class="info-card">
                <h3 class="text-card"> <?php echo $libro['nombre_libro'] ?> </h3>
                <p class="h3-2"> 
                    <?php echo 
                    $usuario->find('id_usuario', $autor->find('id_autor', $libro['id_autor'])->id_usuario)->nombre_usuario . ' ' .
                    $usuario->find('id_usuario', $autor->find('id_autor', $libro['id_autor'])->id_usuario)->apellido_usuario;
                    ?> 
                 </p>

                <p class="h3-2"> $ <?php echo $libro['precio_libro'] ?> </p>



                <form 
                    class="from" 
                    method="POST"
                    action="/biblioteca">

                    <input 
                        type="hidden" 
                        name="id_usuario" 
                        value="<?php echo $_SESSION['id'] ?>" >

                    <input 
                        type="hidden" 
                        name="id_libro" 
                        value="<?php echo $libro['id_libro']; ?>" >

                    <input 
                        type="hidden" 
                        name="tipo" 
                        value="compra" >


                    <input
                        class="btn-submit m-t-18 m-b-25" 
                        type="submit" 
                        value="Comprar" 
                        readonly >

                </form>

            </div>

            
        </div>
    <?php
    } ?>
    </div>
<?php
} else { ?>

<h3 class="center">No se encontraron resultados.</h3>

<?php
}
?>




