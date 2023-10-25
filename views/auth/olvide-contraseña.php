<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="/login">
        <fieldset>
            <legend>
                <h1>Olvide mi contraseña</h1>
            </legend>

            <label class="h3-2">Reestablece tu contraseña escribiendo tu correo a continiación</label>

            <label class="block m-b-18 m-t-18 h3-2" for="">
                CORREO*
                <input 
                    class="block p-t-5 input-text" 
                    type="email"
                    name="email"
                    placeholder="tu@dominio.com">
            </label>

            <!-- button -->
            <input
                class="btn-submit m-b-25" 
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