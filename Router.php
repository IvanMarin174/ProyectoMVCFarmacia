<?php
namespace MVC;
class Router{
    
    public $rutasGET =  [];
    public $rutasPOST = [];
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }
    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;
        $rutas_protegidas = ['/admin', '/productos/crear', '/productos/actualizar','/productos/eliminar'];

        $urlActual = $_SERVER['PATH_INFO'] ??'/';
        $metodo = $_SERVER['REQUEST_METHOD'];
    

        if($metodo == 'GET'){            
            $fn = $this->rutasGET[$urlActual] ?? null;            
        }else{                        
            $fn = $this->rutasPOST[$urlActual] ?? null; 
            
        }
        
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo "pagina no encontrada";
        }
    }
    public function render($views, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;
        }
        ob_start();
        include __DIR__ ."/views/$views.php";
        $contenido = ob_get_clean();
        include __DIR__ ."/views/layout.php";
    }


}