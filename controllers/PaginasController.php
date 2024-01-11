<?php
namespace Controllers;
use MVC\Router;
use Model\Marca;
use Model\Producto;
use Model\Categoria;
use Model\Medicamento;

class PaginasController{
    public static function index(Router $router){
            $resultado= Producto::productosDescuento(4);
            $router->render('paginas/index', [
                'resultado' => $resultado
            ]);
    }
    public static function productos(Router $router){
        $mensaje= $_GET['categoria'] ?? null;   
        $descuento= $_GET['descuento'] ?? null; 
        $limite =8;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if ($_POST['MostrarMas']) {
                $limite= $limite+8;
            }
        }
        if($mensaje){
            //con categoria
            $resultado = Producto::productosCategoria($limite, $mensaje);
            $resultadoMarca = Marca::marcasPorCategoria($mensaje);
            $precio= Producto::preciosMaxPorCategoria($mensaje);       
            $precioFiltro = contPrecio(intval($precio));
        }else{
            //con descuento
            if($descuento){
                $resultado = Producto::productosDescuento($limite);
                $resultadoMarca= Marca::marcasDesuento();
                $precio= Producto::preciosMaxDescuento();
                $precioFiltro = contPrecio(intval($precio));
            }else{
                //todos los productos
                $resultado = Producto::get($limite);            
                $resultadoMarca = Marca::all();
                $precio= Producto::precioMax();            
                $precioFiltro = contPrecio(intval($precio));
            }
        }  
        
        $router->render('paginas/productos', [
            'resultado' => $resultado,
            'resultadoMarca' => $resultadoMarca,
            'precioFiltro' => $precioFiltro,
            'mensaje' => $mensaje,
            
        ]);
    }
    public static function describeProducto(Router $router){
        $id = $_GET['idProducto'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /');
        }
        $resultado= Producto::get(4);
        $info = Producto::find($id);
        $categoria = Categoria::find($info->idCategoria);
        $marca = Marca::find($info->idMarca);
        if (intval($info->idMedicamento) != 3 ){       
            $infoMedic = Medicamento::find($info->idMedicamento);         
        }
        $router->render('paginas/describeProducto', [
            'info' =>$info,
            'categoria' => $categoria,
            'marca' => $marca,
            'infoMedic' => $infoMedic,
            'resultado' =>$resultado
        ]);
    }
}