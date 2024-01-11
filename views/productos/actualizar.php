<main class = "contenedor seccion">
    <h3>Actulizar</h3>
        <a href="/admin" class="boton boton-amarillo">Volver</a>
        <div class ="alerta error">
            <?php
                echo "$error";
            ?>
        </div>
    <div class="centrado ">
        <form class="formulario" method = "POST" enctype="multipart/form-data">
            <?php include __DIR__. '/formulario.php'; ?>
            <input type="submit"  class ="subir" name="submitMarca" value = "Enviar" >  
        </form>            
    </div>
</main>