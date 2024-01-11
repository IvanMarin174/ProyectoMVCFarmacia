<div class="filaProductos">
    <?php foreach($resultado as $producto):?>    
    <div class="producto">
        <?php if($producto->descuento!=0):?>       
            <span class = "oferta">%</span> 
        <?php endif; ?>                              
        <picture>  
            <img loading="lazy" width="200" height="300" src="/imagenes/<?php echo $producto->imagen;?>" alt="Imagen Productp">
        </picture>
        <div class="datos-producto">                            
            <ul>
            <?php if($producto->descuento == 0):?>
                <li class="precio">$<?php echo $producto->precio;?></li>
            <?php endif; ?> 
            <?php if($producto->descuento !=0):?>
                <li class="tachar">$<?php echo $producto->precio;?></li>
                <li class="precioOferta">$<?php echo obtenerOferta($producto->precio, $producto->descuento) ;?></li>
            <?php endif; ?> 
                <li><?php echo $producto->nombre;?></li>
            </ul>                            
        </div>
        <div class="centrado">
            <a href="/describeProducto?idProducto=<?php echo $producto->idProducto;?>" class="boton boton-amarillo">
                ver
            </a>
        </div>
    </div>    
    
    <?php endforeach?>
</div>