<?php
    require '../config/helpers.php';
    require '../config/database.php';

    $db = connetDB();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        error_log('------------------------');
        $postData = json_encode($_POST);
        error_log($_SERVER['REQUEST_URI']);
        error_log($postData);
        error_log('------------------------');

        $nom_completo = $_POST['nom_completo'];
        $email = $_POST['email'];

        // Insertar a sql
        $query = "INSERT INTO personas (nom_completo, email) VALUES ('$nom_completo', '$email')";
        $result = mysqli_query($db, $query);

        if($result) {
            error_log('Se Inserto datos Correctamente!');
        }
    }

    includeTemplate('header');
?>
    
    <div class="content-pages">
        <div id="main-start">
            <main class="content-center"> <!--  main -->

                <form 
                    class="from" 
                    method="POST"
                    action=""> <!-- formulario -->
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
                                <a href="/views/login.php">Inicia sesión</a>
                            </span>
                        </div>

                    </fieldset>
                </form>
            </main>

            <!-- footer -->
            <footer class="center">
                <hr class="linea">
                <i class="fa-solid fa-book-open" style="color: #373B53; font-size: 64px;"></i>
                <div>
                    <h3 class="m-t-0" style="color: #373B53;">GOLDEN PAGES</h3>
                </div>
            </footer>
        </div>
    </div>

</body>
</html>