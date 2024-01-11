<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)) {
        $inicio = false;
    } 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Farmacia la Esquina</title>
        <link rel="stylesheet" href="/build/css/app.css">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    </head>
    <body>
        <header class="header titulo">                    
            <a data-aos="fade-down"  href="/"><h1>Farmacia la Esquina</h1></a>
            <div class="barra"></div>
            <div>
                <nav class="navegacion-principal contenedor">
                    <div class="mobil-menu">
                        <img src="/build/img/barras.svg" alt="icono menu">
                    </div>
                    <svg class="svg">
                        <rect class="svg-diseño"/>
                    </svg>
                    <div class="btnNav">                        
                        <a href="/productos">Productos</a>
                    </div>
                    <svg class="svg">
                        <rect class="svg-diseño"/>
                    </svg>
                    <div class="btnNav">
                        <a href="/productos?descuento=true">Descuentos</a>
                    </div>
                    <svg class="svg">
                        <rect class="svg-diseño"/>
                    </svg>
                    <div class="btnNav">
                        <a id ="category" href="/">Categorias</a>
                    </div>
                    <?php if($auth):?>
                        <svg class="svg">
                        <rect class="svg-diseño"/>
                        </svg>
                        <div class="btnNav cerrar">
                            <a href="/logout">Cerrar sesión</a>
                        </div>
                    <?php endif; ?>
                </nav>
            </div>
        </header>

        <?php echo $contenido?>


        <footer class="footer ">
            <div class="contenedor cont-footer">
                <nav class="nav-footer">
                    <a href="/productos">Productos</a>     
                    <a href="/productos?descuento=true">Descuentos</a>
                    <a href="/">Categorias</a>
                </nav>
            </div>
            <p>Todos los derechos reservados <?php echo date('Y')?> </p>
            <?php if(!$auth){?>
                <a href="/login" class = "admin elegantshadow">Iniciar Sesión como Administrador</a>    
            <?php }else if($auth){?>            
                <a href="/admin" class = "admin elegantshadow">Pagina Administrador</a>    
            <?php }?>
        </footer>
        <script src="/build/js/bundle.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
    </body>
</html>