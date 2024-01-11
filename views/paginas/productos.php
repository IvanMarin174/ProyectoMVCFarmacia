<main>
        <div class="alinear-derecha">
            <div class="categoria-producto">
            <?php $categoria = mostrarCategoria($mensaje);?>
            <?php if ($categoria):?>
                <p><?php echo s($categoria)?></p>
            <?php endif;?>            
            </div>
        </div>
        <section class="seccion contenedor">
            <div class="contenedor-listProductos">

                <div class="cont-filtros">
                    <div class="titulo-filtro">
                        <h3>Filtros </h3>
                    </div>
                    <div class="filtro" >
                        <div class="despliege">
                            <h3> Ordenar por </h3>
                            <img src="build/img/expand_more.png" class="icono-arrowDown" alt="Icono filtro">
                            <img src="build/img/expand_less.png"  class="icono-arrowUp" alt="Icono filtro">
                        </div>
                        <div class="contenido-filtro">
                            <ul>
                                <li class="select-filtro">
                                    <input  class="check" type="checkbox">
                                    De la A a la Z
                                </li>
                                <li class="select-filtro">
                                    <input  class="check" type="checkbox" >
                                    Menor precio a Mayor
                                </li>
                                <li class="select-filtro">
                                    <input  class="check" type="checkbox">
                                    Mayor precio a Men
                                </li>                                
                            </ul>
                            
                        </div>
                    </div>
                    <div class="filtro" >
                        <div class="despliege">
                            <h3> Marcas </h3>
                            <img src="build/img/expand_more.png" class="icono-arrowDown" alt="Icono filtro">
                            <img src="build/img/expand_less.png"  class="icono-arrowUp" alt="Icono filtro">
                        </div>
                        <div class="contenido-filtro">
                            <ul>
                                <?php foreach($resultadoMarca as $data):?>
                                    <li class="select-filtro">
                                        <input  class="check" type="checkbox">
                                       <?php echo $data->nombreMarca;?>
                                    </li>
                                <?php endforeach;?>                                
                            </ul>
                            
                        </div>
                    </div>
                    <div class="filtro" >
                        <div class="despliege">
                            <h3> Precios </h3>
                            <img src="build/img/expand_more.png" class="icono-arrowDown" alt="Icono filtro">
                            <img src="build/img/expand_less.png"  class="icono-arrowUp" alt="Icono filtro">
                        </div>
                        <div class="contenido-filtro">
                            <ul>

                            <?php foreach($precioFiltro as $campo => $valor ):?>
                                    <li class="select-filtro">
                                        <input  class="check" type="checkbox">
                                        <?php echo $valor;?>
                                    </li>
                                <?php endforeach ;?> 

                            </ul>
                            
                        </div>
                    </div>

                </div>
                <div class="cont-listadoProductos">
                        <?php
                           
                            include 'listado.php';
                        ?>
                        <div class="centrado">
                            <form method = "POST">
                                <input type="submit" name="MostrarMas" value="Mostrar mas" class="btnMas"/>
                            </form>                            
                        </div>
                </div>
                
            </div>
        </main>