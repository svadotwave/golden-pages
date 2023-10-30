<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/login">
        <fieldset>
            <legend>
                <h1>Iniciar sesión</h1>
            </legend>

            <label class="block h3-2" for="">
                CORREO*
                <input 
                    class="block p-t-5 input-text" 
                    type="email"
                    name="email"
                    value="<?php echo s($auth->email); ?>"
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
            if(isset($alertas['usuario'])) {
                
                if(array_key_exists('error', $alertas["usuario"])) { ?>
                    <label class="body-2 error block" for="">
                    <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                    <?php echo $alertas["usuario"]['error']; ?>
                    </label>
            <?php 
                } 
            } ?>

            <?php
            if(isset($alertas['auth'])) {
                
                if(array_key_exists('error', $alertas["auth"])) { ?>
                    <label class="body-2 error block" for="">
                    <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                    <?php echo $alertas["auth"]['error']; ?>
                    </label>
            <?php 
                } 
            } ?>
        
            <label class="block m-t-18 h3-2" for="">
                CONTRASEÑA*
                <input 
                    class="block p-t-5 input-text" 
                    type="password"
                    name="password"
                    placeholder="********">
            </label>

            <?php 
            if(isset($alertas['password'])) {
                if(array_key_exists('error', $alertas["password"])) { ?>
                    <label class="body-2 error block" for="">
                    <i class="fa-solid fa-circle-exclamation" style="color: #EC5757; font-size: 12px"></i>
                    <?php echo $alertas["password"]['error']; ?>
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
                <span class="body-1">
                    <a href="/olvide-contraseña">¿Olvidaste tu contraseña?</a>
                </span>
                <span class="body-1">¿No tienes una cuenta? 
                    <a href="/registrarse">Registrate</a>
                </span>
            </div>

        </fieldset>
    </form>
</main>