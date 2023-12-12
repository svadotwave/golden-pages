<div class="modal-background" id="bg-mod-cEdAu"></div>
<div class="modal-content" id="cont-mod-cEdAu">
    <div class="dentro-modal">
        <!-- formulario -->
    <form 
        class="from" 
        method="POST"
        action="">
        <fieldset>
            <legend class="titulo">
                <h1>Crear Autor</h1>
            </legend>

            <label class="block h3-2" for="">
                NOMBRE*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="nombre_usuario"
                    value=""
                    placeholder="nombre">
            </label>

            <label class="block h3-2 m-t-18" for="">
                APELLIDO*
                <input 
                    class="block p-t-5 input-text" 
                    type="text"
                    name="apellido_usuario"
                    value=""
                    placeholder="apellido">
            </label>

            <input 
                type="hidden" 
                name="tipo" 
                value="agregar">

            <!-- button -->
            <input
                class="btn-submit m-t-18 m-b-25" 
                type="submit" 
                value="CREAR" 
                readonly
            >

        </fieldset>
    </form>
    </div>
</div>