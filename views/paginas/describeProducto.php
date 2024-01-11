<main>

<section class="seccion contenedor">
    <h3><?php echo $info->nombre;?></h3>
    <div class="cont-describe-Producto">
        <div class="imangenProducto">
                                    
            <img loading="lazy" width="200" height="300" src="/imagenes/<?php echo $info->imagen;?>" alt="Imagen el producto">
            
        </div>
        <div class="datos-producto">
            <ul>
                <li class ="estiloCategoria"><?php echo $categoria->nombreCategoria;?></li>
                <?php if($info->descuento == 0):?>
                    <li class="precio">$<?php echo $info->precio;?></li>
                <?php endif; ?> 
                <?php if($info->descuento!=0):?>
                    <li class="tachar">$<?php echo $info->precio;?></li>
                    <li class="precioOferta">$<?php echo obtenerOferta($info->precio, $info->descuento) ;?></li>
                <?php endif; ?> 
                <li><?php echo $info->nombre;?></li>
                <li><?php echo $marca->nombreMarca;?></li>
            </ul>
        </div>                            
    </div>
    <section class="infoProducto" >
        <div class="info">
            <h3>Informacion general</h3>
            <p><?php echo $info->nombre;?></p>
            <p><?php echo $marca->nombreMarca;?></p>
            <?php if(intval($info->idMedicamento) != 3):?>
                    <p><?php echo $infoMedic->nombre_generico;?></p>
                    <p><b>Laboratorio: </b><?php echo $infoMedic->nombre_laboratorio;?></p>
                    <p><b>Concentracion: </b><?php echo $infoMedic->concentracion;?></p>
                    <p><b>Formula: </b><?php echo $infoMedic->formula;?></p>
                    <p><b>Presentación: </b><?php echo $infoMedic->presentacion;?></p>
            <?php endif; ?>
        </div>
        <?php if(intval($info->idMedicamento) != 3):?>
            <div class="advertencias">
                <h3>Advertencias</h3>                           
                <p><?php echo $infoMedic->advertencia;?></p>
            </div>
            <div class="info-consumo">
                <h3>Informacion de uso</h3>
                <p><?php echo $infoMedic->administracion;?></p>                            
            </div>
            <div class="conservacion">
                <h3>Conservacion del Medicamento</h3>
                <p><?php echo $infoMedic->conservacion;?></p>
            </div>                 
        <?php endif; ?>                     

     </section>

</section>
<section class="seccion contenedor"><!--seccionProductos-->
    <h3>Otros productos</h3>
    <div class="cont-seccionProductos">                    
        <?php                        
            include 'listado.php';
         ?>                    
    </div>
    <div class="alinear-derecha">
        <a href="/productos" class="boton boton-azul">
            Ver todos
        </a>
    </div>
</section><!--seccionProductos-->

</main>