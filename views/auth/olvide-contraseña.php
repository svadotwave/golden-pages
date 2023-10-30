<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/olvide-contraseña">
        <fieldset>
            <legend>
                <h1>Olvide mi contraseña</h1>
            </legend>

            <label class="h3-2">Reestablece tu contraseña escribiendo tu correo a continiación</label>

            <label class="block m-t-18 h3-2" for="">
                CORREO*
                <input 
                    class="block p-t-5 input-text" 
                    type="email"
                    name="email"
                    placeholder="tu@dominio.com">
            </label>

            <?php
            if(isset($alertas['email'])) { // Verificar si la clave 'email' está definida en el array
                if(array_key_exists('error', $alertas["email"])) { ?>
                    <label class="body-2 error block" for="">
                    <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                    <?php echo $alertas["email"]['error']; ?>
                    </label>
            <?php 
                } 
            } ?>

            <?php
            if(isset($alertas['usuario'])) { // Verificar si la clave 'email' está definida en el array
                if(array_key_exists('error', $alertas["usuario"])) { ?>
                    <label class="body-2 error block" for="">
                    <i class="fa-solid fa-circle-check" style="color: #EC5757; font-size: 12px"></i>
                    <?php echo $alertas["usuario"]['error']; ?>
                    </label>
            <?php 
                } 
            } ?>

            <?php
            if(isset($alertas['usuario'])) { // Verificar si la clave 'email' está definida en el array
                if(array_key_exists('exito', $alertas["usuario"])) { ?>
                    <label class="body-2 exito block" for="">
                    <i class="fa-solid fa-circle-exclamation" style="color: #33D69F; font-size: 12px"></i>
                    <?php echo $alertas["usuario"]['exito']; ?>
                    </label>
            <?php 
                } 
            } ?>

            <!-- button -->
            <input
                class="btn-submit m-t-18 m-b-25" 
                type="submit" 
                value="Iniciar sesión" 
                readonly
            >

            <div class="center acciones">
                <span class="body-1">¿Ya tienes una cuenta? 
                    <a href="/login">Inicia sesión</a>
                </span>
                <span class="body-1">¿No tienes una cuenta? 
                    <a href="/registrarse">Registrate</a>
                </span>
            </div>

        </fieldset>
    </form>
</main>