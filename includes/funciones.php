<?php
    define('TEMPLATES_URL',__DIR__. '/templates');
    define('FUNCIONES_URL', 'funciones.php');
    define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
function inculirTemplate(string $nombre){
    include TEMPLATES_URL. "/${nombre}.php";

}
function obtenerOferta(float $precio, int $porcentaje): int{
    $calculo = ($precio*$porcentaje)/100;
    $oferta = $precio-$calculo;
    return $oferta;
}
function autenticacion(){
    session_start();
    if(!$_SESSION['login']){
        header('Location: /');
    }
    
}
function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html){
    $s = htmlspecialchars($html);
    return $s;
}
function mostrarNotificacion($codigo){
    $mensaje = '';
    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamento';
            break;
        case 2:
            $mensaje = 'Actualizando Correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;   
}
function mostrarCategoria($codigo){
    $mensaje = '';
    switch($codigo){
        case 1:
            $mensaje = 'Medicamentos';
            break;
        case 2:
            $mensaje = 'Primeros Auxilios';
            break;
        case 3:
            $mensaje = 'Higiene Personal';        
            break;
        case 4:
            $mensaje = 'Salud Sexual';        
            break;
        case 5:
            $mensaje = 'Accesorios';
            break;       
        case 6:
            $mensaje = 'Conoce mas';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;   
}
function contPrecio($precioMax){
    $precios = [];        
    $valor = 0;
    while($valor <= $precioMax){
        $cadena = "$". $valor."-$";
        $valor= $valor+50;
        $cadena = $cadena.strval($valor);            
        $precios[]= $cadena;                     
    } 
    return $precios;
}
function validarID(string $url){
    $id = $_GET['id'];
    $id = filter_var($id,FILTER_VALIDATE_INT);
    if(!$id){
        header('Location: ${url}');
    }
    return $id;
}