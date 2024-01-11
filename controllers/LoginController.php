<?php
namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{
    public static function login(Router $router){
        $errores =[];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Admin($_POST);
            $errores = $auth->validarAdmin();
           
            if(empty($errores) or $errores['num_rows'] == 1){
                $errores = $auth->existeAdmin();                
                if(empty($errores)){
                    $auth->autenticar();
                }
            }
                      

        }
        $router->render('auth/login', [
            'errores' => $errores
        ]);
        
    }
    public static function logout(){
        session_start();
        $_SESSION=[];
        header('Location: /');
    }
}
