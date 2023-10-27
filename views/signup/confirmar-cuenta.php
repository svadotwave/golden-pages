<main class="centrado">

    <?php
    if(array_key_exists('exito', $alertas["token"])) { ?>
        <i class="fa-solid fa-circle-check fa-beat" style="color: #33D69F; font-size: 80px"></i>
        <h2><?php echo $alertas["token"]['exito']; ?></h2>
        <div class="buttons m-t-40">
            <div class="btn-1">
                <a href="/login">Iniciar Sesión</a>
            </div>
        </div>
    <?php 
    } else { ?>
        <i class="fa-solid fa-circle-xmark fa-beat" style="color: #EC5757; font-size: 80px"></i>
        <h2><?php echo $alertas["token"]['error']; ?></h2>
        <div class="buttons m-t-40">
            <div class="btn-1">
                <a href="/registrarse">Registrarse</a>
            </div>
        </div>
        <?php 
    } ?>

</main>

<!-- footer -->
<footer class="center footer">
    <hr class="linea">
    <a class="none" href="/">
        <i class="fa-solid fa-book-open" style="color: #373B53; font-size: 64px;"></i>
        <div>
            <h3 class="m-t-0" style="color: #373B53;">GOLDEN PAGES</h3>
        </div>
    </a>
</footer>