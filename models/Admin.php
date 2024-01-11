<?php
 
namespace Model;

class Admin extends ActiveRecord {
    protected static $nombreTabla = 'administrador';
    protected static $columnasDB = ['idAdmin', 'email', 'password'];
    protected static $nombreID = 'Admin';
    public $idAdmin;
    public $email;
    public $password;

    public function __construct($args = []){
        $this->idAdmin = $args['idAdmin'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';

    }
    public function validarAdmin(){
        $errores=[];
        if(!$this->email){
            $errores[] = 'Falta Correo';
            
        }
        if(!$this->password){
            $errores[] = 'Falta Contraseña';
            
        }
        
        return $errores;
    }
    public function existeAdmin(){
        $error = [];
        $query = "SELECT *FROM " . self::$nombreTabla . " WHERE email = '" . $this->email . "' LIMIT 1" ;
        $resultado = self::$db->query($query);
        if(!$resultado->num_rows){            
            $error [] = "El correo no existen";
            
        }else{
            $admin = $resultado->fetch_object();
           
            $autenticado =password_verify($this->password, $admin->password);
            
            if(!$autenticado){
                $error[] = "La contraseña es incorrecta";
            }
            
        }
        
        return $error;
    }
   
    public function autenticar(){
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        header('Location: /admin');

    }
}