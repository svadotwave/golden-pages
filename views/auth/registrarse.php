<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="">
        <fieldset>
            <legend>
                <h1>Registrarse</h1>
            </legend>

            <label class="block h3-2" for="">
                NOMBRE*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nombre_usuario"
                    placeholder="Jhon"
                    value="<?php echo s($usuario->nombre_usuario) ?>">
            </label>

            <?php if(!empty($alertas)) {
                    if(array_key_exists('nombre', $alertas["error"])) { ?>
                        <label class="body-2 error" for="">
                        <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                        <?php echo $alertas["error"]['nombre']; ?>
                        </label>
            <?php       } 
                    } ?>


            <label class="block m-t-18 h3-2" for="">
                APELLIDOS*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="apellido_usuario"
                    placeholder="Carry"
                    value="<?php echo s($usuario->apellido_usuario) ?>">
            </label>

            <?php if(!empty($alertas)) {
                    if(array_key_exists('apellido', $alertas["error"])) { ?>
                        <label class="body-2 error" for="">
                        <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                        <?php echo $alertas["error"]['apellido']; ?>
                        </label>
            <?php       } 
                    } ?>

            <label class="block m-t-18 h3-2" for="">
                CORREO ELECTRONICO*
                <input 
                    class="block p-t-5 input-text" 
                    type="email"
                    name="email"
                    placeholder="tu@dominio.com"
                    value="<?php echo s($usuario->email) ?>">
            </label>

            <?php if(!empty($alertas)) {
                    if(array_key_exists('email', $alertas["error"])) { ?>
                        <label class="body-2 error" for="">
                        <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                        <?php echo $alertas["error"]['email']; ?>
                        </label>
            <?php       } 
                    } ?>
        
            <label class="block m-t-18 h3-2" for="">
                CONTRASEÑA*
                <input 
                    class="block p-t-5 input-text" 
                    type="password"
                    name="password"
                    placeholder="********">
            </label>

            <?php if(!empty($alertas)) {
                    if(array_key_exists('password', $alertas["error"])) { ?>
                        <label class="body-2 error" for="">
                        <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                        <?php echo $alertas["error"]['password']; ?>
                        </label>
            <?php       } 
                    } ?>

            <!-- button -->
            <input
                class="btn-submit m-t-18 m-b-25" 
                type="submit" 
                value="Registrar" 
                readonly
            >

            <div class="center">
                <span class="body-1">¿Ya tienes una cuenta? 
                    <a href="/login">Inicia sesión</a>
                </span>
            </div>

        </fieldset>
    </form>
</main>

<!-- footer -->
<footer class="center">
    <hr class="linea">
    <a class="none" href="/">
        <i class="fa-solid fa-book-open" style="color: #373B53; font-size: 64px;"></i>
        <div>
            <h3 class="m-t-0" style="color: #373B53;">GOLDEN PAGES</h3>
        </div>
    </a>
</footer>