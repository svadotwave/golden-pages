<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/recuperar-contraseña?token=<?php echo $token ?>">
        <fieldset>
            <legend>
                <h1>Reestablecer Contraseña</h1>
            </legend>

            <?php 
            if(isset($alertas['token']) || $token === '') {

                if(empty($alertas)) {?>
                    <div class="center">
                       <i class="fa-solid fa-circle-xmark fa-beat" style="color: #EC5757; font-size: 80px"></i>
                       <h2> Token no valido </h2>
                   </div>
                <?php
                } else {
                    if(array_key_exists('error', $alertas["token"])) { ?>
                        <div class="center">
                            <i class="fa-solid fa-circle-xmark fa-beat" style="color: #EC5757; font-size: 80px"></i>
                            <h2><?php echo $alertas["token"]['error']; ?></h2>
                        </div>
                    <?php
                    }
                }
            } else {?>

                <label class="h3-2">Escribe tu nueva contraseña</label>
                <label class="block m-t-18 h3-2" for="">
                    CONTRASEÑA*
                    <input 
                        class="block p-t-5 input-text" 
                        type="password"
                        name="password"
                        placeholder="Tu nueva contraseña">
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
                if(isset($alertas['password'])) { // Verificar si la clave 'email' está definida en el array
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
                    value="Guardar Nueva Contraseña" 
                    readonly
                >
                
                <?php
            } ?>



            <div class="center acciones">
                <span class="body-1">¿Ya tienes una cuenta? 
                    <a href="/login">Inicia sesión</a>
                </span>
                <span class="body-1">¿Aún no tienes una cuenta? 
                    <a href="/registrarse">Registrate</a>
                </span>
            </div>

        </fieldset>
    </form>
</main>