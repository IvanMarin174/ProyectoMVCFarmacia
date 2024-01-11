<?php

namespace Model;




class ActiveRecord{    
    protected static $db;
    protected static $columnasDB= [''];
    protected static $error = '';
    protected static $nombreTabla= '';
    
    protected static $nombreID= '';
    
    public static function setBD($database){
        self::$db = $database;
    }
    public function guardar(){
        if ($this->idProducto !=''){//verificar actualizar
            //actualizar
            $resultado =$this->actualizar();
        }else{
            //crear
            $resultado =$this->crear();
        }
        return $resultado;
    }
    public function actualizar(){
        $atributos =$this->sanitizarAtributos();
        $valores =[];
        //NOTA modificar metodo si se usa para otra clase que no sea para la de producto
        foreach ($atributos as $key => $value) {
            if($key === 'nombre_generico') continue;
            if($key === 'nombreMarca') continue;
            if($key === 'nombreCategoria') continue;
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE producto SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE idProducto = '" . self::$db->escape_string($this->idProducto) . "'";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        return $resultado;
    }
    public function crear(){
        $atributos =$this->sanitizarAtributos();        
        if(isset($this->idProducto)){            
            $valores =[];            
            foreach ($atributos as $key => $value) {
                if($key === 'nombre_generico') continue;
                if($key === 'nombreMarca') continue;
                if($key === 'nombreCategoria') continue;
                $valores[$key] = $value;
            }
            $atributos =$valores;            
        }        
        $query = "INSERT INTO ". static::$nombreTabla . "(";
        $query .= join(', ', array_keys($atributos));
        $query .=") VALUES('";
        $query .= join("', '", array_values($atributos));
        $query .= "');";        
        $resustado = self::$db->query($query);
        return $resustado;
    }
    //eliminar
    public function eliminar(){               
        $query = "DELETE FROM ". static::$nombreTabla . " WHERE idProducto = ". self::$db->escape_string($this->idProducto) ." LIMIT 1";        
        $resultado = self::$db->query($query);
        if($resultado){           
            $this->eliminarImagen();
            header('location: /admin?mensaje=3');
        }
    }

    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id'. static::$nombreID .'') continue;            
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizar = [];
        foreach($atributos as $key => $value){
            $sanitizar[$key] = self::$db->escape_string($value);
        }
        return $sanitizar;
    }
    //subida de archicos;
    public function setImagen($imagen){
        //elimina imagen previa 
        if(!is_null($this->idProducto)){
           $this->eliminarImagen();
        }
        if($imagen){
            $this->imagen =$imagen;
        }
    }
    public function eliminarImagen(){
        $existeArchivo = file_exists(CARPETA_IMAGENES .$this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES .$this->imagen);
        }
    }
    public static function all (){
        $consulta = "SELECT * FROM "  . static::$nombreTabla . " ;";
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    }
    public static function get($limite){
        $consulta = "SELECT * FROM "  . static::$nombreTabla . " LIMIT " . $limite;
        
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    }
    public static function cosultarSQL($query){
        //Consulta
        $resultado = self::$db->query($query);
        //Iterar los resultado 
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[]=static::crearObjeto($registro);
            
        }        
        //liberar la memoria
        $resultado->free();
        //retornar los resultados
        return $array;


    }
    public function validar(){
        $cont = 0;
        $contProdu =0;
        $bandera = false;
        foreach($this as $key => $value){
            if($value == ''){
                if($key == 'nombre_generico'){
                    $contProdu++;
                }
                if($key == 'nombreCategoria'){
                    $contProdu++;                    
                }
                if($key == 'nombreMarca'){
                    $contProdu++;
                }
                $cont++;                
            }
            if($key == 'idProducto'){
                $bandera = true;
            }         
            
        }
        
        if($bandera && $contProdu == 3){            
            $cont= $cont-3;            
        }
        
        if($cont > 1){           
                static::$error = "Faltan valores en el formulario ". static::$nombreID ."";
        }
        
        
    }
    protected static function crearObjeto($registro){
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists( $objeto, $key )){                    
                    $objeto->$key = $value;
            }
        }
        return $objeto;
    }
    public static function getError(){
        return static::$error;
    }
    //bascar por id
    public static function find($id){
        $consulta =  "SELECT * FROM " . static::$nombreTabla ."  where id". static::$nombreID ." = '${id}';";
        $reultado =self::cosultarSQL($consulta);        
        return array_shift($reultado) ;
    }
    //sincronizae el objeto en memoria
    public function sincronizar($array = []){
        foreach ($array as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;                    
            }
        }
    }
}