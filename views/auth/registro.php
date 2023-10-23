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

            <label class="block m-b-18 h3-2" for="">
                NOMBRE COMPLETO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nom_completo"
                    placeholder="Jhon Carry">
            </label>

            <label class="block m-b-18 h3-2" for="">
                CORREO ELECTRONICO*
                <input 
                    class="block p-t-5 input-text" 
                    type="email"
                    name="email"
                    placeholder="tu@dominio.com">
            </label>

            <label class="block m-b-18 h3-2" for="">
                NOMBRE DE USUARIO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text" 
                    name="nom_usu"
                    placeholder="jhoncry">
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