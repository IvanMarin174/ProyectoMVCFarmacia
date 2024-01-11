<main>
            <section class="cont-descrip"><!--descripcion -->
                <div class="descripcion">
                    <h1 >Descripcion de la pagina</h1>
                    <p>Aqui se en contrara la descripcion de lo que hace esta pagina web</p>
                </div>
            </section>
            <div class="division">
                <h2>Categorias</h2>                    
            </div>
            <section class="seccion contenedor"><!--Categoria -->            
                            
                    <div class="servicios">
                        <div  data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="/productos?categoria=1">
                                <picture>
                                    <source srcset="build/img/imageMedicamentos.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="build/img/imageMedicamentos.png" alt="Imagen Medicamentos">
                                </picture>                    
                                <p>Medicamentos</p>
                            </a>
                        </div >
                        <div   data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="productos?categoria=2">
                                <picture>
                                    <source srcset="build/img/primerosAuxilios.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="build/img/primerosAuxilios.png" alt="Imagen Medicamentos">
                                </picture>
                                <p>Primeros Auxilios</p>
                            </a>
                        </div >
                        <div  data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="/productos?categoria=3">
                                <picture>
                                    <source srcset="build/img/imageHigiene.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="/build/img/imageHigiene.png" alt="Imagen Medicamentos">
                                </picture>
                                <p>Higiene Personal</p>
                            </a>
                        </div >
                        <div  data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="/productos?categoria=4">
                                <picture>
                                    <source srcset="build/img/relasionSEX.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="/build/img/relasionSEX.png" alt="Imagen Medicamentos">
                                </picture>
                                <p>Salud Sexual</p>
                            </a>
                        </div >
                        <div  data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="/productos?categoria=5">
                                <picture >
                                    <source srcset="build/img/Estetoscopio.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="/build/img/Estetoscopio.png" alt="Imagen Medicamentos">
                                </picture>
                                <p>Accesorios</p>
                            </a >
                        </div >
                        <div  data-aos="flip-left" href="listProductos.php" class="category">
                            <a href="/productos?categoria=5">
                                <picture>
                                    <source srcset="build/img/descubrir.webp" type="image/webp">                                
                                    <img loading="lazy" width="200" height="300" src="/build/img/descubrir.png" alt="Imagen Medicamentos">
                                </picture>
                                <p>Conoce mas</p>
                            </a>
                        </div >
                    </div>

            </section>
            <div class="division">
                <h2>Descuentos</h2>                    
            </div>
            <section class="seccion contenedor"><!--seccion Productos-->                
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