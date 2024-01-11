<main class= "seccion contenedor ">
        <h1>Iniciar Sesión</h1>
        <?php foreach($errores as $error):?>
            <div class ="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>
        <div class="centrado">
        <form class ="formulario" method = "POST" action="/login">
            <fieldset >
                <div class="cont-campos">
                    <legend>Corro & Contraseña</legend>                                                
                    <label for="correo">Correo</label>
                    <input type="email" id = "email" name ="email"  placeholder ="Tu correo" >
                    <label for="password">Contraseña</label>
                    <input type="password" id = "password" name ="password"  placeholder ="Tu Contraseña">
                </div>                         
            </fieldset>

            <input type="submit" class ="subir" name="inicio" value = "Iniciar Sesión">

        </form>
        </div>

    </main>