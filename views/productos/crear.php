<main class = "contenedor seccion">
        <h3>Crear</h3>
        <a href="/admin" class="boton boton-amarillo">Volver</a>
        <div class ="alerta error">
            <?php
                echo "$error";
            ?>
        </div>
        <div class ="alerta correcto">
            <?php
                echo "$correcto";
            ?>
        </div>
        <div class="advertencia">

        </div>

        <div class = "formularios">
            <form class= "formulario" method = "POST"  ><!--Formulario Medicamento-->
            <fieldset >
                    <div class="cont-campos">
                        <legend>Informacion del Medicamento</legend>
                        
                        <label  for="nombreGenerico">Nombre Generico</label>
                        <input  type="text" id = "nombreGenerico" name ="nombre_generico" value ="<?php echo s($medic->nombre_generico);?>">            
                        
                        <label for="concetracion">Concentracion del Medicamento</label>
                        <textarea type="text" id = "concentracion"name ="concentracion"><?php echo s($medic->concentracion);?></textarea>
                        
                        <label for="nombreLaboratorio">Nombre Laboratorio</label>
                        <input type="text" id = "nameLaboratorio" name ="nombre_laboratorio" value ="<?php echo s($medic->nombre_laboratorio);?>">
                        
                        <label for="formula">Formula del Medicamento</label>
                        <textarea type="text" id = "formula" name ="formula"><?php echo s($medic->formula);?></textarea>
                        
                        <label for="fechaVencimiento">Fecha de vencimiento</label>
                        <input type="date" id = "fechaVencimiento" name ="fecha_vencimiento" value ="<?php echo s($medic->fecha_vencimiento);?>">
                        
                        <label for="administracion">Administración</label>
                        <textarea type="text" id = "formula" name ="administracion"><?php echo s($medic->administracion);?></textarea>
                        
                        <label for="presentacion">Presentación</label>
                        <textarea type="text" id = "presentacion" name ="presentacion"><?php echo s($medic->presentacion);?></textarea>
                        
                        <label for="receta">¿Necesita receta? (1 o 0, si es 1 y no es 0)</label>
                        <input type="number" id = "receta" min ="0" max ="1" placeholder = "0" name ="receta" value ="<?php echo s($medic->receta);?>">
                        
                        <label for="conservacion">Conservación</label>
                        <textarea type="text" id = "conservacion" name ="conservacion"><?php echo s($medic->conservacion);?></textarea>
                        
                        <label for="advertencia">Advertencia</label>
                        <textarea type="text" id = "advertencia" name ="advertencia"><?php echo s($medic->advertencia);?></textarea>
                    </div>
                </fieldset>
                <input type="submit"  class ="subir" name="submitMedic" value = "Enviar" >  
            </form>
            <form class= "formulario" method = "POST" enctype="multipart/form-data"><!--Formulario Producto-->
                <?php include __DIR__. '/formulario.php'; ?>               
                <input type="submit" class ="subir" name="submitPro" value = "Enviar" >  
            </form>            
        </div>
        <div class="formularios">
            <form class="formulario" method = "POST">
                <fieldset >
                    <div class="cont-campos">
                        <legend>Agragar Marca</legend>                                              
                        <label for="nombreMarca">Nombre Marca</label>
                        <input type="texr" id = "nombreMarca" name ="nombreMarca">
                          
                    </div>                         
                </fieldset>
                <input type="submit"  class ="subir" name="submitMarca" value = "Enviar" >  
            </form>            
        </div>
    </main>