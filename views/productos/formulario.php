<fieldset >
    <div class="cont-campos">
        <legend>Informacion del Producto</legend>
        <label for="nombreProducto">Nombre</label>
        <input type="text" id = "nombre"  name ="producto[nombre]" value ="<?php echo s($producto->nombre);?>">
        
        <label for="precio">Precio</label>
        <input type="number" id = "precio" name ="producto[precio]" value ="<?php echo s($producto->precio);?>">
        
        <label for="imagen">Imagen</label>
        <input type="file" id = "imagen" accept="image/jpeg, image/png, image/jpg, image/webp" name ="producto[imagen]">
        <?php if($producto->imagen):?>      
            <img src="/imagenes/<?php echo$producto->imagen?>" class="imagen-small">
        <?php endif?>
        <label for="idMarca">ID Marca</label>
        <select name = "producto[idMarca]">
            <option value="">--Seleciona una</option>
            <?php foreach($marcas as $marca):?>
                <option <?php echo $producto->idMarca === $marca->idMarca ? 'selected' :'';?>
                value="<?php echo $marca->idMarca ; ?>"> <?php echo s($marca->nombreMarca); ?> </option>
            <?php endforeach;?>
        </select>
        
        <label for="idCategoria">ID Categoria</label>
        <select name = "producto[idCategoria]">
            <option value="">--Seleciona una</option>
            <?php foreach($categorias as $categoria):?>
                <option <?php echo $producto->idCategoria === $categoria->idCategoria ? 'selected' :'';?>
                value="<?php echo $categoria->idCategoria ; ?>"> <?php echo s($categoria->nombreCategoria); ?> </option>
            <?php endforeach;?>
        </select>
        
        <label for="idMedicamento">ID Medicamento</label>
        <select name = "producto[idMedicamento]">
            <option  salected value="null">--Seleciona una</option>
            
            <?php foreach($medicamentos as $medicamento):?>
                <option <?php echo $producto->idMedicamento === $medicamento->idMedicamento ? 'selected' :'';?>
                value="<?php echo $medicamento->idMedicamento ; ?>"> <?php echo s($medicamento->nombre_generico); ?> </option>
            <?php endforeach;?>
        </select>

        <label for="precio">Contador</label>
        <input type="number" id = "contador" name ="producto[contador]" value ="<?php echo s($producto->contador);?>">

        <label for="precio">Descuento (Colocar porcentaje )</label>
        <input type="number" id = "descuento" name ="producto[descuento]" min ="0" max ="50" value ="<?php echo s($producto->descuento);?>">
    </div>             

</fieldset>