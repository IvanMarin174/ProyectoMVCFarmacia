<main class = "seccion contenedor">
    <h3>Administrador</h3>
       <?php
       
        if($mensaje){            
            $resultado =mostrarNotificacion(intval($mensaje));            
            if($resultado){ ?>
                <p class="alerta correcto"><?php echo s($resultado);?></p>
            <?php }
        }?>
        

       
        <a href="/productos/crear" class="boton boton-amarillo">Nuevos Productos</a>
        <table class = "tabla-productos">
            <thead>
                <tr>                    
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Nombre de Medicamento</th>
                    <th>Numero de Productos</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php foreach($productos as $producto): ?>
                        <th><?php echo $producto->idProducto;?></th>
                        <th><?php echo $producto->nombre;?></th>
                        <th>$<?php echo $producto->precio;?></th>
                        <th>%<?php echo $producto->descuento;?></th>
                        <th><?php echo $producto->nombreMarca;?></th>
                        <th><?php echo $producto->nombreCategoria;?></th>
                        <th><?php echo $producto->nombre_generico;?></th>
                        <th><?php echo $producto->contador;?></th>
                        <th><img src="/imagenes/<?php echo $producto->imagen;?>" alt="imagenProducto" class="imagen-tabla"></th>
                        <th>
                            <form method = "POST" action="/productos/eliminar">
                                <input type="hidden" name = "id" value = "<?php echo $producto->idProducto;?>">
                                <input type = "submit" class="boton-rojo" value = "Eliminar">
                            </form>
                            <a href="/productos/actualizar?id=<?php echo $producto->idProducto ;?>" class="boton-verde">Actualizar</a>

                        </th>
                        
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </main>