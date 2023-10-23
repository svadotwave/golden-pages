<main class="content-center"> <!--  main -->

    <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="">
        <fieldset>
            <legend>
                <h1>Iniciar sesión</h1>
            </legend>

            <label class="block m-b-18 h3-2" for="">
                CORREO O NOMBRE DE USUARIO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nom_completo"
                    placeholder="tu@dominio.com">
            </label>
        
            <label class="block m-b-18 h3-2" for="">
                CONTRASEÑA*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="pass_usu"
                    placeholder="********">
            </label>

            <!-- button -->
            <input
                class="btn-submit m-b-25" 
                type="submit" 
                value="Iniciar sesión" 
                readonly
            >

            <div class="center">
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