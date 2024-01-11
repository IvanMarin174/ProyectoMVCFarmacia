<?php
namespace Model;




class Producto extends ActiveRecord{
    protected static $nombreTabla= 'producto';
    protected static $nombreID= 'Producto';
    protected static $columnasDB= ['idProducto', 'nombre', 'precio', 'imagen','idMarca' , 'idCategoria',
                                'idMedicamento', 'contador','descuento','nombreMarca', 'nombreCategoria', 'nombre_generico'];
    public $idProducto;
    public $nombre;
    public $precio;
    public $imagen;
    public $idMarca;
    public $idCategoria;
    public $idMedicamento;
    public $contador;
    public $descuento;
    public $nombreMarca;
    public $nombreCategoria;
    public $nombre_generico;
    
    function __construct($arreglo = []){
        $this->idProducto = $arreglo['idProducto'] ?? '';
        $this->nombre = $arreglo['nombre'] ?? '';
        $this->precio = $arreglo['precio'] ?? '';
        $this->imagen = $arreglo['imagen'] ?? '';
        $this->idMarca = $arreglo['idMarca'] ?? '';
        $this->idCategoria = $arreglo['idCategoria'] ?? '';
        $this->idMedicamento = $arreglo['idMedicamento'] ?? '';
        $this->contador = $arreglo['contador'] ?? '';
        $this->descuento = $arreglo['descuento'] ?? '';
        $this->nombreMarca ='';
        $this->nombreCategoria ='';
        $this->nombre_generico='';

    }    
    public static function listarProductos(){
        $consulta = "SELECT p.idProducto ,p.descuento ,p.nombre , p.precio , p.imagen ,p.contador, m.nombreMarca, c.nombreCategoria ,medi.nombre_generico 
        FROM producto p, marca m, categoria c, medicamento medi where p.idMarca = m.idMarca and p.idCategoria = c.idCategoria and p.idMedicamento = medi.idMedicamento;";
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    }
    public static function preciosMaxPorCategoria($mensaje){
        $consulta = "SELECT  MAX(p.precio) FROM producto p where p.idCategoria = '$mensaje';";
        $reultado = self::$db->query($consulta);
        $reultado = $reultado->fetch_array(MYSQLI_NUM);        
        return $reultado[0];
    }
    public static function preciosMaxDescuento(){
        $consulta="SELECT MAX(p.precio) FROM producto p where p.descuento != 0;";
        $reultado = self::$db->query($consulta);
        $reultado = $reultado->fetch_array(MYSQLI_NUM);        
        return $reultado[0];
    }
    public static function precioMax(){
        $consulta="SELECT  MAX(p.precio) FROM producto p;";
        $reultado = self::$db->query($consulta);
        $reultado = $reultado->fetch_array(MYSQLI_NUM);
        
        return $reultado[0];
    }
    public static function productosDescuento($limite){
        $consulta ="SELECT p.idProducto, p.nombre , p.precio , p.imagen, p.descuento  FROM producto p 
        where p.descuento != 0 limit ${limite};";
        $reultado =self::cosultarSQL($consulta);
        return $reultado;
    
    }
    public static function productosCategoria($limite, $mensaje){
        $consulta = "SELECT p.idProducto, p.nombre , p.precio , p.imagen, p.descuento FROM producto p
        WHERE p.idCategoria  = '$mensaje' limit ${limite} ;";
        $reultado =self::cosultarSQL($consulta);
        
        return $reultado;
    }
}