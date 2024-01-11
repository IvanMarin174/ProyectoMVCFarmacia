<?php
namespace Controllers;
use MVC\Router;
use Model\Producto;   
use Model\Medicamento;
use Model\Marca;
use Model\Categoria;
use Intervention\Image\ImageManagerStatic as Image;
class ProductoControllers{
    public static function index(Router $router){
        $productos = Producto::listarProductos();
        $mensaje = $_GET['mensaje'] ??null;
        $router->render('productos/admin',[
            'productos' => $productos,
            'mensaje' => $mensaje

        ]);
    }
    public static function crear(Router $router){
        $medic = new Medicamento;
        $producto = new Producto;        
        $error = '';
        $correcto ='';
        //Consultas
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){            
            if(isset($_POST['submitMedic'])){//Medicamento            
                $medic = new Medicamento($_POST);                
                $medic->validar();
                $error =  $medic::getError();                
                if($error === ''){
                    if($medic->guardar()){
                        $correcto= "Los datos de Medicamento se han enviado corectamente";                    
                    }  
                }
            
            }
            if(isset($_POST['submitPro'])){//Producto                        
                $producto = new Producto($_POST['producto']);               
                
                //generar nombre imagenes
                $nombreImagen = md5(uniqid(rand(), true)).".jpeg";
                //Realiza un resize a la imagen con intervertion
                        
                if($_FILES['producto']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['producto']['tmp_name']['imagen'])->fit(800,600);
                    $producto->setImagen($nombreImagen);
                    
                }            
                $producto->validar();
                $error = $producto::getError();
                
                if($error === ''){
                    if(!is_dir(CARPETA_IMAGENES)){
                        mkdir(CARPETA_IMAGENES);
                    }
                    //guardar imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);                
                    //insetar en la base de datos revisa la comillas                                
                    //Mensaje de exito
                    if($producto->guardar()){
                        header('Location: /admin?mensaje=1');                    
                    }
                }
            }
            if(isset($_POST['submitMarca'])){//LLena datos del formulario Marca
                $marca= new Marca($_POST);
                $error = $marca->getError();
                if ($error === '') {
                    if($marca->guardar()){
                        $correcto= "Los datos de Marca se han enviado corectamente";                
                    }
                }
                
            }
        }    
        $categorias = Categoria::all();    
        $marcas = Marca::all();
        $medicamentos = Medicamento::all();  
        $router->render('productos/crear',[
            'producto' => $producto , 
            'categorias' => $categorias,
            'medic' => $medic,            
            'marcas' => $marcas,            
            'error'  => $error,
            'correcto' => $correcto,
            'medicamentos' => $medicamentos
        ]);
    }
    public static function actualizar(Router $router){
        $id = validarID('/admin');
        $producto = Producto::find($id);
        $categorias = Categoria::all();    
        $marcas = Marca::all();
        $medicamentos = Medicamento::all();          
        $error = ''; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){                                  
            $producto->sincronizar($_POST['producto']);        
            $producto->validar();
            $error = $producto::getError();
            
            //imagen
            //generar nombre imagenes
            $nombreImagen = md5(uniqid(rand(), true)).".jpeg";
            //Realiza un resize a la imagen con intervertion                
            if($_FILES['producto']['tmp_name']['imagen']){
                $image = Image::make($_FILES['producto']['tmp_name']['imagen'])->fit(800,600);
                $producto->setImagen($nombreImagen);
                echo "Imagen";
            }
            //Inserciones a la base de datos
            if($error ===''){                            
                //insetar en la base de datos
                //guardar imagen
                if($_FILES['producto']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);                      
                }
                $resultado = $producto->guardar();
                if($resultado){
                    header('Location: /admin?mensaje=2');                    
                }   
            }           
        }
        $router->render('/productos/actualizar',[
            'producto' => $producto, 
            'categorias' => $categorias,                       
            'marcas' => $marcas,            
            'error'  => $error,            
            'medicamentos' => $medicamentos
        ]);
                
    }
    public static function eliminar(){
        $mensaje= $_GET['mensaje'] ?? null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id) {
                $producto = Producto::find($id);
                $producto->eliminar();            
            }
        }
    
    }
}